<?php

// Call the database
include "config.php";

// Save button
if (isset($_POST['save'])) {

    // Check if all fields are filled
    if (empty($_POST['no_pembayaran']) || empty($_POST['no_pasien']) || empty($_POST['nama_pasien']) || empty($_POST['kode_obat']) || empty($_POST['harga_obat']) || empty($_POST['jumlah_beli']) || empty($_POST['total']) || empty($_POST['tanggal'])) {
        echo "<script>
        alert('Please fill all fields!');
        document.location='auth/home.php?page=purchase';
        </script>";
    } else {
        // Check if no_pembayaran already exists
        $check_pembayaran = mysqli_query($connection, "SELECT * FROM tbpembayaran WHERE no_pembayaran = '$_POST[no_pembayaran]'");
        if (mysqli_num_rows($check_pembayaran) > 0) {
            echo "<script>
            alert('Payment number already exists!');
            document.location='auth/home.php?page=purchase';
            </script>";
                } else {
                    // Query for save
                    $save = mysqli_query($connection, "INSERT INTO tbpembayaran (no_pembayaran, no_pasien, nama_pasien, kode_obat, harga_obat, jumlah_beli, total, tanggal) 
                                                            VALUES ('$_POST[no_pembayaran]',
                                                                    '$_POST[no_pasien]',
                                                                    '$_POST[nama_pasien]',
                                                                    '$_POST[kode_obat]',
                                                                    '$_POST[harga_obat]',
                                                                    '$_POST[jumlah_beli]',
                                                                    '$_POST[total]',
                                                                    '$_POST[tanggal]') ");
                    if ($save) {
                        echo "<script>
                        alert('Save data is successful');
                        document.location='auth/home.php?page=purchase';
                        </script>";
                    } else {
                        echo "<script>
                        alert('Save data failed');
                        document.location='auth/home.php?page=purchase';
                        </script>";
                    }
                }
            }
        }

// Update button
if (isset($_POST['update'])) {
    // Check if all fields are filled
    if (empty($_POST['no_pembayaran']) || empty($_POST['no_pasien']) || empty($_POST['nama_pasien']) || empty($_POST['kode_obat']) 
    || empty($_POST['harga_obat']) || empty($_POST['jumlah_beli']) || empty($_POST['total']) || empty($_POST['tanggal'])) {
        echo "<script>
        alert('Please fill all fields!');
        document.location='auth/home.php?page=purchase';
        </script>";
            } else {
                // Query for update
                $update = mysqli_query($connection, "UPDATE tbpembayaran SET 
                                                            no_pasien = '$_POST[no_pasien]',
                                                            nama_pasien = '$_POST[nama_pasien]',
                                                            kode_obat = '$_POST[kode_obat]',
                                                            harga_obat = '$_POST[harga_obat]',
                                                            jumlah_beli = '$_POST[jumlah_beli]',
                                                            total = '$_POST[total]',
                                                            tanggal = '$_POST[tanggal]'
                                                            WHERE no_pembayaran = '$_POST[no_pembayaran]'
                                                            ");
                if ($update) {
                    echo "<script>
                    alert('Update data is successful');
                    document.location='auth/home.php?page=purchase';
                    </script>";
                } else {
                    echo "<script>
                    alert('Update data failed');
                    document.location='auth/home.php?page=purchase';
                    </script>";
                }
            }
        }

// Delete button
if (isset($_POST['delete'])) {
    // Query for delete
    $delete = mysqli_query($connection, "DELETE FROM tbpembayaran WHERE no_pembayaran = '$_POST[no_pembayaran]' ");
    if ($delete) {
        echo "<script>
        alert('Delete data is successful');
        document.location='auth/home.php?page=purchase';
        </script>";
    } else {
        echo "<script>
        alert('Delete data failed');
        document.location='auth/home.php?page=purchase';
        </script>";
    }
}

?>
