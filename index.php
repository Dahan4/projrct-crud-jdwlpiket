<?php 

//pemanggilan koneksi databasse
include "koneksi.php"

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Jadwal Piket</title>

  <!--bootstrap-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>

<body>
  <!--navbar-->
  <nav class="navbar" style="background-color: rgb(39, 39, 77);">
    <div class="container-fluid">
      <a class="navbar-brand" href="#" style="color: aliceblue;">
        KETERANGAN PIKET
      </a>
    </div>
  </nav>

  <!-- Button trigger modal -->
  <div class="container">
    <h2 class="mt-4">Perwakilan Anggota Piket</h2>
    <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#ModalTambah">
      Masukkan Data
    </button>
  </div>

  <!--table-->
  <div class="table-responsive; container mt-4">
    <table class="table align-middle table-bordered table-hover">
      
        <tr>
          <th><center>No.</center></th>
          <th>Waktu</th>
          <th>Nama</th>
          <th>Kelas</th>
          <th>Jurusan</th>
          <th>Keterangan</th>
          <th>Aksi</th>
        </tr>

        <?php
        
        //persiapan penampilan data
        $no = 1;
        $tampil = mysqli_query($koneksi, "SELECT * FROM piket ORDER BY id_hms DESC");
        while ($data = mysqli_fetch_array($tampil)):

        ?>

        <tr>
          <td><center><?= $no++ ?></center></td>
          <td><?= $data['waktu'] ?></td>
          <td><?= $data['nama'] ?></td>
          <td><?= $data['kelas'] ?></td>
          <td><?= $data['jurusan'] ?></td>
          <td><?= $data['keterangan'] ?></td>
          <td>
            <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#ModalEdit<?= $no ?>">
              Edit</button>
            <button type="button" class="btn btn-danger" btn-sm data-bs-toggle="modal" data-bs-target="#ModalHapus<?= $no ?>">
              Hapus</button>
          </td>
        </tr>

        <!-- Modal Ubah -->
        <div class="modal fade modal-lg" id="ModalEdit<?= $no ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Perwakilan Anggota Piket</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>

              <form method="POST" action="aksi_crud.php" >
                <input type="hidden" name="id_hms" value="<?= $data['id_hms']?>">
                
                <div class="modal-body">
                  <div class="mb-3">
                    <label class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control" name="tnama" 
                    value="<?= $data['nama']?>" placeholder="Maukkan nama anda...">
                  </div>
                  
                  <div class="mb-3">
                    <label class="form-label">Kelas</label>
                    <select class="form-select" name="tkelas">
                      <option value="<?= $data['kelas']?>"><?= $data['kelas']?></option>
                      <option value="X">X</option>
                      <option value="XI">XI</option>
                      <option value="XII">XII</option>
                    </select>
                  </div>
                  
                  <div class="mb-3">
                    <label class="form-label">Jurusan</label>
                    <select class="form-select" name="tjurusan" value="<?= $data['jurusan']?>">
                      <option value="<?= $data['jurusan']?>"><?= $data['jurusan']?></option>
                      <option value="RPL-1">RPL-1</option>
                      <option value="RPL-2">RPL-2</option>
                      <option value="RPL-3">RPL-3</option>
                      <option value="TKJ-1">TKJ-1</option>
                      <option value="TKJ-2">TKJ-2</option>
                      <option value="MM-1">MM-1</option>
                      <option value="MM-2">MM-2</option>
                      <option value="MM-3">MM-3</option>
                      <option value="MM-4">MM-4</option>
                      <option value="PKM-1">PKM-1</option>
                      <option value="PKM-2">PKM-2</option>
                    </select>
                  </div>
                  
                  <div class="mb-3 mt-3">
                    <label class="form-label">Keterangan</label>
                    <select class="form-select" name="tketerangan" value="<?= $data['keterangan']?>">
                      <option value="<?= $data['keterangan']?>"><?= $data['keterangan']?></option>
                      <option value="Sudah Piket">Sudah Piket</option>
                      <option value="Belum Piket">Belum Piket</option>
                    </select>
                  </div>
               </div>
               
                <div class="modal-footer">
                 <button type="submit" class="btn btn-primary" name="bedit">Edit</button>
                 <button type="submit" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <!-- Akhir Modal Ubah -->


        <!-- Modal Hapus -->
        <div class="modal fade modal-lg" id="ModalHapus<?= $no ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Konfirmasi Penghapusan data</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>

              <form method="POST" action="aksi_crud.php" >
                <input type="hidden" name="id_hms" value="<?= $data['id_hms']?>">
                
                <div class="modal-body">
                  <h5 class="text-center">Apakah anda yakin untuk menghapus data ini? <br><br>
                    <span class="text-danger"><?= $data['nama']?> - <?= $data['kelas']?> 
                    <?= $data['jurusan']?> - <?= $data['keterangan']?></span>
                  </h5><br>
               </div>
               
                <div class="modal-footer">
                 <button type="submit" class="btn btn-primary" name="bhapus">Hapus</button>
                 <button type="submit" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <!-- Akhir Modal Hapus -->
  


      <?php endwhile; ?>

    </table>
  </div>

  <!-- Modal Simpan-->
  <div class="modal fade modal-lg" id="ModalTambah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Perwakilan Anggota Piket</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <form method="POST" action="aksi_crud.php" >
          <div class="modal-body">
            <div class="mb-3">
              <label class="form-label">Nama Lengkap</label>
              <input type="text" class="form-control" name="tnama" placeholder="Maukkan nama anda...">
            </div>

            <div class="mb-3">
              <label class="form-label">Kelas</label>
              <select class="form-select" name="tkelas">
                    <option value="-">-</option>
                    <option value="X">X</option>
                    <option value="XI">XI</option>
                    <option value="XII">XII</option>
                </select>
            </div>

            <div class="mb-3">
              <label class="form-label">Jurusan</label>
              <select class="form-select" name="tjurusan">
                    <option value="-">-</option>
                    <option value="RPL-1">RPL-1</option>
                    <option value="RPL-2">RPL-2</option>
                    <option value="RPL-3">RPL-3</option>
                    <option value="TKJ-1">TKJ-1</option>
                    <option value="TKJ-2">TKJ-2</option>
                    <option value="MM-1">MM-1</option>
                    <option value="MM-2">MM-2</option>
                    <option value="MM-3">MM-3</option>
                    <option value="MM-4">MM-4</option>
                    <option value="PKM-1">PKM-1</option>
                    <option value="PKM-2">PKM-2</option>
                </select>
            </div>

            <div class="mb-3 mt-3">
              <label class="form-label">Keterangan</label>
              <select class="form-select" name="tketerangan">
                    <option value="-">-</option>
                    <option value="Sudah Piket">Sudah Piket</option>
                    <option value="Belum Piket">Belum Piket</option>
                </select>
            </div>
           </div>

           <div class="modal-footer">
            <button type="submit" class="btn btn-primary" name="bsimpan">Simpan</button>
            <button type="submit" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
          </div>
        </form>
      </div>
    </div>
  </div>

</body>
</html>