<?php
  include_once("includes/header.php");
?>


  <!-- ======= Sidebar ======= -->
<?php include_once("includes/side_bar.php");?>  
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>users</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item"><a href="account.php">user</a></li>
          <li class="breadcrumb-item active"><?= isset($_GET["user"])? $_GET["user"]:"all users" ?></li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">user</h5>
              
              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th>id</th>
                    <th>Name</th>
                    <th>username</th>
                    <th>email</th>
                    <th>user_type</th>
                    <th>password</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    if(isset($_GET["user"])){
                      $user_type = $_GET["user"];
                      $users= "select * from user where user_type ='$user_type'";
                    }else{
                      $users = "select * from user";
                    }
                      $res = $conn->query($users);
                      if($res->num_rows >= 1){
                        $sr = 1;
                        while($row = $res->fetch_assoc()){?>
                          <tr>
                            <th><?= $sr++; ?></th>
                            <td><?= $row["name"];?></td>
                            <td><?= $row["username"];?></td>
                            <td><?= $row["email"];?></td>
                            <td><?= $row["user_Type"];?></td>
                            <td><?= $row["password"];?></td>
                          </tr>
                        <?php 
                        }
                      }
                  ?>
                  
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
 <?php include_once("includes/footer.php")?>