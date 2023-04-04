<?php session_start()?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> Xin Chao</title>
 <link rel="stylesheet" href="login.css">
</head>
<body >
  <div class="login">
    <form action="" method="post" enctype="multipart/form-data">
    <h2>thông tin sinh vien</h2>
    <input type="text" placeholder="taikhoan" name="ten">
    <input type="number" placeholder="matkhau"  name="matkhau" >
    <input type="text" placeholder="ghichu"  name="ghichu" >
    <input type="file" name="file_up" value="upload" >
    <button type="text" name="btn" value="login">Login</button>
    </form>
     <?php
        include 'ketnoi.php';
        if (isset($_POST["btn"])) {
            $tk = $_POST["ten"];
            $mk = $_POST["matkhau"];
            $ghi = $_POST["ghichu"];
            if (isset($_FILES['file_up'])) {
                $file = $_FILES["file_up"];
                $tenfile = $file["name"];
                move_uploaded_file($file["tmp_name"], $tenfile);
            }
                $conn = mysqli_connect("localhost", "root", "", "qlisinhvien") or die("connect fail!");
                $check_matkhau = "select*from sinhvien where matkhau='$mk'";
                $ketqua = mysqli_query($conn, $check_matkhau);
                $dem = mysqli_num_rows($ketqua);
                if ($dem > 0) {
                    echo "mat khau da ton tai";
                } else {
                    $sql = "INSERT INTO sinhvien (taikhoan,matkhau,ghichu, anh) values('$tk', '$mk','$ghi','$tenfile')";
                    if(mysqli_query($conn, $sql)) {
                        if(move_uploaded_file($file["tmp_name"],$tenfile)) {
                            echo "Thêm mới thành công !";
                        } else {
                            echo "Thêm mới thất bại";
                        }
                        header('location:them.php');
                    } 
                    else {
                        echo "Thêm mới thất bại";
                    }
                    

                }
        }
    ?> 
  </div>
</body>
</html>

