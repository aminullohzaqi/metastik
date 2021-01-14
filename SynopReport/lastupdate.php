<?php
    include '../koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>METASTIK | Search</title>
    <link rel="shortcut icon" type="image" href="../Assets/img/logo.png" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="../Assets/js/jquery.table2excel.js"></script>
    <link href="../Assets/css/style.css" rel="stylesheet">
    <style>
        .main{
            display: block;
            justify-content: center;
            align-items: center;
        }
    </style>
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
            <a href="lastupdate.php">Last Update</a>
            <a href="input.php">Input Data</a>
            <a href="search.php">Search Data</a>
        </div>
        <button class="dropdown-btn">Quality Control
            <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-container">
            <a href="../DataQuality/formrangecheck.php">Range Check</a>
            <a href="../DataQuality/formstepcheck.php">Step Check</a>
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
        function query($getStasiun){
            include "../koneksi.php";
            $return = array();
            $sql=mysqli_query($conn,"SELECT `id_stasiun`.*, `$getStasiun`.*
            FROM `$getStasiun` 
                LEFT JOIN `id_stasiun` ON `$getStasiun`.`ID_Stasiun` = `id_stasiun`.`ID`
            ORDER BY `$getStasiun`.`Date` DESC LIMIT 1;");
            while ($row=mysqli_fetch_array($sql)){ 
                echo "<tr><td>"; echo $row['Stasiun']; echo"</td>";
                echo "<td>"; echo $row['Date']; echo"</td>";
                echo "<td>"; echo $row['Tmed']; echo"</td>";
                echo "<td>"; echo $row['Tmax']; echo"</td>";
                echo "<td>"; echo $row['Tmin']; echo"</td>";
                echo "<td>"; echo $row['Prec']; echo"</td>";
                echo "<td>"; echo $row['Press']; echo"</td>";
                echo "<td>"; echo $row['WD']; echo"</td>";
                echo "<td>"; echo $row['WS']; echo"</td>";
                echo "<td>"; echo $row['Cloud']; echo"</td>";
                echo "<td>"; echo $row['Insolation']; echo"</td></tr>";
            }
        }
    ?>
        <h3 class="text-center">Last Update</h3>
        <button class="exportToExcel btn btn-info">Export</button>
        <table id="tabel">
            <tr>
                <th>Stasiun</th>
                <th>Date</th>
                <th>T Med</th>
                <th>T Max</th>
                <th>T Min</th>
                <th>Precipitation</th>
                <th>Pressure</th>
                <th>Wind Direction</th>
                <th>Wind Speed</th>
                <th>Cloud Coverage</th>
                <th>Insolation</th>
            </tr>
            <?php 
                echo query("96011");
                echo query("96087");
                echo query("96145");
                echo query("96163");
                echo query("96171");
                echo query("96207");
                echo query("96221");
                echo query("96253");
                echo query("96615");
                echo query("96741");
                echo query("96751");
                echo query("96937");
                echo query("97008");
                echo query("97072");
                echo query("97192");
                echo query("97378");
                echo query("97406");
                echo query("97700");
                echo query("97760");
                echo query("97780"); 
            ?>
        </table>
        
		<script>
			$(function() {
				$(".exportToExcel").click(function(e){
					var table = $(this).next('#tabel');
					if(table && table.length){
						var preserveColors = (table.hasClass('table2excel_with_colors') ? true : false);
						$(table).table2excel({
							exclude: ".noExl",
							name: "Excel Document Name",
							filename: "Result" + new Date().toISOString().replace(/[\-\:\.]/g, "") + ".xls",
							fileext: ".xls",
							exclude_img: true,
							exclude_links: true,
							exclude_inputs: true,
							preserveColors: preserveColors
						});
					}
				});
				
			});
        </script>
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
    </div>
</body>
</html>
