$(document).ready(function() {
    $('#loginForm').submit(function () {

        var  login =  $("#loginr").val();
        var heslo = $("#passwordr").val();
        var email = $("#emailr").val();
        var meno = $("#menor").val();
        var priezvisko = $("#priezviskor").val();



        if(login == "" || heslo== "" || email == "" || meno == "" || priezvisko == "" ) {
            alert("Zadajte všetky údaje.");
        }

            else if(login.length < 3)
            {
                alert("Login musí mať aspoň 3 znaky.");
            }

            else if(email.indexOf('@') == -1 || email.indexOf('.') == -1 )
        {
            alert("Neplatný email.");

        }
            else if(heslo.length < 8)
        {
            alert("Heslo musí mať aspoň 8 znakov.");

        }


        else {
            $.ajax({
                url: "registrovanie.php",
                method: "post",
                data: {
                    login:login,
                    heslo:heslo,
                    email:email,
                    meno:meno,
                    priezvisko:priezvisko,


                },

                dataType: "text"

            });
        }
        return false;
    });
});