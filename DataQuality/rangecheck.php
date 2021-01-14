<?php
    include '../koneksi.php';
?>

<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>METASTIK | Range Check</title>
    <link rel="shortcut icon" type="image" href="../Assets/img/logo.png" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="../Assets/css/style.css" rel="stylesheet">
</head>
<body>
    <div class="sidenav shadow">
        <div class="logo-brand">
            <img src="../Assets/img/einsta.jpg" class="logo">
            <h4>METASTIK</h4>
        </div>
        <br>
        <a href="../index.php" class="">Home</a>
        <button class="dropdown-btn">Synop Report
            <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-container">
            <a href="../SynopReport/lastupdate.php">Last Update</a>
            <a href="../SynopReport/input.php">Input Data</a>
            <a href="../SynopReport/search.php">Search Data</a>
        </div>
        <button class="dropdown-btn">Quality Control
            <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-container">
            <a href="formrangecheck.php">Range Check</a>
            <a href="formstepcheck.php">Step Check</a>
        </div>
        <a href="../Homogenitas/formhomogenitas.php">Uji Homogenitas</a>
        <br>
        <br>
        <a href="../tentang.php">Tentang Kami</a>
		<br>
		<br>
        <div class="custom-control custom-switch" id="dark-mode">
            <input type="checkbox" class="custom-control-input" id="darkSwitch">
            <label class="custom-control-label darklabel" for="darkSwitch">Dark</label>
        </div>
        <script src="../Assets/js/dark-mode-switch.min.js"></script>
    </div>
    <div class="main">
        <?php
            if (isset($_GET['rcheck'])){
                $sql=mysqli_query($conn,"SELECT `id_stasiun`.`Stasiun`, `".$_GET['getStasiun']."`.*
                FROM `id_stasiun`
                    LEFT JOIN `".$_GET['getStasiun']."` ON `".$_GET['getStasiun']."`.`ID_Stasiun` = `id_stasiun`.`ID`
                WHERE `id_stasiun`.`ID` = '".$_GET['getStasiun']."' AND `".$_GET['getStasiun']."`.`Date` BETWEEN '".$_GET['startDate']."' 
                AND '".$_GET['endDate']."'");

                if(mysqli_num_rows($sql)==0){
                    echo "<font color=red><blink>Pencarian data tidak ditemukan!</blink></font>";
                }
            }
        ?> 
        <h3 class="text-center">Range Check Stasiun <?php echo mysqli_fetch_array($sql)['Stasiun'];?></h3>
        <br>
        <table id="tabel">
            <tr>
                <th rowspan="2">Tanggal</th>
                <th colspan="6">Temperatur</th>
                <th colspan="2">Precipitation</th>
                <th colspan="2">Pressure</th>
                <th colspan="2">Insolation</th>
            </tr>
            <tr>
                <th>T Med</th>
                <th>Quality</th>
                <th>T Max</th>
                <th>Quality</th>
                <th>T Min</th>
                <th>Quality</th>
                <th>Precipitation</th>
                <th>Quality</th>
                <th>Pressure</th>
                <th>Quality</th>
                <th>Insolation</th>
                <th>Quality</th>
            </tr>
            <?php while ($row=mysqli_fetch_array($sql)){ ?>
            <tr>
                <td><?php echo $row['Date'];?></td>
                <td><?php echo $row['Tmed'];?></td>
                <td><?php 
                if ($row['Tmed'] == 8888){
                    echo "Error";
                }
                else if ($row['Tmed'] > 40 || $row['Tmed'] < 20){
                    echo "Doubtful";
                }
                else{
                    echo "Normal";
                };?></td>
                <td><?php echo $row['Tmax'];?></td>
                <td><?php 
                if ($row['Tmax'] == 8888){
                    echo "Error";
                }
                else if ($row['Tmax'] < $row['Tmed']){
                    echo "Doubtful";
                }
                else{
                    echo "Normal";
                };?></td>
                <td><?php echo $row['Tmin'];?></td>
                <td><?php 
                if ($row['Tmin'] == 8888){
                    echo "Error";
                }
                else if ($row['Tmin'] > $row['Tmed']){
                    echo "Doubtful";
                }
                else{
                    echo "Normal";
                };?></td>
                <td><?php echo $row['Prec'];?></td>
                <td><?php
                if ($row['Prec'] == 8888){
                    echo "Error";
                }
                else if ($row['Prec'] > 500 || $row['Prec'] < 0){
                    echo "Doubtful";
                }
                else{
                    echo "Normal";
                };?></td>
                <td><?php echo $row['Press'];?></td>
                <td><?php 
                if ($row['Press'] == 8888){
                    echo "Error";
                }
                else if ($row['Press'] < 980 || $row['Press'] > 1020){
                    echo "Doubtful";
                }
                else{
                    echo "Normal";
                };?></td>
                <td><?php echo $row['Insolation'];?></td>
                <td><?php 
                if ($row['Insolation'] == 8888){
                    echo "Error";
                }
                else if ($row['Insolation'] < 0 || $row['Insolation'] > 12){
                    echo "Doubtful";
                }
                else{
                    echo "Normal";
                };?></td>
            </tr>
            <?php } ?>
        </table>
    </div>
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
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>