$(document).ready(function () {

    $("#btnlogin").click(function (e) {

        var user = $("#user");
        var pass = $("#pass");
        var i = 0;

        if (user.val() == "") {
            user.addClass("is-invalid");
        } else {
            user.removeClass("is-invalid");
            i++;
        }

        if (pass.val() == "") {
            pass.addClass("is-invalid");
        } else {
            pass.removeClass("is-invalid");
            i++;
        }

        if (i == 2) {
            $("#formlogeer").submit();
        }

    });

    $(pass).keypress(function (event) {

        var keycode = (event.keyCode ? event.keyCode : event.which);
        if (keycode == '13') {
            var user = $("#user");
            var pass = $("#pass");
            var i = 0;

            if (user.val() == "") {
                user.addClass("is-invalid");
            } else {
                user.removeClass("is-invalid");
                i++;
            }

            if (pass.val() == "") {
                pass.addClass("is-invalid");
            } else {
                pass.removeClass("is-invalid");
                i++;
            }

            if (i == 2) {
                $("#formlogeer").submit();
            }
        }
        event.stopPropagation();
    });

});