<?php
  include_once("includes/header.php");
?>
<!-- ======= Sidebar ======= -->
<?php include_once("includes/side_bar.php");?>  

<?php
//for section delete ===============================================================================
  if(isset($_GET["del-section"])){
    $section_id = $_GET["del-section"];
    
    try{
      $del_section = "delete from user_section where id=$section_id";
      $del_res = $conn->query($del_section);
        $msg["del_success"] = true;
    }catch(Exception $e){
      print_r($e->getMessage());
      die();
    }
  }
?>
<?php
  // for add section =======================================================
    $res = false;         
      if(isset($_POST["add-section"])){
              $section = $_POST["section"];
              $add_section = "insert into user_section(section) values('$section')";
              $msg["error"] = [];
             
                if($section == ""){
                  $msg["error"]["section"] =true;
                }
                
                try{
                  $res = $conn->query($add_section);
                  unset($_POST["add-section"]);
                }catch(Exception $e){
                   $res = $e->getcode(); 
                  }
            }
  ?>
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
        <div class="col-lg-9">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">section list</h5>
                <?= isset($msg["del-success"])? "data deleted": "" ; ?>
              
            
              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th>id</th>
                    <th>section_Name</th>
                    <th>create_at</th>
                    <th>update_at</th>
                    <th>action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  //for showing sections in table ==========================================================
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
                            <td>edit/
                                <a href="section.php?del-section=<?= $row["id"] ?>">del</a>    
                            </td>
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
        <div class="col-lg-3">
            <div class="card-body">
              <div class="pt-4 pb-2">
                  <h5 class="card-title text-center pb-0 fs-4">Add Section</h5>
                  <?php 
                      // if(isset($msg["error"]["section"]) && $msg["error"]["section"] == false){
                      //   echo "record not found";
                      // }else if(isset($msg["del_success"])){
                      //   echo "data deleted";
                      // }
                  ?>    
                  <form class="row g-3 needs-validation" novalidate method="post">
                      <div class="col-12  mt-5">
                          <input type="text" name="section" class="form-control" required>
                      </div>
                      <div class="col-12">
                        <button name="add-section" class="btn btn-sm btn-primary w-100" type="submit">Add</button>
                      </div>
                    </form>

              </div>
            </div>
        </div>
      </div>
  </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
 <?php include_once("includes/footer.php")?>