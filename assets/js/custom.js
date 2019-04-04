$(document).ready(function() {

    //show and hide password
    $(".showpass").each(function(el) {

        $(this).mousedown(function() {

            //console.log($(this).siblings()[0]);
            $(this).siblings()[0].type = "text";

        }).mouseup(function() {

            $(this).siblings()[0].type = "password";

        });


    });

    //copy password to clipboard
    $(".copypass").each(function (el) {
        $(this).click(function () {

            var pswdInput = $(this).siblings()[0];
            var pswdText = pswdInput.value;
            var tempPswdInput = $("<input>");
            tempPswdInput.attr("value", pswdText);
            tempPswdInput.attr("type", "text");
            tempPswdInput.appendTo("body");
            var rawInputEl = tempPswdInput.get(0);
            rawInputEl.select();
            document.execCommand("copy");
            tempPswdInput.remove();

            //alert(tempPswdText);
        });
    });


    //get account details

    $('.detailed-view').click(function () {
            let account_id = $(this).attr('data-account-id');
            $.ajax({
                url: "./includes/get_account_details.php",
                method: "post",
                data: {account_id : account_id},
                success: function (data) {
                    //$('.details').empty();
                    $('.details').html(data);
                }
            });
    });

    //delete account
    $('.delete-account_test').click(function () {
        //console.log('hello');
        let account_id = $(this).attr('data-account-id');
        $.ajax({
            url: "././delete_account.php",
            method: "post",
            data: {account_id : account_id},
            success: function (data) {
                //console.log("account deleted");
                //console.log(data[account_id]);
               //$('.details').empty();
               // window.location.href = './manage_accounts.php';

            }
        });
    });


});