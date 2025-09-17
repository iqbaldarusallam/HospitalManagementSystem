<?php

// call database
include "config.php";

// for save
if (isset($_POST['save'])) {

    // for Check if all fields are filled
    if (empty($_POST['no_pemeriksaan']) || empty($_POST['no_pasien']) || empty($_POST['tanggal']) || empty($_POST['diagnosa'])) {
        echo "<script>
        alert('Please fill all fields!');
        document.location='auth/home.php?page=checkup';
        </script>";
    } else {
        // for check no pemeriksaan already exist
        $check_pemeriksaan = mysqli_query($connection, "SELECT * FROM tbpemeriksaan WHERE no_pemeriksaan = '$_POST[no_pemeriksaan]'");
        if (mysqli_num_rows($check_pemeriksaan) > 0) {
            echo "<script>
            alert('Checkup number already exists!');
            document.location='auth/home.php?page=checkup';
            </script>";
        } else {
            // Query for save
            $save = mysqli_query($connection, "INSERT INTO tbpemeriksaan (no_pemeriksaan, no_pasien, tanggal, diagnosa) 
                                                            VALUES ('$_POST[no_pemeriksaan]',
                                                                    '$_POST[no_pasien]',
                                                                    '$_POST[tanggal]',
                                                                    '$_POST[diagnosa]') ");
            if ($save) {
                echo "<script>
                alert('Save data is successful');
                document.location='auth/home.php?page=checkup';
                </script>";
            } else {
                echo "<script>
                alert('Save data failed');
                document.location='auth/home.php?page=checkup';
                </script>";
            }
        }
    }
}

// for update
if (isset($_POST['update'])) {
    // Query for update
    $update = mysqli_query($connection, "UPDATE tbpemeriksaan SET 
                                                            no_pasien = '$_POST[no_pasien]',
                                                            tanggal = '$_POST[tanggal]',
                                                            diagnosa = '$_POST[diagnosa]'
                                                            WHERE no_pemeriksaan = '$_POST[no_pemeriksaan]'
                                                            ");
    if ($update) {
        echo "<script>
        alert('Update data is successful');
        document.location='auth/home.php?page=checkup';
        </script>";
    } else {
        echo "<script>
        alert('Update data failed');
        document.location='auth/home.php?page=checkup';
        </script>";
    }
}

//for delete
if (isset($_POST['delete'])) {
    // query for delete
    $delete = mysqli_query($connection, "DELETE FROM tbpemeriksaan WHERE no_pemeriksaan = '$_POST[no_pemeriksaan]' ");
    if ($delete) {
        echo "<script>
        alert('Delete data is successful');
        document.location='auth/home.php?page=checkup';
        </script>";
    } else {
        echo "<script>
        alert('Delete data failed');
        document.location='auth/home.php?page=checkup';
        </script>";
    }
}
?>
