$(document).ready(function () {
    $(function () {
        var t = {
            about: {
                en: "About",
                es: "Acerca",
                id: "Tentang"
            },
            contact: {
                en: "Contact",
                es: "Contáctenos",
                id: "Hubungi"
            },
            sign_in: {
                en: "Sign In",
                es: "Registrarse",
                id: "Masuk"
            },
            sign_in2: {
                en: "SIGN IN",
                es: "REGISTRARSE",
                id: "MASUK"
            },
            watch: {
                en: "WATCH VIDEO",
                es: "VER VÍDEO",
                id: "LIHAT VIDEO"
            },
            pass: {
                en: "Password",
                es: "Contraseña",
                id: "Kata Sandi"
            },
            email: {
                en: "Email",
                es: "Correo electrónico",
                id: "E-mail"
            },
            pass2: {
                en: "password",
                es: "contraseña",
                id: "kata sandi"
            },
            email2: {
                en: "email",
                es: "correo electrónico",
                id: "e-mail"
            },
            account: {
                en: "Sign Up to create your account",
                es: "Regístrese para crear su cuenta",
                id: "Daftar untuk membuat akun Anda"
            },
            have: {
                en: "Don't have an account?",
                es: "No tienes una cuenta?",
                id: "Tidak punya akun?"
            },

        };
        var _t = $('body').translate({
            lang: "en",
            t: t
        });


        var str = _t.g("translate");
        console.log(str);

        $("ul.lang-list li").click(function (ev) {
            var lang = $(this).attr("data-value");
            _t.lang(lang);

            // if (lang == 'id') {
            //     alert("indonesia")
            // } else if (lang == 'en') {
            //     alert("english")
            // } else {
            //     alert("spanyol")
            // };

            console.log(lang);
            ev.preventDefault();
        });
    });

})