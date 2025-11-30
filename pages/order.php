<?php
require_once 'inc/functions.php';
checkLogin();

$query = mysqli_query($config, "SELECT c.name, `to`.* FROM trans_orders `to`
LEFT JOIN customers c ON c.id = `to`.customer_id 
ORDER BY `to`.id DESC");
$rows = mysqli_fetch_all($query, MYSQLI_ASSOC);



if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    // if (file_exists($filePath)) {
    //     unlink($filePath);
    // }
    $delete = mysqli_query($config, "DELETE FROM trans_orders WHERE id = $id" );
    if ($delete) {
        header("location:?page=order");
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
                    <h1 class="card-title">History Transaction</h1>
                    <div align='right' class="d-flex-justify-content-end p-2">
                        <a href="pos/add-order.php" class="btn btn-primary"><i class="bi bi-plus-circle"></i> Add Order</a>
                    </div>
                    <table class="table table-bordered  text-center table-striped">
                        <tr>
                            <th>No</th>
                            <th>Order Code</th>
                            <th>Order End Date</th>
                            <th>Order Amount</th>
                            <th>Order Tax</th>
                            <th>Order Pay</th>
                            <th>Order Change</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                        <?php foreach ($rows as $key => $v) {
                        ?>
                            <tr>
                                <td><?php echo $key + 1 ?></td>
                                <td><?php echo $v['order_code'] ?></td>
                                <td><?php echo $v['order_end_date'] ?></td>
                                <td><?php echo number_format($v['order_total'], 0, ',', '.'); ?></td>
                                <td><?php echo number_format($v['order_tax'], 0, ',', '.'); ?></td>
                                <td><?php echo number_format($v['order_pay'], 0, ',', '.'); ?></td>
                                <td><?php echo number_format($v['order_change'], 0, ',', '.'); ?></td>
                                <td><?php echo $v['order_status'] ?></td>
                                <td>
                                    <a href="pos/print.php?id=<?php echo $v['id'] ?>" class="btn btn-outline-warning"><i class="bi bi-printer"></i></a>
                                    <a href="?page=order&delete=<?php echo $v['id'] ?>" class="btn btn-outline-danger" onclick="return confirm('really wnna delete??')"><i class="bi bi-trash"></i></a>
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