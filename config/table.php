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
        // $srs ="delete table user_class";
            // $conn->query("drop table user_Class");

        // $data = 'insert into user_class(class_name,section) values("class 1","A"),
        //     ("class 2","A"),
        //     ("class 3","A"),
        //     ("class 4","B")
        // ';

        // $conn->query($data);

//FOR USER-SECTION============================================================
// $section_table = "create table if not exists user_section(
//     id int primary key auto_increment, 
//     section varchar(10) unique not null,
//     date timestamp default now()
// )";

// $conn->query($section_table);

//CLASS_SECTION TABLE
    $clasection ="create table if not exists class_Section(
        id int primary key auto_increment,
        cls_id int not null,
        sec_id int not null,
        foreign key(cls_id) reference user_class(id) on delete cascade, 
        foreign key(sec_id) reference user_section(id) on delete cascade 
    )engine==InnoDB";                               
    $conn->query($clasection);





//FOR COURSES================================================================
// $course_table = "create table if not exists user_courses(
//    int id primary key auto_increment,
//    course_name varchar(30) unique not null,
//    course_duration varchar(50),
//    category varchar(50),
//    thumnail varchar(255),
//    created_at timestamp default now(),
//    updated_at timestamp default now() 
// )";

// $data = 'insert into user_courses(course_name,course_duration,category,thumnail) values
//             ("web design","12 month","web design","C:\wamp64\www\komal_ems_project\admin\assets\img\messages-2.jpg"),
//             ("gst","5 month","tally","C:\wamp64\www\komal_ems_project\admin\assets\img\messages-2.jpg"),
//             ("python","3 month","programming","C:\wamp64\www\komal_ems_project\admin\assets\img\messages-2.jpg"),
//             ("c++","4 month","language","C:\wamp64\www\komal_ems_project\admin\assets\img\messages-2.jpg"),
//             ';
// $conn->query($course_table);
// $conn->query($data);


?>