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
    <title>ลงคะแนนการเลือกตั้ง</title>
</head>

<body>
    <center>
        <h2>ลงคะแนนการเลือกตั้ง</h2>
        <table border="1" width="100%">
            <thead>
                <th>หมายเลข</th>
                <th>ชื่อ นามสกุล</th>
                <th>รูปภาพ</th>
                <th>รายละเอียด</th>
                <th>ลงคะแนนได้ 1 ท่าน</th>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM candidate";
                $result = $conn->query($sql);
                while ($rows = $result->fetch_assoc()) { ?>
                    <tr align="center">
                        <td><?php echo $rows["number"] ?></td>
                        <td><?php echo $rows["name"] ?></td>
                        <td>
                            <img src="./upload/<?php echo $rows["photo"] ?>" width="128px">
                        </td>
                        <td><?php echo $rows["description"] ?></td>
                        <td>
                            <form action="./services/vote.service.php" method="post">
                                <input type="hidden" name="username" value="<?php echo $_SESSION["username"] ?>" >
                                <input type="hidden" name="id" value="<?php echo $rows["id"]; ?>" >
                                <button type="submit" name="add">ลงคะแนนเสียง</button>
                            </form>
                        </td>
                    </tr>
                <?php }
                ?>

            </tbody>
        </table>
    </center>
</body>

</html>