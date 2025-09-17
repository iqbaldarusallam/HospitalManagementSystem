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
            PATIENT DATA
          </div>
          <div class="card-body">
            <div class="col-md-6 mx-auto">
              <form method="POST">
                <div class="input-group mb-3">
                  <input type= "text" name="tsearch" class="form-control" placeholder="Enter keyword">
                  <button class="btn btn-primary" name="bsearch" type="submit">Search</button>
                </div>
              </form>
            </div>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal"
                    data-bs-target="#ModalAdd">
              ADD DATA
            </button>
            <table class="table table-bordered table-striped table-hover">
              <tr>
                <th>No.</th>
                <th>No Pasien</th>
                <th>Nama Pasien</th>
                <th>Jenis Kelamin</th>
                <th>Umur</th>
                <th>No. Telepon</th>
                <th>Alamat</th>
                <th>Action</th>
              </tr>
              <?php
              // buat nampilin database
              $no = 1;

              // for search button
              if (isset($_POST['bsearch'])) {
                $keyword = $_POST['tsearch'];
                $sql2 = "SELECT * FROM tbpasien WHERE no_pasien LIKE '%$keyword%' OR nama_pasien LIKE '%$keyword%' OR JK LIKE '%$keyword%' OR umur LIKE '%$keyword%' OR no_telepon LIKE '%$keyword%' OR alamat LIKE '%$keyword%'";
              } else {
                $sql2 = "SELECT * FROM tbpasien";
              }
              
              $sql1 = mysqli_query($connection, $sql2);
              while ($data = mysqli_fetch_array($sql1)) :
              ?>
              <tr>
                <td><?= $no++ ?></td>
                <td><?= $data['no_pasien'] ?></td>
                <td><?= $data['nama_pasien'] ?></td>
                <td><?= $data['JK'] ?> </td>
                <td><?= $data['umur'] ?></td>
                <td><?= $data['no_telepon'] ?></td>
                <td><?= $data['alamat'] ?></td>
                <td>
                  <a href="#" class="btn btn-warning" data-bs-toggle="modal"
                     data-bs-target="#modalupdate<?= $no ?>"> Update</a>
                  <a href="#" class="btn btn-danger" data-bs-toggle="modal"
                     data-bs-target="#modaldelete<?= $no ?>"> Delete</a>
                </td>
              </tr>

              <!-- Awal Modal untuk UPDATE-->
              <div class="modal fade" id="modalupdate<?= $no ?>" data-bs-backdrop="static"
                   data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                   aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="staticBackdropLabel">FORM DATA PATIENT</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal"
                              aria-label="Close"></button>
                    </div>

                    <form method="POST" action="../action_crudpasien.php">
                      <div class="modal-body">
                        <div class="mb-3">
                          <label class="form-label">No. Pasien</label>
                          <input type="text" class="form-control" name="no_pasien"
                                 value="<?= $data['no_pasien'] ?>" readonly>
                        </div>
                        <div class="mb-3">
                          <label class="form-label">Nama Pasien</label>
                          <input type="text" class="form-control" name="nama_pasien"
                                 value="<?= $data['nama_pasien'] ?>">

                          <div class="mb-3">
                            <label class="form-label">Jenis Kelamin</label>
                            <select class="form-select" name="JK">
                              <option value="<?= $data['JK'] ?>"><?= $data['JK'] ?></option>
                              <option value="Laki-laki">Laki-laki</option>
                              <option value="Perempuan">Perempuan</option>
                            </select>
                          </div>
                          <div class="mb-3">
                            <label class="form-label">Umur</label>
                            <input type="text" class="form-control" name="umur"
                                   value="<?= $data['umur'] ?>">
                          </div>
                        </div>
                        <div class="mb-3">
                          <label class="form-label">No. Telepon</label>
                          <input type="text" class="form-control" name="no_telepon"
                                 value="<?= $data['no_telepon'] ?>">
                        </div>
                        <div class="mb-3">
                          <label class="form-label">Alamat</label>
                          <textarea class="form-control" name="alamat"
                                    rows="3"><?= $data['alamat'] ?></textarea>
                        </div>

                      </div>
                      <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" name="update"> Update
                        </button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                          Close
                        </button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <!-- akhir modal untuk Update-->

              <!-- Awal Modal untuk Delete-->
              <div class="modal fade" id="modaldelete<?= $no ?>" data-bs-backdrop="static"
                   data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                   aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="staticBackdropLabel">FORM DATA PATIENT</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal"
                              aria-label="Close"></button>
                    </div>

                    <form method="POST" action="../action_crudpasien.php">
                      <div class="modal-body">
                        <h5 class="text-center"> Are you sure you want to delete this data? <br>
                          <span
                            class="text-danger"><?= $data['no_pasien'] ?> - <?= $data['nama_pasien'] ?></span>
                        </h5>
                        <input type="hidden" name="no_pasien" value="<?= $data['no_pasien'] ?>">
                      </div>
                      <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" name="delete"> Delete
                        </button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                          Cancel
                        </button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <!-- akhir modal untuk delete-->
              <?php endwhile; ?>

            </table>

            <!-- Awal Modal ADD-->
            <div class="modal fade" id="ModalAdd" data-bs-backdrop="static" data-bs-keyboard="false"
                 tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">FORM DATA PATIENT</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                  </div>

                  <form method="POST" action="../action_crudpasien.php">
                    <div class="modal-body">
                      <div class="mb-3">
                        <label class="form-label">No. Pasien</label>
                        <input type="text" class="form-control" name="no_pasien"
                               placeholder="Enter your Number Patient!">
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Nama Pasien</label>
                        <input type="text" class="form-control" name="nama_pasien">
                      </div>

                      <div class="mb-3">
                        <label class="form-label">Jenis Kelamin</label>
                        <select class="form-select" name="JK">
                          <option></option>
                          <option value="Laki-laki">Laki-Laki</option>
                          <option value="Perempuan">Perempuan</option>
                        </select>
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Umur</label>
                        <input type="text" class="form-control" name="umur">
                      </div>
                      <div class="mb-3">
                        <label class="form-label">No. Telepon</label>
                        <input type="text" class="form-control" name="no_telepon">
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Alamat</label>
                        <textarea class="form-control" name="alamat" rows="3"></textarea>
                      </div>

                    </div>
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-primary" name="save"> SAVE</button>
                      <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                        Close
                      </button>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>
  </body>
</html>
