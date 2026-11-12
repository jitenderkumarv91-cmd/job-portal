<?php
session_start();
include '../includes/db.php';
$msg="";
$id=$_GET['id']??"";
$row=null;
// when old data id is avilaable in url
if($id != ""){
    $selectData="SELECT * FROM jobs where id=$id";
    $selectResult=mysqli_query($conn,$selectData);
    $row=mysqli_fetch_assoc($selectResult);
}
// insert
if(!isset($_SESSION['id']) || !isset($_SESSION['role']) || $_SESSION['role'] !=='admin'){
  header('location: ../login.php');
  exit();
}
if(isset($_POST['create_job'])){
    $title=trim($_POST['title']);
    $company=trim($_POST['company']);
    $jobtype=trim($_POST['job_type']);
    $technology=trim($_POST['technology']);
    $expierence=trim($_POST['expierence']);
    $location=trim($_POST['location']);
    $salary=trim($_POST['salary']);
    $description=trim($_POST['discription']);
    $status="open";

    if($title=="" || $company=="" || $jobtype=="" || $technology=="" || $expierence==""){
        $msg="Please fill all required fields";
    }else{
        $inquery="INSERT INTO jobs(title,company,job_type,technology,expierence,location,salary,description,status)VALUES
        ('$title','$company','$jobtype','$technology','$expierence','$location','$salary','$description','$status')";
        $inresult=mysqli_query($conn,$inquery);
        if($inresult){
            $msg="job create successfuly";
        }else{
            $msg="something went wrong";
        }
    }
}
// update
if(isset($_POST['update'])){
    $title=trim($_POST['title']);
    $company=trim($_POST['company']);
    $jobtype=trim($_POST['job_type']);
    $technology=trim($_POST['technology']);
    $expierence=trim($_POST['expierence']);
    $location=trim($_POST['location']);
    $salary=trim($_POST['salary']);
    $description=trim($_POST['discription']);
    $update="UPDATE jobs set title='$title', company='$company', job_type='$jobtype', technology='$technology', expierence='$expierence', location='$location', salary='$salary', description='$description' where id='$id' ";
    $inresult=mysqli_query($conn,$update);
    if($inresult){
        $msg="job updated job successfuly";
    }else{
        $msg="something went wrong";
    }
}

// delete
if(isset($_GET['delete-id'])){
    $id=$_GET['id'] ?? "";
    $delete="delete from jobs where id='$id'";
    // $softDelete="update jobs isDelete='true' where id='$id' ";
    $res=mysqli_query($conn,$delete);
    if($res){
        $msg="Deleted successfuly";
    }else{
        $msg="faild! try again";
    }
}

include '../includes/dashboard-header.php';
?>
<section class="dashboard admin-dashboard">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 sidebar-toggle-2">
                <?php include 'admin-sidebar.php'?>
            </div>
            <div class="dashboard-body col-xl-10 d-flex flex-column align-items-center justify-content-center mt-5">
                <div class="p-2 rounded mb-5" style="height:100%; width:50%; display:flex; flex-direction: column; border:2px solid gray;">
                    <h2>Create New Job</h2>
                    <form action="" method="POST">
                        <div class="mb-3">
                            <label for="" class="form-lable">Job title</label>
                            <input type="text" name="title" placeholder="Enter Job Title" class="form-control" require value="<?php echo $row['title']  ??"" ?>">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-lable">Company Name</label>
                            <input type="text" name="company" placeholder="Enter company name" class="form-control" require value="<?php echo $row['compnamy'] ?? ""?>">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-lable">Job type</label>
                            <select name="job_type" class="form-control" value="<?php echo $row['job_type'] ?? ""?>">
                                <option value="">Select Job Type</option>
                                <option value="Full Time">Full Time</option>
                                <option value="Part Time">Part Time</option>
                                <option value="Internship">Internship</option>
                                <option value="Remote">Remote</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-lable">Technology</label>
                            <input type="text" name="technology" placeholder="Enter Technology" class="form-control" require value="<?php echo $row['technology'] ?? ""?>">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-lable">Expierence</label>
                            <select name="expierence" class="form-control" value="<?php echo $row['expierence'] ?? ""?>">
                                <option value="">Select Expierence</option>
                                <option value="Fresher">Fresher</option>
                                <option value="0-1">0-1</option>
                                <option value="1-2">1-2</option>
                                <option value="2-3">2-3</option>
                                <option value="3-4">3-4</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-lable">Location</label>
                            <input type="text" name="location" placeholder="Enter Job Location" class="form-control" value="<?php echo $row['location'] ?? ""?>">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-lable">Salary</label>
                            <input type="text" name="salary" placeholder="Example. 4LPA - 8LPA" class="form-control" value="<?php echo $row['salary'] ?? ""?>">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-lable">Discription</label>
                            <textarea name="discription" placeholder="Enter Job discription here.." class="form-control" row=5 value="<?php echo $row['description'] ?? ""?>"></textarea>
                        </div>
                        <div class="mb-3">
                            <?php
                            if(isset($_GET['id'])){
                                $id=$_GET['id'];
                                $query="SELECT * FROM jobs where id=$id";
                                $result=mysqli_query($conn,$query);

                            }
                            ?>
                            <!-- update condition -->
                            <?php
                            // if($id != ''){
                            //     echo "<button type='submit' name='update'>update</button>";
                            // }else{
                            //     echo "<button type='submit' name='submit'>Submit</button>";
                            // }
                            ?>
                            <?php
                            if($id != ''){
                            ?>
                            <button type="submit" name="update">update</button>
                            <?php
                            }else{
                            ?>
                            <button type="submit" name="create_job">Create Job</button>
                            <?php
                            }
                            ?>
                        </div>
                    </form>
                </div>
                <?php
                $showData="SELECT * FROM jobs";
                $res=mysqli_query($conn,$showData);
                echo "<h1> Job Details </h1>";
                echo "<table class='table table-bordered table-striped table-hover'>";
                    echo "<tr class='table-heading'>
                        <th>S No</th>
                        <th>Job Title</th>
                        <th>Company Name</th>
                        <th>Job Type</th>
                        <th>Technology</th>
                        <th>Expierence</th>
                        <th>Location</th>
                        <th>Salary</th>
                        <th>description</th>
                        <th>status</th>
                        <th>Action</th>
                    </tr>";
                    $sNo=1;
                    while($row=mysqli_fetch_assoc($res)){
                        echo "<tr>
                            <td>$sNo</td>
                            <td>{$row['title']}</td>
                            <td>{$row['company']}</td>
                            <td>{$row['job_type']}</td>
                            <td>{$row['technology']}</td>
                            <td>{$row['expierence']}</td>
                            <td>{$row['location']}</td>
                            <td>{$row['salary']}</td>
                            <td>{$row['description']}</td>
                            <td>{$row['status']}</td>
                            <td><a href='create-job.php?delete-id={$row["id"]}'>Delete</a> <a href='create-job.php?id={$row["id"]}'>Edit</a></td>
                        </tr>";
                        $sNo=$sNo+1;
                    }

                echo "</table>";
            ?>
            </div>
        </div>
        
        <div class="row">
            <?php
                include '../includes/dashboard-footer.php'
            ?>
        </div>
    </div>
</section>