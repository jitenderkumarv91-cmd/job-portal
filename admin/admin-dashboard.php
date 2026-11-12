<?php
session_start();
if(!isset($_SESSION['id']) || !isset($_SESSION['name']) || !isset($_SESSION['role']) || $_SESSION['role'] !=='admin'){
  header('location: ../login.php');
  exit();
}
include '../includes/dashboard-header.php';
?>
<section class="dashboard admin-dashboard">
    <div class="container-fluid">
        <!-- dashboard card -->
        <div class="row">
            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 sidebar-toggle-2">
                <?php include 'admin-sidebar.php';?>
            </div>
            <div class="dashboard-body col-xl-10 col-lg-10 col-md-10 col-sm-10 mt-5">
                <div class="row g-3">
                    <div class="col-xl-6">
                        <div class="card">
                            <div class="card-body d-flex justify-content-between text-align-center h-100">
                                <div class="content h-100">
                                  <p>total candidate</p>
                                  <h3>500k</h3>
                                  <p></p>
                                </div>
                                <div class="dashboard-icon h-100 d-flex align-items-center"><i class="fa-solid fa-user-group"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="card">
                            <div class="card-body d-flex justify-content-between text-align-center h-100">
                                <div class="content h-100">
                                  <p>sortlisted candidate</p>
                                  <h3>50k</h3>
                                  <p></p>
                                </div>
                                <div class="dashboard-icon h-100 d-flex align-items-center"><i class="fa-solid fa-user-group"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="card">
                            <div class="card-body d-flex justify-content-between text-align-center h-100">
                                <div class="content h-100">
                                  <p>panding candidate</p>
                                  <h3>5k</h3>
                                  <p></p>
                                </div>
                                <div class="dashboard-icon h-100 d-flex align-items-center"><i class="fa-solid fa-user-group"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="card">
                            <div class="card-body d-flex justify-content-between text-align-center h-100">
                                <div class="content h-100">
                                  <p>rejected candidate</p>
                                  <h3>1.5k</h3>
                                  <p></p>
                                </div>
                                <div class="dashboard-icon h-100 d-flex align-items-center"><i class="fa-solid fa-user-group"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                    include '../includes/dashboard-footer.php';
                ?>
            </div>
        </div>
    </div>
</section>