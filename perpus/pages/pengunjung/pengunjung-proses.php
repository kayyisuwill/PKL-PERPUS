<?php

include '../../koneksi.php';

$today = date("Y/m/d");

if (isset($_POST['submitpengunjung'])) {
    $namapengunjung = $_POST['namapengunjung'];
    $keperluanpengunjung = $_POST['keperluanpengunjung'];

    mysqli_query($koneksi, "INSERT INTO t_datapengunjung (nama_pgnjng, kprluan, tgl) VALUES ('$namapengunjung', '$keperluanpengunjung','$today')");

    header("location:pengunjung.php?pesan=berhasil");
} else if (isset($_POST['submitanggota'])) {
    $nomoranggota = $_POST['nomoranggota'];

    $anggota = mysqli_query($koneksi, "SELECT * FROM t_dataanggota WHERE no_anggota = '$nomoranggota'");
    $cek = mysqli_num_rows($anggota);

    if ($cek > 0) {
        $dang = mysqli_fetch_assoc($anggota);
        $nama = $dang['nama_anggota'];
        $keperluan = "Anggota";

        mysqli_query($koneksi, "INSERT INTO t_datapengunjung (nama_pgnjng, kprluan, tgl, no_anggota) VALUES ('$nama', '$keperluan', '$today', '$nomoranggota')");

        header("location:pengunjung.php?pesan=berhasil&anggota=true");
    } else {
        header("location:pengunjung.php?pesan=tidakditemukan");
    }
}
?>
