<?php

include 'connect.php';

if (isset ($_GET['deleteid'])) {
  $MANV = $_GET['deleteid'];

  $sql = "delete from `nhanvien` where MANV='$MANV'";

  $result = mysqli_query($con, $sql);
  if ($result) {
    header("location:index.php");
  }
}

?>