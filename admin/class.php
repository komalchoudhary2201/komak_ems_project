<?php
include_once("includes/header.php");
?>
<!-- ======= Sidebar ======= -->
<?php include_once("includes/side_bar.php"); ?>
<?php
//for delete data==============================================================  
if (isset($_GET["del-class"])) {
  $class_id = $_GET["del-class"];

  try {
    $del_class = "delete from user_class where id=$id";
    $del_res = $conn->query($del_class);

    $msg["del_success"] = true;
  } catch (Exception $e) {
    print_r($e->getMessage());
    // die();
  }
}

//for add class=================================================================
// $res = false;
if (isset($_POST["add-class"])) {

  $class = $_POST["class-name"];
  $cls_qry = "insert into $user_class(class_name) values('$class_name')";
    try{
      $msg["res"] = $conn->query($cls_qry);
    }catch(Exception $e){
      $msg["res"] = $e->getcode();
    }
}

if(isset($_POST["add-class_section"])){
  $cls_id = $_POST["cls_id"];
  $sec_id = $_POST["sec_id"];

  try{
    $cls_sec_exists = "select * from $class_section where cls_id=$cls_id and sec_id=$sec_id";
    $msg["res"] = $exists_res = $conn->query($cls_sec_exists);
      if($exists_res->num_rows >=1){
        $msg["rec_exists"] = "this is already exists";
      }else{
        $class_sec = "insert into $class_Section(cls_id,sec_id) values($cls_id,$sec_id)";
        $msg["cls_sec_res"] = $conn->query($class_sec);
      }
  }catch(Exception $e){
      print_r($e->getMessage());
      $msg["add_cls_sec_error_code"] = $e->getCode();
  }
}
?>

<main id="main" class="main">
  <div class="pagetitle">
    <h1>users</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item"><a href="class.php">class</a></li>
        <li class="breadcrumb-item active"><?= isset($_GET["user_class"]) ? $_GET["user_class"] : "all class" ?></li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-9">
        <div class="card">
          <div class="card-body"> 
            <h5 class="card-title">class list</h5>
            <?= isset($msg["del-success"]) ? "data deleted" : ""; ?>
            <?php
            if (isset($msg["error"]["record_status"]) && $msg["error"]["record_status"] == false) {
              echo "record not found";
            } else if (isset($msg["del_success"])) {
              echo "data deleted";
            }
            ?>
            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                  <th>id</th>
                  <th>class</th>
                  <th>section</th>
                  <th>create_at</th>
                  <th>update_at</th>
                  <th>action</th>
                </tr>
              </thead>
              <tbody>  
                <?php
                //for data insert in table=======================================================
                $class_sec = "SELECT user_class.id , user_class.class_name , user_section.section 
                                from user_class 
                                INNER JOIN class_section ON user_class.id = class_section.class_id
                                INNER JOIN class_section ON class_section.section_id = user_section.id
                              ";
                              $result = $conn->query($class_sec);
                              if($result){
                                echo"chl rhah";
                              }else{
                                echo"nhi chl rha";
                              }
                                  // print_r($conn->query($class_sec));
                                  
                                    // if($result->num_rows > 0){
                                    //    echo "hello";
                                    // }else{
                                    //   echo"hy";
                                    // }
                      // if($class_sec){
                      //   $sr=1;
                      //   $i=0;
                      //   while($row = $result->fetch_assoc()){?>
                      <!-- //     <tr> -->
                      <!-- //       <td><?= $sr++ ?></td> -->
                      <!-- //       <td><?= $row["class_name"] ?></td> -->
                      <!-- //       <td><?= $row["section"] ?></td> -->
                      <!-- //       <td>edit /  -->
                      <!-- //           <a href="class.php?del-class=<?= $row["id"] ?>">del</a> -->
                      <!-- //       </td> -->
                      <!-- //     </tr> -->
                           <?php 
                      //       $i++; 
                      //   }
                      // }
                      //     ?>  
              </tbody>
            </table>
            <!-- End Table with stripped rows -->

          </div>
        </div>
      </div>
      <div class="col-lg-3">
        <div class="card-body">
          <div class="pt-4 pb-2">
            <h5 class="card-title text-center pb-0 fs-4">Add class</h5>
                <?php
                    //for showing massage===============================================
                        if (isset($msg["success"]["class_added"])) { ?>
                          <span class="text-success"><?= $msg["success"]["class_added"] ?></span>
                        <?php } else if (isset($msg["error"]["duplicate"])) { ?>
                          <span style="color:orange"><?= $msg["error"]["duplicate"] ?></span>
                        <?php } else if (isset($msg["error"]) && $msg["error"] == 1054) { ?>
                          <span class="text-danger">something went wrong</span>
                        <?php }
                ?>
            <form class="row g-3 needs-validation" novalidate method="post">
              <div class="col-12  mt-5">
                <input type="text" name="class-name" class="form-control" placeholder="class" value="<?= isset($class) ? $class : "" ?>">
                  <?php
                    if (isset($msg["error"]["class-name"])) { ?>
                      <small><?= $msg["error"]["class-name"] ?></small>
                    <?php } ?>
              </div>
              <div class="card-footer">
                <button name="add-class" class="btn btn-sm btn-primary w-100" type="submit">Add class</button>
              </div>
            </form>
          </div>
              
          <div class="card">
              <div class="card-header">
                  <h3 class="card-title">new class</h3>
                  <?php
                    //for showing massage===============================================
                        if (@$msg["cls_sec_res"] == "1") { ?>
                          <span class="text-success">class added</span>
                        <?php }else if(@$msg["rec_exists"]) { ?>
                          <span style="color:orange"><?= $msg["rec_exists"] ?></span>
                        <?php }else if(@$msg["add_cls_sec_error_code"] = 1054) { ?>
                          <span class="text-danger">something went wrong</span>
                        <?php } ?>
              </div>
                    <form method="post">
                          <div class="card-header">
                            <select class="form-control form-control-sm mt-3" name="cls_id">
                                <?php 
                                    // $data = all_records($user_class);
                                    //   while($row = $data->fetch_assoc()){ ?>
                                    //       <option value="<?= $row["id"] ?>"><?= $row["class_name"] ?></option>
                                    //   <?php 
                                    // }
                                ?>
                            </select>
                            <?php
                              if(@$msg["error"]["class"]){ ?>
                                <small class="text-danger">class required</small>
                              <?php }
                            ?>
                            <select class="form-control form-control-sm mt-3" name="sec_id">
                                <?php 
                                    $data = all_records($user_section);
                                      while($row = $data->fetch_assoc()){ ?>
                                          <option value="<?= $row["id"] ?>"><?= $row["section"] ?></option>
                                      <?php }
                                ?>
                            </select>
                          </div>
                          <div class="card-footer">
                            <button type="submit" name="add_class_Section" class="btn btn-sm btn-primary">section assign</button>
                          </div>
                    </form>

          </div>
        </div>
      </div>
    </div>
  </section>

</main><!-- End #main -->

<!-- ======= Footer ======= -->
<?php include_once("includes/footer.php") ?>