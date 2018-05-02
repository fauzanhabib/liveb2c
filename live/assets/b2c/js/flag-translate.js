$(document).ready(function () {
    $(function () {
        var t = {
            about: {
                en: "About Us",
                es: "Acerca-de",
                id: "Tentang kami"
            },
            contact: {
                en: "Contact Us",
                es: "Contáctenos",
                id: "Hubungi kami"
            },
            sign_in: {
                en: "Sign In",
                es: "Registrarse",
                id: "Masuk"
            },
            watch: {
                en: "WATCH VIDEO",
                es: "VER VÍDEO",
                id: "LIHAT VIDEO"
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
            
            console.log(lang);
            ev.preventDefault();
            
           
        });

        
        
    });
    

    
   
})

