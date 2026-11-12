<?php
include 'includes/db.php';
$message="";
// get the register form data through tha post method
if(isset($_POST['register'])){
    $name=trim($_POST['name'] ?? "");
    $email=trim($_POST['email'] ?? "");
    $password=trim($_POST['password'] ?? "");
    $role="candidate";
    // check email already exist or not in users table
        $checkEmail="SELECT * FROM users WHERE email='$email' ";
        $checkResult=mysqli_query($conn,$checkEmail);

    if(empty($name)){
        $message="Fill Full Name";
    }else if(!preg_match("/^[A-Za-z ]+$/",$name)){
        $message="Invalide name formate";
    }else if(empty($email)){
        $message="Fill Email Address";
    }else if(!preg_match("/^[a-z0-9]+@[a-z]+.[a-z]+$/",$email)){
        $message="Invalide email formate";
    }else if(empty($password)){
        $message="Please create Password";
    }else if(!preg_match("/^[A-Za-z0-9]+(?=.*?[#?!@$%^&*-]).{8,16}+$/",$password)){
        $message="Please create strong password";
    }else if(mysqli_num_rows($checkResult)>0){
        $message="Email Already Registered";
    }else{
        // hash password
        $hashPassword=password_hash($password, PASSWORD_DEFAULT);
        $insertData="INSERT INTO users(name, email, password, role) VALUES ('$name','$email','$hashPassword','$role')";
        $res=mysqli_query($conn,$insertData);
        if($res){
            // $message="Registration success";
            header('location:login.php');
            exit();

        }else{
            $message="Registration fail";
        }
    }
}
include 'includes/header.php';
?>

<?php
if($message !=""){
    ?>
    <div class="alert alert-info" id="alert">
        <?php echo $message; ?>
    </div>
    <?php
}
?>
<main>
    <!-- hero section start -->
    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-6">
                    <div class="hero-content">
                        <span class="eyebrow"><i class="fa-solid fa-sparkles"></i> Your next chapter starts here</span>
                        <h1>Find work that fits <span>your ambition.</span></h1>
                        <p>Discover curated opportunities from trusted companies and take the next confident step in your career.</p>
                        <form class="hero-search" role="search">
                            <label class="visually-hidden" for="hero-job-search">Search jobs</label>
                            <i class="fa-solid fa-magnifying-glass"></i>
                            <input id="hero-job-search" type="search" placeholder="Job title, skill, or company" aria-label="Search jobs">
                            <button type="submit">Find jobs <i class="fa-solid fa-arrow-right"></i></button>
                        </form>
                        <div class="hero-actions">
                            <a href="#featured-jobs" class="btn btn-primary">Explore opportunities</a>
                            <a href="#categories" class="text-link">Browse categories <i class="fa-solid fa-arrow-right"></i></a>
                        </div>
                        <div class="hero-stats" aria-label="Job portal statistics">
                            <div><strong>10k+</strong><span>active jobs</span></div>
                            <div><strong>800+</strong><span>trusted companies</span></div>
                            <div><strong>4.8/5</strong><span>candidate rating</span></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="hero-image">
                        <img src="assets/images/hero.png" alt="Professional candidate meeting with recruiters">
                        <div class="hero-float-card">
                            <span class="float-icon"><i class="fa-solid fa-circle-check"></i></span>
                            <div><strong>Personalized matches</strong><small>Roles selected for your skills</small></div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </section>

    <!-- categories section start -->
    <section class="categories-section section-space" id="categories">
        <div class="container">
            <div class="section-heading text-center">
                <span class="eyebrow">Explore by expertise</span>
                <div class="categories-title">
                        <h2>Popular Job Categories</h2>
                        <p>Choose a field you love and discover roles built around your strengths.</p>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <div class="card">
                        <div class="category-card">
                            <div class="cat-icon fs-5">💻</div>
                            <h3>Software Engineering</h3>
                            <p>1,240+ Openings</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="card">
                        <div class="category-card">
                            <div class="cat-icon fs-5">🎨</div>
                            <h3>Design &amp; Creative</h3>
                            <p>850+ Openings</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="card">
                        <div class="category-card">
                            <div class="cat-icon fs-5">📊</div>
                            <h3>Data &amp; Analytics</h3>
                            <p>620+ Openings</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card">
                        <div class="category-card">
                            <div class="cat-icon fs-5">📈</div>
                            <h3>Digital Marketing</h3>
                            <p>490+ Openings</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="card">
                        <div class="category-card">
                            <div class="cat-icon fs-5">🛡️</div>
                            <h3>Cyber Security</h3>
                            <p>310+ Openings</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="card">
                        <div class="category-card">
                            <div class="cat-icon fs-5">🤝</div>
                            <h3>Human Resources</h3>
                            <p>270+ Openings</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- featured section start -->
    <section class="featured-section section-space" id="featured-jobs">
        <div class="container">
            <div class="row g-4">
                <div class="col-12">
                    <div class="section-heading featured-heading">
                        <div>
                            <span class="eyebrow">Handpicked for you</span>
                        <h2>Featured Job Openings</h2>
                            <p>Top roles from companies hiring right now.</p>
                        </div>
                        <a href="#" class="text-link">View all jobs <i class="fa-solid fa-arrow-right"></i></a>
                    </div>
                </div>
                <div class="col-12 d-flex justify-content-center align-items-center">
                    <article class="card foot-card">
                        <div class="footer-card">
                            <div class="company-logo logo-purple">S</div>
                            <div class="job-info w-100">
                                <div class="job-header">
                                    <div>
                                        <h3 class="job-title">Senior Full Stack Engineer</h3>
                                        <div class="company-name">Stripe • Bengaluru (Hybrid)</div>
                                    </div>
                                    <span class="match-badge">98% Skill Match</span>
                                </div>
                                <div class="job-tags d-flex">
                                    <span class="tag">Full Time</span>
                                    <span class="tag">React</span>
                                    <span class="tag">Node.js</span>
                                    <span class="tag">TypeScript</span>
                                </div>
                                <div class="job-footer d-flex justify-content-between">
                                    <span class="salary">₹24,00,000 - ₹35,00,000 /yr</span>
                                    <button class="btn btn-success">Apply Now</button>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
                <div class="col-12 d-flex justify-content-center align-items-center">
                    <article class="card foot-card">
                        <div class="footer-card">
                            <div class="company-logo logo-blue">F</div>
                            <div class="job-info w-100">
                                <div class="job-header">
                                    <div>
                                        <h3 class="job-title">Lead Product Designer (UI/UX)</h3>
                                        <div class="company-name">Figma • Remote (India)</div>
                                    </div>
                                    <span class="match-badge">92% Skill Match</span>
                                </div>
                                <div class="job-tags d-flex">
                                    <span class="tag">Remote</span>
                                    <span class="tag">Figma</span>
                                    <span class="tag">Design Systems</span>
                                    <span class="tag">UX Research</span>
                                </div>
                                <div class="job-footer d-flex justify-content-between">
                                    <span class="salary">₹18,00,000 - ₹28,00,000 /yr</span>
                                    <button class="btn btn-success">Apply Now</button>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
                <div class="col-12 d-flex justify-content-center align-items-center">
                    <article class="card foot-card">
                        <div class="footer-card">
                            <div class="company-logo logo-green">Z</div>
                            <div class="job-info w-100">
                                <div class="job-header">
                                    <div>
                                        <h3 class="job-title">DevOps &amp; Cloud Architect</h3>
                                        <div class="company-name">Zomato • Gurugram</div>
                                    </div>
                                    <span class="match-badge">85% Skill Match</span>
                                </div>
                                <div class="job-tags d-flex">
                                    <span class="tag">Full Time</span>
                                    <span class="tag">AWS</span>
                                    <span class="tag">Kubernetes</span>
                                    <span class="tag">CI/CD</span>
                                </div>
                                <div class="job-footer d-flex justify-content-between">
                                    <span class="salary">₹22,00,000 - ₹32,00,000 /yr</span>
                                    <button class="btn btn-success">Apply Now</button>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </div>   
    </section>
</main>
<?php
include 'includes/footer.php';
?>
