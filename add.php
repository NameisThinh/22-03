<?php
include 'connect.php';

if (isset ($_POST['submit'])) {
  $MANV = $_POST['MANV'];
  $TENNV = $_POST['TENNV'];
  $GIOITINH = $_POST['image'];
  $NOISINH = $_POST['NOISINH'];
  $luong = $_POST['LUONG'];
  $MAPHONG = $_POST['MAPHONG'];

  $sql = "insert into `NHANVIEN` (MANV,Ten_NV,Phai,Noi_SINH,Luong,MaPhong) value('$MANV','$TENNV','$GIOITINH','$NOISINH','$luong','$MAPHONG')";

  $result = mysqli_query($con, $sql);
  if ($result) {
    header("location:index.php");
  } else {
    die (mysqli_error($con));
  }
}

?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

  <title>Hello, world!</title>
</head>

<body>
  <div class=" container m-5">
    <form method="post">
  </div>
  <div class="form-group">
    <label>MANV</label>
    <input type="text" class="form-control" name="MANV" autocomplete="off">

  </div>
  <div class="form-group">
    <label>TENNV</label>
    <input type="text" class="form-control" name="TENNV" autocomplete="off">

  </div>
  <div class="form-group">
    <label>GioiTin,h</label>
    <!-- <input type="file" name="image" accept="image/*" /> -->
    <input type="text" class="form-control" name="image" autocomplete="off">

  </div>
  <div class="form-group">
    <label>Luong</label>
    <input type="text" class="form-control" name="LUONG" autocomplete="off">

  </div>
  <div class="form-group">
    <label>NOISIN,H</label>
    <input type="text" class="form-control" name="NOISINH" autocomplete="off">

  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">MAP,HONG</label>
    <input type="text" class="form-control" name="MAPHONG" autocomplete="off">

  </div>

  <button type="submit" class="btn btn-primary" name="submit">Add </button>
  </form>

  <a href="index.php" class="text-primary"> Back</a>
</body>

</html>