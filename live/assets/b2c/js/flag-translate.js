$(document).ready(function () {
    $(function () {
        var t = {
            //WELLCOME PAGE AND LOGIN
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
            signup: {
                en: "Sign Up",
                es: "Regístrese",
                id: "Daftar"
            },
            dont: {
                en: "Don't have an account?",
                es: "No tienes una cuenta?",
                id: "Tidak punya akun?"
            },
            //LEFT MENU
            dashboard: {
                en: " Dashboard ",
                es: " Tablero ",
                id: " Dasbor "
            },
            profile: {
                en: " Profile ",
                es: " Perfil ",
                id: " Profil "
            },
            studydash: {
                en: " Study Dashboard ",
                es: " Tablero e Estudiod ",
                id: " Dasbor Studi "
            },
            sessionsimulator: {
                en: " Session Simulator ",
                es: " Simulador de Sesión ",
                id: " Simulator Sesi "
            },
            areyousure: {
                en: "Are you sure?",
                es: "¿Estás Seguro?",
                id: " Apakah Kamu Yakin? "
            },
            yes:{
                en: "Yes",
                es: "Sí",
                id: "Ya"
            },
            no:{
                en: "No",
                es: "No",
                id: "Tidak"
            },
            logout:{
                en: "Logout",
                es: "Cerrar sesión",
                id: "Keluar"
            },
            //PAGE PROFILE
            birth:{
                en: "Date of Birth",
                es: "Fecha de nacimiento",
                id: "Tanggal Lahir"
            },
            native:{
                en: "Native Language",
                es: "Idioma nativo",
                id: "Bahasa Asli"
            },
            gender:{
                en: "Gender",
                es: "Género",
                id: "Jenis Kelamin"
            },
            male: {
                en: "Male",
                es: "Masculino",
                id: "Laki-Laki"
            },
            female: {
                en: "Female",
                es: "Hembra",
                id: "Perempuan"
            },
            changepass: {
                en: "Change Password",
                es: "Cambia la contraseña",
                id: "Ganti Password"
            },
            currentpw: {
                en: "Current Password",
                es: "Contraseña Actual",
                id: "Kata Sandi Saat Ini"
            },
            newpw: {
                en: "New Password",
                es: "Nueva Contraseña",
                id: "Kata Sandi Baru"
            }, 
            confirmpw: {
                en: "Confirm New Password",
                es: "Confirmar Nueva Contraseña",
                id: "Konfirmasi Password Baru"
            }, 
            btnsave: {
                en: "Save Change",
                es: "Guardar Cambio",
                id: "Simpan Perubahan"
            },
            additional: {
                en: "Additional Info",
                es: "Información Adicional",
                id: "Informasi tambahan"
            },
            certification: {
                en: "Certification Goal",
                es: "Objetivo de Certificacióno",
                id: "Tujuan Sertifikasi"
            },
            token: {
                en: "Token",
                es: "Token",
                id: "Token"
            },
            phone: {
                en: "Phone",
                es: "Teléfono",
                id: "Telepon"
            },
            city: {
                en: "City",
                es: "Ciudad",
                id: "Kota"
            },
            state: {
                en: "State/Province",
                es: "Provincia del estado",
                id: "Negara Bagian / Provinsi"
            },
            address: {
                en: "Address",
                es: "Dirección",
                id: "Alamat"
            },
            likes: {
                en: "Likes",
                es: "Gustos",
                id: "Hobi"
            },
            dislikes: {
                en: "Dislikes",
                es: "No me gusta",
                id: "Tidak suka"
            },
            timezone: {
                en: "Time Zone",
                es: "Zona horaria",
                id: "Zona waktu"
            },
            language: {
                en: "Time Zone",
                es: "Idioma",
                id: "Bahasa"
            },
            //PAGE DASHBOARD
            youhave: {
                en: "You Have Session For Today",
                es: "Tienes una sesión para hoy",
                id: "Anda Memiliki Sesi Untuk Hari Ini"
            },
            bookcoach: {
                en: "Book a coach",
                es: "Reserve un entrenador",
                id: "Pesan seorang Pelatih"
            },
            session: {
                en: "Sessions",
                es: "Sesiones",
                id: "Sesi"
            },
            tokens: {
                en: "Tokens",
                es: "Tokens",
                id: "Token"
            },
            help: {
                en: "Help",
                es: "Ayuda",
                id: "Bantuan"
            },
            todays: {
                en: "Today's Sessions",
                es: "Sesiones De Hoy",
                id: "Sesi Hari Ini"
            },
            havelive: {
                en: "You Have a Live Session",
                es: "Tienes una sesión en vivo",
                id: "Anda Memiliki Sesi Live"
            },
            openlive: {
                en: "You Have Opened Live Session",
                es: "Usted Ha Abierto La Sesión En Vivo",
                id: "Anda Memiliki Sesi Yang Sedang Berlangsung"
            },
            notlive: {
                en: "Not Yet Open? Click Here",
                es: "¿Todavía no abierto? Haga clic aquí",
                id: "Belum Buka? Klik disini"
            },
            nohave: {
                en: "You Have No Sessions Today",
                es: "No tienes sesiones hoy",
                id: "Anda Tidak Memiliki Sesi Hari Ini"
            },
            until: {
                en: "Until Next Session",
                es: "Hasta la próxima sesión",
                id: "Sampai Sesi Berikutnya"
            },
            coachinfo: {
                en: "Coach Info",
                es: "Información del entrenador",
                id: "Info Pelatih"
            },
            //STUDY DASHBOARD
            points: {
                en: "Points",
                es: "Puntos",
                id: "Poin"
            },
            progresstogoal: {
                en: "Progress to goals",
                es: "Progreso hacia los objetivos",
                id: "Kemajuan Gol"
            },
            congratulation: {
                en: "Congratulation!",
                es: "¡Enhorabuena!",
                id: "Selamat!"
            },
            keepup: {
                en: "Keep up the good work!",
                es: "Sigan con el buen trabajo!",
                id: "Teruskan kerja bagus!"
            },
            comprehension: {
                en: "Comprehension",
                es: "Comprensión",
                id: "Pemahaman"
            },
            pronun: {
                en: "Pronunciation",
                es: "Pronunciación",
                id: "Pengucapan"
            },
            listening: {
                en: "Listening",
                es: "Escuchando",
                id: "Mendengarkan"
            },
            speaking: {
                en: "Speaking",
                es: "Hablando",
                id: "Berbicara"
            },
            update: {
                en: "Update",
                es: "Actualizar",
                id: "Perbarui"
            },
            sccess: {
                en: "Success",
                es: "Éxito",
                id: "suksesv"
            },
            updatingyour: {
                en: "Updating your study dashboard...",
                es: "Actualizando el panel de tu estudio ...",
                id: "Memperbarui dasbor studi Anda ..."
            },
            now: {
                en: "Now",
                es: "Ahora",
                id: "Sekarang"
            },
            coach: {
                en: "Coach",
                es: "Entrenador",
                id: "Pelatih"
            },
            study: {
                en: "Study",
                es: "Estudiar",
                id: "Pelajar"
            },
            lastupdate: {
                en: "Last updated on: ",
                es: "Ultima actualizacion en:",
                id: "Terakhir diperbarui saat:"
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