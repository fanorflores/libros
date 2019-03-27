<?php

$numero1= $_POST['dato1'];
$numero2= $_POST['dato2'];
$operac= $_POST['operacion'];

echo "<h1>Operación a realizar: </h1><h1>".$operac."</h1>";
echo "<br>";
echo "<strong>Primer Dato: </strong>".$numero1;
echo "<br>";
echo "<strong>Segundo Dato: </strong>".$numero2;
echo "<br>";

 
switch ($operac) {
    case suma:
     
        break;
    case resta:


        break;
    case division:
     
        break;

    case multiplicacion:
     
        break;
}
?>

