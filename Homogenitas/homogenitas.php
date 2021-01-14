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
    <style>
        .main{
            margin-top: 30px;
        }
        #result{
            font-size: 18px;
        }
        #result td, #result th{
            vertical-align: top;
            padding-left: 20px;
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
    <div class="main d-flex">
        <?php
            if (isset($_GET['ttest'])){
                $sql_1=mysqli_query($conn,"SELECT `".$_GET['getStasiun1']."`.`".$_GET['getParameter']."`
                FROM `".$_GET['getStasiun1']."` ORDER BY `Date` DESC LIMIT 20");
                $sql_2=mysqli_query($conn,"SELECT `".$_GET['getStasiun2']."`.`".$_GET['getParameter']."`
                FROM `".$_GET['getStasiun2']."` ORDER BY `Date` DESC LIMIT 20");
                $sql_3=mysqli_query($conn,"SELECT `".$_GET['getStasiun3']."`.`".$_GET['getParameter']."`
                FROM `".$_GET['getStasiun3']."` ORDER BY `Date` DESC LIMIT 20");
                $sql_4=mysqli_query($conn,"SELECT `".$_GET['getStasiun4']."`.`".$_GET['getParameter']."`
                FROM `".$_GET['getStasiun4']."` ORDER BY `Date` DESC LIMIT 20");
                $sql_5=mysqli_query($conn,"SELECT `".$_GET['getStasiun5']."`.`".$_GET['getParameter']."`
                FROM `".$_GET['getStasiun5']."` ORDER BY `Date` DESC LIMIT 20");
            }
             
        ?>
        <div class="col-md-7"> 
            <table id="tabel">
                <tr>
                    <th>Row</th>
                    <th><?php echo $_GET['getStasiun1'];?></th>
                    <th><?php echo $_GET['getStasiun2'];?></th>
                    <th><?php echo $_GET['getStasiun3'];?></th>
                    <th><?php echo $_GET['getStasiun4'];?></th>
                    <th><?php echo $_GET['getStasiun5'];?></th>
                </tr>
                <?php $i = 1; while (($row=mysqli_fetch_array($sql_1)) && 
                                    ($row2=mysqli_fetch_array($sql_2)) && 
                                    ($row3=mysqli_fetch_array($sql_3)) &&
                                    ($row4=mysqli_fetch_array($sql_4)) &&
                                    ($row5=mysqli_fetch_array($sql_5))){?>
                <tr>
                    <td><?php echo $i++;?></td>
                    <td><?php echo $row[$_GET['getParameter']];?></td>
                    <td><?php echo $row2[$_GET['getParameter']];?></td>
                    <td><?php echo $row3[$_GET['getParameter']];?></td>
                    <td><?php echo $row4[$_GET['getParameter']];?></td>  
                    <td><?php echo $row5[$_GET['getParameter']];?></td>    
                </tr>
                <?php } ?>

                <?php
                    function varians($parameter, $getStasiun){
                        include "../koneksi.php";
                        $return = array();
                        $varian=mysqli_query($conn,"SELECT VARIANCE(a.`$parameter`) FROM (SELECT `$parameter` FROM `$getStasiun`
                                            ORDER BY `Date` DESC LIMIT 20) a");
                        while ($row=mysqli_fetch_array($varian)){ 
                            $return = $row[0];    
                        }
                        return $return;
                    }
                    function totalrows($parameter, $getStasiun){
                        include "../koneksi.php";
                        $return = array();
                        $total=mysqli_query($conn,"SELECT COUNT(a.`$parameter`) FROM (SELECT `$parameter` FROM `$getStasiun`
                                            LIMIT 20) a");
                        while ($row=mysqli_fetch_array($total)){ 
                            $return = $row[0];    
                        }
                        return $return;
                    }
                ?>

                <tr>
                    <th>Varians</th>
                    <td><?php echo varians($_GET['getParameter'], $_GET['getStasiun1']);?></td>
                    <td><?php echo varians($_GET['getParameter'], $_GET['getStasiun2']);?></td>
                    <td><?php echo varians($_GET['getParameter'], $_GET['getStasiun3']);?></td>
                    <td><?php echo varians($_GET['getParameter'], $_GET['getStasiun4']);?></td>
                    <td><?php echo varians($_GET['getParameter'], $_GET['getStasiun5']);?></td>
                </tr>
            </table>
        </div>        
        <?php
            $array_varian = array(varians($_GET['getParameter'], $_GET['getStasiun1']),
                            varians($_GET['getParameter'], $_GET['getStasiun2']),
                            varians($_GET['getParameter'], $_GET['getStasiun3']),
                            varians($_GET['getParameter'], $_GET['getStasiun4']),
                            varians($_GET['getParameter'], $_GET['getStasiun5']));
            $Fisher = max($array_varian)/min($array_varian);
            $Ftabel = 5.182;
        ?>
        <div class="col-md-5">
            <table id="result">
                <tr>
                    <th>Total Row</th>
                    <td><?php echo totalrows($_GET['getParameter'], $_GET['getStasiun1']);?></td>
                </tr>
                <tr>
                    <th>Var Max</th>
                    <td><?php echo max($array_varian);?></td>
                </tr>
                <tr>
                    <th>Var Min</th>
                    <td><?php echo min($array_varian);?></td>
                </tr>
                <tr>
                    <th rowspan = "2"><em>F.hitung</em></th>
                    <td><?php echo max($array_varian);?>/<?php echo min($array_varian);?></td>
                </tr>
                <tr>
                <td><?php echo $Fisher;?></td>
                </tr>
                <tr>
                    <th rowspan = "2"><em>F.tabel</em></th>
                    <td>0.05; (<?php echo totalrows($_GET['getParameter'], $_GET['getStasiun1']);?>-1) ;
                    (<?php echo totalrows($_GET['getParameter'], $_GET['getStasiun1']);?>-1)</td>
                </tr>
                <tr>
                <td><?php echo $Ftabel;?></td>
                </tr>
                <tr>
                    <th>Hasil</th>
                    <td><?php
                        if ($Fisher <= $Ftabel){
                            echo "Data tersebut <b>Homogen</b>";
                        } else{
                            echo "Data tersebut <b>Heterogen</b>";
                        }?>
                    </td>
                </tr>
            </table>
        </div>
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