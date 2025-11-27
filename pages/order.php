<?php
// require_once 'config/config.php';
$query = mysqli_query($config, "SELECT c.name, `to`.* FROM trans_orders `to` LEFT JOIN customers c ON c.id = to.customer_id ORDER BY to.id DESC");
$rows = mysqli_fetch_all($query, MYSQLI_ASSOC);



if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    if (file_exists($filePath)) {
        unlink($filePath);
    }
    $delete = mysqli_query($config, "DELETE FROM products WHERE id = $id");
    if ($delete) {
        header("location:?page=product");
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
</head>

<body>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body"><br>
                    <h1 class="card-title">Data Product</h1>
                    <div align='right' class="d-flex-justify-content-end p-2">
                        <a href="pos/add-order.php" class="btn btn-outline-primary"><i class="bi bi-plus-circle"></i> Add POS</a>
                    </div>
                    <table class="table table-bordered  text-center table-striped">
                        <tr>
                            <th>No</th>
                            <th>Order Code</th>
                            <th>Order End Date</th>
                            <th>Order Tax</th>
                            <th>Order Pay</th>
                            <th>Order Change</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        <?php foreach ($rows as $key => $v) {
                        ?>
                            <tr>
                                <td><?php echo $key + 1 ?></td>
                                <td><?php echo $v['order_code'] ?></td>
                                <td><?php echo $v['order_end_date'] ?></td>
                                <td><?php echo $v['order_total'] ?></td>
                                <td><?php echo $v['order_tax'] ?></td>
                                <td><?php echo $v['order_pay'] ?></td>
                                <td><?php echo $v['order_change'] ?></td>
                                <td><?php echo $v['order_status'] ?></td>
                                <td>
                                    <a href="?page=tambah-product&edit=<?php echo $v['id'] ?>" class="btn btn-outline-warning"><i class="bi bi-pencil"></i></a>
                                    <a href="?page=product&delete=<?php echo $v['id'] ?>" class="btn btn-outline-danger" onclick="return confirm('really wnna delete??')"><i class="bi bi-trash"></i></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>
        </div>
    </div>

</body>

</html>