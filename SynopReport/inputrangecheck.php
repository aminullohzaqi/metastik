<?php 
if(isset($_GET['cek'])){
    $stasiun    = $_GET['getStasiun'];
    $date       = $_GET['getDate'];
    $Tmed	      = $_GET['getTmed'];
    $Tmax	      = $_GET['getTmax'];
    $Tmin	      = $_GET['getTmin'];
    $Prec       = $_GET['getPrec'];
    $Press      = $_GET['getPress'];
    $WD         = $_GET['getWD'];
    $WS         = $_GET['getWS'];
    $Cloud      = $_GET['getCloud'];
    $Insolation = $_GET['getInsolation'];

    if($Tmed > 33 || $Tmed < 14){
		  die("Data T Med Tidak Valid"); 
    }
    if($Tmax > 33 || $Tmax < 14){
      die("Data T Max Tidak Valid"); 
    }
    if($Tmin > 33 || $Tmin < 14){
      die("Data T Min Tidak Valid"); 
    }
    if($Prec > 500 || $Prec < 0){
      die("Data Curah Hujan Tidak Valid"); 
    }
    if($Press < 980  || $Press > 1020){
      die("Data Tekanan Tidak Valid"); 
    }
    if($WS < 0  || $WS > 15){
		  die("Data Kecepatan Angin Tidak Valid"); 
    }
    if($WD < 0  || $WD > 360){
		  die("Data Arah Angin Tidak Valid"); 
    }
    if($Insolation < 0 || $Insolation > 12){
		  die("Data Penyinaran Matahari Tidak Valid"); 
    }
    else{
      $sql = "INSERT INTO `".$stasiun."` (`ID_Stasiun`, `Date`, `Tmed`, `Tmax`, `Tmin`, `Prec`, `Press`, `WD`, `WS`, `Cloud`, `Insolation`)
      VALUES ('".$stasiun."', '".$date."', '".$Tmed."', '".$Tmax."', '".$Tmin."', '".$Prec."', '".$Press."', '".$WD."', '".$WS."', '".$Cloud."', '".$Insolation."')";
      $query	= mysqli_query($conn,$sql);

      if ($query){
        echo '<script language="javascript">';
        echo 'alert("Data Berhasil Disimpan")';
        echo '</script>';
      }
      else {
        echo"Error:" .$sql. "<br>". mysqli_error($conn);
      }
    }
}

?>