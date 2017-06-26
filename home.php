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

	<table align="center" cellpadding="12">
  <tr>
    <th><h2 style="color: blue;">Click on the Table you would like to view</h2></th>
    <th><h2 style="color: blue;">Click on the Pre-Selected Query you would like to view</h2></th>
  </tr>
  <tr>
    <td>
    	<form action="table1.php" method="post">
	    	<input id="button" type="submit" name="table1" value="Car" />
		</form>
    </td>
    <td>
    	<form action="query1.php" method="post">
	    	<input id="button" type="submit" name="query1" value="Controllers by Continental" />
		</form>
    </td>
  </tr>
  <tr>
    <td>
    	<form action="table2.php" method="post">
			<input id="button" type="submit" name="table2" value="Car Component" />
		</form>
    </td>
    <td>
    	<form action="query2.php" method="post">
	    	<input id="button" type="submit" name="query2" value="CAN Signals with their Controller" />
		</form>
    </td>
  </tr>
  <tr>
    <td>
    	<form action="table3.php" method="post">
			<input id="button" type="submit" name="table3" value="Connector" />
		</form>
    </td>
    <td>
    	<form action="query3.php" method="post">
	    	<input id="button" type="submit" name="query3" value="Male Pin Connector and Controller" />
		</form>
    </td>
  </tr>
  <tr>
    <td>
    	<form action="table5.php" method="post">
			<input id="button" type="submit" name="table5" value="Can Signals" />
		</form>
    </td>
    <td>
    	<form action="query4.php" method="post">
	    	<input id="button" type="submit" name="query4" value="All Cars Ordered by Manufacturing date" />
		</form>
    </td>
  </tr>
  <tr>
    <td>
    	<form action="table6.php" method="post">
			<input id="button" type="submit" name="table6" value="Controller" />
		</form>
    </td>
    <td>
    	<form action="query5.php" method="post">
	    	<input id="button" type="submit" name="query5" value="All Brake and Aceleration CAN Signals" />
		</form>
    </td>
  </tr>
</table>
	
<div style="display: flex; justify-content: center;">
	<img  src="https://lh3.googleusercontent.com/-VueGdehOHC0/WVBdQmDHwHI/AAAAAAAABV0/8YjAGv4b2gsJm_fIS4fEYJXCaWjK3kFNwCL0BGAYYCw/h1046/SER322%2BTeam%2B10%2BUpdated%2BER%2BDiagram.jpg" align="middle"/>
</div>
</body>

</html>
