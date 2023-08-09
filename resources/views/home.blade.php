<!DOCTYPE html>
<html>
<head>
    <title>Rest API with AJAX JQuery</title>
    <!-- CSS Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Lilita+One&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>
<body>

<!-- isi -->
<div class="container">
    <h1 class="header text-center mb-5">SIMPLE CRUD REST API WITH AJAX</h1>
    <div class="card shadow">
        <div class="card-style pt-3 pb-3">
            <div>
                <p>C</p>
                <p>R</p>
                <p>U</p>
                <p>D</p>
            </div>
        </div>
        
        <p class="text-right">
            <button class="btn btn-info" data-toggle="modal" data-target="#Modaltambah">Tambah Data</button>
        </p>
        <table class="table">
            <thead class="text-dark">
                <tr>
                    <th scope="col">NO</th>
                    <th scope="col">NIM</th>
                    <th scope="col">NAMA</th>
                    <th scope="col">FAKULTAS</th>
                    <th scope="col">PROGRAM STUDI</th>
                    <th scope="col">ALAMAT</th>
                    <th scope="col">AKSI</th>
                </tr>
            </thead>
            <tbody id="tempat_data" class="bg-white">
                <tr>
                    <td>x</td>
                    <td>x</td>
                    <td>x</td>
                    <td>x</td>
                    <td>x</td>
                    <td>x</td>
                </tr>
            </tbody>
        </table>
                 
    </div>
</div>
<!-- end of isi -->

<!-- modal tambah-->
<div class="modal fade" id="Modaltambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label>NIM</label>
                        <input type="text" class="form-control" id="nim">
                    </div>
                    <div class="form-group">
                        <label>NAMA</label>
                        <input type="text" class="form-control" id="nama">
                    </div>
                    <div class="form-group">
                        <label>FAKULTAS</label>
                        <input type="text" class="form-control" id="fakultas">
                    </div>
                    <div class="form-group">
                        <label>PROGRAM STUDI</label>
                        <input type="text" class="form-control" id="program_studi">
                    </div>
                    <div class="form-group">
                        <label>ALAMAT</label>
                        <textarea class="form-control" id="alamat"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-info" id="save" data-dismiss="modal">Save</button>
            </div>
        </div>
    </div>
</div>
<!-- end of modal tambah-->

<!-- modal edit-->
<div class="modal fade" id="Modaledit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label>ID</label>
                        <input type="text" class="form-control" id="idEdit" disabled>
                    </div>
                    <div class="form-group">
                        <label>NIM</label>
                        <input type="text" class="form-control" id="nimEdit">
                    </div>
                    <div class="form-group">
                        <label>NAMA</label>
                        <input type="text" class="form-control" id="namaEdit">
                    </div>
                    <div class="form-group">
                        <label>FAKULTAS</label>
                        <input type="text" class="form-control" id="fakultasEdit">
                    </div>
                    <div class="form-group">
                        <label>PROGRAM STUDI</label>
                        <input type="text" class="form-control" id="programStudiEdit">
                    </div>
                    <div class="form-group">
                        <label>ALAMAT</label>
                        <textarea class="form-control" id="alamatEdit"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-info" data-dismiss="modal" id="update">Update</button>
            </div>
        </div>
    </div>
</div>
<!-- end ofmodal edit-->


<!-- JS Bootstrap -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js" integrity="sha256-lSjKY0/srUM9BE3dPm+c4fBo1dky2v27Gdjm2uoZaL0=" crossorigin="anonymous"></script>
<!-- Custom JS -->
<script type="text/javascript" src="{{ asset('assets/js/script.js') }}"></script>
</body>
</html>