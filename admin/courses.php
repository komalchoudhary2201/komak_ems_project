<?php include_once("includes/header.php"); ?>
  <!-- ======= Sidebar ======= -->
<?php include_once("includes/side_bar.php"); ?>  

  <main id="main" class="main">
<div class="pagetitle">
  <h1>course</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">class</a></li>
        <li class="breadcrumb-item"><a href="courses.php">course</a></li>
        <li class="breadcrumb-item active"><?= isset($_GET["user_courses"])? $_GET["user_courses"]:"all courses" ?></li>
      </ol>
    </nav>
</div><!-- End Page Title -->
<section class="section">
  <div class="row">
    <div class="col-lg-9">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">course list</h5>
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
                <tr>
              </thead>
              <tbody>
              </tbody>
            </table>
              <!-- End Table with stripped rows -->
        </div>
      </div>
    </div>
    <div class="col-3">
      <div class="card">
          <div class="card-header">
              <h3 class="card-title">add courses</h3>
          </div>
          <form method="post">
            <div class="card-body">
              <div class="form-group">
                <label class="font-weight-normal">course names</label>
                  <input type="text" class="form-control" placeholder="course name" name="course_name">
              </div>
        
              <div class="form-group mt-3">
                <label class="font-weight-normal">course duration</label>
                  <input type="text" class="form-control" placeholder="course duration">
              </div>

              <div class="form-group mt-3">
                <label class="font-weight-normal">course category</label>
                  <input type="text" class="form-control" placeholder="course catagory">
              </div>
            
              <div class="form-group mt-3">
                <label class="font-weight-normal">course thumnail</label>
                  <input type="text" class="form-control" placeholder="course thumnail">
              </div>
            </div>
              <button type="submit" name="add-course" class="btn btn-primary my-3 mx-4">add courses</button>
          </form>
      </div>
    </div>  
<div>
</section>

</main><!-- End #main -->

  <!-- ======= Footer ======= -->
 <?php include_once("includes/footer.php"); ?>