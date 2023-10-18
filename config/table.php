<?php
//FOR USERS============================================================
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
    
//FOR USER-CLASS========================================================== 
    $class_table = "create table if not exists user_class(
        id int primary key auto_increment,
        class_name varchar(10),
        section varchar(10),
        date timestamp default now()
    )";
    $conn->query($class_table);

    

    // $data = 'insert into user_class(class_name,section) values("class 1","A"),
    //     ("class 2","A"),
    //     ("class 3","A"),
    //     ("class 4","B")
    // ';

    // $conn->query($data);

//FOR USER-SECTION============================================================
$section_table = "create table if not exists user_section(
    id int primary key auto_increment,
    section varchar(10) unique not null,
    date timestamp default now()
)";

$conn->query($section_table);

$data = 'insert into user_section(section) values("section A"),
    ("section B"),
    ("section C"),
    ("section D")
';

$conn->query($data);

?>