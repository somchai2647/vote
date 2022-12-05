<?php
session_start();
include_once "conn.php";

if (isset($_POST["Login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM user WHERE username = '$username' AND password = '$password' LIMIT 1";
    $result = $conn->query($sql); // สั่งให้ฐานข้อมูลทำงานตามคำสั่ง SQL
    
    if ($result->num_rows == 1) {

        $row = $result->fetch_assoc(); // ดึงข้อมูลจากฐานข้อมูลมาเก็บในตัวแปร $row
        $_SESSION["username"] = $row["username"];
        $_SESSION["role"] = $row["role"];

        if($row["role"]=="admin"){ // ถ้า role ของผู้ใช้เป็น admin ให้เปลี่ยนหน้าไปที่ admin.php
            header("Location: ../admin.php");
        }else{
            header("Location: ../vote.php");
        }
    } else {
        // header("Location: ../index.php");
        alert("❌ Username หรือ Password ไม่ถูกต้อง", "../index.php"); //function alert อยู่ในไฟล์ conn.php
    }
}
