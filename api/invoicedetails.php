<?php


if(  isset($_POST['Transaction']))
{
	  session_start();

	$store =   $_SESSION['store'];
  $tax =  $_SESSION['tax'];
    $POSID =$_SESSION['POSID'];
    $srb_user =$_SESSION['staffusername'];
   

 $srb_sntn=$_SESSION['ntn'];
 $srb_add=$_SESSION['address'];
  $srb_tarrif=$_SESSION['Tarrif'];
  $Logo=$_SESSION['Logo']; 
  

	$field1 = htmlentities($_POST["Transaction"]); 
	$serverName = "";
    $userId = "";
    $userPassword = "";
    $database = "";
 // $finaltotal = (int)$finaltotal;

	$result = array(); 


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



$where = '';
// $field1 = 'RTGUL-RTGC-175117';
if($field1 != ""){
	$where .= " and RTT.transactionid='".$field1."' ";
}
else {
	$where .='';

}
  
$totalamount=0;
    $query = "SELECT RTT.store,RTT.TRANSACTIONID,RTT.CREATEDDATE AS  STARTDATE ,cast(RPT.STARTDATE as Date)  ORDERDATE ,B.ORDERTYPE,EC.NAME AS HNAME,ECPT.NAME AS INAME, (RTST.QTY *-1) QTY,
    ROUND(((RTST.PRICE / 1".$tax.")*100),2) AS PRICE,
RTST.DISCAMOUNT * -1 DISCAMOUNT, RTST.TRANSACTIONSTATUS, 
ROUND(((RTST.PRICE / 1".$tax.")*100),2) * (RTST.QTY *-1) AS NETAMOUNT,GETDATE(),B.PERSONS,RTST.ITEMID,RTST.LINENUM,REFERENCENAME as CustomerNAme  , CONTACTNUMBER as CustomerContact ,ADDRESS as CustomerAddress 
FROM RETAILTRANSACTIONTABLE RTT
INNER JOIN RETAILTRANSACTIONSALESTRANS RTST ON RTST.TRANSACTIONID = RTT.TRANSACTIONID
AND RTT.DATAAREAID   =RTST.DATAAREAID
INNER JOIN INVENTTABLE IT ON IT.ITEMID = RTST.ITEMID AND IT.DATAAREAID = RTST.DATAAREAID
LEFT JOIN RETAILPOSBATCHTABLE RPT on RPT.BATCHID = RTT.BATCHID AND RTT.STORE = RPT.STOREID
LEFT JOIN ax.RBOBOOKINGS B on B.BOOKINGID = RTT.COMMENT
LEFT JOIN ECORESPRODUCTTRANSLATION ECPT ON ECPT.PRODUCT       = IT.PRODUCT
LEFT JOIN ECORESPRODUCTCATEGORY ECP on IT.PRODUCT = ECP.PRODUCT
LEFT JOIN ECORESCATEGORY EC on ec.RECID  = ECP.CATEGORY
LEFT JOIN HCMWORKER HW ON HW.PERSONNELNUMBER = RTT.STAFF
LEFT JOIN DIRPARTYTABLE DP ON DP.RECID = HW.PERSON 
where  (RTT.DATAAREAID IN ('T-RB'))
AND (ECPT.LANGUAGEID ='en-us') ".$where." ";
 
    $stmt = sqlsrv_query($StoreConnect, $query, array(), array("Scrollable" => 'static')) or die(sqlsrv_errors());
    if (!$query )  {
      $result  = "error";
      $message = "query error";
    }
    else
    {
      
      $result  = "success";
      $message = "query success";
      $empty="";


      while ($res = sqlsrv_fetch_array($stmt))
      {  
 
   $totalamount = $totalamount + $res['NETAMOUNT'];
      	$dbcustomername= $res['CustomerNAme'];
        $PERSONS= $res['PERSONS'];
        $ORDERTYPE= $res['ORDERTYPE'];
        $STARTDATE= $res['STARTDATE']->format('Y-m-d H:i:s');
        

      	$dbfield1 = $field1;

 

        $mysql_data[] = array
        (
          "itemid" => $res['INAME'],
          "price" => round($res['PRICE'],2),
          "QTY" => round($res['QTY']), 
          "NETAMOUNT" => round($res['NETAMOUNT'],2),
          "nettotal" => round($res['NETAMOUNT'],2),
          "nettotal2" => $res['NETAMOUNT']
          
        );
      }
    }
//   // Close database connection
  }

// Prepare data
  $data = array(
    "result"  => $result,
    "message" => $message,
    "STARTDATE" => $STARTDATE,    
    "PERSONS"  => $PERSONS,
    "ORDERTYPE" => $ORDERTYPE,
    "dbcustomername" => $dbcustomername,
    "staffusername" => $_SESSION['staffusername'], 
    "tax" => $tax,
    "dbfield1" => $dbfield1,
    "totalamount" => $totalamount,
    "POSID" => $POSID,
    "srb_sntn" => $srb_sntn,
    "srb_add" => $srb_add,
    "srb_tarrif" => $srb_tarrif,
    "srb_user" => $srb_user,
    "Logo" => $Logo,
    
       
    "data"    => $mysql_data
  );
// Convert PHP array to JSON array
  $json_data = json_encode($data);
  print $json_data;
 

}

?>
