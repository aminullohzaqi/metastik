<?php
    include '../koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>METASTIK | Input</title>
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
        <div class="container">
            <h2>Input Data</h2>
            <form action="input.php" method="GET" id="form">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group" id="form-stasiun">
                            <label for="Stasiun">Stasiun</label>
                            <select name="getStasiun" id="" class="form-control">
                                <option value="">--PILIH--</option>
                                <?php $select=mysqli_query($conn, "SELECT * FROM id_stasiun");
                                while ($row=mysqli_fetch_array($select)){ ?>
                                <option value="<?php echo $row['ID'];?>"><?php echo $row['Stasiun'];?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group" id="form-date">
                            <label for="date">Tanggal</label>
                            <input type="date" class="form-control" id="date" name="getDate" value="<?php echo $_GET['getDate'];?>" required>
                        </div>
                    </div>
                </div> 
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group" id="form-Tmed">
                            <label for="Tmed">T Med:</label>
                            <input type="number" step=0.01 class="form-control" id="Tmed" placeholder="14 - 33&#8451;" name="getTmed" value="<?php echo $_GET['getTmed'];?>" required>
                        </div>
                        <div class="form-group" id="form-Tmax">
                            <label for="Tmax">T Max</label>
                            <input type="number" step=0.01 class="form-control" id="Tmax" placeholder="14 - 33&#8451;" name="getTmax" value="<?php echo $_GET['getTmax'];?>" required>
                        </div>
                        <div class="form-group" id="form-Tmin">
                            <label for="Tmin">T Min</label>
                            <input type="number" step=0.01 class="form-control" id="Tmin" placeholder="14 - 33&#8451;" name="getTmin" value="<?php echo $_GET['getTmin'];?>" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group" id="form-Prec">
                            <label for="Prec">Curah Hujan</label>
                            <input type="number" step=0.01 class="form-control" id="Prec" placeholder="0 - 500 mm" name="getPrec" value="<?php echo $_GET['getPrec'];?>" required>
                        </div>
                        <div class="form-group" id="form-Press">
                            <label for="Press">Tekanan Udara</label>
                            <input type="number" step=0.01 class="form-control" id="Press" placeholder="980 - 1020 HPa" name="getPress" value="<?php echo $_GET['getPress'];?>" required>
                        </div>
                        <div class="form-group" id="form-WD">
                            <label for="WD">Arah Angin</label>
                            <input type="number" step=0.01 class="form-control" id="WD" placeholder="0 - 360" name="getWD" value="<?php echo $_GET['getWD'];?>" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group" id="form-WS">
                            <label for="WS">Kecepatan Angin</label>
                            <input type="number" step=0.01 class="form-control" id="WS" placeholder="0 - 20 m/s" name="getWS" value="<?php echo $_GET['getWS'];?>" required>
                        </div>
                        <div class="form-group" id="form-Cloud">
                            <label for="Cloud">Tutupan Awan</label>
                            <input type="text" class="form-control" id="Cloud" placeholder="1/8 - 8/8" name="getCloud" required>
                        </div>
                        <div class="form-group" id="form-Insolation">
                            <label for="Insolation">Penyinaran Matahari</label>
                            <input type="number" step=0.01 class="form-control" id="Insolation" placeholder="0 - 12" name="getInsolation" value="<?php echo $_GET['getInsolation'];?>" required>
                        </div>
                        <input class="button-submit btn btn-info" type="submit" name="cek" value="SUBMIT" onclick="myFunction()">
                    </div>
                </div>
            </form>
        </div>
        <?php include "inputrangecheck.php" ?>
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
