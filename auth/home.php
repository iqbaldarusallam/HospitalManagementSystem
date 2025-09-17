<?php
session_start();

if (!isset($_SESSION['session_username']) || empty($_SESSION['session_username'])) {
  header("location: ../login.php");
  exit();
}

?>
<!doctype html>
<html lang="en">
<head>
    <title>HOSPITAL CIKARANG</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="icon" type="image/png" size="16x16" href="../images/logoAja.png"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    
<div class="wrapper d-flex align-items-stretch">
    <nav id="sidebar" class="active">
        <h1><a href="home.php" class="logo"><img src="../images/logoAja.png" width="80px;" alt="Hospital Logo"></a></h1>
        <ul class="list-unstyled components mb-5">
            <li class="active">
                <a href="home.php"><span class="fa fa-home"></span> Home</a>
            </li>
            <li class="active">
                <a href="home.php?page=patient"><span class="bi bi-clipboard-plus-fill"></span>Patient data</a>
            </li>
            <li class="active">
                <a href="home.php?page=checkup"><span class="bi bi-building-add"></span>Checkup data</a>
            </li>
            <li class="active">
                <a href="home.php?page=medicine"><span class="bi bi-bag-plus-fill"></span>Medicine data</a>
            </li>
            <li class="active">
                <a href="home.php?page=purchase"><span class="bi-bag-check-fill"></span>Purchase data</a>
            </li>
            <li>
                <a href="../logout.php"><span class="bi bi-arrow-left-square-fill"></span>Log out</a>
            </li>
        </ul>
        <div class="footer"></div>
    </nav>

    <!-- Page Content  -->
    <div id="content" class="p-4 p-md-5">

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">

                <button type="button" id="sidebarCollapse" class="btn btn-primary">
                    <i class="fa fa-bars"></i>
                    <span class="sr-only">Toggle Menu</span>
                </button>
                <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="nav navbar-nav ml-auto">
                        <li class="nav-item active"><a class="nav-link" href="home.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="home.php?page=about">About</a></li>
                        <li class="nav-item"><a class="nav-link" href="home.php?page=portfolio">Portfolio</a></li>
                        <li class="nav-item"><a class="nav-link" href="home.php?page=contact">Contact</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <?php
        if(isset($_GET['page'])) {
            switch ($_GET['page']) {
                case 'patient':
                    include('../hospital_pasien.php');
                    break;
                case 'checkup':
                    include('../hospital_pemeriksaan.php');
                    break;
                case 'medicine':
                    include('../hospital_pembelianobat.php');
                    break;
                case 'purchase':
                    include('../hospital_pembayaran.php');
                    break;
                case 'about':
                    echo '
                    <div class="text-center">
                        <h2>About Us</h2>
                        <p>Cikarang Hospital is a modern healthcare center with comprehensive facilities and professional medical staff.
We are committed to providing the best possible service to every patient.</p>
                        <img src="../images/AboutUs.jpg" class="img-fluid rounded shadow mt-3" style="max-width:600px;">
                    </div>';
                    break;
                case 'portfolio':
    echo '
    <style>
        .portfolio-img {
            width: 100%;
            height: 350px;
            object-fit: cover;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }
    </style>

    <div class="text-center">
        <h2>Our Portfolio</h2>
        <p>Some of our featured facilities and services:</p>
    </div>
    <div class="row text-center">
        <div class="col-md-4 mb-3">
            <img src="../images/GedungRS.jpg" class="portfolio-img">
            <p>Main Building</p>
        </div>
        <div class="col-md-4 mb-3">
            <img src="../images/RuangRawatInap.jpg" class="portfolio-img">
            <p>Inpatient Room</p>
        </div>
        <div class="col-md-4 mb-3">
            <img src="../images/TimMedis.jpg" class="portfolio-img">
            <p>Medical Team</p>
        </div>
    </div>';
                    break;
                case 'contact':
    echo '
    <div class="row">
        <div class="col-md-6">
            <h2>Contact Us</h2>
            <p>Contact us if you have any questions or medical needs:</p>
            <ul class="list-unstyled">
                <li><i class="bi bi-geo-alt-fill text-primary"></i> Jl. Industri Pasir Gombong, Pasirgombong, Cikarang Utara, Bekasi, Jawa Barat 17530</li>
                <li><i class="bi bi-telephone-fill text-primary"></i> (021) 123 123</li>
                <li><i class="bi bi-envelope-fill text-primary"></i> info@hospitalcikarang.com</li>
            </ul>
        </div>
        <div class="col-md-6">
            <!-- Embed Maps -->
            <iframe 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.6766914727344!2d107.15705831475289!3d-6.207067495524768!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e698f3d4d27c5ad%3A0xde3d0c1d01caf316!2sRS%20Sentra%20Medika%20Cikarang!5e0!3m2!1sen!2sid!4v1695096000000!5m2!1sen!2sid" 
                width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy">
            </iframe>
        </div>
    </div>';
    break;
                default:
                    echo "Page not found";
                    break;
            }
        } else {
            echo '
            <!-- Hero Section -->
            <div class="text-center mb-5">
                <img src="../images/HospitalBanner.jpg" class="img-fluid rounded shadow" style="max-height:400px; object-fit:cover; width:100%;">
                <div class="mt-3">
                    <h2>Welcome to Hospital Cikarang</h2>
                    <p class="lead">Providing trusted healthcare services with compassion and professionalism.</p>
                </div>
            </div>

            <!-- Services Section -->
            <div class="row text-center mb-5">
                <div class="col-md-3">
                    <div class="card shadow-sm p-3">
                        <i class="bi bi-hospital fs-1 text-primary"></i>
                        <h5 class="mt-2">Emergency 24/7</h5>
                        <p>24-hour emergency services ready for your urgent needs</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card shadow-sm p-3">
                        <i class="bi bi-heart-pulse fs-1 text-danger"></i>
                        <h5 class="mt-2">Checkup</h5>
                        <p>Routine health check-up and medical consultation services</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card shadow-sm p-3">
                        <i class="bi bi-capsule fs-1 text-success"></i>
                        <h5 class="mt-2">Pharmacy</h5>
                        <p>Complete and quality medicines according to doctors prescription</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card shadow-sm p-3">
                        <i class="bi bi-people fs-1 text-warning"></i>
                        <h5 class="mt-2">Professional Staff</h5>
                        <p>Experienced, friendly and professional doctors and nurses</p>
                    </div>
                </div>
            </div>

            <!-- Motto Section -->
            <div class="text-center p-4 bg-light rounded shadow">
                <h3 class="fw-bold">"Your Health, Our Priority"</h3>
                <p>We are committed to providing the best healthcare services for the people of Cikarang.</p>
            </div>
            ';
        }
        ?>
        
    </div>
</div>

<script src="js/jquery.min.js"></script>
<script src="js/popper.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>
</body>
</html>
