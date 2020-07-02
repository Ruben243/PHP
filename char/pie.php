</section>
<footer>
&copy; <?php

if (isset($_SESSION["nombre"]))
{
	echo $_SESSION["nombre"];
	echo " ";
}
else
{
	echo "yo ";
}
echo date("Y");
?>
</footer>
</body>
</html>
