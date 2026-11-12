<?php
session_start();
include '../includes/db.php';

if(!isset($_SESSION['id']) ||  $_SESSION['role'] != 'candidate'){
    header('location:../login.php');
    exit;
}
$showData="SELECT * FROM jobs ORDER BY id ASC";
$res=mysqli_query($conn,$showData);
// apply job fumctinality
if(isset($_POST['apply_job'])){
    $user_id=$_SESSION['id'];
    $job_id=$_POST['job_id'];

    // chech resume upload or not
    // $_FILES => return multiple details like filename, tmp_name, type, error etc
    if(!isset($_FILES['resume']) || $_FILES['resume']['error'] != 0){
        echo "Please uploade your resume";
        exit();
    } 
    // check job exist or not
    $job_query="Select id from jobs where id='$job_id' AND status='open'";
    $res=mysqli_query($conn,$job_query);
    if(mysqli_num_rows($res) == 0){
        echo "job not available";
        exit();
    }

    // check duplicate job
    $job_duplicate="select id from job_application where user_id='$user_id' AND job_id='$job_id'";
    $result=mysqli_query($conn, $job_duplicate);
    if(mysqli_num_rows($result)>0){
        echo "you have already applied this job";
        exit();
    }

    // resume validation 
    // name, tmp_name, size
    $resume_name=$_FILES['resume']['name'];
    $resume_tmp=$_FILES['resume']['tmp_name'];
    $resume_size=$_FILES['resume']['size'];
    // find extention
    $fileExtension=pathinfo($resume_name,PATHINFO_EXTENSION);
    $allowExtension=["pdf","doc","docx"];
    if(!in_array($fileExtension,$allowExtension)){
        echo "only PDF, DOC, DOCX file are allowed";
        exit();
    }
    // maximum file size 2MB => 2*1024*1024
    if($resume_size>2*1024*1024){
        echo "Resume size should be upload less then 2MB";
        exit();
    }
    // create upload folder
    $uploaded_folder="../upload/resumes/";
    if(!is_dir($uploaded_folder)){
        mkdir($uploaded_folder,0755,true);
    }
    // gererate unique file name
    $new_resume_name=uniqid('resume_',true).'.'.$fileExtension;
    $resume_path=$uploaded_folder.$new_resume_name;
    if(move_uploaded_file($resume_tmp,$resume_path)){
        // save resume in database
        $resume_db_path="upload/resumes/".$new_resume_name;
        $insert_query="INSERT INTO job_application(user_id,job_id,resume)VALUES('$user_id','$job_id','$resume_db_path')";
        $res=mysqli_query($conn,$insert_query);
        if($res){
            echo "<script>
                alert('Job Application submitted successfully!');
                window.location.href='browse-job.php';
            </script>";
        }else{
            // remove uploaded file if database inserted files
            echo "Application not submitted, please try again.";
        }
    }else{
        echo "Resume upload failed";
    }

}



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
                <h2>Avaliable jobs</h2>
                <p class="text-muted">you can apply job related to your profile</p>
                <div class="row g-3">
                    <?php
                        if(mysqli_num_rows($res)>0){
                            while($job=mysqli_fetch_assoc($res)){
                                ?>
                                    <div class="col-xl-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <h4><?php echo $job['title'];?></h4>
                                                <p><i class="fa-solid fa-building"></i> <?php echo $job['company'];?></p>
                                                <p><i class="fa-solid fa-briefcase"></i> <b>Job Type:</b> <?php echo $job['job_type'];?></p>
                                                <p><b>Technology:</b> <?php echo $job['technology'];?></p>
                                                <p><i class="fa-solid fa-street-view"></i> <b>Expierence:</b> <?php echo $job['expierence'];?></p>
                                                <p><i class="fa-solid fa-location-dot"></i> <b>Location:</b> <?php echo $job['location'];?></p>
                                                <p><i class="fa-solid fa-sack-dollar"></i> <b>Anual Salary:</b> <?php echo $job['salary'];?></p>
                                                <div class="d-flex justify-content-end">
                                                    <div class="d-flex justify-content-end align-items-center"><p class="px-3 text-success"><?php echo $job['status'];?></p></div>
                                                    <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#appliedJob<?php echo $job['id'];?>" aria-controls="offcanvasRight">Apply Now</button>
                                                    <div class="offcanvas offcanvas-end" tabindex="-1" id="appliedJob<?php echo $job['id'];?>" aria-labelledby="offcanvasRightLabel">
                                                        <div class="offcanvas-header">
                                                            <h5 class="offcanvas-title" id="offcanvasRightLabel">Apply Job</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                                                        </div>
                                                        <div class="offcanvas-body">
                                                            <form action="" method="POST" enctype="multipart/form-data">
                                                                <input type="hidden" name="job_id" value="<?php echo $job['id'];?>">
                                                                <div class="mb-3">
                                                                    <label for="" class="form-label">Upload Resume</label>
                                                                    <input type="file" name="resume" class="form-control" accept=".pdf,.doc,.docx" require>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <button typr="submit" name="apply_job" class="btn btn-success">Submit</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                            }
                        }
                    ?>
                </div>
                <?php
                    include '../includes/dashboard-footer.php';
                ?>
            </div>
        </din>
    </div>
</section>
