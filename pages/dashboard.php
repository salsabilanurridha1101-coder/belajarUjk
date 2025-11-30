<?php
include 'inc/sidebar.php';
include 'config/config.php'; 
// Total Customer
$q_customer = mysqli_query($config, "SELECT id FROM customers");
$total_customer = mysqli_num_rows($q_customer);

// Total Service
$q_service = mysqli_query($config, "SELECT id FROM services");
$total_service = mysqli_num_rows($q_service);

// Total Order / Transaksi
$q_order = mysqli_query($config, "SELECT id FROM trans_orders");
$total_order = mysqli_num_rows($q_order);

$queryIncome = mysqli_query($config, 'SELECT SUM(order_total) AS income FROM trans_orders');
$totalIncome = mysqli_fetch_assoc($queryIncome)['income'];

// Ambil 2 transaksi terakhir
$q_last = mysqli_query($config, "SELECT c.name, `to`.*
    FROM trans_orders `to`
    LEFT JOIN customers c ON c.id = `to`.customer_id
    ORDER BY `to`.id DESC LIMIT 2");
$last_orders = mysqli_fetch_all($q_last, MYSQLI_ASSOC);
?>

<div class="pagetitle">
    <h1 class="text-center">Dashboard</h1>
</div>

<section class="section">
    <div class="row">

        <!-- DATA USER -->
        <div class="col-lg-6">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title text-center">Data User</h5>
                    <table class="table table-striped">
                        <tr>
                            <th width="40%">Name</th>
                            <td>: <?php echo $_SESSION['NAME']?></td>
                        </tr>
                        <tr>
                            <th>Level</th>
                            <td>: <?php echo $_SESSION['LEVEL_ID'] ?></td>
                        </tr>
                        <tr>
                            <th>Date</th>
                            <td>: <?= date('d F Y, H:i') ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <!-- DATA ORDER (5 TERAKHIR) -->
        <div class="col-lg-6">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title text-center">Last Transactions</h5>
                    <div class="table-responsive">
                        <table class="table table-striped text-center">
                            <thead class="table-light">
                                <tr>
                                    <th>No</th>
                                    <th>Code</th>
                                    <th>Customer</th>
                                    <th>Status</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (count($last_orders) > 0): ?>
                                    <?php foreach ($last_orders as $k => $v): ?>
                                        <tr>
                                            <td><?= $k + 1 ?></td>
                                            <td><?= $v['order_code'] ?></td>
                                            <td><?= $v['name'] ?? '-' ?></td>
                                            <td>
                                                <?php if ($v['order_status'] == 'completed'): ?>
                                                    <span class="badge bg-success"><?= $v['order_status'] ?></span>
                                                <?php elseif ($v['order_status'] == 'process'): ?>
                                                    <span class="badge bg-warning"><?= $v['order_status'] ?></span>
                                                <?php else: ?>
                                                    <span class="badge bg-secondary"><?= $v['order_status'] ?></span>
                                                <?php endif; ?>
                                            </td>
                                            <td>Rp <?= number_format($v['order_total'], 0, ',', '.') ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="5">No data available</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Statistik Cards (baris kedua) -->
    <div class="row d-flex align-items-stretch">
        <!-- Services -->
        <div class="col-md-6 col-lg-3 mb-4">
            <div class="card h-1000">
                <div class="card-body">
                    <div class="card-title d-flex align-items-start justify-content-between">
                        <div class="avatar flex-shrink-0">
                        </div>
                    </div>
                    <span class="fw-semibold d-block mb-1 text-center">Services</span>
                    <h3 class="card-title mb-2 text-center"><?= $total_service ?></h3>
                </div>
            </div>
        </div>

        <!-- Customer -->
        <div class="col-md-6 col-lg-3 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="card-title d-flex align-items-start justify-content-between">
                        <div class="avatar flex-shrink-0">
                        </div>
                    </div>
                    <span class="fw-semibold d-block mb-1 text-center">Customers</span>
                    <h3 class="card-title text-nowrap mb-2 text-center"><?= $total_customer ?></h3>
                </div>
            </div>
        </div>

        <!-- Income -->
        <div class="col-md-6 col-lg-3 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="card-title d-flex align-items-start justify-content-between">
                        <div class="avatar flex-shrink-0">
                        </div>
                    </div>
                    <span class="d-block fw-semibold mb-1 text-center">Income</span>
                    <h3 class="card-title text-nowrap mb-2 text-center">Rp <?= number_format($totalIncome, 0, ',', '.') ?></h3>
                </div>
            </div>
        </div>

        <!-- Transactions -->
        <div class="col-md-6 col-lg-3 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="card-title d-flex align-items-start justify-content-between">
                        <div class="avatar flex-shrink-0">
                        </div>
                    </div>
                    <span class="fw-semibold d-block mb-1 text-center">Total Transaction</span>
                    <h3 class="card-title mb-2 text-center"><?= $total_order ?></h3>
                </div>
            </div>
        </div>
    </div>
</section>

