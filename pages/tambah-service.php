<?php
$id = isset($_GET['edit']) ? $_GET['edit'] : '';
$selectService = mysqli_query($config, "SELECT * FROM services WHERE id = '$id'");
$services = mysqli_fetch_assoc($selectService);

if (isset($_POST['simpan'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $insert =  mysqli_query($config, "INSERT INTO services (name, price, description) VALUES ('$name', '$price', '$description')");
    header("location:?page=services");
}
if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $update = mysqli_query($config, "UPDATE services SET name='$name', price='$price', description='$description' WHERE id = '$id'");
    header('location:?page=services');
}
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $q_delete = mysqli_query($config, "DELETE FROM services WHERE id = $id");
    header("location:?page=services");
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
                    <h1><?php echo isset($_GET['edit']) ? 'Update service' : 'Tambah service' ?></h1><br>
                    <form action="" method="post">
                        <label for="" class="form-label">Service Name</label><br>
                        <input type="text" class="form-control w-50" name="name" value="<?php echo $services['name'] ?? '' ?>">
                        <label for="" class="form-label">Price</label><br>
                        <input type="number" class="form-control w-50" name="price" min="0" step="0.01" value="<?php echo $services['price'] ?? '' ?>"> <br>
                        <label for="" class="form-label">Description</label><br>
                        <textarea name="description" class="form-control w-50" rows="5" cols="30"><?php echo $services['description'] ?? '' ?></textarea><br>
                        <button type="submit" class="btn btn-primary" name="<?php echo isset($_GET['edit']) ? 'update' : 'simpan' ?>"> <?php echo isset($_GET['edit']) ? 'Edit' : 'Create' ?> </button>
                        <a href="?page=services" class="btn btn-warning">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>