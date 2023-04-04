<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="login.css">
    
</head>
<body>
    <?php 
    include 'ketnoi.php';
    $conn=mysqli_connect("localhost","root","","qlisinhvien");
    $id=$_GET['id'];
    $sql="SELECT*FROM sinhvien WHERE id='$id'";
    $ketqua=mysqli_query($conn,$sql);
    while($row=mysqli_fetch_assoc($ketqua)){
        $id=$row["id"];
        $tk=$row["ten"];
        $mk=$row["matkhau"];
        $ghi=$row["ghichu"];
    }
    ?>
    <form action="" method="post" enctype="multipart/form-data">
    </form><h2>thông tin sinh vien</h2>
    <br>
    <input type="text" placeholder="taikhoan" name="ten" value="<?php echo $taikhoan ?>">
    <br>
    <input type="number" placeholder="matkhau"  name="matkhau"value="<?php echo $matkhau ?>" >
    <br>
    <input type="text" placeholder="ghichu"  name="ghichu" value="<?php echo $ghichu ?>">
    <br>
    <input type="file" name="file_up" value="upload">
    <br>
    <button type="text" name="btn" value="login">Login</button>
    <?php
    $conn=mysqli_connect("localhost","root","","qlisinhvien") ;
    if(isset($_POST["btn"])){
        $tk = $_POST["ten"];
        $mk = $_POST["matkhau"];
        $ghi = $_POST["ghichu"];
        $sql="UPDATE sinhvien SET taikhoan='$taikhoan',matkhau='$matkhau',ghichu='$ghichu',anh='$anh' WHERE id='$id'";
        if(mysqli_query($conn,$sql)){
            header('location: login.php');

        }else{
            $ketqua="cap nhat thanh cong " .mysqli_error($conn);
        }
    }
    ?>
</body>
</html>