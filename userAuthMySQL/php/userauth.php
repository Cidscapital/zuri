<?php

require_once "../config.php";

//register users
function registerUser($fullnames, $email, $password, $gender, $country){
    //create a connection variable using the db function in config.php
    $conn = db();
   //check if user with this email already exist in the database
    $sql_e = "SELECT * FROM Students WHERE email = '$email'";
    $result_e = $conn->query($sql_e);

    if($result_e->num_rows > 0){
        echo "User already exist";
    }else{
        //insert the user details into the database
        $sql_i = "INSERT INTO Students (full_names, country, email, gender, password) VALUES ('$fullnames', '$country', '$email', '$gender', '$password')";
        $result_i = $conn->query($sql_i);
        print_r($result_i);
        header("Location: /forms/login.html");
        exit();
}
}


//login users
function loginUser($email, $password){
    //create a connection variable using the db function in config.php
    $conn = db();

    //open connection to the database and check if email exist in the database
    $sql_u = "SELECT * FROM Students WHERE email = '$email'";
    $result_u = $conn->query($sql_u);
    //if it does, check if the password is the same with what is given
    $sql_p = "SELECT * FROM Students WHERE password = '$password'";
    $result_p = $conn->query($sql_p);
    

    //if true then set user session for the user and redirect to the dasbboard
    if($result_u->num_rows > 0 && $result_p->num_rows > 0){
        // Starting session
        session_start();
        // Storing session data
        $_SESSION['email'] = $email;
        header("Location: /dashboard.php");
        exit();
    }else{
       echo "Invalid email or password";
    }
}


function resetPassword($email, $password){
    //create a connection variable using the db function in config.php
    $conn = db();

    //open connection to the database and check if email exist in the database
    $sql_r = "SELECT * FROM Students WHERE email = '$email'";
    $result_r = $conn->query($sql_r);
    //if it does, replace the password with $password given
    if($result_r->num_rows > 0){
        $sql_a = "UPDATE Students SET password = '$password' WHERE email == '$email'";
        $result_a = $conn->query($sql_a);
        header("Location: /forms/login.html");
        exit();
    }else{
        echo "User does not exist";
    }
}


function getusers(){
    $conn = db();
    $sql = "SELECT * FROM Students";
    $result = mysqli_query($conn, $sql);
    echo"<html>
    <head></head>
    <body>
    <center><h1><u> ZURI PHP STUDENTS </u> </h1> 
    <table border='1' style='width: 700px; background-color: magenta; border-style: none'; >
    <tr style='height: 40px'><th>ID</th><th>Full Names</th> <th>Email</th> <th>Gender</th> <th>Country</th> <th>Action</th></tr>";
    if(mysqli_num_rows($result) > 0){
        while($data = mysqli_fetch_assoc($result)){
            //show data
            echo "<tr style='height: 30px'>".
                "<td style='width: 50px; background: blue'>" . $data['id'] . "</td>
                <td style='width: 150px'>" . $data['full_names'] .
                "</td> <td style='width: 150px'>" . $data['email'] .
                "</td> <td style='width: 150px'>" . $data['gender'] . 
                "</td> <td style='width: 150px'>" . $data['country'] . 
                "</td>
                <form action='action.php' method='post'>
                <input type='hidden' name='id'" .
                 "value=" . $data['id'] . ">".
                "<td style='width: 150px'> <button type='submit', name='delete'> DELETE </button>".
                "</tr>";
        }
        echo "</table></table></center></body></html>";
    }
    //return users from the database
    //loop through the users and display them on a table
}

 function deleteaccount($id){
     $conn = db();
     //delete user with the given id from the database
        $sql_d = "DELETE FROM Students WHERE id = '$id'";
        $result_d = $conn->query($sql_d);
        header("Location: /dashboard.php");
 }
