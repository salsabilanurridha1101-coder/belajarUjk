<?php
$service_e = mysqli_query($config, "SELECT * FROM services");
$services = mysqli_fetch_all($service_e, MYSQLI_ASSOC);
// var_dump($levels);
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $service_e = mysqli_query($config, "DELETE FROM services WHERE id = $id");
    header("location:?page=services");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Service</title>
</head>

<body>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Data Service</h3>
                    <div align="right">
                        <a href="?page=tambah-service" class="btn btn-outline-primary"><i class="bi bi-plus-circle"></i> Add Service</a>
                    </div><br>
                    <table class="table table-bordered">
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                        <?php
                        foreach ($services as $key => $service) {
                        ?>
                            <tr>
                                <td><?php echo $key + 1 ?></td>
                                <td><?php echo $service['name'] ?></td>
                                <td><?php echo $service['price'] ?></td>
                                <td><?php echo $service['description'] ?></td>
                                <td>
                                    <a class="btn btn-outline-success" href="?page=tambah-service&edit=<?php echo $service['id'] ?>"> <i class="bi bi-pencil"></i></a>
                                    <form class="d-inline" action="?page=services&delete=<?php echo $service['id'] ?>" method="post" onclick="return confirm('ingin menghapusnya?')">
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