<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'http://apps.srb.gos.pk/PoSService/CloudSalesInvoiceService',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => array(
'posId' => '773',
'name'=>'Royal Taj Restaurant',
'ntn'=>'1113071',
'invoiceID'=>'PZ005',
'invoiceDateTime'=>'2023-01-19 13:13:09',
'invoiceType'=>'1',
'rateValue'=>'13',
'saleValue'=>'5898',
'taxAmount'=>'766',
'consumerName'=>'N/A',
'consumerNTN'=>'N/A',
'address'=>'N/A',
'tariffCode'=>'N/A',
'extraInf'=>'N/A',
'pos_user'=>'1113071_773',
'pos_pass'=>'T988K876P'
  ) 
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;

?>

