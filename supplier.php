<?php
include 'function.php';

$suplier = getSupplier();

if (isset($_POST["tambahSuplier"])) {

    // cek apakah data berhasil ditambahkan atau tidak

    if (tambahSuplier($_POST) > 0) {
        echo "
            <script>
            alert ('data berhasil ditambahkan !');
            document.location.href = 'supplier.php';
            </script>
        ";
    } else {
        echo "
            <script>
            alert ('data gagal  diubah !');
            document.location.href = 'supplier.php';
            </script>
        ";
    }
}



if (isset($_GET["cari"])) {

    // cek apakah data berhasil ditambahkan atau tidak

    $supplierSearch = cariSupplier($_GET);

    // if (cariKopi($_GET) > 0) {

    //     $kopiSearch =  cariKopi();

    // } else {
    //     echo "
    //         <script>
    //         alert ('tidak ada data !');
    //         document.location.href = 'kopi.php';
    //         </script>
    //     ";

}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>


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
            min-height: 100vh;
            margin: 0;
        }

        .container {
            display: flex;
            width: 100%;
        }

        /* Sidebar */
        .sidebar {
            background-color: #2c3e50;
            color: #ecf0f1;
            width: 250px;
            padding: 15px;
        }

        .sidebar h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .sidebar nav ul {
            list-style: none;
            padding: 0;
        }

        .sidebar nav ul li {
            margin-bottom: 10px;
        }

        .sidebar nav ul li a {
            color: #ecf0f1;
            text-decoration: none;
            display: block;
            padding: 10px;
            border-radius: 5px;
        }

        .sidebar nav ul li a:hover {
            background-color: #34495e;
        }

        /* Main Content */
        .main-content {
            flex: 1;
            display: flex;
            flex-direction: column;
            padding: 20px;
        }

        /* Header */
        .header {
            background-color: #34495e;
            color: #ecf0f1;
            padding: 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header h1 {
            margin: 0;
        }

        .navbar a {
            color: #ecf0f1;
            text-decoration: none;
            margin: 0 10px;
        }

        .navbar a:hover {
            text-decoration: underline;
        }

        /* Main Section */
        .content {
            flex: 1;
            background-color: #fff;
            padding: 20px;
            margin: 20px 0;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .input-form {
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
        }

        .form-group input {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .add-button {
            background-color: #2c3e50;
            color: #ecf0f1;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .add-button:hover {
            background-color: #34495e;
        }

        .table-container {
            margin-top: 20px;
        }

        .data-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .data-table th,
        .data-table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        .data-table th {
            background-color: #2c3e50;
            color: #ecf0f1;
        }

        .data-table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .data-table tr:hover {
            background-color: #ddd;
        }

        .data-table button {
            background-color: #2c3e50;
            color: #ecf0f1;
            padding: 5px 10px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        .data-table button:hover {
            background-color: #34495e;
        }

        /* Footer */
        .footer {
            text-align: center;
            padding: 10px;
            background-color: #34495e;
            color: #ecf0f1;
            border-top: 1px solid #ecf0f1;
        }

        .search-button {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            font-weight: bold;
            color: #fff;
            background-color: #2c3e50;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            text-decoration: none;
            text-align: center;
        }
    </style>

</head>

<body>
    <div class="container">
        <!-- Sidebar -->
        <aside class="sidebar">
            <h2>Sidebar</h2>
            <nav>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="supplier.php">Supplier</a></li>
                    <li><a href="kopi.php">Kopi</a></li>
                    <li><a href="laporan.php">Laporan</a></li>

                </ul>
            </nav>
        </aside>

        <!-- Main Content -->
        <div class="main-content">
            <!-- Header -->
            <header class="header">
                <h1>Dashboard</h1>
                <div class="navbar">
                    <a href="#">User</a>

                </div>
            </header>

            <!-- Main Section -->
            <section class="content">
                <h2>Data Management Supplier</h2>

                <!-- Form Input Data -->
                <form action="" method="POST" class="input-form">
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" id="name" name="name" required>
                    </div>
                    <button type="submit" name="tambahSuplier" class="add-button">Tambah</button>
                </form>

                <div class="table-container">
                    <form action="" method="get">
                        <input type="text" name="dataCari" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 5px; margin-bottom: 10px;">
                        <button type="submit" name="cari" class="search-button">Cari</button>
                    </form>
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>


                            <?php if (isset($_GET["cari"])) { ?>
                                <?php $i = 1; ?>
                                <?php while ($ss = mysqli_fetch_array($supplierSearch)) : ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>

                                        <td><?php echo $ss['nama_supplier']; ?></td>


                                        <td>
                                            <button><a href="editSupplier.php?editSuplier=<?php echo $ss['id']; ?>" style="text-decoration: none;color: white">Edit</a></button>
                                            <button><a href="hapusSupplier.php?deleteSuplier=<?php echo $ss['id']; ?>" style="text-decoration: none;color: white">Delete</a></button>
                                        </td>


                                    </tr>
                                    <?php $i++; ?>
                                <?php endwhile; ?>
                            <?php } else { ?>




                                <?php $i = 1; ?>
                                <?php while ($s = mysqli_fetch_array($suplier)) : ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $s['nama_supplier']; ?></td>

                                        <td>
                                            <button><a href="editSupplier.php?editSuplier=<?php echo $s['id']; ?>" style="text-decoration: none;color: white">Edit</a></button>
                                            <button><a href="hapusSupplier.php?deleteSuplier=<?php echo $s['id']; ?>" style="text-decoration: none;color: white">Delete</a></button>
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
                            <?php endwhile;
                            } ?>

                        </tbody>
                    </table>
                </div>
            </section>

            <!-- Footer -->
            <footer class="footer">
                <p>&copy; 2024 Dashboard. All rights reserved.</p>
            </footer>
        </div>
    </div>
</body>

</html>