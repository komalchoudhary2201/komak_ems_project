<?php
  include_once("includes/header.php");
?>


  <!-- ======= Sidebar ======= -->
<?php include_once("includes/side_bar.php"); ?>  
<main id="main" class="main">
<div class="pagetitle">
  <h1>course</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">class</a></li>
        <li class="breadcrumb-item"><a href="courses.php">course</a></li>
        <li class="breadcrumb-item active"><?= isset($_GET["user_class"])? $_GET["user_Class"]:"all courses" ?></li>
      </ol>
    </nav>
</div><!-- End Page Title -->
<section class="section">
  <div class="row">
    <div class="col-lg-9">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">class list</h5>
                <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th>id</th>
                    <th>course name </th>
                    <th>course duration </th>
                    <th>category </th>
                    <th>thumnail </th>
                    <th>create_at</th>
                    <th>update_at</th>
                    <th>action</th>
                  </tr>
                </thead>
                <tbody>
                  
                </tbody>
              </table>
                <!-- End Table with stripped rows -->
            </div>
          </div>
        </div>
        <div class="col-3">
          <div class="card-body">
            <div class="pt-4 pb-2">
              <h5 class="card-title text-center pb-0 mb-3 fs-4">Add classs</h5>
                
                <form class="row g-3 needs-validation" novalidate method="post">
                  <div class="col-12  mt-5">
                    <input type="text" name="class-name" class="form-control">
                      <!-- <small class="text-danger"> class required </small> -->
                  </div>


                  <div class="col-12">
                      <button name="add-class" class="btn btn-sm btn-primary w-100" type="submit">Add</button>
                  </div>
                </form>
            </div>
          </div>
        </div>
  <div>
</section>

</main><!-- End #main -->

  <!-- ======= Footer ======= -->
 <?php include_once("includes/footer.php"); ?>