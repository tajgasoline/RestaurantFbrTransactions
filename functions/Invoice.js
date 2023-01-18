//getting id from url
var getUrlParameter = function getUrlParameter(sParam) {
  var sPageURL = window.location.search.substring(1),
  sURLVariables = sPageURL.split('&'),
  sParameterName,
  i;
  for (i = 0; i < sURLVariables.length; i++) {
    sParameterName = sURLVariables[i].split('=');
    if (sParameterName[0] === sParam) {
      return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
    }
  }
};



function settingvalues(){
  var Transaction = getUrlParameter('Transaction');
  $('#transactionid').text(Transaction);

  $.ajax( {
    url: "api/invoicedetails.php",
    method: "POST",
    data: {Transaction:Transaction},
    dataType: "JSON",
    success: function (data) 
    {
     var result = data.data; 
     var staffusername = data.staffusername; 
     var PERSONS = data.PERSONS; 
     var ORDERTYPE = data.ORDERTYPE; 
     var STARTDATE = data.STARTDATE;   
       

     var td ='';
     var finaltotal='';
     var finaltotal2='';
     finaltotal2 = data.totalamount;
  
     for (var i = 0; i < result.length ; i++) {

      td += '<tr style="border: 0px solid black !important;">'+
      '<td style="border: 0px solid black !important; "><span>'+result[i].itemid+'</span></td>'+
      '<td style="border: 0px solid black !important;"><span>'+result[i].QTY+'</span></td>'+
      '<td style="border: 0px solid black !important;"><span>'+result[i].price+'</span></td>'+
      '<td style="border: 0px solid black !important;"><span>'+result[i].NETAMOUNT+'</span></td>'+ 
      '</tr>';
      finaltotal = result[i].nettotal; 
             

    }

    finaltotal3 = finaltotal2 * 0.13;
     td += '<tr>'+
    '<td colspan="3">Sub Total</span></td>'+

    '<td><span>'+finaltotal2+'</span></td>'+ 
    '</tr>';

     td += '<tr>'+
    '<td >SST Amount</span></td><td>SST</td><td>13%</td>'+

    '<td><span>'+finaltotal3+'</span></td>'+ 
    '</tr>';


var actualtotal = finaltotal2 + finaltotal3;

     td += '<tr>'+
    '<td colspan="3">Total</span></td>'+
    '<td><span>'+actualtotal+'</span></td>'+ 
    '</tr>';

    //  td += '<tr>'+
    // '<td colspan="3">GST</span></td>'+

    // '<td><span>13%</span></td>'+ 
    // '</tr>';


   

    $("#tbody").html(td);
    $("#staffusername").html(staffusername);
    $("#PERSONS").html(PERSONS);
    $("#ORDERTYPE").html(ORDERTYPE);
    $("#STARTDATE").html(STARTDATE);

    
window.print();




    return data;
  }
});

}


$(document).ready(function()
{

  settingvalues();

});

