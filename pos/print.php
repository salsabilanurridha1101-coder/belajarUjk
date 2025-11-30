<?php
include '../config/config.php';
session_start();

$id = $_GET['id'] ?? '';
$id = isset($_GET['id']) ? $_GET['id'] : '';
$query = mysqli_query($config, "SELECT * FROM trans_orders WHERE id = '$id'");
$row = mysqli_fetch_assoc($query);

$order_id = $row['id'];
$queryDetails = mysqli_query($config, "SELECT s.name, od.* FROM trans_order_detail od LEFT JOIN services s ON s.id = od.service_id WHERE order_id = '$order_id'");
$rowDetails = mysqli_fetch_all($queryDetails, MYSQLI_ASSOC);
$cash = $row['order_pay'];
$change = $row['order_change'];

$queryTax = mysqli_query($config, "SELECT * FROM taxs WHERE is_active = 1");
$taxs     = mysqli_fetch_assoc($queryTax);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struk Transaksi Laundry</title>
    <!-- INTERNAL css : Kode css ada di file html -->
    <!-- EXTERNAL css : Kode css ada di file .css baru ke file html -->
    <style>
        body {
            width: 80mm;
            font-family: 'Courier New', Courier, monospace;
            margin: 0 auto;
            padding: 10px;
            background-color: white;
        }

        .struck-page {
            width: 100%;
            font-size: 12px;
        }

        .header {
            text-align: center;
            margin-bottom: 15px;
        }

        .header h2 {
            font-size: 20px;
            margin: 0 0 10px 0;
            font-weight: bold;
        }

        header p {
            margin: 3px 0;
            font-size: 11px;
        }

        .info {
            margin: 15px 0;
            font-size: 11px;
        }

        .info-row {
            display: flex;
            justify-content: space-between;
            margin: 3px 0;
        }

        .separator {
            border-top: 1px dashed #000;
            margin: 10px 0;
        }

        .items {
            margin: 10px 0;
        }

        .item {
            display: flex;
            justify-content: space-between;
            margin: 8px 0;
            font-size: 12px;
        }

        .item-name {
            flex: 1;
        }

        .item-qty {
            margin: 0 10px;
        }

        .item-price {
            text-align: right;
            min-width: 80px;
        }

        .totals {
            margin: 10px 0;
        }

        .total-row {
            display: flex;
            justify-content: space-between;
            margin: 5px 0;
            font-size: 12px;
        }

        .total-row.grand {
            font-weight: bold;
            font-size: 16px;
            margin: 10px 0;
        }

        .payment {
            margin-top: 10px;
        }

        @media print {

            /* body {
            margin: 0;
            padding: 0;
        } */
            page {
                margin: 0;
                size: 80mm auto;
            }
        }
    </style>



</head>

<body onload="window.print()">
    <div class="struck-page">
        <div class="header">
            <img src="../assets/img/print_logo_laundry .jpg" style="width: 100px;" alt="">
            <h2>Small Laundry</h2>
            <span>Jl. Karet Pasar Baru Barat,Jakarta Pusat</span><br>
            <span>0874125369</span>
        </div>
        <div class="info">
            <div class="info-row">
                <?php
                //strtotime
                $date = date("d-m-y", strtotime($row['created_at']));
                $time = date("H:i:s", strtotime($row['created_at']));
                ?>
                <span><?php echo $date ?></span>
                <span><?php echo $time ?></span>
            </div>
            <div class="info-row">
                <span>Transaction Id</span>
                <Span>#<?php echo $row['order_code'] ?? '' ?></Span>
            </div>
            <div class="info-row">
                <span>Cashier Name</span>
                <span><?php echo $_SESSION['NAME'] ?? '' ?></span>
            </div>
        </div>
        <div class="separator"></div>
        <div class="items">
            <?php foreach ($rowDetails as $item): ?>
                <div class="item">
                    <span class="item-name"><?php echo $item['name'] ?></span>
                    <span class="item-qty">x<?php echo $item['qty'] ?>/kg</span>
                    <span class="item-price">Rp. <?php echo number_format($item['price']) ?></span>
                </div>
            <?php endforeach ?>
            <div class="separator"></div>
        </div>
        <div class="total-row">
        <span>Ppn (<?php echo $taxs['percent'] ?>%)</span>
        <span><?php echo "Rp. " . number_format($row['order_tax'], 0, ',', ',')?></span>
      </div>
        <div class="total-row">
           <span>Sub Total</span>
           <span>Rp. <?php echo number_format($row['order_total'], 0, ',', '.') ?></span>
        </div>
        <div class="separator"></div>
        <div class="total-row grand ">
            <span>Total</span>
            <span>Rp. <?php echo number_format($row['order_total'], 0, ',', '.'); ?></span>   
        </div>
        <div class="total-row ">
                <span >Cash</span>
                <span>Rp.<?php echo number_format($cash, 0, ',', '.') ?></span>
        </div>
        <div class="total-row ">
                <span>Change</span>
                <span>Rp.<?php echo number_format($change, 0, ',', '.')?></span>
        </div>
        <!-- <div class="payment">
            <div class="total-row">
                <span>Cash</span>
                <span>Rp. </span>
            </div>
            <div class="total-row">
                <span>Change</span>
                <span>Rp.</span>
            </div>
        </div> -->
    </div>
    <hr>
</body>

</html>