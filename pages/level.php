<?php
$levels_e = mysqli_query($config, "SELECT * FROM levels");
$levels = mysqli_fetch_all($levels_e, MYSQLI_ASSOC);
// var_dump($levels);
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $levels_e = mysqli_query($config, "DELETE FROM levels WHERE id = $id");
    header("location:?page=level");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Level</title>
</head>

<body>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Data Level</h3>
                    <div align="right">
                        <a href="?page=tambah-level" class="btn btn-outline-primary"><i class="bi bi-plus-circle"></i> Add level</a>
                    </div><br>
                    <table class="table table-bordered">
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Actions</th>
                        </tr>
                        <?php
                        foreach ($levels as $key => $level) {
                        ?>
                            <tr>
                                <td><?php echo $key + 1 ?></td>
                                <td><?php echo $level['name'] ?></td>
                                <td>
                                    <a class="btn btn-outline-warning" href="?page=add-role-menu&edit=<?php echo $level['id'] ?>"> <i class="bi bi-plus"></i></a>
                                    <a class="btn btn-outline-success" href="?page=tambah-level&edit=<?php echo $level['id'] ?>"> <i class="bi bi-pencil"></i></a>
                                    <form class="d-inline" action="?page=level&delete=<?php echo $level['id'] ?>" method="post" onclick="return confirm('ingin menghapusnya?')">
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