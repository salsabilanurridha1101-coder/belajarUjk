<?php
$menu_u = mysqli_query($config, "SELECT * FROM menus ORDER BY CAST(`order` AS UNSIGNED) ASC");
$menus = mysqli_fetch_all($menu_u, MYSQLI_ASSOC);
// var_dump($levels);
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $menu_u = mysqli_query($config, "DELETE FROM menus WHERE id = $id");
    header("location:?page=menu");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
</head>

<body>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Data Menu</h3>
                    <div align="right">
                        <a href="?page=tambah-menu" class="btn btn-outline-primary"><i class="bi bi-plus-circle"></i> Add Menu<menu></menu></a>
                    </div><br>
                    <table class="table table-bordered">
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Icon</th>
                            <th>Link</th>
                            <th>Order</th>
                            <th>Action</th>
                        </tr>
                        <?php
                        foreach ($menus as $key => $M) {
                        ?>
                            <tr>
                                <td><?php echo $key + 1 ?></td>
                                <td><?php echo $M['name'] ?></td>
                                <td><?php echo $M['icon'] ?></td>
                                <td><?php echo $M['link'] ?></td>
                                <td><?php echo $M['order'] ?></td>
                                <td>
                                    <a class="btn btn-outline-success" href="?page=tambah-menu&edit=<?php echo $M['id'] ?>"> <i class="bi bi-pencil"></i></a>
                                    <form class="d-inline" action="?page=menu&delete=<?php echo $M['id'] ?>" method="post" onclick="return confirm('ingin menghapusnya?')">
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