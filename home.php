<html>
<head>
</head>

<body>

<?php
$con = @mysql_connect("localhost", "root", "");
if(!$con) {
	die("Cannot connect: " . mysql_error());
}
echo "<center><h1>Automotive Controller Database for SER 322</h1></center> <hr />";
mysql_close($con);
?>
<h2 style="color: blue;">Click on the Table you would like to view</h2>
<form action="table1.php" method="post">
    <input id="button" type="submit" name="table1" value="Car" />
</form>
<form action="table2.php" method="post">
	<input id="button" type="submit" name="table2" value="Car Component" />
</form>
<form action="table3.php" method="post">
	<input id="button" type="submit" name="table3" value="Connector" />
</form>
<form action="table5.php" method="post">
	<input id="button" type="submit" name="table5" value="Can Signals" />
</form>
<form action="table6.php" method="post">
	<input id="button" type="submit" name="table6" value="Controller" />
</form>
<img src="https://lh3.googleusercontent.com/-VueGdehOHC0/WVBdQmDHwHI/AAAAAAAABV0/8YjAGv4b2gsJm_fIS4fEYJXCaWjK3kFNwCL0BGAYYCw/h1046/SER322%2BTeam%2B10%2BUpdated%2BER%2BDiagram.jpg">
</body>

</html>
