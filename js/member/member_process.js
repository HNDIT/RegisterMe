/**
 * Created by THARANGA-PC on 3/19/2015.
 */

$(document).ready(function () {

    $("#frmaddmember").submit(function (e) {
        e.preventDefault();
        $('#divmessage').show();
        $.ajax({
            type: "POST",
            url: baseurl + "member/addMemberForm",
            data: $("#frmaddmember").serialize(),
            dataType: 'json',
            success: function (data) {
                if (data.status == true) {

                    $("#divmessage").slideDown(300);
                    $("#spnmessage").html('<p>New Member Registration is succeed.</p>');
                    $("#divmessage").attr("class", "alert alert-success");
                    $("#divmessage").show();
                    setTimeout("location.reload();", 2000);
                }
                else {

                    $("#spnmessage").html('<p>Error Occured.Plese Try gain.</p>');
                    $("#divmessage").attr("class", "alert alert-danger");
                    $("#divmessage").show();
                    $("#divmessage").effect("shake", {times: 2}, 100);
                }
            }
        });

    });
    $("#frmupdatemember").submit(function (e) {
        e.preventDefault();
        $('#divmessage').show();
        $.ajax({
            type: "POST",
            url: baseurl + "member/updateMemberForm",
            data: $("#frmupdatemember").serialize(),
            dataType: 'json',
            success: function (data) {
                if (data.status == true) {

                    $("#divmessage").slideDown(300);
                    $("#spnmessage").html('<p>Current Member Registration upgrade is succeed.</p>');
                    $("#divmessage").attr("class", "alert alert-success");
                    $("#divmessage").show();
                    setTimeout("location.reload();", 2000);
                }
                else {

                    $("#spnmessage").html('<p>Error Occured.Plese Try gain.</p>');
                    $("#divmessage").attr("class", "alert alert-danger");
                    $("#divmessage").show();
                    $("#divmessage").effect("shake", {times: 2}, 100);
                }
            }
        });

    });
});
