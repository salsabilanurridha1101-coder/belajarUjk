<?php
require_once 'inc/functions.php';
checkLogin();
$customer_c = mysqli_query($config, "SELECT * FROM customers");
$customers = mysqli_fetch_all($customer_c, MYSQLI_ASSOC);
// var_dump($levels);
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $customer_c = mysqli_query($config, "DELETE FROM customers WHERE id = $id");
    header("location:?page=customer");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer</title>
</head>

<body>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Data Customer</h3>
                    <div align="right">
                        <a href="?page=tambah-customer" class="btn btn-outline-primary"><i class="bi bi-plus-circle"></i> Add Customer</a>
                    </div><br>
                    <table class="table table-bordered">
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Action</th>
                        </tr>
                        <?php
                        foreach ($customers as $key => $c) {
                        ?>
                            <tr>
                                <td><?php echo $key + 1 ?></td>
                                <td><?php echo $c['name'] ?></td>
                                <td><?php echo $c['phone'] ?></td>
                                <td><?php echo $c['address'] ?></td>
                                <td>
                                    <a class="btn btn-outline-success" href="?page=tambah-customer&edit=<?php echo $c['id'] ?>"> <i class="bi bi-pencil"></i></a>
                                    <form class="d-inline" action="?page=customer&delete=<?php echo $c['id'] ?>" method="post" onclick="return confirm('ingin menghapusnya?')">
                                        <button class="btn btn-outline-danger"><i class="bi bi-trash"></i></button>
                                    </form>
                                </td>
                            <?php
                        }
                            ?>
                    </table>
                </div>
            </div>
        </div>
    </div>

</body>

</html>