<?php
/*Esta función devuelve el string input rellenado por la izquierda,
la derecha, o en ambos lados hasta la longitud especificada. 
Si el argumento opcional pad_string no se suministra,
el input se rellena con espacios, de lo contrario, 
se rellena con los caracteres de pad_string hasta el límite. */
$entrada = "Ruben Gines";

echo str_pad($entrada, 20, "!", STR_PAD_BOTH); //!!!!Ruben Gines!!!!!
echo "</br>";
echo str_pad($entrada, 20, "!", STR_PAD_LEFT); //!!!!!!!!!Ruben Gines
echo "</br>";
echo str_pad($entrada, 20, "!", STR_PAD_RIGHT); //Ruben Gines!!!!!!!!!