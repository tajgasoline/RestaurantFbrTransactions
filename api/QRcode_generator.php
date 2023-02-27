 <?php

 if(  isset($_POST['transactionID']) &&  isset($_POST['field1']))
{


     $transactionID = $_POST['transactionID'];
     $field1 = $_POST['field1'];


  include('libs/phpqrcode/qrlib.php'); 
  $tempDir = 'QRcode/';  
  $codeContents =  $transactionID; 
  QRcode::png($codeContents, $tempDir.''.$transactionID.'.png', QR_ECLEVEL_L, 10,1);
 
  $result = 'QR-CODE generated Successfully';


 session_start();
 $serverName =$_SESSION['server'];
 $userId = $_SESSION['dbusername'];
 $userPassword = $_SESSION['dbpassword'];
 $database = $_SESSION['dbname'];

  $connectionInfo = array("UID" => $userId,
  "PWD" => $userPassword,
  "Database"=> $database,
  "TrustServerCertificate"=>True);
 
 
 $StoreConnect = sqlsrv_connect($serverName,$connectionInfo);
 
 if(!$StoreConnect){
        // print_r(sqlsrv_errors(), true);
  echo "<script>alert('Oops connection Problem')</script>";
}

if($StoreConnect)
{
 
 $query = " Update ax.[RETAILTRANSACTIONTABLE] Set srb = '".$transactionID."' where transactionid='".$field1."' ";
 
 
 $stmt = sqlsrv_query($StoreConnect, $query, array(), array("Scrollable" => 'static')) or die(sqlsrv_errors());
 if (!$query )  {
  $result2  = "error";
  $message = "query error";
}
else
{
  $result2  = "success";
  $message = "query success";
  $empty="";
}
}


    echo json_encode($result);
}

 ?>