<?php

// call database
include "config.php";

// for save button
if (isset($_POST['save'])) {

    // Check if all fields are filled
    if(empty($_POST['no_pasien']) || empty($_POST['nama_pasien']) || empty($_POST['JK']) || empty($_POST['umur']) || empty($_POST['no_telepon']) || empty($_POST['alamat'])) {
        echo "<script>
        alert('Please fill all fields!');
        document.location='auth/home.php?page=patient';
        </script>";
    } else {
        // Check if no pasien already exists
        $check_pasien = mysqli_query($connection, "SELECT * FROM tbpasien WHERE no_pasien = '$_POST[no_pasien]'");
        if(mysqli_num_rows($check_pasien) > 0) {
            echo "<script>
            alert('Patient number already exists!');
            document.location='auth/home.php?page=patient';
            </script>";
        } else {
            //for query save
            $save = mysqli_query($connection, "INSERT INTO tbpasien (no_pasien, nama_pasien, JK, umur, no_telepon, alamat) 
                                                                        VALUES ('$_POST[no_pasien]',
                                                                                '$_POST[nama_pasien]',
                                                                                '$_POST[JK]',
                                                                                '$_POST[umur]',
                                                                                '$_POST[no_telepon]',
                                                                                '$_POST[alamat]') ");
            if($save) {
                echo "<script>
                alert('Save data is successful');
                document.location='auth/home.php?page=patient';
                </script>";
            } else {
                echo "<script>
                alert('Save data failed');
                document.location='auth/home.php?page=patient';
                </script>";
            }
        }
    }
}

// for update button
if (isset($_POST['update'])) {
    //for query update
    $update = mysqli_query($connection, "UPDATE tbpasien SET 
                                                                nama_pasien = '$_POST[nama_pasien]',
                                                                JK = '$_POST[JK]',
                                                                umur = '$_POST[umur]',
                                                                no_telepon = '$_POST[no_telepon]',
                                                                alamat = '$_POST[alamat]'
                                                                WHERE no_pasien = '$_POST[no_pasien]'
                                                                ");
    if($update) {
        echo "<script>
        alert('Update data is successful');
        document.location='auth/home.php?page=patient';
        </script>";
    } else {
        echo "<script>
        alert('Update data failed');
        document.location='auth/home.php?page=patient';
        </script>";
    }
}

// for delete button
if (isset($_POST['delete'])) {
    //for query delete
    $delete = mysqli_query($connection, "DELETE FROM tbpasien WHERE no_pasien = '$_POST[no_pasien]' ");
    if($delete) {
        echo "<script>
        alert('Delete data is successful');
        document.location='auth/home.php?page=patient';
        </script>";
    } else {
        echo "<script>
        alert('Delete data failed');
        document.location='auth/home.php?page=patient';
        </script>";
    }
}
?>