<?php

// call database
include "config.php";

// for save button
if (isset($_POST['save'])) {
    // Check for empty fields
    if(empty($_POST['kode_obat']) || empty($_POST['nama_obat']) || empty($_POST['harga_obat']) || empty($_POST['stok_obat'])) {
        echo "<script>
        alert('All fields are required');
        document.location='auth/home.php?page=medicine';
        </script>";
    } else {
        // Check if the medicine code already exists
        $check_query = mysqli_query($connection, "SELECT * FROM tbpembelian_obat WHERE kode_obat = '$_POST[kode_obat]'");
        if(mysqli_num_rows($check_query) > 0) {
            echo "<script>
            alert('Medicine code already exists');
            document.location='auth/home.php?page=medicine';
            </script>";
        } else {
            // Insert data if no empty fields and no existing medicine code
            $save = mysqli_query($connection, "INSERT INTO tbpembelian_obat (kode_obat, nama_obat, harga_obat, stok_obat) 
                                                                    VALUES ('$_POST[kode_obat]',
                                                                            '$_POST[nama_obat]',
                                                                            '$_POST[harga_obat]',
                                                                            '$_POST[stok_obat]')");
            if($save) {
                echo "<script>
                alert('Save data is successful');
                document.location='auth/home.php?page=medicine';
                </script>";
            } else {
                echo "<script>
                alert('Save data failed');
                document.location='auth/home.php?page=medicine';
                </script>";
            }
        }
    }
}

if (isset($_POST['update'])) {
    //for query update
    $update = mysqli_query($connection, "UPDATE tbpembelian_obat SET 
                                                nama_obat = '$_POST[nama_obat]',
                                                harga_obat = '$_POST[harga_obat]',
                                                stok_obat = '$_POST[stok_obat]'
                                                WHERE kode_obat = '$_POST[kode_obat]'");
    if($update) {
        echo "<script>
        alert('Update data is successful');
        document.location='auth/home.php?page=medicine';
        </script>";
    } else {
        echo "<script>
        alert('Update data failed');
        document.location='auth/home.php?page=medicine';
        </script>";
    }
}

if (isset($_POST['delete'])) {
    //for query delete
    $delete = mysqli_query($connection, "DELETE FROM tbpembelian_obat WHERE kode_obat = '$_POST[kode_obat]'");
    if($delete) {
        echo "<script>
        alert('Delete data is successful');
        document.location='auth/home.php?page=medicine';
        </script>";
    } else {
        echo "<script>
        alert('Delete data failed');
        document.location='auth/home.php?page=medicine';
        </script>";
    }
}
?>