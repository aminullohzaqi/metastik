<?php
    include '../koneksi.php';
?>

<!DOCTYPE HTML>
<html>
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
        <form action="rangecheck.php" method="get">
            <div class="col-md-5">
                <label for="">Select Stasiun</label>
                <select name="getStasiun" id="" class="form-control">
                    <option value="">--PILIH--</option>
                    <?php $select=mysqli_query($conn, "SELECT * FROM id_stasiun");
                    while ($row=mysqli_fetch_array($select)){ ?>
                    <option value="<?php echo $row['ID'];?>"><?php echo $row['Stasiun'];?></option>
                    <?php } ?>
                </select>
            </div>
            <br>
            <div class="col-md-3 d-flex">
                <div>
                    <label for="">Start Date</label>
                    <input type="date" name="startDate" id="" class="form-control">
                </div>
                <div style="padding-left: 30px;"> 
                    <label for="">End Date</label>
                    <input type="date" name="endDate" id="" class="form-control">
                    <input type="submit" name="rcheck" value="Cari" class="btn btn-info" style="margin-top: 10px;">
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
</body>
</html>