<?php
    include '../koneksi.php';
?>

<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>METASTIK | Step Check</title>
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
            <a href="../DataQuality/formrangecheck.php">Range Check</a>
            <a href="../DataQuality/formstepcheck.php">Step Check</a>
        </div>
        <a class="active" href="formhomogenitas.php">Uji Homogenitas</a>
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
        <form action="homogenitas.php" method="get">
            <div class="col-md-5">
                <label for="">Select Parameter</label>
                <select name="getParameter" id="" class="form-control">
                    <option value="" disabled>--PILIH--</option>
                    <option value="Tmed">T Med</option>
                    <option value="Tmax">T Max</option>
                    <option value="Tmin">T Min</option>
                    <option value="Prec">Precipitation</option>
                    <option value="Press">Pressure</option>
                    <option value="WD">Wind Direction</option>
                    <option value="WS">Wind Speed</option>
                    <option value="Insolation">Insolation</option>
                </select>
            </div>
            <br>
            <div class="col-md-5 d-flex">
                <div>
                    <label for="">Stasiun 1</label>
                    <select name="getStasiun1" id="" class="form-control">
                        <option value="" disabled>--PILIH--</option>
                        <?php $select=mysqli_query($conn, "SELECT * FROM id_stasiun");
                        while ($row=mysqli_fetch_array($select)){ ?>
                        <option value="<?php echo $row['ID'];?>"><?php echo $row['Stasiun'];?></option>
                        <?php } ?>
                    </select>
                </div>
                <div style="padding-left: 30px;">
                    <label for="">Stasiun 2</label>
                    <select name="getStasiun2" id="" class="form-control">
                        <option value="" disabled>--PILIH--</option>
                        <?php $select=mysqli_query($conn, "SELECT * FROM id_stasiun");
                        while ($row=mysqli_fetch_array($select)){ ?>
                        <option value="<?php echo $row['ID'];?>"><?php echo $row['Stasiun'];?></option>
                        <?php } ?>
                    </select>
                </div>
                <div style="padding-left: 30px;">
                    <label for="">Stasiun 3</label>
                    <select name="getStasiun3" id="" class="form-control">
                        <option value="" disabled>--PILIH--</option>
                        <?php $select=mysqli_query($conn, "SELECT * FROM id_stasiun");
                        while ($row=mysqli_fetch_array($select)){ ?>
                        <option value="<?php echo $row['ID'];?>"><?php echo $row['Stasiun'];?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <br>
            <div class="col-md-5 d-flex">
                <div>
                    <label for="">Stasiun 4</label>
                    <select name="getStasiun4" id="" class="form-control">
                        <option value="" disabled>--PILIH--</option>
                        <?php $select=mysqli_query($conn, "SELECT * FROM id_stasiun");
                        while ($row=mysqli_fetch_array($select)){ ?>
                        <option value="<?php echo $row['ID'];?>"><?php echo $row['Stasiun'];?></option>
                        <?php } ?>
                    </select>
                </div>
                <div style="padding-left: 30px;">
                    <label for="">Stasiun 5</label>
                    <select name="getStasiun5" id="" class="form-control">
                        <option value="" disabled>--PILIH--</option>
                        <?php $select=mysqli_query($conn, "SELECT * FROM id_stasiun");
                        while ($row=mysqli_fetch_array($select)){ ?>
                        <option value="<?php echo $row['ID'];?>"><?php echo $row['Stasiun'];?></option>
                        <?php } ?>
                    </select>
                </div>
                <div style="padding-left: 30px;">
                    <br>
                    <input type="submit" name="ttest" value="Uji" class="btn btn-info" style="margin-top: 10px;">
                </div> 
            </div>
        </form>
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
    <script src="Assets/js/show-on-scroll.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>