<?php 

//pemanggilan koneksi databasse
include "koneksi.php";

//uji jika tombol simpan diklik
if(isset($_POST['bsimpan'])){
        
        //persiapan simpan data baru
        $simpan = mysqli_query($koneksi, "INSERT INTO piket (nama, kelas, jurusan, keterangan) 
                                          VALUES ('$_POST[tnama]',
                                                  '$_POST[tkelas]',
                                                  '$_POST[tjurusan]',
                                                  '$_POST[tketerangan]')");
                                          
        //jika simpan sukses dan gagal
        if ($simpan){
                echo "<script>
                 document.location='index.php';
                 </script>";
        }
}

//uji jika tombol edit diklik
if(isset($_POST['bedit'])){
        
        //persiapan edit data baru
        $edit = mysqli_query($koneksi, "UPDATE piket SET
                                                     nama = '$_POST[tnama]',
                                                     kelas = '$_POST[tkelas]',
                                                     jurusan = '$_POST[tjurusan]',
                                                     keterangan = '$_POST[tketerangan]'
                                                WHERE id_hms = '$_POST[id_hms]'
                                                        ");
                                          
        //jika edit sukses dan gagal
        if ($edit){
                echo "<script>
                 document.location='index.php';
                 </script>";
        }
}

//uji jika tombol Hapus diklik
if(isset($_POST['bhapus'])){
        
        //persiapan hapus data baru
        $hapus = mysqli_query($koneksi, "DELETE FROM piket WHERE id_hms = '$_POST[id_hms]'");
                                          
        //jika hapus sukses dan gagal
        if ($hapus){
                echo "<script>
                 document.location='index.php';
                 </script>";
        } else {
                 echo "<script>
                 document.location='index.php';
                 </script>";
                }
}

?>