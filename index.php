<?php
include 'function.php';



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="styles.css">
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
                <h2>Welcome to the Dashboard Toko Kopi</h2>
                <p>Toko kopi adalah tempat yang menyediakan berbagai macam kopi khas Indonesia dengan harga yang terjangkau.</p>
            </section>

            <!-- Footer -->
            <footer class="footer">
                <p>&copy; 2024 Dashboard. All rights reserved.</p>
            </footer>
        </div>
    </div>
</body>

</html>