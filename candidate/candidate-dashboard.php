<?php
session_start();
//chech user login or not
if(!isset($_SESSION['id'])){
    header('location:login.php');
    exit();
}
if(isset($_SESSION['role']) != 'candidate'){
    header('location: admin/admin-dashboard.php');
    exit();
}
// if(time()-$_SESSION['login_time']>30){
//     session_unset();// $_session value unset
//     session_destroy();// $_SESSION destroy
//     header('location: ../login.php');
//     exit;
// }
include '../includes/db.php';
include '../includes/dashboard-header.php';
?>
<section class="dashboard admin-dashboard">
    <div class="container-fluid">
        <!-- dashboard card -->
        <div class="row">
            <div class="col-xl-2 sidebar-toggle-2 pt-5">
                <?php include 'candidate-sidebar.php';?>
            </div>
            <div class="dashboard-body col-xl-10 pt-5">
                <div class="row">
                    <div class="col-xl-4">
                        <div class="card">
                            <div class="card-body">
                                <i></i>
                                <h4>Apply for job</h4>
                                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Expedita, atque?</p>
                                <a href="browse-job.php"><button class="btn btn-success">Browse Jobs</button></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="card">
                            <div class="card-body">
                                <i></i>
                                <h4>My appliction</h4>
                                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Expedita, atque?</p>
                                <a href="#"><button class="btn btn-success">View apply jobs</button></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="card">
                            <div class="card-body">
                                <i></i>
                                <h4>My profile</h4>
                                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Expedita, atque?</p>
                                <a href="#"><button class="btn btn-success">View profile</button></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-5">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div>candidate Infoemation</div>
                                <div class="card-body">
                                    <div class="row g-3">
                                        <div class="col-xl-3">
                                            <strong class="text-muted">ID</strong>
                                            <p>CAN-<?php echo $_SESSION['id'] ?></p>
                                        </div>
                                        <div class="col-xl-3">
                                            <strong class="text-muted">NAME</strong>
                                            <p><?php echo $_SESSION['name'] ?></p>
                                        </div>
                                        <div class="col-xl-3">
                                            <strong class="text-muted">EMAIL</strong>
                                            <p><?php echo $_SESSION['email'] ?></p>
                                        </div>
                                        <div class="col-xl-3">
                                            <strong class="text-muted">ROLE</strong>
                                            <p><?php echo $_SESSION['role'] ?></p>
                                        </div>
                                    </div>
                                </div>
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
