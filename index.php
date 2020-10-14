<?php 

session_start();

if (!isset($_SESSION["landing"])) {
    
    header("Location: landing.php");
    exit;
}

require 'koneksi.php';

$pinjam = query("SELECT * FROM perpus_tb");


//tombol dipencet cari

if (isset($_POST["cari"])) {
    
    $pinjam = cari($_POST["keyword"]);
}

 ?>



<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Perpus Online</title>
<link rel="shortcut icon" href="img/smkn7.png">

<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style type="text/css">



body {
   margin:0;
   padding:0;
   height:100%;
}
    body {
        color: #566787;
        background: #f5f5f5;
        font-family: 'Roboto', sans-serif;
    }

    td {
        text-align: center;
    }

    th{
        text-align: center;
    }
    .table-wrapper {
        background: #fff;
        padding: 20px;
        margin: 30px 0;
        box-shadow: 0 1px 1px rgba(0,0,0,.05);
    }
    .table-title {
        padding-bottom: 10px;
        margin: 0 0 10px;
    }
    .table-title h2 {
        margin: 8px 0 0;
        font-size: 22px;
    }
    .search-box {
        position: relative;        
        float: right;
    }
    .search-box input {
        height: 34px;
        border-radius: 20px;
        padding-left: 35px;
        border-color: #ddd;
        box-shadow: none;
    }
    .search-box input:focus {
        border-color: #3FBAE4;
    }
    .search-box i {
        color: #a0a5b1;
        position: absolute;
        font-size: 19px;
        top: 8px;
        left: 10px;
    }
    table.table tr th, table.table tr td {
        border-color: #e9e9e9;
    }
    table.table-striped tbody tr:nth-of-type(odd) {
        background-color: #ADD8E6;
    }
    table.table-striped.table-hover tbody tr:hover {
        background: #f5f5f5;
    }
    table.table th i {
        font-size: 13px;
        margin: 0 5px;
        cursor: pointer;
    }
    table.table td:last-child {
        width: 130px;
    }
    table.table td a {
        color: #a0a5b1;
        display: inline-block;
        margin: 0 5px;
    }
    table.table td a.view {
        color: #03A9F4;
    }
    table.table td a.edit {
        color: #FFC107;
    }
    table.table td a.delete {
        color: #E34724;
    }
    table.table td i {
        font-size: 19px;
    }    
    .pagination {
        float: right;
        margin: 0 0 5px;
    }
    .pagination li a {
        border: none;
        font-size: 95%;
        width: 30px;
        height: 30px;
        color: #999;
        margin: 0 2px;
        line-height: 30px;
        border-radius: 30px !important;
        text-align: center;
        padding: 0;
    }
    .pagination li a:hover {
        color: #666;
    }   
    .pagination li.active a {
        background: #03A9F4;
    }
    .pagination li.active a:hover {        
        background: #0397d6;
    }
    .pagination li.disabled i {
        color: #ccc;
    }
    .pagination li i {
        font-size: 16px;
        padding-top: 6px
    }
    .hint-text {
        float: left;
        margin-top: 6px;
        font-size: 95%;
    }   

    .footer{
        position: absolute;
        bottom: 0;
        text-align: center;
    }
</style>


<!-- Modal HTML -->




<!-- end modal -->

<nav class="navbar navbar-default" style="background-color: #808080;">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">
        <p style="color: white;">Perpustakaan Online SMK Negeri 7 Baleendah</p>
      </a>
    </div>
  </div>
</nav>
<script type="text/javascript">
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
});
</script>

</head>
<body>
    
  <div class="container">
    <button class="btn btn-primary"><a style="color: white;" href="tambah.php">Pinjam Buku</a></button>
  </div>
    <div class="container">
                <div class="row">
                    <div class="col-sm-8">
                        <h2></h2>
                        <br>
                    </div>
                    <div class="col-sm-4">
                        <form action="" method="post">
                        <div class="search-box">
                            <i class="material-icons">&#xE8B6;</i>
                            <input type="text" class="form-control" placeholder="Search&hellip;" name="keyword" id="keyword">
                        </div>
                    </div>
                </form>
            <div id="container">
            <table class="table table-striped table-hover table-bordered">
                    <tr>
                        <th>id</th>
                        <th>Nama <i class="fa fa-sort"></i></th>
                        <th>Kelas</th>
                        <th>Jurusan <i class="fa fa-sort"></i></th>
                        <th>Buku </th>
                        <th>Actions</th>
                    </tr>
        
                  <?php $a = 1; ?>
                     <?php foreach ($pinjam as $pjm) :?>
                        <tr>
                            <td><?php echo $a; ?></td>
                            <td><?php echo $pjm["nama"]; ?></td>
                            <td><?php echo $pjm["kelas"]; ?></td>
                            <td><?php echo $pjm["jurusan"]; ?></td>
                            <td><?php echo $pjm["buku"]; ?></td>
                            <td><a href="ubah.php?id=<?php echo $pjm["id"]; ?>" class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a> <a href="hapus.php?id=<?php echo $pjm["id"]; ?>" class="delete" title="Delete" data-toggle="tooltip" onclick=" return confirm('Apakah yakin mau menghapus?')"><i class="material-icons">&#xE872;</i></a>  
                            </td>
                        </tr>
                            <?php $a++; ?>
                          <?php endforeach ?>
            </table>  

      </div>
     </div>
  </div>
</div>

    
        <p align="center"><a href="http://localhost/perpustakaan/smkn7.php" class="button alert large" style="font-size: 20px; text-align: center;">logout</a></p>
      
    

<script src="js/script.js"></script>
</body>
</html>                                                                