<?php require("api/functions.php"); ?>
<?php require("api/connection.php");
session_abort();
session_start();
?>

<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    require("view/cdn.php");
    ?>

    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/style.css">
    
    <title>Kişisel Blog</title>
</head>

<body style="overflow-y:scroll" class="bg-light">
    <div id="pagename" style="display: none;">
        <?php
        $uri = $_SERVER['REQUEST_URI'];
        $pagename = explode("/", $uri)[2];
        echo $pagename;
        ?>
    </div>
    <?php require("view/navbar.php"); ?>

    <div class="container my-5">
        <div class="row">
            <div class="col-lg-9 col-12">
                <?php
                if (isset($_GET["page"])) {
                    $page = get("page");
                } else {
                    $page = "makaleler";
                }
                switch ($page) {
                    case "makaleler":
                        require("view/makaleler.php");
                        break;
                    case "makaleDetay":
                        require("view/makaleDetay.php");
                        break;
                    case "makaleEkle":
                        require("view/makaleEkle.php");
                        break;
                    case "dersler":
                        require("view/dersler.php");
                        break;
                    case "dersEkle":
                        require("view/dersEkle.php");
                        break;
                    case "hakkimda":
                        require("view/hakkimda.php");
                        break;
                    case "hobiler":
                        require("view/hobiler.php");
                        break;
                    case "iletisim":
                        require("view/iletisim.php");
                        break;
                    default:
                        require("view/makaleler.php");
                        break;
                }
                ?>
            </div>
            <div class="border-start border-end col-lg-3 col-12 text-center">
                <h1>Kişisel Blog</h1>
                <div class="photo">
                    <img class="img-fluid" src="img/photo.jpg" alt="">
                    <h2>Ahmet Tatyüz</h2>
                </div>
                <div>
                    <p>Merhaba ben Ahmet Tatyüz. Necmettin Erbakan Üniversitesi 3.sınıf öğrencisiyim. Web geliştirme alanında çalışıyorum ve kendimi geliştiriyorum.
                    </p>
                </div>
                <div id="social-media">
                    <h3><u>Sosyal Medya</u> </h3>
                    <div class="d-flex justify-content-around">
                        <div class="social-logo">
                            <a class="link" href="https://www.instagram.com/ahmettatyuz/"><i class="fa-brands fa-instagram"></i></a>

                        </div>
                        <div class="social-logo">
                            <a class="link" href="https://www.linkedin.com/in/ahmettatyuz/"><i class="fa-brands fa-linkedin"></i></a>

                        </div>
                        <div class="social-logo">
                            <a class="link" href="https://twitter.com/ahmettatyuz"><i class="fa-brands fa-twitter"></i></a>
                        </div>
                    </div>
                    <div class="mt-3">
                        <a href="mailto:ahmettatyuz@gmail.com" class="email">ahmettatyuz@gmail.com</a>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <?php require("view/login.php"); ?>
    <?php require("view/kategori_ekle.php"); ?>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    
    <script src="app.js"></script>
    <script>
        AOS.init();
        function swalAlert(title, icon) {
            Swal.fire({
                position: 'top-end',
                icon: icon,
                title: title,
                showConfirmButton: true,
                timer: 1500
            });
        }
        $("#girisForm").submit(function(e) {
            e.preventDefault();
            if ($("#pwinput").val().length < 8) {
                swalAlert("Geçersiz Parola", "error");
            } else {
                e.stopPropagation();
                document.girisForm.submit();
            }
        })
    </script>
    <?php if (@$_SESSION["alert"] == "loginError") : ?>
        <script>
            swalAlert("Geçersiz kullanıcı adı veya geçersiz parola", "error");
        </script>
    <?php elseif (@$_SESSION["alert"] == "passwordSuccess") : ?>
        <script>
            swalAlert("Giriş Başarılı", "success");
        </script>
    <?php elseif (@$_SESSION["alert"] == "logout") : ?>
        <script>
            swalAlert("Çıkış Başarılı", "success");
        </script>
    <?php endif; ?>
    <?php unset($_SESSION["alert"]); ?>

</body>

</html>