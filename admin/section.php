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
          <li class="breadcrumb-item"><a href="section.php">section</a></li>
          <li class="breadcrumb-item active"><?= isset($_GET["user_section"])? $_GET["user_section"]:"all section" ?></li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">section list</h5>
              
              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th>id</th>
                    <th>section_Name</th>
                    <th>create_at</th>
                    <th>update_at</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $user_SECTION= "select * from user_section";
                      $res = $conn->query($user_SECTION);
                      if($res->num_rows >= 1){
                        $sr = 1;
                        while($row = $res->fetch_assoc()){?>
                          <tr>
                            <th><?= $sr++; ?></th>
                            <td><?= $row["section"];?></td>
                            <td><?= $row["date"];?></td>
                            <td><?= $row["date"];?></td>
                            <td></td>
                            <td></td>
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