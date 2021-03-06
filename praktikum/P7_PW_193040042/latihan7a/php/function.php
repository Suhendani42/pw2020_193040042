<?php

function koneksi()
{
    $conn = mysqli_connect("localhost", "root", "") or die("Koneksi ke DB gagal");
    mysqli_select_db($conn, "tubes_193040042") or die("Database Salah!");

    return $conn;
}

function query($sql)
{
    $conn = koneksi();
    $result = mysqli_query($conn, "$sql");

    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data)
{
    $conn = koneksi();

    $gambar = htmlspecialchars($data['gambar']);
    $nama = htmlspecialchars($data['nama']);
    $bahan = htmlspecialchars($data['bahan']);
    $daerah_asal = htmlspecialchars($data['daerah_asal']);
    $manfaat = htmlspecialchars($data['manfaat']);

    $query = " INSERT INTO makanan
                VALUES
                (null, '$gambar', '$nama', '$bahan','$daerah_asal', '$manfaat')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


function hapus($id)
{
    $conn = koneksi();
    mysqli_query($conn, "DELETE FROM makanan WHERE id = $id ");

    return mysqli_affected_rows($conn);
}


function ubah($data)
{
    $conn = koneksi();

    $id = $data['id'];
    $gambar = htmlspecialchars($data['gambar']);
    $nama = htmlspecialchars($data['nama']);
    $bahan = htmlspecialchars($data['bahan']);
    $daerah_asal = htmlspecialchars($data['daerah_asal']);
    $manfaat = htmlspecialchars($data['manfaat']);

    $queryubah = "UPDATE makanan
                  SET
                  gambar = '$gambar',
                  nama = '$nama',
                  bahan = '$bahan',
                  daerah_asal = '$daerah_asal',
                  manfaat = '$manfaat'
                WHERE id = '$id' ";
    mysqli_query($conn, $queryubah);

    return mysqli_affected_rows($conn);
}
