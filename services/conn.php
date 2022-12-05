<?php
$username = "root";
$password = "";
$host = "localhost";
$database = "vote";

$conn = new mysqli($host, $username, $password, $database); // สร้างตัวแปร $conn เพื่อเก็บค่าการเชื่อมต่อฐานข้อมูล

$conn->set_charset("utf8"); // กำหนด charset ให้ฐานข้อมูลเป็น utf8
// error_reporting(0); // ปิดการแจ้งเตือนข้อผิดพลาด

if (!$conn) {
    // ถ้าไม่สามารถเชื่อมต่อฐานข้อมูลได้ ให้แสดงข้อความ Connection failed: และแสดงข้อผิดพลาดที่เกิดขึ้น
    die("Connection failed: " . mysqli_connect_error());
}

//ฟังก์ชัน alert สำหรับแสดงข้อความและเปลี่ยนหน้า
function alert($msg, $location)
{
    echo "<script>alert('$msg');window.location.href='$location';</script>";
}
