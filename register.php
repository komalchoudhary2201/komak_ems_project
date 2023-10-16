<?php
    include_once("include/header.php");
?>

<body>
  <?php
     $connt = mysqli_connect("localhost","root","","komal");
  ?>
  <?php
      if(isset($_POST["submit"])){
        $name = $_POST["name"];
        $email = $_POST["email"];
        $username = $_POST["username"];
        $password = $_POST["password"];
        $confirm_password = $_POST["confirm_password"];
        $msg["error"]=[];

        $sql = "select email , username from user where email='$email' or username='$username'";
          // $res = mysqli_query($connt,$sql);
        
        // if(mysqli_num_rows($res)>=1){
          
        //   $msg ="exists";
        // }else{
        //   $qry ="insert into user(name, email, username, password) values('$name','$email','$username','$password')";
        //       if(mysqli_query($connt,$qry)){
        //         $msg = "insert";
        //       }
        // }
          if($name == ""){
              $msg["error"]["name_empty"]=true;
          }

          if($email == ""){
              $msg["error"]["email_empty"]=true;
          }

          if($username == ""){
              $msg["error"]["username_empty"]=true;
          }

          if($password == ""){
            $msg["error"]["password"]=true;
          } 

          if($password!=$confirm_password){
            $msg["error"]["incorrect_password"]=true;
          }

          if(count($msg["error"]) <=0){
              try{
                $res = $conn->query($sql);
                  if($res->num_rows >= 1){
                    $msg["user_exists"] = true;
                  }else{
                    $qry = "insert into user(name,email,password) values('$name','$email','$password')";
                    try{
                      $res = $conn->query($qry);
                      $msg["new_user"] = true;
                    }catch(Exception $e){
                      print_r($e->getMassage());
                      die();
                    }
                  }

              }catch(Exception $d){
                print_r($e->getMassage());
                die();
              }
          }
      }
  ?> 

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="index.php" class="logo d-flex align-items-center w-auto">
                  <img src="assets/img/logo.png" alt="">
                  <span class="d-none d-lg-block">NiceAdmin</span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
                    <p class="text-center small">Enter your personal details to create account</p>
                    <?php
                      if(isset($msg["user_exists"])){
                      ?>  
                        <div class="text-center text-danger">
                            <?php  echo"Data Already Exists";?>
                        </div>
                      <?php
                      }else if(isset($msg["new_user"])){
                      ?>    
                        <div class="text-center text-success">
                          <?php  echo"Register Successfully";
                      
                          ?>
                        </div>
                      <?php
                      }
                    ?>
                  
                  </div>
                  <form class="row g-3 needs-validation" novalidate method="post">
                    <div class="col-12">
                      <label for="yourName" class="form-label">Your Name</label>
                      <input type="text" name="name" class="form-control" id="yourName" value="<?= isset($name)? $name:""?>">
                    </div>
                      <?php if(isset($msg["error"]["name_empty"])){?>
                        <div class="text-danger">Please, enter your name!</div>
                      <?php }?>
                    <div class="col-12">
                      <label for="yourEmail" class="form-label">Your Email</label>
                      <input type="email" name="email" class="form-control" id="yourEmail"  value="<?= isset($email)? $email:""?>">
                    </div>
                    <?php if(isset($msg["error"]["email_empty"])){?>
                        <div class="text-danger">Please, enter your valid email!</div>
                    <?php }?>
                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Username</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input type="text" name="username" class="form-control" id="yourUsername" value="<?= isset($username)? $username:""?>">
                      </div>
                    </div>
                    <?php if(isset($msg["error"]["username_empty"])){?>
                        <div class="text-danger">Please, enter your username!</div>
                    <?php }?>
                    
                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control" id="yourPassword" value="<?= isset($password)? $password:""?>">
                    </div>
                    <?php if(isset($msg["error"]["password"])){?>
                        <div class="text-danger">Please, enter your password!</div>
                    <?php }?>
                    
                    <div class="col-12">
                      <label for="yourPassword" class="form-label">confirm Password</label>
                      <input type="password" name="confirm_password" class="form-control" id="yourPassword" value="<?= isset($confirm_password)? $confirm_password:""?>">
                    </div>
                    <?php if(isset($msg["error"]["incorrect_password"])){?>
                        <div class="text-danger">Please, enter correct password!</div>
                    <?php }?>
                    
                    <div class="col-12">
                      <div class="form-check">
                        <input class="form-check-input" value="kuch-bhi" name="terms" type="checkbox" value="" id="acceptTerms" required>
                        <label class="form-check-label" for="acceptTerms">I agree and accept the <a href="#">terms and conditions</a></label>
                        <div class="invalid-feedback">You must agree before submitting.</div>
                      </div>
                    </div>
                    <div class="col-12">
                      <button class="btn btn-primary w-100" value="submit" name="submit" type="submit">Create Account</button>
                    </div>
                    <div class="col-12">
                      <p class="small mb-0">Already have an account? <a href="/login.php">Log in</a></p>
                    </div>
                  </form>

                </div>
              </div>

              <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>