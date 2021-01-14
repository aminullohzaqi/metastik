<?php 
    include 'koneksi.php';
?>

<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>METASTIK | Home</title>
    <link rel="shortcut icon" type="image" href="Assets/img/logo.png" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="text/javascript" src="Assets/js/Chart.min.js"></script>
    <link href="Assets/css/style.css" rel="stylesheet">
    <link href="Assets/css/slide-in.css" rel="stylesheet">
</head>
<body>
    <div class="sidenav shadow">
        <div class="logo-brand">
            <img src="Assets/img/einsta.jpg" class="logo">
            <h4>METASTIK</h4>
        </div>
        <br>
        <a href="index.php">Home</a>
        <button class="dropdown-btn">Synop Report
            <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-container">
            <a href="SynopReport/lastupdate.php">Last Update</a>
            <a href="SynopReport/input.php">Input Data</a>
            <a href="SynopReport/search.php">Search Data</a>
        </div>
        <button class="dropdown-btn">Quality Control
            <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-container">
            <a href="DataQuality/formrangecheck.php">Range Check</a>
            <a href="DataQuality/formstepcheck.php">Step Check</a>
        </div>
        <a href="Homogenitas/formhomogenitas.php">Uji Homogenitas</a>
        <br>
        <br>
        <a href="tentang.php" class="active">Tentang Kami</a>
		<br>
		<br>
        <div class="custom-control custom-switch" id="dark-mode">
            <input type="checkbox" class="custom-control-input" id="darkSwitch">
            <label class="custom-control-label darklabel" for="darkSwitch">Dark</label>
        </div>
        <script src="Assets/js/dark-mode-switch.min.js"></script>
    </div>

    <div class="main">
	<center><h3>TENTANG KAMI</h3></center>
	<br>
	<h5><b>Metastik</b></h5>
	<p>Manajemen Database Sinoptik (Metastik) merupakan sebuah aplikasi penyedia data-data sinoptik dari berbagai stasiun meteorologi di wilayah Indonesia. Layanan metastik dapat diakses oleh siapapun dan Metastik tidak pernah mengenakan biaya apapun atas layanan kami. Tujuan Metastik adalah menyediakan data-data sinoptik dengan lengkap dan akurat guna mendukung pengetahuan di bidang meteorologi.</p>
	<br>
	<h5><b>Quality Control</b></h5>
	<p>Sebagai mekanisme penjaminan kualitas data, Metastik menggunakan skema quality control. Quality control digunakan untuk mengetahui bagaimana kualitas data yang masuk dengan membandingkannya dengan data historis. Quality control terdiri dari range check dan step check.</p>
    <br>
	<h5><b>Range Check</b></</h5>
	<p>Range check membandingkan data dengan rentang nilai historis data tersebut. Data-data yang memiliki nilai di luar rentang historisnya perlu dipertanyakan dan perlu validasi lebih lanjut dari analis meteorologi. Data-data yang bermasalah dapat menjadi indikasi kerusakan alat, kesalahan sistem, ataupun kejadian meteorologi ekstrem.</p>
    <br>
	<h5><b>Step Check</b></</h5>
	<p>Step check membandingakan selisih nilai sebuah data dengan data sebelumnya. Nilai sebuah data dapat dikategorikan normal ataupun tidak normal berdasarkan selisihnya dengan data sebelumnya. Selisih data yang sangat jauh dapat menjadi indikasi bahwa data tidak sesuai dengan kejadian sebenarnya.</p>
    <br>
	<h5><b>Uji Homogenitas</b></</h5>
    <p>Uji Homogenitas merupakan prosedur pengujian untuk mengetahui keseragaman varian pada suatu populasi data. Keseragaman varian antar populasi data dari berbagai stasiun dapat mengindikasikan bahwa data-data yang masuk memiliki kualitas yang sama. Metastik menggunakan metode <i>Fischer exact test</i> sebagai metode uji homogentias data.</p>
	<br>
	<h5><b>Kelompok Kami</b></</h5>
	<p>Kelompok 1 kelas Instrumentasi 7A terdiri dari enam taruna dan taruni. Setiap anggota memiliki tanggung jawab masing-masing terhadap tugas ini. Rincian tugas setiap anggota adalah sebgai berikut.</p>
	<br>
	<li>Pembuatan model dan relasi data: Aidil Muslim (41.17.0004) dan Btari Sekar (41.17.0016)</li>
	<li>Perancangan database (<i>backend</i>): Abdul Ba'its (41.17.0001) dan Aminulloh Zaqi (41.17.0007)</li>
	<li>Perancangan antarmuka (<i>frontend</i>): Amir Julian (41.17.0008) dan Mahakim Lubis (41.17.0022)</li>	
	<br>
	<br>
	<br>
	<div class="text-center footer"><font><b>DISCLAIMER:</b> Informasi yang ada di halaman web ini hanya sebatas rekayasa dan dibuat untuk memenuhi tugas mata kuliah aplikas database MKG &#169; Copyright Kelompok 1 Instrumentasi 7A 2020</font></div>
    
    <script>
        var dropdown = document.getElementsByClassName("dropdown-btn");
        var i;
        for (i = 0; i < dropdown.length; i++) {
        dropdown[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var dropdownContent = this.nextElementSibling;
            if (dropdownContent.style.display === "block") {
            dropdownContent.style.display = "none";
            } else {
            dropdownContent.style.display = "block";
            }
        });
        }
    </script>
	
    <script src="Assets/js/show-on-scroll.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>