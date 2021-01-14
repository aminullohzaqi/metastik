<?php 
if(isset($_GET['tedit'])){
    $stasiun    = $_GET['Stasiun'];
    $Date       = $_GET['Date'];
    $Tmed	      = $_GET['Tmed'];
    $Tmax	      = $_GET['Tmax'];
    $Tmin	      = $_GET['Tmin'];
    $Prec       = $_GET['Prec'];
    $Press      = $_GET['Press'];
    $WD         = $_GET['WD'];
    $WS         = $_GET['WS'];
    $Cloud      = $_GET['Cloud'];
    $Insolation = $_GET['Insolation'];

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
      $sql = "UPDATE `".$stasiun."` SET Date='$Date', Tmed='$Tmed', Tmax='$Tmax', Tmin='$Tmin', Prec='$Prec', Press='$Press', WD='$WD', WS='$WS', Cloud='$Cloud', Insolation='$Insolation' WHERE Date='$Date'";
      $query	= mysqli_query($conn,$sql);

      if ($query){
        echo '<script language="javascript">';
        echo 'alert("Data Berhasil Diedit")';
        echo '</script>';
      }
      else {
        echo"Error:" .$sql. "<br>". mysqli_error($conn);
      }
    }
}

?>