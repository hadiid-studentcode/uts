<?php
// mengaktifkan session pada php
session_start();
// koneksi ke databasae
$conn = mysqli_connect('localhost', 'root', '', 'test');


// if(!$conn){
//     die("Koneksi gagal : ".mysqli_connect_error()); 
// }else{
//     echo "Koneksi Berhasil";
// }



function getSupplier()
{
    global $conn;
    $result = mysqli_query($conn, "SELECT * FROM tabel_supplier");
    return $result;
}

function getKopi()
{
    global $conn;
    $result = mysqli_query($conn, "SELECT *,tabel_kopi.id as idkopi FROM `tabel_kopi`
join tabel_supplier on tabel_kopi.id_supplier = tabel_supplier.id");
    return $result;
}

function tambahSuplier($data)
{
    global $conn;
    $nama = ($data['name']);


    // query insert data
    $query = "INSERT INTO tabel_supplier VALUES ('','$nama')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
function tambahKopi($data)
{
    global $conn;
    $jenis = ($data['jenis']);
    $asal = ($data['asal']);
    $proses = ($data['proses']);
    $harga = ($data['harga']);
    $stok = ($data['stok']);

    $supplier = ($data['supplier']);



    // query insert data
    $query = "INSERT INTO tabel_kopi VALUES ('','$jenis','$asal','$proses','$harga','$stok','$supplier')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function hapusSupplier($idSuplier)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM tabel_supplier WHERE id  = $idSuplier");


    return mysqli_affected_rows($conn);
}

function updateSupplier($data)
{

    global $conn;

    $id = ($data['id']);
    $name = ($data['name']);

    $query = "UPDATE tabel_supplier SET nama_supplier = '$name' WHERE id = $id";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function updateKopi($data)
{

    global $conn;

    $id = ($data['id']);
    $jenis = ($data['jenis']);
    $asal = ($data['asal']);
    $proses = ($data['proses']);
    $harga = ($data['harga']);
    $stok = ($data['stok']);
    $supplier = ($data['supplier']);

    $query = "UPDATE tabel_kopi SET jenis = '$jenis',asal = '$asal',proses = '$proses',harga = '$harga',stok = '$stok',id_supplier = '$supplier' WHERE id = $id";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function cariKopi($data)
{
    global $conn;

    $keyword = $data['dataCari'];

    $query = "SELECT *,tabel_kopi.id as idkopi
FROM tabel_kopi
join tabel_supplier on tabel_kopi.id_supplier = tabel_supplier.id
WHERE proses LIKE '%$keyword%'
";

    $result =  mysqli_query($conn, $query);

//    $data =  mysqli_fetch_row($result);

    return $result;
}

function getKopiOrder(){
    global $conn;
    $result = mysqli_query($conn, "SELECT *, tabel_kopi.id as idkopi FROM tabel_kopi join tabel_supplier on tabel_kopi.id_supplier = tabel_supplier.id  ORDER BY stok ASC  ");
    return $result;
}

function cariSupplier($data){
    global $conn;

    $keyword = $data['dataCari'];

    $query = "SELECT *
FROM tabel_supplier
WHERE nama_supplier LIKE '%$keyword%'
";

    $result =  mysqli_query($conn, $query);

    //    $data =  mysqli_fetch_row($result);

    return $result; 
}

function getSupplierFirst($id)
{
    global $conn;
    $result = mysqli_query($conn, "SELECT * FROM tabel_supplier WHERE id = $id");
    return $result;
}

function getKopiFirst($id)
{
    global $conn;
    $result = mysqli_query($conn, "SELECT *,tabel_kopi.id as idkopi FROM `tabel_kopi`
join tabel_supplier on tabel_kopi.id_supplier = tabel_supplier.id WHERE tabel_kopi.id = $id");
    return $result;
}

function hapusKopi($idKopi)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM tabel_kopi WHERE id  = $idKopi");
    return mysqli_affected_rows($conn);
}

// function login($log)
// {
//     global $conn;
//     //   menangkap data yang dikirim dari form login
//     $username = $log['username'];
//     $password = $log['password'];

//     // menyeleksi data user
//     $login = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username' AND password = '$password'");
//     // menghitung jumlah data ditemukan
//     $cek = mysqli_num_rows($login);
//     // cek apakah ditemukan pada database
//     if ($cek > 0) {
//         $data = mysqli_fetch_assoc($login);
//         // cek jika user adalah admin
//         if ($data['level'] == 'admin') {
//             // buat session login dan username
//             $_SESSION['username'] = $username;
//             $_SESSION['level'] = 'admin';
//             // alihkan ke dashboard
//             header("Location:dashboard.php");
//         } else {
//             header("Location:index.php?pesan=gagal");
//         }
//     } else {
//         header("Location:index.php?pesan=gagal");
//     }
// }

// // hapus

// 
// function hapusBarangMasuk($idBarang)
// {
//     global $conn;

//     mysqli_query($conn, "DELETE FROM barang_masuk WHERE id_barang_masuk = $idBarang");


//     return mysqli_affected_rows($conn);
// }
// function hapusOrdersBarang($idOrders)
// {
//     global $conn;

//     mysqli_query($conn, "DELETE FROM orders WHERE id_order = $idOrders");


//     return mysqli_affected_rows($conn);
// }
// function hapusBarangKeluar($idBarangKeluar)
// {
//     global $conn;


//     mysqli_query($conn, "DELETE FROM barang_keluar WHERE id_barang_keluar = $idBarangKeluar");


//     return mysqli_affected_rows($conn);
// }

// // akhir


// function tambahBarangMasuk($data)
// {
//     global $conn;
//     $supplier = ($data['suplier']);
//     $barang = ($data['barang']);
//     $stok = ($data['stok']);
//     $tanggal = ($data['tanggal']);


//     // query insert data
//     $query = "INSERT INTO barang_masuk VALUES ('','$supplier','$barang','$stok', '$tanggal')";
//     mysqli_query($conn, $query);

//     return mysqli_affected_rows($conn);
// }
// function tambahOrdersBarang($data)
// {
//     global $conn;
//     $barang = ($data['barang']);
//     $diajukan = ($data['diajukan']);
//     $jumlah = ($data['jumlah']);
//     $keperluan = ($data['keperluan']);


//     // query insert data
//     $query = "INSERT INTO orders VALUES ('','$barang','$diajukan','$jumlah', '$keperluan')";


//     // stok barang berkurang
//     // sisaStok = jumlah stok - jumlah barang yg diambil
//     $data = mysqli_query($conn, "SELECT stok from barang_masuk WHERE id_barang_masuk = $barang");
//     $stok = mysqli_fetch_array($data);
//     $jumlahStok = $stok['stok'];
//     $sisaStok = $jumlahStok - $jumlah;

//     $query1 = "UPDATE barang_masuk SET
//                 stok = '$sisaStok'
//                 WHERE id_barang_masuk  = $barang
//                 ";


//     mysqli_query($conn, $query);
//     mysqli_query($conn, $query1);


//     return mysqli_affected_rows($conn);
// }
// function tambahBarangKeluar($data)
// {
//     global $conn;
//     $barangOrder = ($data['barang']);
//     $pengambil = ($data['pengambil']);
//     $tanggal = ($data['tanggal']);



//     // query insert data
//     $query = "INSERT INTO barang_keluar VALUES ('','$barangOrder','$pengambil','$tanggal')";
//     mysqli_query($conn, $query);

//     return mysqli_affected_rows($conn);
// }
// // akhir

// // ubah
// function ubahSuplier($data)
// {
//     global $conn;
//     $idSupplier = ($data['id_supplier']);
//     $nama = ($data['nama_supplier']);
//     $notelp = ($data['notelp_supplier']);
//     $alamat = ($data['alamat_supplier']);
//     // ubah data
//     $query = "UPDATE supplier SET
//                 nama_supplier = '$nama',
//                 no_telp_supplier = '$notelp',
//                 alamat = '$alamat'
//                 WHERE id_supplier = $idSupplier
//                 ";
//     mysqli_query($conn, $query);

//     return mysqli_affected_rows($conn);
// }
// function ubahBarangMasuk($data)
// {
//     global $conn;
//     $idbarang = ($data['idbarangmasuk']);
//     $barang = ($data['namabarang']);
//     $stok = ($data['stok']);
//     $tanggal = ($data['tanggal']);

//     // ubah data
//     $query = "UPDATE barang_masuk SET
//                 nama_barang = '$barang',
//                 stok = '$stok',
//                 tanggal = '$tanggal'
//                 WHERE id_barang_masuk = $idbarang
//                 ";
//     mysqli_query($conn, $query);

//     return mysqli_affected_rows($conn);
// }

// // akhir