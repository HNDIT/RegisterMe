/**
 * Created by THARANGA-PC on 3/16/2015.
 */

$(document).ready(function () {

    $("#frmsignin").submit(function (e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: baseurl + "login/validate_login",
            data: $("#frmsignin").serialize(),
            dataType: 'json',
            success: function (data) {
                if (data.status == true) {
                    //login success and redirect to home
                    $("#divmessage").slideDown(300);
                    $("#spnmessage").html('<p>You have logged successfully.</p>');
                    $("#divmessage").attr("class", "alert alert-success");
                    $("#divmessage").show();
                    setTimeout(function() {
                        location.href=baseurl+"home";
                    }, 2000);
                }
                else {
                    $('#pwdPassword').focus().select();
                    $("#spnmessage").html('<p>The username or password you entered don\'t match.Please try again.</p>');
                    $("#divmessage").attr("class", "alert alert-danger");
                    $("#divmessage").show();
                    $("#divmessage").effect("shake", {times: 3}, 100);
                }
            }
        });

    });
    /*$("#frmAdd").validate({
     ignore: "",
     rules: {
     txtName: {
     remote: {
     url: baseurl + "inventoryitem/nameExists",
     type: "post",
     data: {
     Name: function () {
     return $("#txtName").val();
     }
     }
     }
     }
     },
     messages: {
     txtName: {
     remote: "Category should be unique."
     }
     }
     });*/
});