<?php
// require_once 'config/config.php';
$query = mysqli_query($config, "SELECT * FROM taxs ORDER BY id DESC");
$rows = mysqli_fetch_all($query, MYSQLI_ASSOC);



if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    $delete = mysqli_query($config, "DELETE FROM taxs WHERE id = $id");
    if ($delete) {
        header("location:?page=tax");
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tax</title>
</head>

<body>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body"><br>
                    <h1 class="card-title">Data Tax</h1>
                    <div align='right' class="d-flex-justify-content-end p-2">
                        <a href="?page=tambah-tax" class="btn btn-primary"><i class="bi bi-plus-circle"></i> Add Tax</a>
                    </div>
                    <table class="table table-bordered  text-center">
                        <tr>
                            <th>No</th>
                            <th>Percent</th>
                            <th>Is Active</th>
                            <th>Action</th>
                        </tr>
                        <?php foreach ($rows as $key => $v) {
                        ?>
                            <tr>
                                <td><?php echo $key + 1 ?></td>
                                <td><?php echo $v['percent'] ?></td>
                                <td><?php echo $v['is_active'] == 1 ? 'Active' : 'Draft' ?></td>
                                <td>
                                    <a href="?page=tambah-tax&edit=<?php echo $v['id'] ?>" class="btn btn-outline-warning"><i class="bi bi-pencil"></i></a>
                                    <a href="?page=tax&delete=<?php echo $v['id'] ?>" class="btn btn-outline-danger" onclick="return confirm('really wnna delete??')"><i class="bi bi-trash"></i></a>
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