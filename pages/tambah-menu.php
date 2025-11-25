<?php
$id = isset($_GET['edit']) ? $_GET['edit'] : '';
$selectMenu = mysqli_query($config, "SELECT * FROM menus WHERE id = '$id'");
$menus = mysqli_fetch_assoc($selectMenu);

if (isset($_POST['simpan'])) {
    $name = $_POST['name'];
    $icon = $_POST['icon'];
    $link = $_POST['link'];
    $order = $_POST['order'];
    $insert =  mysqli_query($config, "INSERT INTO menus (name, icon, link, order) VALUES ('$name', '$icon', '$link', '$order')");
    header("location:?page=menu");
}
if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $icon = $_POST['icon'];
    $link = $_POST['link'];
    $order = $_POST['order'];
    $update = mysqli_query($config, "UPDATE menus SET name='$name', icon='$icon', link='$link', `order`='$order' WHERE id = '$id'");
    header('location:?page=menu');
}
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $q_delete = mysqli_query($config, "DELETE FROM menus WHERE id = $id");
    header("location:?page=menu");
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
                    <h1><?php echo isset($_GET['edit']) ? 'Update Menu' : 'Tambah Menu' ?></h1><br>
                    <form action="" method="post">
                        <div class="mb-3">
                            <label for="" class="form-label">Name</label><br>
                            <input type="text" class="form-control w-50" name="name" value="<?php echo $menus['name'] ?? '' ?>">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Icon</label><br>
                            <input type="text" class="form-control w-50" name="icon"  value="<?php echo $menus['icon'] ?? '' ?>"> <br>
                        </div>
                        <div class="mb-3">
                            <label for="link" class="form-label">Link</label>
                            <input type="text" class="form-control w-50" id="link" placeholder="tempelkan link" name="link" value="<?php echo $menus['link'] ?? '' ?>"><br>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Order</label>
                            <input type="text" class="form-control w-50" id="order" placeholder="enter" name="order" value="<?php echo $menus['order'] ?? '' ?>"><br>
                        </div>
                        <button type="submit" class="btn btn-primary" name="<?php echo isset($_GET['edit']) ? 'update' : 'simpan' ?>"> <?php echo isset($_GET['edit']) ? 'Edit' : 'Create' ?> </button>
                        <a href="?page=menu" class="btn btn-warning">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>