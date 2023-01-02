 
function BtnLoadingTrue(){            
    $("#btnlogin").attr("disabled", true);
    $('#btnlogin').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>Loading...');
    
}


function BtnLoadingFalse(){            

    $("#btnlogin").attr("disabled", false);

    $('#btnlogin').html('Registered <i class="fas fa-sign-in-alt ml-1"></i>');

}

function login(){


    var v_email = $("#Email").val();
    var v_pass = $("#Password").val();

    var valid=true;

    var mailRegEx = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;


    if ( v_email == "") {  
      $("#Email").css({ 'border-color': 'red' });
      $("#ev").css({ 'display': 'block'}); 
      $("#ev").text("Please Enter Email!");           
  } 
  else if ( v_pass == "") {
      $("#Password").css({ 'border-color': 'red' });
      $("#pv").css({ 'display': 'block'}); 
      $("#pv").text("Please Enter Password!");              
  }  

else
{

    $.ajax({
        url: "api/Login-Form.php",

        method: "POST",
        data: {
            username : v_email,
            pass : v_pass
        },

        dataType: "JSON",
        beforeSend: function(){
         BtnLoadingTrue();
     },
     success: function (data) 
     { 
        BtnLoadingFalse();
     var result = data.result;


     if ( result == "successful")
     {
        var username = data.username;
        Swal.fire({
          title: "Welcome " + username,
          type: "success",
          customClass: 'animated fadeIn',
          timer: 4000
      })

        .then(function () {
            window.location.href = 'FBRtransactions.php';
        });
    }   else if ( result == "norecord")  { 


       Swal.fire({
        title: 'Account Not Found',
        type: "error",
        customClass: 'animated fadeIn',
        timer: 4000
    }).then(function () {
        window.location.href = 'Login.php';
    });
} 
return data;

}
});
}




}


