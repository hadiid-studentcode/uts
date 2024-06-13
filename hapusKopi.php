<?php


require 'function.php';


// hapus supplier
$idKopi = $_GET["deleteKopi"];

if (hapusKopi($idKopi) > 0) {
    echo "
            <script>
            alert ('data berhasil dihapuskan !');
            document.location.href = 'kopi.php';
            </script>
        ";
} else {
    echo "
            <script>
            alert ('data gagal dihapus !');
            document.location.href = 'kopi.php';
            </script>
        ";
}
