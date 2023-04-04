<?php session_start()?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bang san pham</title>
</head>

<body>
    <table border="1">
        <h1>Bảng thành viên</h1>

        <head>
            <tr>
                <td>Tài khoản</td>
                <td>Mật khẩu</td>
                <td>Ghi chú</td>
                <td>Ảnh</td>
                <td>Hoạt Động</td>
            </tr>
        </head>

        <body>
            <?php
            include 'ketnoi.php';
            $ketnoi = "SELECT* FROM sinhvien ORDER BY taikhoan,matkhau,ghichu,anh";
            $ketqua = mysqLi_query($conn, $ketnoi);
            while ($row=mysqli_fetch_assoc($ketqua)) {
            ?>
                <tr>
                    <td><?php echo $row["taikhoan"] ?></td>
                    <td><?php echo $row["matkhau"] ?></td>
                    <td><?php echo $row["ghichu"] ?></td>
                    <td><img src='<?php echo $row["anh"] ?>' alt="" width="200px" height="100px"></td>
                    <td>
                        <a href="xoa.php?id=<?php echo $row['id'] ?>&hinhanh=<?php echo $row['anh'] ?>">xÓA</a>
                        <a href="sua.php?sua=<?php echo $row['id'] ?>">Sửa</a>

                    </td>

                </tr>
            <?php

            }

            ?>

        </body>
    </table>
    <br>
    <a href="login.php">THÊM</a>
</body>

</html>