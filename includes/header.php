<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JobPortal | Find Your Next Opportunity</title>
    <link rel="stylesheet" href="assets/css/all.min.css">
    <link rel="stylesheet" href="assets/css/owl.theme.green.min.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
</head>
<body>
    <header class="header" id="header">
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="index.php" aria-label="JobPortal home">
                    <img class="logo" src="assets/images/logo4.png" alt="JobPortal">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-lg-auto mb-3 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#featured-jobs">Find Jobs</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Companies</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#categories">Career Advice</a>
                        </li>
                    </ul>
                    <form class="nav-search d-flex" role="search">
                        <i class="fa-solid fa-magnifying-glass"></i>
                        <input class="form-control" type="search" placeholder="Search jobs" aria-label="Search jobs"/>
                    </form>

                    <!-- modal open -->
                       <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                            Register
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h1 class="modal-title fs-5 w-100 text-center" id="staticBackdropLabel">Create Account</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                    <form action="" method="POST">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="fullname"><i class="fa-solid fa-user"></i></span>
                                            <input type="text" name="name" class="form-control" placeholder="Full Name" aria-label="fullname" aria-describedby="fullname">
                                        </div>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="email"><i class="fa-solid fa-envelope"></i></span>
                                            <input type="text" name="email" class="form-control" placeholder="Email Address" aria-label="email" aria-describedby="email">
                                        </div>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="pwd"><i class="fa-solid fa-lock"></i></span>
                                            <input type="password" name="password" class="form-control" placeholder="Password" aria-label="pwd" aria-describedby="pwd">
                                        </div>
                                        <button type="submit" name="register" class="btn btn-primary w-100">Register</button>
                                        <p class="text-center pt-3">Already have an Account ? <a href="login.php">Login</a></p>
                                    </form>
                              </div>
                            </div>
                          </div>
                        </div>
                    <!-- modal close -->
                </div>
            </div>
        </nav>
    </header>

    <!-- jobs table fields 
     
        id, title, company, job_type, expierence, location, salary, description, status, technology, created_at 
    -->
