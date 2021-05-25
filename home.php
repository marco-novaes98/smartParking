<?php

$mysqli = new mysqli("127.0.0.1", "user1", "password1", "SmartParking", 3306);
if ($mysqli->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

$plazasOcupadas = 0;
$plazasOcupadas = $mysqli->query("SELECT COUNT(*) FROM Reserva ");
$row = $plazasOcupadas->fetch_row();

$colors = array_fill(1,14,"red");
for($i=1;$i <=14; $i++){
    if($i > $row[0]){
        $cambio = array($i => "green");
        $colors = array_replace($colors,$cambio);
    }
}


function reserva(){

$mysqli = new mysqli("127.0.0.1", "user1", "password1", "SmartParking", 3306);
if ($mysqli->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}


$nombre = $_POST['nombreEstudiante'];
$apellido = $_POST['apellidoEstudiante'];
$matricula = $_POST['matriculaCoche'];
$query = "INSERT INTO Reserva(Nombre,Apellido,Matricula) VALUES (?,?,?)";
$stmt = $mysqli->prepare($query);
$stmt->bind_param("sss", $nombre, $apellido, $matricula);
$stmt->execute();
header("Location:confirmacion.php/?nombre=$nombre&matricula=$matricula");

}
    
if(isset($_POST['addReserva'])){
	reserva();
}


?>


<div class="main2">
<h1 class="titulo">Parking ETSII</h1>
<h2>¡Reserva plaza de parking desde casa!</h2>

<form method="post" action="home.php" class="center">
    <div class="formulario">
        <div class="horizontal">
            <p class="center"> <label for="nombreEstudiante">Nombre</label></p>
            <p class="center"><input type="text" name="nombreEstudiante"></p>
        </div>
        <div class="horizontal">
            <p class="center"> <label for="apellidoEstudiante">Apellido</label></p>
            <p class="center"><input type="text" name="apellidoEstudiante"></p>
        </div>
        <div class="horizontal">
            <p class="center"> <label for="matriculaCoche">Matrícula del coche</label></p>
            <p class="center"><input type="text" name="matriculaCoche"></p>
        
        </div>
        <p class="center"><input type="submit" value="Reserva tu plaza ya!" name="addReserva" /></p>
    </div>
    
   
</form>

<p class="center num-plazas">Número de plazas disponibles: <?php echo 14-$row[0];?>/14</p>

</div>

<div class="main dark-background">
<div id="grid-line">
  <div class=<?php echo $colors[1];?>><img src="coche11.png" class="imagen2"></div>
  <div class=<?php echo $colors[2];?>><img src="coche11.png" class="imagen2"></div>
  <div class=<?php echo $colors[3];?>><img src="coche11.png" class="imagen2"></div>
  <div class=<?php echo $colors[4];?>><img src="coche11.png" class="imagen2"></div>
  <div class=<?php echo $colors[5];?>><img src="coche11.png" class="imagen2"></div>
  <div class=<?php echo $colors[6];?>><img src="coche11.png" class="imagen2"></div>
  <div class=<?php echo $colors[7];?>><img src="coche11.png" class="imagen2"></div>
  <div class=<?php echo $colors[8];?>><img src="coche11.png" class="imagen2"></div>
  <div class=<?php echo $colors[9];?>><img src="coche11.png" class="imagen2"></div>
  <div class=<?php echo $colors[10];?>><img src="coche11.png" class="imagen2"></div>
  <div class=<?php echo $colors[11];?>><img src="coche11.png" class="imagen2"></div>
  <div class=<?php echo $colors[12];?>><img src="coche11.png" class="imagen2"></div>
  <div class=<?php echo $colors[13];?>><img src="coche11.png" class="imagen2"></div>
  <div class=<?php echo $colors[14];?>><img src="coche11.png" class="imagen2"></div>
</div>
</div>
<p class="center">App creada por el equipo de Smart Parking de la ETSII, síguenos en Twitter @smartetsii</p>



<link rel="stylesheet" href="style.css" />



