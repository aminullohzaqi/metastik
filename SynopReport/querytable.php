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
        if (isset($_GET['tsearch'])) {
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
        <h3 class="text-center">Stasiun <?php echo mysqli_fetch_array($sql)['Stasiun']; ?></h3>
        <button class="exportToExcel btn btn-info">Export</button>
        <table id="tabel">
            <tr>
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
                <th colspan="2">Action</th>
            </tr>
            <?php while ($row=mysqli_fetch_array($sql)){ ?>
            <tr>
                <td><?php echo $row['Date'];?></td>
                <td><?php echo $row['Tmed'];?></td>
                <td><?php echo $row['Tmax'];?></td>
                <td><?php echo $row['Tmin'];?></td>
                <td><?php echo $row['Prec'];?></td>
                <td><?php echo $row['Press'];?></td>
                <td><?php echo $row['WD'];?></td>
                <td><?php echo $row['WS'];?></td>
                <td><?php echo $row['Cloud'];?></td>
                <td><?php echo $row['Insolation'];?></td>
                <td><a href="edit.php?sta=<?php echo $_GET['getStasiun'];?>&id=<?php echo $row['ID'];?>">Edit</a></td>
                <td><a href="delete.php?sta=<?php echo $_GET['getStasiun'];?>&id=<?php echo $row['ID'];?>" onclick="return confirm('Yakin mau di hapus?');">Delete</a></td>
            </tr>
            <?php } ?>
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
