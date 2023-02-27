 
function testJSON(){
debugger;
var jsonText = {name:"Royal Taj Restaurant", ntn:"1113071", invoiceID:" PZ001",
invoiceDateTime:"2023-01-19 13:13:05",invoiceType:1, rateValue:"13", saleValue:"5890",
taxAmount:"766", consumerName:"N/A", consumerNTN:"N/A", address:"N/A",
tariffCode:"N/A", extraInf:"N/A", pos_user:"1113071", pos_pass:" K22171W34652G"};
dbParam = JSON.stringify(jsonText);
xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
 if (this.readyState == 4 ) {
 srbRes = JSON.parse(this.responseText);
 if(srbRes.resCode=='00'){
 //your code on success
 alert("This is Invoice: "+srbRes.srbInvoceId);
 }else{
 alert("Error: " + srbRes.err );
 }

 }
}
 /* URL for SandBox */
xmlhttp.open("POST", "http://apps.srb.gos.pk/PoSService/CloudSalesInvoiceService",
true);
 /* URL for Production */
/* xmlhttp.open("POST", "http://POS.srb.gos.pk/PoSService/CloudSalesInvoiceService",
true); */
xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xmlhttp.send("" + dbParam);
}
 