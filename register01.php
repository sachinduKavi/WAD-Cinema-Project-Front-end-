<!DOCTYPE html>
<html lang="en">
<?php 
    if(isset($_GET['message'])) {
       $message = $_GET['message'];
    } else {
        $message = "";
    }

?>
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta http-equiv="x-ua-compatible" content="ie=edge" />
  <title>Admin panel</title>

  <link rel="icon" href="img/mdb-favicon.ico" type="image/x-icon" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" />
  <link rel="stylesheet" href="css/bootstrap-login-form.min.css" />
</head>

<body>
  <!-- Start your project here-->
  <section class="vh-100" style="background-color: #9A616D;">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col col-xl-10">
          <div class="card" style="border-radius: 1rem;">
            <div class="row g-0">
              <div class="col-md-6 col-lg-5 d-none d-md-block" style="display:flex; justify-content: center; align-items: center;">
                <img
                  src="https://th.bing.com/th/id/R.87e87fa8cb1c4d332a64470d5c3acd89?rik=vuWahGaWKYN5CQ&riu=http%3a%2f%2fdli-eduventure.um.ac.id%2fassets%2fimg%2flogin.png&ehk=hPJNQY6rdxBzsCPJa9ahwTJgf6KEPNQdNr1lfqo1NTk%3d&risl=&pid=ImgRaw&r=0"
                  alt="login form"
                  class="img-fluid" style="border-radius: 1rem 0 0 1rem;"
                />
              </div>
              <div class="col-md-6 col-lg-7 d-flex align-items-center">
                <div class="card-body p-4 p-lg-5 text-black">
  
                  <form method="post" action="register02.php">
  
                    <div class="d-flex align-items-center mb-3 pb-1">
                      <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                      <span class="h1 fw-bold mb-0">Admin Panel</span>
                    </div>
  
                    <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Register Into Movie Assistant Panel</h5>
  
                    <div class="form-outline mb-4">
                      <input type="email" id="form2Example17" class="form-control form-control-lg" name="email" required/>
                      <label class="form-label" for="form2Example17">Email address</label>
                    </div>
                    
                    <div class="form-outline mb-4">
                      <input type="password" id="form2Example17" class="form-control form-control-lg" name="pass1" required/>
                      <label class="form-label" for="form2Example17">Reenter password</label>
                    </div>
  
                    <div class="form-outline mb-4">
                      <input type="password" id="form2Example27" class="form-control form-control-lg" name="pass2" required/>
                      <label class="form-label" for="form2Example27">Password</label>
                    </div>
                    
                    <div style="color: red">
                        <?php echo $message; ?>
                    </div>
  
                    <div class="pt-1 mb-4">
                      <button class="btn btn-dark btn-lg btn-block" type="submit">Next</button>
                    </div>
  
                    <a class="small text-muted" href="#!">Forgot password?</a>
                    <p class="mb-5 pb-lg-2" style="color: #393f81;">Already have an account ? <a href="loginPage.php" style="color: #393f81;">Login here</a></p>
                    <a href="#!" class="small text-muted">Terms of use.</a>
                    <a href="#!" class="small text-muted">Privacy policy</a>
                  </form>
  
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <script type="text/javascript" src="js/mdb.min.js"></script>
  <script type="text/javascript"></script>
</body>

</html>