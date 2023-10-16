<?php

    $qry = "create table if not exists user(
            id int primary key auto_increment,
            name varchar(20),
            username varchar(15),
            email varchar(25) unique not null,
            password varchar(10),
            user_Type enum('teacher','student','parent','admin')        
        )";

    // $data ="insert into user(name,username,email,password,user_type) values('rahul','rahul@123','rahul@gmail.com','kuch bhi','admin')";
        $conn->query($qry); 
     
       
?>