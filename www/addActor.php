<!-- addActor.php: let users add actor information -->

<html>

	<head>
		<title>Add Actor</title>
		<link rel="stylesheet" type="text/css" href="style.php">
	</head>	

	<?php include("navigation.php"); ?>

	<body>

		<div class = "container">

			<h1>Add actor</h1>

			<form method="POST" action="./addActor.php">
				<label>First Name:</label>
	            	<input type="text" name="first" maxlength="20"><br/>
	            <label>Last Name:</label>
	        		<input type="text" name="last" maxlength="20"><br/>
	        	<label>Sex:</label>
	        		<input type="radio" name="sex" value="Male" checked="true">Male
					<input type="radio" name="sex" value="Female">Female<br/>
				<label>Date of Birth:</label>
					<input type="text" name="dob"><br/>
				<label>Date of Death:</label>
					<input type="text" name="dod"><br/>
				<label></label>
	            <input type="submit" value="Add actor" />
	        </form>


<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

	// connect to database
    $db_connection = mysql_connect("localhost", "cs143", "");
    if(!$db_connection) {
        $errmsg = mysql_error($db_connection);
        print "Connection failed: $errmsg <br />";
        exit(1);
    }

    // select database
    mysql_select_db("CS143", $db_connection);


    // get input
    $first = $_POST["first"];
	$last = $_POST["last"];
	$sex = $_POST["sex"];
	$dob = $_POST["dob"];
	$dod = $_POST["dod"];

	// handle empty fields
	if ($first=="" || $dob=="")
		echo "Some required fields are missing. Please try again.";
	else {


    // sanitize input
	$first = mysql_real_escape_string($first, $db_connection);
	$last = mysql_real_escape_string($last, $db_connection);
	$sex = mysql_real_escape_string($sex, $db_connection);
	$dob = mysql_real_escape_string($dob, $db_connection);
	$dod = mysql_real_escape_string($dod, $db_connection);


	// add actor

	// get current max ID and increment it
	$maxIDQuery = mysql_query("SELECT id FROM MaxPersonID", $db_connection);
	$row = mysql_fetch_row($maxIDQuery);
	$maxID = $row[0];
	$maxID = $maxID + 1;

	// update max ID in database
	$updateQuery = "UPDATE MaxPersonID SET id=$maxID";
	if(!mysql_query($updateQuery, $db_connection))
		echo "Error updating MaxPersonID";

	// insert new actor
	$insertQuery = "INSERT INTO Actor VALUES('$maxID', '$last', '$first', '$sex', '$dob', '$dod')";
	if(mysql_query($insertQuery, $db_connection)) {
		if (!mysql_error())
			echo "Successful add of $first $last!";
		else
			echo "Error:" . mysql_errno();
	}
	else
		echo "Error adding actor.";
	
	}

	// end connection
    mysql_close($db_connection);
}	
?>

</div>

</body>

</html>