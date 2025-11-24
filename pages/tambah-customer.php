<?php
$id = isset($_GET['edit']) ? $_GET['edit'] : '';
$selectCustomer = mysqli_query($config, "SELECT * FROM customers WHERE id = '$id'");
$customers = mysqli_fetch_assoc($selectCustomer);

if (isset($_POST['simpan'])) {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $insert =  mysqli_query($config, "INSERT INTO customers (name, phone, address) VALUES ('$name', '$phone', '$address')");
    header("location:?page=customer");
}
if (isset($_POST['update'])) {
   $name = $_POST['name'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $update = mysqli_query($config, "UPDATE customers SET name='$name', phone='$phone', address='$address' WHERE id = '$id'");
    header('location:?page=customer');
}
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $q_delete = mysqli_query($config, "DELETE FROM customers WHERE id = $id");
    header("location:?page=customer");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
</head>

<body>
    <div class="row">
        <div class="col-sm-12">
            <div class="card"><br>
                <div class="card-body">
                    <h1><?php echo isset($_GET['edit']) ? 'Update customer' : 'Tambah customer' ?></h1><br>
                    <form action="" method="post">
                        <label for="" class="form-label">Name</label><br>
                        <input type="text" class="form-control w-50" name="name" value="<?php echo $customers['name'] ?? '' ?>">
                        <label for="" class="form-label">Phone</label><br>
                        <input type="number" class="form-control w-50" name="phone" value="<?php echo $customers['phone'] ?? '' ?>"> <br>
                        <label for="" class="form-label">Address</label><br>
                        <input type="text" class="form-control w-50" name="address" value="<?php echo $customers['address'] ?? '' ?>"><br>
                        <button type="submit" class="btn btn-primary" name="<?php echo isset($_GET['edit']) ? 'update' : 'simpan' ?>"> <?php echo isset($_GET['edit']) ? 'Edit' : 'Create' ?> </button>
                        <a href="?page=customer" class="btn btn-warning">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>