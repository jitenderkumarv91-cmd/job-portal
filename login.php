<?php
session_start();
include 'includes/db.php';
if(isset($_POST['login'])){
    $email=trim($_POST['email']);
    $password=trim($_POST['password']);
    // find user by email
    $query="SELECT * FROM users WHERE email='$email' ";
    $result=mysqli_query($conn,$query);
    if(mysqli_num_rows($result)>0){
        $user=mysqli_fetch_assoc($result);
        // check password
        if(($password.$user['password'])){
            // store user data in session (id, name, email, role)
            $_SESSION['id']=$user['id'];
            $_SESSION['name']=$user['name'];
            $_SESSION['email']=$user['email'];
            $_SESSION['role']=$user['role'];
            $_SESSION['login_time']=time();
            if($user['role']=="admin"){
                header('location: admin/admin-dashboard.php');
                exit();
            }else{
                header('location: candidate/candidate-dashboard.php');
                exit();
            }
        }else{
            echo "Invalide password !";
        }
    }else{
        echo "Invalide email...";
    }
}

include 'includes/header.php';
?>
<div class="container">
    <div class="row justify-content-center py-5">
        <div class="col-md-5">
            <div class="card shadow">
                <div class="card-body p-4">
                    <h3 class="text-center mb-3">Login Page</h3>
                    <form action="" method="POST">
                        <div class="mb-3 d-flex flex-column">
                            <label for="">Email</label>
                            <input type="text" name="email" placeholder="Enter your email">
                        </div>
                        <div class="mb-3 d-flex flex-column">
                            <label for="">Password</label>
                            <input type="password" name="password" placeholder="Enter your password">
                        </div>
                        <button type="submit" name="login" class="btn bg-success w-100">Login</button>
                    </form>
                    <p class="text-center mt-3">We don't have any account ! <a class="text-decoration-none text-success" href="rgister.php">Register</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include 'includes/footer.php';
?>