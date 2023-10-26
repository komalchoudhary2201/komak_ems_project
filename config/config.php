<?php
    define("host","localhost");
    define("user","root");
    define("password","");
    define("database","komal");

    try{
        $conn = new mysqli(host , user , password , database);
            
            
        
            // echo"chal rha h";
    }catch(exception $e){
            print_r($e->getMessage());
                die("<br>connection failed");
    }

    include_once("table.php");
?>
