<?php


require 'function.php';


// hapus supplier
$idsupplier = $_GET["deleteSuplier"];

if (hapusSupplier($idsupplier) > 0) {
    echo "
            <script>
            alert ('data berhasil dihapuskan !');
            document.location.href = 'supplier.php';
            </script>
        ";
} else {
    echo "
            <script>
            alert ('data gagal dihapus !');
            document.location.href = 'supplier.php';
            </script>
        ";
}
