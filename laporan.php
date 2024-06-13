<?php


include 'function.php';


$getKopiOrder = getKopiOrder();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Table</title>


    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .table-container {
            width: 80%;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .simple-table {
            width: 100%;
            border-collapse: collapse;
        }

        .simple-table th,
        .simple-table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        .simple-table th {
            background-color: #2c3e50;
            color: white;
        }

        .simple-table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .simple-table tr:hover {
            background-color: #ddd;
        }

        button {
            padding: 5px 10px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        .edit-button {
            background-color: #f39c12;
            color: white;
        }

        .edit-button:hover {
            background-color: #e67e22;
        }

        .delete-button {
            background-color: #c0392b;
            color: white;
        }

        .delete-button:hover {
            background-color: #e74c3c;
        }
    </style>

</head>

<body>
    <div class="table-container">
        <h2>Data laporan Kopi Stok Paling Sedikit</h2>
        <table class="simple-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Jenis Kopi</th>
                    <th>Asal Kopi</th>
                    <th>Proses</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Supplier</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>

                <?php while ($k = mysqli_fetch_array($getKopiOrder)) : ?>

                    <tr>
                        <td><?php echo $i; ?></td>

                        <td><?php echo $k['jenis']; ?></td>
                        <td><?php echo $k['asal']; ?></td>
                        <td><?php echo $k['proses']; ?></td>
                        <td><?php echo $k['harga']; ?></td>
                        <td><?php echo $k['stok']; ?></td>
                        <td><?php echo $k['nama_supplier']; ?></td>

                    </tr>
                    <?php $i++ ?>

                <?php endwhile; ?>

            </tbody>
        </table>
    </div>
</body>

</html>