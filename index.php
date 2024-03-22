<?php
include 'connect.php';


session_start();

// Kiểm tra vai trò của người dùng

?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="./index.css">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <title>Hello, world!</title>
</head>

<body>


  <?php if ($role === 'admin'): ?>
    <button type="submit" class="btn btn-primary" name="submit">
      <a href="add.php" class="text-light">Add user</a>
    </button>
  <?php endif; ?>


  <table class="table">
    <thead>
      <tr>
        <th scope="col">MaNV</th>
        <th scope="col">TenNV</th>
        <th scope="col">GioiTin,h</th>
        <th scope="col">NoISin,h</th>

        <th scope="col">lUONG</th>
        <th scope="col">TENP,HONG</th>
        <th scope="col">Action</th>

      </tr>
    </thead>
    <tbody>
      <?php
      $records_per_page = 5; // Số bản ghi muốn hiển thị trên mỗi trang
      
      $current_page = isset ($_GET['page']) ? $_GET['page'] : 1; // Trang hiện tại, mặc định là trang 1
      
      $start_from = ($current_page - 1) * $records_per_page; // Vị trí bắt đầu của bản ghi trên trang hiện tại
      
      $sql = "SELECT nhanvien.*, phongban.TenPhong FROM nhanvien LEFT JOIN phongban ON nhanvien.MAPHONG = phongban.MaPhong LIMIT $start_from, $records_per_page";
      $result = mysqli_query($con, $sql);
      $total_records = mysqli_num_rows(mysqli_query($con, "SELECT * FROM nhanvien")); // Tổng số bản ghi
      $total_pages = ceil($total_records / $records_per_page); // Tổng số trang
      
      if ($result) {
        while ($row = mysqli_fetch_array($result)) {

          $MANV = $row["MANV"];
          $TEN_NV = $row["Ten_NV"];
          $PHAI = $row["Phai"];

          $NOI_SINH = $row["Noi_SINH"];
          $LUONG = $row["Luong"];
          $MAPHONG = $row["TenPhong"];
          $gender = ($PHAI == 'NAM') ? '<img src="./man.png" alt="Nam" class="gender-icon">' : '<img src="./woman.png" alt="Nam" class="gender-icon">';
          echo '<tr>
            <th scope="row">' . $MANV . '</th>
            <td>' . $TEN_NV . '</td>
            <td>' . $gender . '</td>
            <td>' . $NOI_SINH . '</td>
            <td>' . $LUONG . '</td>
           <td>' . $MAPHONG . '</td>


       
            <td>
            <?php if ($role =="admin"): ?>
             <button class="btn btn-primary"><a href ="update.php?updateid=' . $MANV . '" class="text-light">Update</a></button>
              <button class="btn btn-danger"><a href="delete.php?deleteid=' . $MANV . '" class="text-light">Delete</a></button>
              <?php endif; ?>
          </td>
          </tr>';
        }
      }

      ?>


    </tbody>
  </table>
  <!-- Phân trang -->
  <nav aria-label="Page navigation">
    <ul class="pagination">
      <?php
      // Hiển thị các liên kết phân trang
      for ($i = 1; $i <= $total_pages; $i++) {
        echo '<li class="page-item"><a class="page-link" href="index.php?page=' . $i . '">' . $i . '</a></li>';
      }
      ?>
    </ul>
  </nav>
  <a href="logout.php"> logout</a>
</body>

</html>