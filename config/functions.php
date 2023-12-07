<?php
    function all_records($table_name){
        global $conn;

        try{
            $qry = "select * from $table_name";
                $result = $conn->query($qry);

                if($result->num_rows >0){
                    return $result->fetch_all(MYSQLI_ASSOC);
                }else{
                    return false;
                }
        }catch(Exception $e){
            echo $e->getMessage();
                die;
        }
    }

    function all_rec_more1_tbl($tbl1 = 0 , $tbl1_id = 0 , $tbl2 = 0 , $tbl2_id = 0 , $tbl3 = 0 , $tbl3_id = 0 ){
        global $conn;

        try{
            $qry = "SELECT user_class.id , user_class.class_name , user_section.section 
                    from user_class 
                    INNER JOIN class_section ON class.id = class_section.cls_id
                    INNER JOIN section ON class_section.sec_id = section.id
                ";
                $result = $conn->query($qry);

                if($result->num_rows > 0){
                    return $result;
                }else{
                    return false;
                }
        }catch(Exception $e){
            echo $e->getMessage();
            die;
        }
    }

    if(@$_GET["action"] == "delete"){
        //delete section
        $id = $_GET["id"];
        $section_delete = "delete from $user_section where id='$id'";
        try{
            $conn->query($section_delete);
                if($conn->affected_rows > 0){
                    $msg["section_delete"] = true;
                }else{
                    $msg["record_exists"] = false;
                }
        }catch(Exception $e){
            $e->getcode();
                $msg["section_delete_error"] ="something went wrong"; 
        }
    }

    //edit
    if(@$_GET["action"] == "edit"){
        $id = $_GET["id"];
        $section_edit_qry = "select * from $user_section where id=$id";
        try{
            $row = $conn->query($section_edit_qry);
            echo"<pre>";
            print_r($conn);
            print_r($row->fetch_assoc());
            echo"</pre>";
        }catch(Exception $e){
            $e->getcode();          
        }
    }
?>