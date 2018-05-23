var translator;
var langselect;

function ChangeLanguages() {
    direct = {
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
        yes: {
            en: "Yes",
            es: "Sí",
            id: "Ya"
        },
        no: {
            en: "No",
            es: "No",
            id: "Tidak"
        },
        logout: {
            en: "Logout",
            es: "Cerrar sesión",
            id: "Keluar"
        },

        //PAGE PROFILE
        birth: {
            en: "Date of Birth",
            es: "Fecha de nacimiento",
            id: "Tanggal Lahir"
        },
        native: {
            en: "Native Language",
            es: "Idioma nativo",
            id: "Bahasa Asli"
        },
        gender: {
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
            en: "Language",
            es: "Idioma",
            id: "Bahasa"
        },

        //PAGE DASHBOARD
        //this notification
        youhave: {
            en: "You Have &nbsp;",
            es: "Tienes una &nbsp;",
            id: "Anda Memiliki &nbsp;"
        },
        sessionfor: {
            en: "&nbsp; Session For Today",
            es: "&nbsp; Sesión para hoy",
            id: "&nbsp; Sesi Untuk Hari Ini"
        },
        sessionleft: {
            en: "&nbsp; Session Left For Today",
            es: "&nbsp; Sesión a la izquierda para hoy",
            id: "&nbsp; Sesi Tersisa Untuk Hari Ini"
        },
        booksucces: {
            en: "Booking successful",
            es: "Reserva exitosa",
            id: "Pemesanan berhasil"
        },
        hassession: {
            en: " has session booked with you",
            es: " tiene una sesión reservada contigo",
            id: " telah memesan sesi dengan Anda"
        },
        newsession: {
            en: "New session booked with ",
            es: "Nueva sesión reservada con ",
            id: "Sesi baru dipesan dengan "
        },
        newreschedule: {
            en: "You have a rescheduled session with ",
            es: "Tienes una sesión reprogramada con ",
            id: "Anda memiliki sesi yang dijadwalkan ulang dengan "
        },
        invalidapp: {
            en: "Invalid Appointment",
            es: "Cita inválida",
            id: "Appointment Tidak valid"
        },
        maxsession: {
            en: "Exceeded Max Session Per Day or Week",
            es: "Superó la sesión máxima por día o por semana",
            id: "Melebihi Sesi Max Per Hari atau Minggu"
        },
        invaliddate: {
            en: "Invalid Date",
            es: "Fecha invalida",
            id: "Tanggal tidak berlaku"
        },
        invalidappid: {
            en: "Invalid apppointment ID",
            es: "ID de cita inválida",
            id: "ID apppointment tidak valid"
        },
        invalidtime: {
            en: "Invalid Time",
            es: "Tiempo inválido",
            id: "Waktu Tidak Valid"
        },
        invalidapptime: {
            en: "Invalid Appointment Time",
            es: "Hora de cita no válida",
            id: "Waktu Appointment Tidak Valid"
        },
        sessionrec: {
            en: "Session Rescheduled",
            es: "Sesión reprogramada",
            id: "Sesi Dijadwalkan Ulang"
        },
        //End this notification

        bookcoach: {
            en: "Book a coach",
            es: "Reserve un entrenador",
            id: "Pesan Pelatih"
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
            es: "Información entrenador",
            id: "Info Pelatih"
        },
        nocoaches: {
            en: "No coaches matched your criteria",
            es: "Ningún entrenador coincide con sus criterios",
            id: "Tidak ditemukan pelatih sesuai dengan kriteria"
        },
        booksumary: {
            en: "Your Booking Summary",
            es: "Su resumen de reserva",
            id: "Ringkasan Pemesanan Anda"
        },
        coachname: {
            en: "Coach Name",
            es: "Ayuda",
            id: "Nombre entrenador"
        },
        datee: {
            en: "Date",
            es: "Fecha",
            id: "Tanggal"
        },
        starttime: {
            en: "Start Time",
            es: "Hora de inicio",
            id: "Waktu mulai"
        },
        endtinme: {
            en: "End Time",
            es: "Hora de finalización",
            id: "Waktu Akhir"
        },
        tokencost: {
            en: "Token Cost",
            es: "Costo simbólico",
            id: "Biaya Token"
        },
        btndone: {
            en: " Done",
            es: " Hecho",
            id: " Selesai"
        },
        btncancel: {
            en: " Cancel",
            es: " Cancelar",
            id: " Batalkan"
        },
        proceesupdate: {
            en: "Processing your booking...",
            es: "Procesando su reserva ...",
            id: "Memproses pemesanan Anda ..."
        },
        upcomingsessin: {
            en: "Upcoming Session",
            es: "Próxima sesión",
            id: "Sesi Mendatang"
        },
        sesssionhistory: {
            en: "Session History",
            es: "Historial de la sesión",
            id: "Riwayat Sesi"
        },
        reschedule: {
            en: "Reschedule",
            es: "Reprogramar",
            id: "Jadwal ulang"
        },
        alreadyresche: {
            en: "Already Rescheduled",
            es: "Ya reprogramado",
            id: "Sudah Dijadwal Ulang"
        },
        recordedsesso: {
            en: "Recorded Session",
            es: "Sesión grabada",
            id: "Rekaman Sesi"
        },
        watchrecord: {
            en: "Watch Recording",
            es: "Ver la grabación",
            id: "Tonton Rekaman"
        },
        downloadrecord: {
            en: "Download Recording",
            es: "Descargar grabación",
            id: "Unduh Rekaman"
        },
        downloadex: {
            en: "This download link has expired. Recordings are only available for 72 hours after session.",
            es: "Este enlace de descarga ha expirado. Las grabaciones solo están disponibles durante 72 horas después de la sesión.",
            id: "Tautan unduhan ini telah kedaluwarsa. Rekaman hanya tersedia selama 72 jam setelah sesi."
        },
        norecorded: {
            en: "No recorded session. Both student and coach didn't attend the session.",
            es: "Sin sesión grabada. Tanto el estudiante como el entrenador no asistieron a la sesión.",
            id: "Tidak ada sesi rekaman. Baik siswa maupun pelatih tidak menghadiri sesi."
        },
        recordinglinks: {
            en: "Recording links are only available for 72 hours after end of session.",
            es: "Los enlaces de grabación solo están disponibles durante 72 horas después del final de la sesión.",
            id: "Tautan rekaman hanya tersedia selama 72 jam setelah akhir sesi."
        },
        meetcoach: {
            en: "Meet Your Coaches",
            es: "Conoce a tus entrenadores",
            id: "Temui Pelatih Anda"
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
        name1: {
            en: "NAME",
            es: "NOMBRE",
            id: "NAMA"
        },
        date1: {
            en: "DATE",
            es: "FECHA",
            id: "TANGGAL"
        },
        country1: {
            en: "COUNTRY",
            es: "PAÍS",
            id: "NEGARA"
        },
        language1: {
            en: "LANGUAGE",
            es: "IDIOMA",
            id: "BAHASA"
        },
        searchcoach: {
            en: "Search Coach...",
            es: "Coach de búsqueda...",
            id: "Cari Pelatih..."
        },
        searchdate: {
            en: "Date..",
            es: "Fecha..",
            id: "Tanggal..."
        },
        searchcountry: {
            en: "Country..",
            es: "País..",
            id: "Negara..."
        },
        searchlanguage: {
            en: "Language..",
            es: "Idioma..",
            id: "Bahasa.."
        },
        searchcoach1: {
            en: "Search Coach",
            es: "Coach de búsqueda",
            id: "Cari Pelatih"
        },
        availableat: {
            en: "Available At",
            es: "Disponible en",
            id: "Tersedia Pada"
        },
        weeklysc: {
            en: "WEEKLY SCHEDULE",
            es: "PROGRAMACIÓN SEMANAL",
            id: "JADWAL MINGGUAN"
        },
        clickinthe: {
            en: "Click in the box for calendar or on Weekly Schedule to see your coach’s availability",
            es: "Haga clic en la casilla de calendario o en Horario semanal para ver la disponibilidad de su entrenador",
            id: "Klik di kotak untuk kalender atau di Jadwal Mingguan untuk melihat ketersediaan pelatih Anda"
        },
      

    };

    translator = $('body').translate({
        lang: "",
        t: direct
    });

    translator.lang(langselect);
}

//SETTING DEFAULT LANGUAGE
function DefaultLanguage() {
    langselect = "id"
    $(document).ready(ChangeLanguages());
};




// $(document).ready(function () {


//     $(function tras() {

//         // var _t = $('body').translate({
//         //     lang: "es",
//         //     t: t
//         // });


//         // var str = _t.g("translate");
//         // console.log(str);


//         // $("ul.lang-list li").click(function (ev) {
//         //     var lang = $(this).attr("data-value");
//         //     _t.lang(lang);

//         //     // if (lang == 'id') {
//         //     //     alert("indonesia")
//         //     // } else if (lang == 'en') {
//         //     //     alert("english")
//         //     // } else {
//         //     //     alert("spanyol")
//         //     // };

//         //     console.log(lang);
//         //     ev.preventDefault();
//         // });

//     });

// })
