$(document).ready(function(){

$(document).on("click", "#SUBM", function(){
    
var Namem = $("#Namem").val();
var Phonem = $("#Phonem").val();
var Emailm = $("#Emailm").val();
var Messagem = $("#Messagem").val();
var CampaignNamem = $("input[name='UCAMPAIGN']").val();
var CampaignSourcem = $("input[name='USOURCE']").val();
var CampaignMediumm = $("input[name='UMEDIUM']").val();
            $.ajax( {
                url: "https://psi.estate/wp-includes/crm-integration/api.php",
                method: "POST",
                data: {
					Name:Namem,
					Phone:Phonem,
					Email:Emailm,
					Message:Messagem,
					CampaignName:CampaignNamem,
					CampaignSource:CampaignSourcem,
					CampaignMedium:CampaignMediumm
					
                },
                dataType: "JSON",
                success: function (data) 
                {
					var result = data.result;
//					alert('Data Added to CRM Successfully!');
// 					console.log(result);
 //					var result2 = result.result;
 //					alert(result2);  
					return data;
                }
       	});
   });
	
});