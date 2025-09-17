<?php 
include "config.php"; 
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Hospital Management System</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="container">
  <div class="mt-3">
    <div class="card mt-5">
      <div class="card-header bg-primary text-white">
        MEDICINE DATA
      </div>
      <div class="card-body">
        <div class="col-md-6 mx-auto">
          <form method="POST">
            <div class="input-group mb-3">
              <input type="text" name="tsearch" class="form-control" placeholder="Enter keyword">
              <button class="btn btn-primary" name="bsearch" type="submit">Search</button>
            </div>
          </form>
        </div>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#ModalAdd">
          ADD DATA
        </button>
        <table class="table table-bordered table-striped table-hover">
          <tr>
            <th>No.</th>
            <th>Kode obat</th>
            <th>Nama obat</th>
            <th>Harga obat</th>
            <th>Stok obat</th>
            <th>Action</th>
          </tr>
          <?php
          // buat nampilin database
          $no = 1;

          // for search button
          if (isset($_POST['bsearch'])) {
            $keyword = $_POST['tsearch'];
            $sql2 = "SELECT * FROM tbpembelian_obat WHERE kode_obat LIKE '%$keyword%' OR nama_obat LIKE '%$keyword%' OR harga_obat LIKE '%$keyword%' OR stok_obat LIKE '%$keyword%'";
          } else {
            $sql2 = "SELECT * FROM tbpembelian_obat";
          }

          $sql1 = mysqli_query($connection, $sql2);
          while ($data = mysqli_fetch_array($sql1)) :
          ?>
          <tr>
            <td><?= $no++ ?></td>
            <td><?= $data['kode_obat'] ?></td>
            <td><?= $data['nama_obat'] ?></td>
            <td><?= $data['harga_obat'] ?> </td>
            <td><?= $data['stok_obat'] ?></td>
            <td>
              <a href="#" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalupdate<?= $no ?>"> Update</a>
              <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modaldelete<?= $no ?>"> Delete</a>
            </td>
          </tr>

          <!-- Awal Modal untuk UPDATE-->
          <div class="modal fade" id="modalupdate<?= $no ?>" tabindex="-1" aria-labelledby="modalupdateLabel<?= $no ?>" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="modalupdateLabel<?= $no ?>">FORM DATA MEDICINE</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="../action_crudpembelianobat.php">
                  <div class="modal-body">
                    <div class="mb-3">
                      <label class="form-label">Kode obat</label>
                      <input type="text" class="form-control" name="kode_obat" value="<?= $data['kode_obat'] ?>" readonly>
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Nama obat</label>
                      <input type="text" class="form-control" name="nama_obat" value="<?= $data['nama_obat'] ?>">
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Harga obat</label>
                      <input type="text" class="form-control" name="harga_obat" value="<?= $data['harga_obat'] ?>">
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Stok obat</label>
                      <input type="text" class="form-control" name="stok_obat" value="<?= $data['stok_obat'] ?>">
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" name="update"> Update </button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal"> Close </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <!-- akhir modal untuk Update-->

          <!-- Awal Modal untuk Delete-->
          <div class="modal fade" id="modaldelete<?= $no ?>" tabindex="-1" aria-labelledby="modaldeleteLabel<?= $no ?>" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="modaldeleteLabel<?= $no ?>">FORM DATA MEDICINE</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="../action_crudpembelianobat.php">
                  <div class="modal-body">
                    <h5 class="text-center"> Are you sure you want to delete this data? <br>
                      <span class="text-danger"><?= $data['kode_obat'] ?> - <?= $data['nama_obat'] ?></span>
                    </h5>
                    <input type="hidden" name="kode_obat" value="<?= $data['kode_obat'] ?>">
                  </div>
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" name="delete"> Delete </button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal"> Cancel </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <!-- akhir modal untuk delete-->
          <?php endwhile; ?>
        </table>

        <!-- Awal Modal ADD-->
        <div class="modal fade" id="ModalAdd" tabindex="-1" aria-labelledby="ModalAddLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="ModalAddLabel">FORM DATA MEDICINE</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <form method="POST" action="../action_crudpembelianobat.php">
                <div class="modal-body">
                  <div class="mb-3">
                    <label class="form-label">Kode obat</label>
                    <input type="text" class="form-control" name="kode_obat" placeholder="Enter the Medicine Code!">
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Nama obat</label>
                    <input type="text" class="form-control" name="nama_obat">
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Harga obat</label>
                    <input type="text" class="form-control" name="harga_obat">
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Stok obat</label>
                    <input type="text" class="form-control" name="stok_obat">
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary" name="save"> SAVE</button>
                  <button type="button" class="btn btn-danger" data-bs-dismiss="modal"> Close </button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <!-- akhir modal untuk ADD-->
      </div>
    </div>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
