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
        student: {
            en: "Student",
            es: "Estudiante",
            id: "Siswa"
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
            id: "Nama Pelatih"
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
        history: {
            en: "History",
            es: "Historia",
            id: "Riwayat"
        },
        balance: {
            en: "Balance",
            es: "Equilibrar",
            id: "Saldo"
        },
        usedtokens: {
            en: "Used Tokens",
            es: "Tokens usados",
            id: "Token digunakan"
        },
        refundtokens: {
            en: "Refunded Tokens",
            es: "Token reembolsados",
            id: "Pengembalian Token"
        },
        cancelreq: {
            en: "Cancel Request",
            es: "Cancelar petición",
            id: "Batalkan permintaan"
        },
        buytokens: {
            en: "Buy Token",
            es: "Comprar Token",
            id: "Beli Token"
        },
        status: {
            en: "Status",
            es: "Status",
            id: "Status"
        },
        debit: {
            en: " Debit",
            es: " Débito",
            id: " Debet"
        },
        credit: {
            en: "Credit",
            es: "Crédit",
            id: "Kredit"
        },
        tzsetting: {
            en: "Time Zone Setting",
            es: "Configuración de zona horaria",
            id: "Pengaturan Zona Waktu"
        },
        oursystem: {
            en: "Our system detects your device's location and it will set time zone automatically according to your current location.",
            es: "Nuestro sistema detecta la ubicación de su dispositivo y establecerá la zona horaria automáticamente de acuerdo con su ubicación actual.",
            id: "Sistem kami mendeteksi lokasi perangkat Anda dan akan mengatur zona waktu secara otomatis sesuai dengan lokasi Anda saat ini."
        },
        ifyouare: {
            en: "If you are traveling, please check your time zone to make sure that it is correct.",
            es: "Si viaja, verifique su zona horaria para asegurarse de que sea correcta.",
            id: "Jika Anda bepergian, silakan periksa zona waktu Anda untuk memastikan bahwa itu benar."
        },
        tknsystem: {
            en: "Token System",
            es: "Sistema Token",
            id: "Sistem Token"
        },
        tokensareusedto: {
            en: "Tokens are used to book sessions. Your tokens will be automatically deducted after you book a session. You can check your current token balance in token menu and check the cost of each coach before you book a session.",
            es: "Los tokens se utilizan para reservar sesiones. Tus tokens se deducirán automáticamente después de reservar una sesión. Puede verificar su saldo actual de fichas en el menú de fichas y verificar el costo de cada coach antes de reservar una sesión.",
            id: "Token digunakan untuk memesan sesi. Token Anda akan dikurangi secara otomatis setelah Anda memesan sesi. Anda dapat memeriksa token saldo saat ini di menu token dan memeriksa biaya setiap pelatih sebelum Anda memesan sesi."
        },
        tokenrefund: {
            en: "Token Refund",
            es: "Reembolso de Token",
            id: "Pengembalian Token"
        },
        ifyourcoach: {
            en: "If your coach does not show up for a booked session, or is more than 5 minutes late, your tokens will be refunded whether you attended the session or not.",
            es: "Si su entrenador no se presenta a una sesión reservada, o llega más de 5 minutos tarde, sus tokens serán reembolsados ya sea que haya asistido a la sesión o no.",
            id: "Jika pelatih Anda tidak muncul untuk sesi yang dipesan, atau lebih dari 5 menit terlambat, token Anda akan dikembalikan apakah Anda menghadiri sesi atau tidak."
        },
        bookacoach: {
            en: "Book a Coach",
            es: "Reserve un entrenador",
            id: "Pesan seorang Pelatih"
        },
        tobookacoach: {
            en: "To book a coach, go to dashboard or to the side menu. You can search for a coach by date, name, country, or languages spoken.",
            es: "Para reservar un entrenador, vaya al tablero o al menú lateral. Puede buscar un coach por fecha, nombre, país o idiomas hablados.",
            id: "Untuk memesan pelatih, buka dasbor atau ke menu samping. Anda dapat mencari pelatih berdasarkan tanggal, nama, negara, atau bahasa yang diucapkan."
        },
        date: {
            en: "Date",
            es: "Fecha",
            id: "Tanggal"
        },
        displayall: {
            en: "Display all available coaches for the date you have selected.",
            es: "Muestra todos los entrenadores disponibles para la fecha que has seleccionado.",
            id: "Tampilkan semua pelatih yang tersedia untuk tanggal yang Anda pilih."
        },
        names: {
            en: "Name",
            es: "Nombre",
            id: "Nama"
        },
        displayall2: {
            en: "Display all available coaches that match the name you have entered.",
            es: "Muestra todos los entrenadores disponibles que coincidan con el nombre que ingresaste.",
            id: "Tampilkan semua pelatih yang tersedia yang cocok dengan nama yang Anda masukkan."
        },
        contry2: {
            en: "Country",
            es: "País",
            id: "Negara"
        },
        displayall3: {
            en: "Display all available coaches that match the country you have entered",
            es: "Muestra todos los entrenadores disponibles que coinciden con el país que ingresaste",
            id: "Tampilkan semua pelatih yang tersedia yang cocok dengan negara yang Anda masukkan"
        },
        laguagespoke2: {
            en: "Language Spoken",
            es: "Lenguaje hablado",
            id: "bahasa yang dipakai"
        },
        displayall4: {
            en: "Display all available coaches that match the language preference you have entered.",
            es: "Muestra todos los entrenadores disponibles que coincidan con la preferencia de idioma que ingresaste.",
            id: "Tampilkan semua pelatih yang tersedia yang sesuai dengan preferensi bahasa yang Anda masukkan."
        },
        youcanalso: {
            en: "You can also choose the time you would like by clicking on 'View Schedule'",
            es: "También puede elegir la hora que desea haciendo clic en 'Ver programa'",
            id: "Anda juga dapat memilih waktu yang Anda inginkan dengan mengklik 'Lihat Jadwal'"
        },
        accessing: {
            en: "Accessing neo LIVE Session",
            es: "Accediendo a la sesión neo LIVE",
            id: "Mengakses Sesi LANGSUNG LIVE"
        },
        enteryrsession: {
            en: "Enter your session from Dashboard. A countdown display will appear 24 hours before session begins and remain until the session begins.",
            es: "Ingrese su sesión desde el Tablero. Aparecerá una pantalla de cuenta regresiva 24 horas antes de que comience la sesión y permanecerá hasta que comience la sesión.",
            id: "Masukkan sesi Anda dari Dasbor. Tampilan hitung mundur akan muncul 24 jam sebelum sesi dimulai dan tetap hingga sesi dimulai."
        },
        whentits: {
            en: "When it's time to join session, countdown display will change into a play button. Click on the play button to enter your neo LIVE session.",
            es: "Cuando llegue el momento de unirse a la sesión, la pantalla de cuenta regresiva se convertirá en un botón de reproducción. Haga clic en el botón de reproducción para ingresar a su sesión neo LIVE.",
            id: "Ketika tiba saatnya untuk bergabung dengan sesi, tampilan hitung mundur akan berubah menjadi tombol putar. Klik pada tombol putar untuk memasuki sesi LANGSUNG Anda."
        },
        livessseionsgu: {
            en: "Live Session Guides",
            es: "Guías de sesión en vivo",
            id: "Panduan Sesi Langsung"
        },
        onceyour: {
            en: "Once your session begins, your coach will appear on the screen. The screen will display a blank black screen until then. To show your video and resize it to a full display, hover your mouse over the screen.",
            es: "Una vez que comience su sesión, su entrenador aparecerá en la pantalla. La pantalla mostrará una pantalla negra en blanco hasta entonces. Para mostrar su video y cambiar su tamaño a una pantalla completa, pase el mouse sobre la pantalla.",
            id: "Setelah sesi Anda dimulai, pelatih Anda akan muncul di layar. Layar akan menampilkan layar hitam kosong sampai saat itu. Untuk menampilkan video Anda dan mengubah ukurannya menjadi layar penuh, arahkan mouse Anda ke atas layar."
        },
        yourstudydatta: {
            en: "Your study data appears on the lower part of the screen.",
            es: "Los datos de su estudio aparecen en la parte inferior de la pantalla.",
            id: "Data studi Anda muncul di bagian bawah layar."
        },
        chatfeatures: {
            en: "Chat feature appears on the lower right part of the screen. From this chat window, you may communicate with your coach by writing.",
            es: "La función de chat aparece en la parte inferior derecha de la pantalla. Desde esta ventana de chat, puede comunicarse con su entrenador por escrito.",
            id: "Fitur obrolan muncul di bagian kanan bawah layar. Dari jendela obrolan ini, Anda dapat berkomunikasi dengan pelatih Anda dengan menulis."
        },
        affterthe: {
            en: "After the session ends, the screen will redirect you to a Session Summaries page.",
            es: "Una vez que la sesión finaliza, la pantalla lo redirigirá a una página de Resúmenes de sesión.",
            id: "Setelah sesi berakhir, layar akan mengarahkan Anda ke halaman Ringkasan Sesi."
        },
        sessionsumma: {
            en: "Session Summary Guides",
            es: "Guías de resumen de sesión",
            id: "Panduan Ringkasan Sesi"
        },
        thispage: {
            en: "This page gives a summary of the session. Here you can rate your coach on a scale from 1 to 5, with 5 being the highest rating. You will not be able to rate your coach again if you leave this page.",
            es: "Esta página ofrece un resumen de la sesión. Aquí puede calificar a su entrenador en una escala de 1 a 5, siendo 5 la calificación más alta. No podrá calificar a su coach nuevamente si abandona esta página.",
            id: "Halaman ini memberikan ringkasan sesi. Di sini Anda dapat menilai pelatih Anda dalam skala dari 1 hingga 5, dengan 5 menjadi peringkat tertinggi. Anda tidak akan dapat menilai pelatih Anda lagi jika Anda meninggalkan halaman ini."
        },
        yourlessonhass: {
            en: " Your lesson has been recorded, and it will be available to you approximately 15-20 minutes after the session has ended. The recording is only available for up to 72 hours after the session has been completed. However, you may download the session and access it later in your Session History.",
            es: "Su lección ha sido grabada, y estará disponible para usted aproximadamente de 15 a 20 minutos después de que la sesión haya terminado. La grabación solo está disponible hasta 72 horas después de que se haya completado la sesión. Sin embargo, puede descargar la sesión y acceder a ella más adelante en su Historial de Sesión.",
            id: "Pelajaran Anda telah direkam, dan akan tersedia untuk Anda sekitar 15-20 menit setelah sesi berakhir. Rekaman ini hanya tersedia hingga 72 jam setelah sesi selesai. Namun, Anda dapat mengunduh sesi dan mengaksesnya nanti di Riwayat Sesi Anda."
        },
        allowsyous: {
            en: "Session History allows you to see all of your previous sessions. You can choose to download or watch your recorded neo LIVE session.",
            es: "El Historial de la sesión le permite ver todas sus sesiones anteriores. Puedes elegir descargar o ver tu sesión neo-live grabada.",
            id: "Sesi History memungkinkan Anda untuk melihat semua sesi sebelumnya. Anda dapat memilih untuk mengunduh atau menonton sesi direkam neo LIVE Anda."
        },
        recordedsession: {
            en: " Recorded sessions usually appear approximately 20 - 30 minutes after the session has ended. Recorded session will be available to download or view for 72 hours after the session has ended.",
            es: "Las sesiones grabadas generalmente aparecen aproximadamente de 20 a 30 minutos después de que la sesión haya finalizado. La sesión grabada estará disponible para descargar o ver durante 72 horas después de que la sesión haya finalizado.",
            id: "Sesi rekaman biasanya muncul sekitar 20 - 30 menit setelah sesi berakhir. Sesi rekaman akan tersedia untuk diunduh atau dilihat selama 72 jam setelah sesi berakhir."
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

        //AGORA LIVESESSION
        waiting: {
            en: "Waiting a &nbsp;",
            es: "Esperando a &nbsp;",
            id: "Menunggu &nbsp;"
        },
        tojoin: {
            en: "&nbsp; to join the session. Remain in the session until the end in order to receive a refund of your tokens.",
            es: "&nbsp; para unirse a la sesión. Permanezca en la sesión hasta el final para recibir un reembolso de sus tokens.",
            id: "&nbsp; untuk bergabung dalam sesi. Tetap dalam sesi hingga akhir untuk menerima pengembalian uang token Anda."
        },
        vdsource: {
            en: "Video source:",
            es: "Fuente de vídeo:",
            id: "Sumber video:"
        },
        camerablocked: {
            en: "Your browser is blocking your camera, please enable it and then reload the page.",
            es: "Su navegador está bloqueando su cámara, por favor habilítelo y luego vuelva a cargar la página.",
            id: "Browser Anda memblokir kamera Anda, mohon aktifkan dan kemudian muat ulang halaman."
        },
        remainingtime: {
            en: "Remaining Time:",
            es: "Tiempo restante:",
            id: "Waktu yang tersisa:"
        },
        youcantopen: {
            en: "You can't open Live Session in multiple tabs/windows",
            es: "No puede abrir la sesión en vivo en varias pestañas / ventanas",
            id: "Anda tidak dapat membuka Sesi Langsung di banyak tab / jendela"
        },
        progresstogoal: {
            en: "Search Coach",
            es: "Coach de búsqueda",
            id: "Cari Pelatih"
        },

        //OPENTOOK Livesession
        cameraon: {
            en: "Camera is On",
            es: "La cámara está encendida",
            id: "Kamera Aktiv"
        },
        cameraoff: {
            en: "Camera is Off",
            es: "La cámara está apagada",
            id: "Kamera Mati"
        },

        //LEAVESESSION
        sessionsumm: {
            en: "Session Summaries",
            es: "Resúmenes de sesiones",
            id: "Ringkasan sesi"
        },
        sessionwith: {
            en: "Your Session With &nbsp;",
            es: "Su sesión con &nbsp;",
            id: "Sesi Anda Dengan &nbsp;"
        },
        hasended: {
            en: "&nbsp; has Ended",
            es: "&nbsp; ha terminado",
            id: "&nbsp; telah berakhir"
        },
        date3: {
            en: "DATE",
            es: "FECHA",
            id: "TANGGAL"
        },
        starttm: {
            en: "START TIME",
            es: "HORA DE INICIO",
            id: "WAKTU MULAI"
        },
        endtm: {
            en: "END TIME",
            es: "FIN DE TIEMPO",
            id: "AKHIR WAKTU"
        },
        coachtm: {
            en: "COACH",
            es: "ENTRENADOR",
            id: "PELATIH"
        },
        joinat: {
            en: "YOU JOINED AT",
            es: "USTED SE UNIO A",
            id: "ANDA BERGABUNG PADA"
        },
        coachjoin: {
            en: "YOUR COACH JOINED AT",
            es: "SU ENTRENADOR SE UNIO A",
            id: "COACH ANDA BERGABUNG PADA"
        },
        ratecoach: {
            en: "Rate Your Coach",
            es: "Califica tu entrenador",
            id: "Beri Nilai Pelatih Anda"
        },
        namecoach: {
            en: "Coach Name",
            es: "Nombre del entrenador",
            id: "Nama Pelatih"
        },
        rate: {
            en: "Rate",
            es: "Tarifa",
            id: "Nilai"
        },
        importannt: {
            en: "IMPORTANT NOTES:",
            es: "NOTAS IMPORTANTES:",
            id: "CATATAN PENTING:"
        },
        dnldthe: {
            en: "Download the recorded session in Session History.",
            es: "Descargue la sesión grabada en el Historial de la sesión.",
            id: "Unduh sesi yang direkam di Session History."
        },
        willreadyin: {
            en: "Recording will be ready in 2 minutes.",
            es: "La grabación estará lista en 2 minutos.",
            id: "Perekaman akan siap dalam 2 menit."
        },
        isavvable: {
            en: "Recording is available for 72 hours after end of session.",
            es: "La grabación está disponible durante 72 horas después del final de la sesión.",
            id: "Perekaman tersedia untuk 72 jam setelah akhir sesi."
        },
        exitt: {
            en: "Exit",
            es: "Salida",
            id: "Keluar"
        },
        cocdint: {
            en: "Coach didnt attend the session.",
            es: "El entrenador no asistió a la sesión.",
            id: "Pelatih tidak menghadiri sesi."
        },
        stnint: {
            en: "Student didn't attend the session.",
            es: "El estudiante no asistió a la sesión.",
            id: "Siswa tidak menghadiri sesi."
        },

    };

    translator = $('body').translate({
        lang: "",
        t: direct
    });

    translator.lang(langselect);
}

//SETTING DEFAULT LANGUAGE
function DefaultLanguage(xyz) {
    langselect = xyz;
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
