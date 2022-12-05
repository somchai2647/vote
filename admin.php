<?php
session_start();
require_once "./services/conn.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>จัดการการเลือกตั้ง</title>
</head>

<body>
    <center>
        <h2>ฟอร์มเพิ่มผู้สมัครการเลือกตั้ง</h2>
        <form action="./services/admin.service.php" method="post" enctype="multipart/form-data">
            <input type="text" name="id" id="id" placeholder="หมายเลขบัตรประชาชนผู้สมัคร" required> <br>
            <input type="text" name="name" id="name" placeholder="ชื่อ นามสกุล" required> <br>
            <input type="number" name="number" id="number" placeholder="หมายเลขการเลือกตั้ง" required> <br>
            <input type="number" name="year" id="year" placeholder="ประจำปีการเลือกตั้ง" required> <br>
            <textarea name="description" id="description" cols="23" rows="3" placeholder="รายละเอียด"></textarea><br>
            <input type="file" name="photo" id="photo" accept="image/*"><br>
            <button type="submit" name="add">บันทึก</button>
        </form>
        <hr>
        <h2>รายชื่อผู้สมัครเลือกตั้งประจำปี</h2>
        <table border="1" width="100%">
            <thead>
                <th>รหัสประจำตัวประชาชน</th>
                <th>หมายเลข</th>
                <th>ชื่อ นามสกุล</th>
                <th>รูปภาพ</th>
                <th>ปีการเลือกตั้ง</th>
                <th>ตัวเลือก</th>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM candidate";
                $result = $conn->query($sql);
                while ($rows = $result->fetch_assoc()) { ?>
                    <tr align="center">
                        <td><?php echo $rows["id"] ?></td>
                        <td><?php echo $rows["number"] ?></td>
                        <td><?php echo $rows["name"] ?></td>
                        <td>
                            <img src="./upload/<?php echo $rows["photo"] ?>" width="128px">
                        </td>
                        <td><?php echo $rows["year"] ?></td>
                        <td>
                            <a href="">แก้ไข</a> | <a href="">ลบ</a>
                        </td>
                    </tr>
                <?php }
                ?>

            </tbody>
        </table>
    </center>
</body>

</html>