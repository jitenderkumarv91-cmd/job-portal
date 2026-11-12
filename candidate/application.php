<?php
session_start();
include '../includes/db.php';
if(!isset($_SESSION['id']) ||  $_SESSION['role'] != 'candidate'){
    header('location:../login.php');
    exit;
}
$alpplication_data="SELECT * FROM job_application"


include '../includes/dashboard-header.php';
?>

<section class="dashboard admin-dashboard">
    <div class="container-fluid">
        <!-- dashboard card -->
        <div class="row">
            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 sidebar-toggle-2">
                <?php include 'candidate-sidebar.php';?>
            </div>
            <div class="dashboard-body col-xl-10 col-lg-10 col-md-10 col-sm-10 mt-5">
                
                <?php
                    include '../includes/dashboard-footer.php';
                ?>
            </div>
        </din>
    </div>
</section>
