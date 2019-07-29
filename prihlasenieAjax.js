
$(document).ready(function() {
    $('#loginForm').submit(function () {
        var meno = $("#loginp").val();
        var heslo = $("#passwordp").val();

        if(meno == "" || heslo=="") {
            alert("Zadajte všetky údaje.");
        }else {
            $.ajax({
                url: "prihlasenie.php",
                method: "post",
                data: {
                    login:meno,
                    heslo:heslo

                },

                dataType: "text"

            });
        }
        return false;
    });
});

