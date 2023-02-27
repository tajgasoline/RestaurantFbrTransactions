<?php
if(  isset($_POST['field1']) && isset($_POST['buttonname']))
{
 session_start();
 $store =   $_SESSION['store'];
 $tax =  $_SESSION['tax'];
 $field1 = htmlentities($_POST["field1"]);
 $buttonname = htmlentities($_POST["buttonname"]); 
 $serverName = "";
 $userId = "";
 $userPassword = "";
 $database = "";
 $result = array(); 
 $serverName =$_SESSION['server'];
 $userId = $_SESSION['dbusername'];
 $userPassword = $_SESSION['dbpassword'];
 $database = $_SESSION['dbname'];



  $POSID =$_SESSION['POSID'];
 $ntn = $_SESSION['ntn'];
 $POS_username = $_SESSION['POS_username'];
 $POS_pass = $_SESSION['POS_pass'];
  $Live = $_SESSION['Live'];


 



// echo "userId" . $userId. ' </br>';
// echo "userPassword" . $userPassword. ' </br>';
// echo "database" . $database. ' </br>';
// echo "serverName" . $serverName. ' </br>';

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
  $where = 'where'; 
  if($field1 != ""){
   $where .= " transactionid='".$field1."' ";
 }
 else {
   $where .='';
 }
 $query = " Update ax.[RETAILTRANSACTIONTABLE] Set [".$buttonname."] = '1' ".$where." ";
 
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



//Getting complete data from DB to be sent to SBR

$where = '';
// $field1 = 'RTGUL-RTGC-175117';
if($field1 != ""){
  $where .= " and RTT.transactionid='".$field1."' ";
}
else {
  $where .='';

}
  
$totalamount=0;
    $query = "SELECT RTT.store,RTT.TRANSACTIONID,RPT.STARTDATE AS  ORDERDATE ,cast(RPT.STARTDATE as Date)  STARTDATE ,B.ORDERTYPE,EC.NAME AS HNAME,ECPT.NAME AS INAME, (RTST.QTY *-1) QTY,RTST.PRICE,
RTST.DISCAMOUNT * -1 DISCAMOUNT, RTST.TRANSACTIONSTATUS, 
RTST.NETAMOUNT * -1 NETAMOUNT,GETDATE(),B.PERSONS,RTST.ITEMID,RTST.LINENUM,REFERENCENAME as CustomerNAme  , CONTACTNUMBER as CustomerContact ,ADDRESS as CustomerAddress 
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

   while ($res = sqlsrv_fetch_array($stmt))
      {  
 

   $totalamount = $totalamount + $res['NETAMOUNT'];
        $consumerName= $res['CustomerNAme'];
        $address= $res['CustomerAddress']; 
        $invoiceDateTime= $res['ORDERDATE'];
        $dbfield1 = $field1;
 
      }

      $onlytaxamount =$totalamount * 0.13;
      $aftertaxbill = $totalamount + $onlytaxamount;

      $srbinvoiceID = $dbfield1;
      $srbinvoiceDateTime = $invoiceDateTime;
      $srbrateValue = $tax;
      $srbsaleValue = $aftertaxbill;
      $srbtaxAmount = $onlytaxamount;
      $srbconsumerName = $consumerName;
      $srbconsumerNTN = 'N/A';
      $srbaddress = $address;
      $srbtariffCode = 'N/A';
      $srbextraInf = 'N/A';
 
}


}
// Prepare data
$data = array(
  "srbinvoiceDateTime"  => $srbinvoiceDateTime, 
  "srbrateValue"  => $srbrateValue,
  "srbsaleValue"  => $srbsaleValue,
  "srbtaxAmount"  => $srbtaxAmount,
  "srbconsumerName"  => $srbconsumerName,
  "srbconsumerNTN"  => $srbconsumerNTN,
  "srbaddress"  => $srbaddress,
  "srbtariffCode"  => $srbtariffCode,
  "srbextraInf"  => $srbextraInf,
"srbinvoiceID"  => $srbinvoiceID,
  "result"  => $result,
  "message" => $message,  
  "dbfield1" => $field1,
    "store" => $store,
  "POSID"  => $POSID,
  "ntn"  => $ntn,
  "POS_username" => $POS_username,  
  "POS_pass" => $POS_pass,
  "Live" => $Live
  
);
// Convert PHP array to JSON array
$json_data = json_encode($data);
print $json_data;
}
?>