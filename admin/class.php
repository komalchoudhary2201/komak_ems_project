<?php
  include_once("includes/header.php");
?>

  <!-- ======= Sidebar ======= -->
<?php include_once("includes/side_bar.php"); ?>  
<?php 
  if(isset($_GET["del-class"])){
      $class_id = $_GET["del-class"];
      
      try{
        $del_class = "delete from user_class where id=$class_id";
        $del_res = $conn->query($del_class);

        $msg["del_success"]=true;
      }catch(Exception $e){
        print_r($e->getMessage());
        die();
      }
  }
<<<<<<< HEAD
  
    $res = false;
=======

  
>>>>>>> b199a0b644d1d7cf1e431084b6ba21e7fe6a8f12
    if(isset($_POST["add-class"])){
      $section = $_POST["section-name"];
      $class = $_POST["class-name"];
      
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           
      
      // $section = "" ;
      $msg["error"] = [];
      
      if($class == ""){
        $msg["error"]["class-name"] = true;
      }

      if($section == ""){
        $msg["error"]["section-name"] =true;
      }
 
      if(count($msg["error"]) <=0){
        $add_class_qry = "insert into user_class(class_name,section) values('$class','$section')";
        try{
          $res = $conn->query($add_class_qry);
          unset($section);
          unset($class);
        }catch(Exception $e){
          $res = $e->getcode();
        }
      }
          // print_r($response->getCode());
      

      
          // if(count($msg["error"]) < 0){
        // $add_class_qry = "insert into user_class(class_name,section) values('$class','$section')";
        // $response = $conn->query($add_class_qry);
        // echo $conn->errno;
        // if($response){
          // $msg["class_added"] = true;
        // }else{
          // echo "not ok";
          // echo $conn->error;
          // echo $conn->connect_error;
          // echo $conn->getCode();
          // echo $conn->errno();
          // echo $response->errno();
          // echo "<pre>";
          // print_r($conn);
          // echo "</pre>";
          // echo $conn->errno;
          // echo $conn->errno;
          // $msg["error"] = $conn->errno;
          // echo "<pre>";
          // print_r($conn);
          // echo "</pre>";
        // }
      }
    // }  
    
   
?>
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
    <div class="col-lg-9">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">class list</h5>
            <?= isset($msg["del-success"])? "data deleted": "" ; ?>
              <?php 
                if(isset($msg["error"]["record_status"]) && $msg["error"]["record_status"] == false){
                  echo "record not found";
                }else if(isset($msg["del_success"])){
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
                                <td>edit/
                                  <a href="class.php?del-class=<?= $row["id"] ?>">del</a>
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
        <div class="col-3">
          <div class="card-body">
            <div class="pt-4 pb-2">
              <h5 class="card-title text-center pb-0 mb-3 fs-4">Add classs</h5>
                <?php
                  if(isset($msg["class_added"]) && $msg["class_added"] == true){?>
                      <span class="text-success">class added</span>
                  <?php }else if(isset($msg["error"]) && $msg["error"] == 1062){?>
                      <span style="color:orange">duplicate class</span>
                  <?php }else if(isset($msg["error"]) && $msg["error"] == 1054){?>
                      <span class="text-dark">something went wrong</span>
                  <?php }
                ?>
                <form class="row g-3 needs-validation" novalidate method="post">
                  <div class="col-12  mt-5">
                    <input type="text" name="class-name" class="form-control">
                    <?php 
                      if(isset($msg["error"]["class-name"])){?>
                        <small class="text-danger"> class required </small>
                      <?php }
                    ?>  
                    <!-- <small class="text-danger"> class required </small> -->
                  </div>


                  <div class="col-12  mt-2">
                    <?php
                      $total_section = "select * from user_section";
                      $res = $conn->query($total_section);
                      if($res->num_rows >=1){
                        $sr = 1;
                        while($row = $res->fetch_assoc()){?>
                          <input type="checkbox" id="section_id<?= $row["id"] ?>" name="section-name" value="<?= $row["id"] ?>">
                            <label for="section_id<?= $row["id"]?>"><?= $row["section"]?></label><br>
                        <?php }
                      }
                    ?>
                    <?php
                      if(isset($msg["error"]["section-name"])){?>
                        <small class="text-danger"> section required </small>
                      <?php }  
                    ?>
                    
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