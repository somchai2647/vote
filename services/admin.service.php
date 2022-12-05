<?php
session_start();
require_once "conn.php";

if (isset($_POST["add"])) {
    $id = $_POST["id"];
    $name = $_POST["name"];
    $number = $_POST["number"];
    $year = $_POST["year"];
    $description = $_POST["description"];

    $filename = $_FILES["photo"]["name"];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    $new_filename = uniqid($id) . "." . $ext;
    try {
        $sql = "INSERT INTO candidate VALUES ('$id', '$number', '$name', '$description', '$new_filename', '$year')";
        $result = $conn->query($sql);

        if ($result) {
            move_uploaded_file($_FILES["photo"]["tmp_name"], "../upload/$new_filename");
            header("Location: ../admin.php");
        }
    } catch (\Throwable $th) {
        alert("❌ ไม่สามารถเพิ่มข้อมูลได้ หมายเลขบัตรประชาชนหรือลำดับซ้ำกัน", "../admin.php");
    }
}
