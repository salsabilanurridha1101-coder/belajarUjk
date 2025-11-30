<?php
require_once "config/config.php";

$id = isset($_GET['edit']) ? $_GET['edit'] : '';
$selectReport = mysqli_query($config, "SELECT * FROM trans_orders WHERE id = '$id'");
$report = mysqli_fetch_assoc($selectReport);

// if (isset($_POST['simpan'])) {
//   $name   = $_POST['name'];
//   $link   = $_POST['link'];
//   $icon   = $_POST['icon'];
//   $order   = $_POST['order'];
//   $insert = mysqli_query($config, "INSERT INTO trans_orders (name, icon, link) VALUES ('$name', '$icon', '$link')");

//   header("location:?page=menu");
// }

if (isset($_POST['update'])) {
//   $name             = $_POST['name'];
  $customer         = $_POST['customer_id'];
  $orderCode        = $_POST['order_code'];
  $orderStatus      = $_POST['order_status'];
  $orderPay         = $_POST['order_pay'];
  $orderChange      = $_POST['order_change'];
  $orderTax         = $_POST['order_tax'];
  $orderTotal       = $_POST['order_total'];

  $update = mysqli_query($config, 
    "UPDATE trans_orders SET 
    --   name='$name', 
      customer_id='$customer', 
      order_code='$orderCode', 
      order_status='$orderStatus', 
      order_pay='$orderPay', 
      order_change='$orderChange', 
      order_tax='$orderTax', 
      order_total='$orderTotal'
    WHERE id='$id'"
  );

  header("location:?page=report");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=
  , initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <div class="row">
    <div class="col-sm-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title" ><?php echo isset($_GET['edit']) ? 'Update' : 'Tambah '?> Report</h3>
          <div class="card-body">
            <form action="" method="post">
              <!-- <label for="" class="form-label">Name</label><br>
              <input placeholder="Isi nama Menu" type="text" class="form-control w-50 mb-2" name="name" value="<?php echo $report['name'] ?? '' ?>"> -->
              <label for="" class="form-label">Customer</label><br>
              <input placeholder="Isi Icon" type="text" class="form-control w-50 mb-2" name="customer_id" value="<?php echo $report['customer_id'] ?? '' ?>" readonly>
              <label for="" class="form-label">Order Code</label><br>
              <input placeholder="Isi Link" type="text" class="form-control w-50 mb-2" name="order_code" value="<?php echo $report['order_code'] ?? '' ?>" readonly>
              <label for="" class="form-label">Order Status</label><br>
              <input placeholder="Isi nama Order" type="number" class="form-control w-50 mb-2" name="order_status" value="<?php echo $report['order_status'] ?? '' ?>">
              <label for="" class="form-label">Order Pay</label><br>
              <input placeholder="Isi nama Menu" type="text" class="form-control w-50 mb-2" name="order_pay" value="<?php echo $report['order_pay'] ?? '' ?>" readonly>
              <label for="" class="form-label">Order Change</label><br>
              <input placeholder="Isi Icon" type="text" class="form-control w-50 mb-2" name="order_change" value="<?php echo $report['order_change'] ?? '' ?>" readonly>
              <label for="" class="form-label">Order Tax</label><br>
              <input placeholder="Isi Link" type="text" class="form-control w-50 mb-2" name="order_tax" value="<?php echo $report['order_tax'] ?? '' ?>" readonly>
              <label for="" class="form-label">Order Total</label><br>
              <input placeholder="Isi nama Order" type="text" class="form-control w-50 mb-2" name="order_total" value="<?php echo $report['order_total'] ?? '' ?>" readonly>
              <button class="btn btn-primary" type="submit" name="<?php echo isset($_GET['edit']) ? 'update' : 'simpan' ?>"><?php echo isset($_GET['edit']) ? 'Edit' : 'Create' ?></button>
              <a href="?page=report" class="btn btn-secondary">Back</a>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>