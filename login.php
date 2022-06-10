<?php
session_start();

$notifikasi_salah = "";

if (isset($_POST['masuk'])) {
    require "config.php";

    $username = strip_tags(mysqli_real_escape_string($conn, $_POST['username']));
    $password = strip_tags(md5(mysqli_real_escape_string($conn, $_POST['password'])));

    $login = mysqli_query($conn, "SELECT * FROM data_user WHERE (username='$username' OR email='$username') AND password='$password'");
    $cek = mysqli_num_rows($login);
    if ($cek == 1) {
        $getdata = mysqli_fetch_assoc($login);
        $id_user = $getdata['id_user'];
        $_SESSION['login'] = $id_user;
        header("location:index.php");
    } else {
        $notifikasi_salah = '<div class="alert border-0 bg-light-danger fade show py-2"> <div class="d-flex align-items-center"> <div class="fs-3 text-danger"><i class="bi bi-x-circle-fill"></i> </div> <div class="ms-3"> <div class="text-danger">Login Gagal, Silahkan Coba Kembali</div> </div> </div> </div>';
    }
}

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="assets/images/favicon-32x32.png" type="image/png" />
    <!-- Bootstrap CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/bootstrap-extended.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
    <link href="assets/css/icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <!-- loader-->
    <link href="assets/css/pace.min.css" rel="stylesheet" />

    <title>Soni Motor | Login</title>
</head>

<body>

    <!--start wrapper-->
    <div class="wrapper">

        <!--start content-->
        <main class="authentication-content">
            <div class="container-fluid">
                <div class="authentication-card">

                    <div class="row text-center">
                        <div class="row my-5">
                            <div class="col-lg">
                                <img class="img-fluid" style="height:200px !important" src="assets/images/soni-motor-logo.png">
                            </div>
                        </div>
                        <div class="col-lg">
                            <div class="card shadow rounded-0">
                                <div class="row">
                                    <div class="col-lg">
                                        <div class="card-body p-4 p-sm-5">
                                            <form class="form-body" method="post" action="">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <label for="inputUsername" class="form-label">Username /
                                                            Email</label>
                                                        <div class="ms-auto position-relative">
                                                            <div class="position-absolute top-50 translate-middle-y search-icon px-3">
                                                                <i class="bi bi-envelope-fill"></i>
                                                            </div>
                                                            <input type="text" class="form-control radius-30 ps-5" id="inputUsername" placeholder="Masukan Username / Email" name="username">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 my-4">
                                                        <label for="inputPassword" class="form-label">Password</label>
                                                        <div class="ms-auto position-relative">
                                                            <div class="position-absolute top-50 translate-middle-y search-icon px-3">
                                                                <i class="bi bi-lock-fill"></i>
                                                            </div>
                                                            <input type="password" class="form-control radius-30 ps-5" id="inputPassword" placeholder="Masukan Password" name="password">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg">
                                                        <div class="d-grid
                                                ">
                                                            <button type="submit" class="btn btn-primary radius-30" name="masuk">Masuk</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php echo $notifikasi_salah; ?>
                        </div>
                    </div>
                </div>
            </div>

        </main>

        <!--end page main-->

    </div>
    <!--end wrapper-->


    <!--plugins-->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/pace.min.js"></script>


</body>

</html>