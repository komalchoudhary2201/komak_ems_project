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
          <li class="breadcrumb-item"><a href="class.php">class</a></li>
          <li class="breadcrumb-item active"><?= isset($_GET["user_class"])? $_GET["user_Class"]:"all class" ?></li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">class list</h5>
              
              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th>id</th>
                    <th>Name</th>
                    <th>class</th>
                    <th>create_at</th>
                    <th>update_at</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $user_CLASS= "select * from user_class";
                      $res = $conn->query($user_CLASS);
                      if($res->num_rows >= 1){
                        $sr = 1;
                        while($row = $res->fetch_assoc()){?>
                          <tr>
                            <th><?= $sr++; ?></th>
                            <td><?= $row["class_name"];?></td>
                            <td><?= $row["section"];?></td>
                            <td><?= $row["date"];?></td>
                            <td><?= $row["date"];?></td>
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
<?php
  // $abc = date('y-m-d');
  // echo $abc;
?>
        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
 <?php include_once("includes/footer.php")?>