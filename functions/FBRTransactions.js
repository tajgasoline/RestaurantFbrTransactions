function BtnLoadingTrue1(){            
    // $("#btnSearch1").attr("disabled", true);
    $('#btnSearch1').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>Loading...');
}
function BtnLoadingFalse1(){            
    // $("#btnSearch1").attr("disabled", false);
    $('#btnSearch1').html('Search');
}


function BtnLoadingTrue2(){            
    // $("#btnSearch1").attr("disabled", true);
    $('#paycashwithprint').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>Loading...');
  $('#paycashwithoutprint').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>Loading...');
  $('#paywithcard').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>Loading...');

}
function BtnLoadingFalse2(){            
    // $("#btnSearch1").attr("disabled", false);
    $('#paycashwithprint').html('Pay Cash with Print ');
    $('#paycashwithoutprint').html('Go Green ');
     $('#paywithcard').html('Pay with Card ');
}







function Fbrtrans() {
  var fbrid = $("#fbrid").val();
  var transid = $("#transid").text();
  var finaltotal = $("#totalbill").text();
  $.ajax({
    url: "api/fbrapi.php",
    method: "POST",
    data: {
      fbrid: fbrid,
      transid: transid,
      finaltotal: finaltotal
    },
    dataType: "JSON",
    success: function(data) {
      var result = data.result;
      location.reload();
    }
  });
}
function Search() {
  $("#tbody").html('');
    // var store = $("#storeid").val();
  var field1 = $("#field1").val();
  $.ajax({
    url: "api/tblMainData2.php",
    method: "POST",
    data: {
      field1: field1
    },
    dataType: "JSON",
       beforeSend: function(){
         BtnLoadingTrue1();
     },
    success: function(data) {
      BtnLoadingFalse1();
      var result = data.data;
      var dbcustomername = data.dbcustomername;
      var dbfield1 = data.dbfield1;
      var tax = data.tax;
      var fbrid = data.fbrid;
            // alert(data.totalamount);
      var finaltotal2 = '';
      $("#fbrid").val(fbrid);
      $("#custname").text(dbcustomername);
      $("#transid").text(dbfield1);
      $("#taxpercent").text(tax);
      var td = '';
      var finaltotal = '';
      for (var i = 0; i < result.length; i++) {
        td += '<tr>' +
        '<td><span>' + result[i].itemid + '</span></td>' +
        '<td><span>' + result[i].QTY + '</span></td>' +
        '<td><span>' + result[i].price + '</span></td>' +
        '<td><span>' + result[i].NETAMOUNT + '</span></td>' +
        '</tr>';
        finaltotal = result[i].nettotal;
      }
      finaltotal2 = data.totalamount;
            // alert(finaltotal2);
      finaltotal2 = parseFloat(finaltotal2);
      $("#totalbill").text(finaltotal2);
      $("#tablenumber").text(4);
      $("#persons").text(7);
      var taxamount = ((parseInt(finaltotal2) * 11.5) / 100);
            // alert(finaltotal2);
      $("#taxamount").text(taxamount);
      $("#totalamount").text((finaltotal2 - taxamount));
      td += '<tr>' +
      '<td colspan="3">Total</span></td>' +
      '<td><span>' + finaltotal2 + '</span></td>' +
      '</tr>';
      $("#tbody").html(td);
      return data;
    }
  });
}
function Search2(value) {
  var buttonname = value;
  var field1 = $("#field1").val();
  $.ajax({
    url: "api/BillPayment.php",
    method: "POST",
    data: {
      field1: field1,
      buttonname: buttonname
    },
    dataType: "JSON",
      beforeSend: function(){
         BtnLoadingTrue2();
     },
    success: function(data) { 
       BtnLoadingFalse2();
      var result = data.result;     
      var srbinvoiceDateTime = data.srbinvoiceDateTime;
      var srbrateValue = data.srbrateValue;
      var srbsaleValue = data.srbsaleValue;
      var srbtaxAmount = data.srbtaxAmount;
      var srbconsumerName = data.srbconsumerName;
      var srbconsumerNTN = data.srbconsumerNTN;
      var srbaddress = data.srbaddress;
      var srbtariffCode = data.srbtariffCode;
      var srbextraInf = data.srbextraInf;
      var srbinvoiceID = data.srbinvoiceID;
       var POSID = data.POSID;
      var ntn = data.ntn;
      var POS_username = data.POS_username;
      var POS_pass = data.POS_pass;
      var store = data.store;
      var Live = data.Live;
      

      

      var SBR_Response_ID = '';
      var QR_Code = '';

      if (result == "success") {

     SBR_POS(buttonname,srbinvoiceDateTime, srbrateValue, srbsaleValue, srbtaxAmount, 
      srbconsumerName, srbconsumerNTN, srbaddress, srbtariffCode, srbextraInf, 
      srbinvoiceID,POSID,ntn,POS_username,POS_pass,store,Live );
 
      
     }
     return data;
   }
 });
} 

function SBR_POS(buttonname,srbinvoiceDateTime, srbrateValue, srbsaleValue, 
  srbtaxAmount, srbconsumerName, srbconsumerNTN, srbaddress, srbtariffCode, srbextraInf, srbinvoiceID,
  POSID,ntn,POS_username,POS_pass,store,Live) {
 
  var jsonText = {
    posId: POSID,
    name: store,
    ntn: ntn,
    invoiceID: srbinvoiceID,
    invoiceDateTime: "2023-01-23 13:13:05",
    invoiceType: 1,
    rateValue: srbrateValue,
    saleValue: srbsaleValue,
    taxAmount: srbtaxAmount,
    consumerName: srbconsumerName,
    consumerNTN: srbconsumerNTN,
    address: srbaddress,
    tariffCode: srbtariffCode,
    extraInf: srbextraInf,
    pos_user: POS_username,
    pos_pass: POS_pass
  };
  dbParam = JSON.stringify(jsonText);
  xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4) {
      srbRes = JSON.parse(this.responseText);
      if (srbRes.resCode == '00') { 
        QRcode(srbRes.srbInvoceId,buttonname); 
      } else {
        alert("Error: " + srbRes.err );
      }
    }
  }

 //  if(Live == 0){
 // xmlhttp.open("POST", "http://apps.srb.gos.pk/PoSService/CloudSalesInvoiceService",
 //    true);
 //  }else if(Live ==1){
 //     /* URL for Production */
 //    /* xmlhttp.open("POST", "http://POS.srb.gos.pk/PoSService/CloudSalesInvoiceService",
 //    true); */
 //  }


    /* URL for SandBox */
  xmlhttp.open("POST", "http://apps.srb.gos.pk/PoSService/CloudSalesInvoiceService",
    true);
    /* URL for Production */
    /* xmlhttp.open("POST", "http://POS.srb.gos.pk/PoSService/CloudSalesInvoiceService",
    true); */
  xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xmlhttp.send("" + dbParam);
}



function QRcode(value,buttonname) {

  var transactionID = value; 
   var field1 = $("#field1").val();
  $.ajax({
    url: "api/QRcode_generator.php",
    method: "POST",
    data: {
      transactionID: transactionID,
      field1: field1
    },
    dataType: "JSON",
    success: function(data) {
      var result = data;  
   
      if (result == 'QR-CODE generated Successfully') {
        if (buttonname == "paycashwithprint") {
          window.location.href = './invoice.php?Transaction=' + field1 + '&PaymentType=' + buttonname+ '&POSID=' + transactionID;
        } else if (buttonname == "paywithcard") {
          window.location.href = './invoice.php?Transaction=' + field1 + '&PaymentType=' + buttonname + '&POSID=' + transactionID;
        } else {
          Swal.fire({
            html: `Thankyou For Coming`,
            confirmButtonText: 'Close'
          }).then(function() {
            window.location.href = 'FBRtransactions.php';
          });
        }  
      }
    }
  });

}