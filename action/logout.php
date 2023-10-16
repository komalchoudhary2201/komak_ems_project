<?php
    session_start();

    if(isset($_SESSION["login_status"]) && $_SESSION["login_status"]){
        session_destroy();
        header("Location: ../index.php");
        // echo "hi";
    }else{                        

        header("Location: ../index.php");
    }
?>