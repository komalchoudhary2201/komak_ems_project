<?php
  include_once("includes/header.php");
?>


  <!-- ======= Sidebar ======= -->
<?php include_once("includes/side_bar.php");?>  
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

  $res = false;
    if(isset($_POST["add-class"])){
      $class = $_POST["class-name"];
      $section = $_POST["section-name"];
      $msg["error"] = [];
      
      if($class == ""){
        $msg["error"]["class"] = true;
      }

      if($section == ""){
        $msg["error"]["section"] =true;
      }

      if(count($msg["error"])<=0){
          $add_class_qry = "insert into user_class(class_name,section) values('$class','$section')";
        try {
            $res = $conn->query($add_class_qry);
            unset($class);
            unset($section);
        } catch(Exception $e){
          $res = $e->getCode();
        }
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
<?php
  // $abc = date('y-m-d');
  // echo $abc;
?>
        </div>
        <div class="col-3">
          <div class="card-body">
            <div class="pt-4 pb-2">
              <h5 class="card-title text-center pb-0 fs-4">Add class</h5>
                <form class="row g-3 needs-validation" novalidate method="post">
                  <div class="col-12  mt-5">
                    <input type="text" name="class" class="form-control" placeholder="class" required>
                  </div>
                  <div class="col-12  mt-3">
                    <?php
                      $all_section = "select * from user_section";
                      $res = $conn->query($all_section);
                      if($res->num_rows >= 1){
                        $sr = 1; ?>
                          <select class="form-control form-control-sm mt-3">
                              <option value="">select section</option>
                              
                              <?php
                                  while($row = res->fetch_assoc()){
                                      if(isset($section_name) && $section_name == $row["section"]){?>
                                        <option value="<?= $section_name ?>" selected><?= $section_name ?></option>
                                <?php } else {?>
                                        <option value="<?= $row["section"] ?>"><?= $row["section"] ?></option>
                                <?php }
                                  }                                
                              ?>
                          </select>
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
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
 <?php include_once("includes/footer.php")?>