<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <title>CRUD Arkademy</title>
  </head>
  <body>


    <?php
    include"crud.php";
    $tampil=mysqli_query($conn, "Select * from name");


?>


    <!-- Membuat Navbar -->
     <nav class="navbar navbar-header">
      <img src="img/arkademy.png" width="200px">

</nav>
    <!-- awal Container -->
    <div class="container mt-2 mb-4 p-2 shadow bg-white">
       <!-- Button Add -->
         <div class="col-auto">
            <button type="submit" name="add" class="btn btn-warning" data-toggle = "modal" data-target ="#add">Add</button>
          </div>

      <br>

          <table class="table">
  <thead>
    <tr>
      
      <th scope="col">Name</th>
      <th scope="col">Work</th>
      <th scope="col">Salary</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>

<?php
        //query ke database SELECT tabel mahasiswa urut berdasarkan id yang paling besar
        $sql = mysqli_query($conn, "SELECT * FROM work ORDER BY id DESC") or die(mysqli_error($conn));
        //jika query diatas menghasilkan nilai > 0 maka menjalankan script di bawah if...
        if(mysqli_num_rows($sql) > 0){
          //membuat variabel $no untuk menyimpan nomor urut
     
          //melakukan perulangan while dengan dari dari query $sql
          while($data = mysqli_fetch_assoc($sql)){
            //menampilkan data perulangan
            echo '
            <tr>
             
              <td>'.$data['id'].'</td>
              <td>'.$data['name'].'</td>
              <td>'.$data['id_salary'].'</td>
              <td>
                <a href="#'.$data['id'].'" class="btn btn-primary" data-toggle="#editmodal">Edit</a>
                <a href="delete.php'.$data['id'].'" class="btn btn-danger" onclick="return confirm(\'Yakin ingin menghapus data ini?\')">Delete</a>
              </td>
            </tr>
            ';
            
          }
        //jika query menghasilkan nilai 0
        }else{
          echo '
          <tr>
            <td colspan="6">Tidak ada data.</td>
          </tr>
          ';
        }
        ?>

  </tbody>
</table>
      </div>



    </div>
    <!-- akhir jumbotron -->


<!-- Modal -->

 <div class="modal fade" id="add" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Tutup</span>
                </button>
                <h4 class="modal-title" id="labelModalKu">ADD</h4>
            </div>
            <!-- Modal Body -->
            <div class="modal-body">
                <p class="statusMsg"></p>
                <form role="form">
                    <div class="form-group">
                        <label for="masukkanNama">Nama</label>
                        <input type="text" class="form-control" id="masukkanNama" placeholder="Masukkan nama Anda"/>
                    </div>
                    <div class="form-group">
                        <label for="masukkanEmail">Work</label>
                        <div class="dropdown">
                           <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                          </button>
                          <div class="dropdown-menu">
                            <div class="dropdown-header">Chosee Work</div>
                            <a class="dropdown-item" href="#">Frontend Dev</a>
                            <a class="dropdown-item" href="#">Backend Dev</a>
                            
                          </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <Optio for="masukkanPesan">Salary</label>
                        <div class="dropdown">
                           <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                          </button>
                          <div class="dropdown-menu">
                            <div class="dropdown-header">Choose Salary</div>
                            <a class="dropdown-item" href="#">Rp. 10.000.000</a>
                            <a class="dropdown-item" href="#">Rp. 12.000.000</a>
                            
                          </div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-warning submitBtn" onclick="kirimContactForm()">ADD</button>
            </div>
        </div>
    </div>
</div>






<!-- modal edit -->

<div class="modal fade" id="editmodal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Tutup</span>
                </button>
                <h4 class="modal-title" id="labelModalKu">ADD</h4>
            </div>
            <!-- Modal Body -->
            <div class="modal-body">
                <p class="statusMsg"></p>
                <form role="form">
                    <div class="form-group">
                        <label for="masukkanNama">Nama</label>
                        <input type="text" class="form-control" id="masukkanNama" placeholder="Masukkan nama Anda"/>
                    </div>
                    <div class="form-group">
                        <label for="masukkanEmail">Work</label>
                        <div class="dropdown">
                           <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                          </button>
                          <div class="dropdown-menu">
                            <div class="dropdown-header">Chosee Work</div>
                            <a class="dropdown-item" href="#">Frontend Dev</a>
                            <a class="dropdown-item" href="#">Backend Dev</a>
                            
                          </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <Optio for="masukkanPesan">Salary</label>
                        <div class="dropdown">
                           <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                          </button>
                          <div class="dropdown-menu">
                            <div class="dropdown-header">Choose Salary</div>
                            <a class="dropdown-item" href="#">Rp. 10.000.000</a>
                            <a class="dropdown-item" href="#">Rp. 12.000.000</a>
                            
                          </div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-warning submitBtn" onclick="kirimContactForm()">ADD</button>
            </div>
        </div>
    </div>
</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>