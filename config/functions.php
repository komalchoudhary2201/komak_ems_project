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
?>