<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/owl.theme.green.min.css">
    <link rel="stylesheet" href="../assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/responsive.css">
</head>
<body>
    <header class="dash-head">
        <div class="container-fluid dash-nav">
            <div class="row">
                <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 d-flex align-items-center sidebar-toggle">
                    <div>
                        <a class="btn sidebar-btn" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
                            <div class="sidebar-menu"><i class="fa-solid fa-bars"></i></div>
                        </a>
                        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
                            <div class="offcanvas-header">
                                <h5 class="offcanvas-title" id="offcanvasExampleLabel">Offcanvas</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                            </div>
                            <div class="offcanvas-body">
                                <div class="dropdown mt-3">
                                    <ul type="none" class="p-0">
                                        <li class="mb-3 "><a href="#" class="dropdown-item text-decoration-none"><i class="fa-solid fa-house"></i> dashboard</a></li>
                                        <li class="mb-3 "><a href="#" class="dropdown-item text-decoration-none"><i class="fa-solid fa-window-restore"></i> Applecation</a></li>
                                        <li class="mb-3 "><a href="#" class="dropdown-item text-decoration-none"><i class="fa-solid fa-briefcase"></i> Job</a></li>
                                        <li class="mb-3 "><a href="#" class="dropdown-item text-decoration-none"><i class="fa-solid fa-user"></i> User</a></li>
                                        <li class="mb-3 logout"><a href="logout.php" class="dropdown-item text-decoration-none"><i class="fa-solid fa-right-from-bracket"></i> Logout</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="dashboard-logo">
                        <img src="../assets/images/logo1.png" alt="">
                    </div>
                </div>
                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 d-flex flex-column justufy-cotent-center" style="background:#eaecee;">
                    <div><h4><?php echo ($_SESSION['role']);?> Dashboard</h4></div>
                    <div>
                        <p class="">Welcome,<strong><?php echo($_SESSION['name']);?></strong></p>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 d-flex justify-content-center align-items-center" style="background:#eaecee;"><a href="#" class="text-decoration-none bg-danger px-3 py-1 text-white rounded">Logout</a></div>
            </div>
        </div>
    </header>    
