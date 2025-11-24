<?php
$id = isset($_GET['edit']) ? $_GET['edit'] : '';
$selectLevel = mysqli_query($config, "SELECT * FROM levels WHERE id = '$id'");
$level = mysqli_fetch_assoc($selectLevel);

if (isset($_POST['simpan'])) {
    $level = $_POST['name'];
    $insert = mysqli_query($config, "INSERT INTO levels (name) VALUES ('$level')");
    header("location:?page=level");
}
if (isset($_POST['update'])) {
    $level = $_POST['name'];
    $update = mysqli_query($config, "UPDATE levels SET name ='$level' WHERE id = '$id'");
    header('location:?page=level');
}
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $q_delete = mysqli_query($config, "DELETE FROM levels WHERE id = $id");
    header("location:?page=level");
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
                    <h1><?php echo isset($_GET['edit']) ? 'Update Level' : 'Tambah Level' ?> Update</h1><br>
                    <form action="" method="post">
                        <label for="" class="form-label">Level Name *</label><br>
                        <input type="text" class="form-control w-50" name="name" value="<?php echo $level['name'] ?? '' ?>"><br><br>
                        <button type="submit" class="btn btn-primary" name="<?php echo isset($_GET['edit']) ? 'update' : 'simpan' ?>"> <?php echo isset($_GET['edit']) ? 'Edit' : 'Create' ?> </button>
                        <a href="?page=level" class="btn btn-warning">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>