<html>
<head>
<link rel="stylesheet" type="text/css" href="/modesto/css/mycss.css" />
<script>
function enviar()
{
	document.forms[0].submit();
}
</script>
</head>
<body>
<?php
function mostrarSemana(int $lunes, int $mes, int $anio) : bool
{
	echo "<tr>";
	for ($i=0;$i<7;$i++)
	{
		echo "<td";
		if ($mes != date("m",$lunes)) echo " class=\"otromes\" ";
		echo "> ".date("d",$lunes)."</td>";
		$lunes = $lunes + 86400;
	}
	echo "</tr>";
	
	return (($mes>=date("m",$lunes)) and ($anio>=date("Y",$lunes)));
}

$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

if (isset($_REQUEST["mes"]))
{
	$mes = (int)$_REQUEST["mes"];
	$anio = (int)$_REQUEST["anio"];
}
else
{
	$mes=date("m");
	$anio=date("Y");
}

echo "<div class=\"centrar\">";
echo "<form method=\"POST\" action=\"\">";
echo "<label for=\"mes\">Mes:</label>";
echo "<select name=\"mes\" id=\"mes\" onchange=\"javascript:enviar();\" />";
for($i=1;$i<=12;$i++)
{
	echo "<option value=\"$i\"";
	if ($i==$mes) echo " selected ";
	echo ">{$meses[$i-1]}</option>";
}
echo "</select>";
echo "<label for=\"anio\">Año:</label>";
echo "<input type=\"number\" name=\"anio\" id=\"anio\" value=\"$anio\"  onchange=\"javascript:enviar();\"/>";
//echo "<input type=\"submit\" value=\"Enviar\" />";
echo "</form>";

$a = mktime(0,0,0,$mes,1,$anio);

$diaSemana = (int)date("N",$a);
$diaSemana--;
$lunes = $a - ($diaSemana * 86400);
//$diaSemana = (int)date("w",$a);
//$diaSemana--;
//if ($diaSemana<0) $diaSemana=6;
//$lunes = $a - ($diaSemana * 86400);

echo "<table class=\"calendar\">";
echo "<tr><th>Lunes</th><th>Martes</th><th>Miércoles</th><th>Jueves</th><th>Viernes</th><th>Sábado</th><th>Domingo</th></tr>";
$seguir=true;
do
{
	$seguir = mostrarSemana($lunes, $mes, $anio);
	$lunes = $lunes + (86400 * 7);
}
while ($seguir);

echo "</table></div>";






?>
</body>
</html>