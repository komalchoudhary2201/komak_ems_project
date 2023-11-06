<?php
//FOR USERS============================================================
    $user = "create table if not exists user(
            id int primary key auto_increment,
            name varchar(20),
            username varchar(15),
            email varchar(25) unique not null,
            password varchar(10),
            user_Type enum('teacher','student','parent','admin')        
        )";

    // $data ="insert into user(name,username,email,password,user_type) 
    //             values('rohan','rohan123','rohan@gmail.com','hello','teacher'),
    //             ('sohan','sohan123','sohan@gmail.com','hello','student'),
    //             ('mohan','mohan123','mohan@gmail.com','mohan12','parent'),
    //             ('aman','aman123','aman@gmail.com','aman12','admin'),
    //             ('neetu','neetu123','neetu@gmail.com','hey','teacher'),
    //             ('admin','admin123','admin@gmail.com','admin12','admin')
    //                         ";
        $conn->query($user); 
    
//FOR USER-CLASS========================================================== 
    $class_table = "create table if not exists user_class(
        id int primary key auto_increment,
        class_name varchar(10) unique not null,
        section varchar(10),
        date timestamp default now()
    )";
    $conn->query($class_table);
    //     $srs ="delete table user_class";
            // $conn->query("drop table user_Class");

        // $data = 'insert into user_class(class_name,section) values("class 1","A"),
        //     ("class 2","A"),
        //     ("class 3","A"),
        //     ("class 4","B")
        // ';

        // $conn->query($data);

//FOR USER-SECTION============================================================
$section_table = "create table if not exists user_section(
    id int primary key auto_increment,vwqnbv 
    section varchar(10) unique not null,
    date timestamp default now()
)";

$conn->query($section_table);

// wn
?>