<!-- addActorMovie.php: let users add to the "actor to movie" relation -->

<html>

	<head>
		<title>Add to Actor/Movie Relation</title>
		<link rel="stylesheet" type="text/css" href="style.php">
	</head>	

	<?php include("navigation.php"); ?>

	<body>

		<div class = "container">

			<h1>Add to actor/movie relation</h1>

			<form method="POST" action="./addActorMovie.php">
				<label>Movie:</label>
		        		<select name="mid" style="width:200px;">
		        			<option value=""></option>
		        			<?php
	    						$db_connection = mysql_connect("localhost", "cs143", "");
	    						if(!$db_connection) {
	        						$errmsg = mysql_error($db_connection);
	        						echo "Could not connect to database: $errmsg <br />";
	        						exit(1);
	    						}
	    						mysql_select_db("CS143", $db_connection);
	    						$movieQuery = "SELECT id, title, year FROM Movie";
	    						$rs = mysql_query($movieQuery, $db_connection);
	    						while ($row = mysql_fetch_row($rs)) {
	                        		echo '<option value="' . $row[0] . '">' . $row[1] . ' (' . $row[2] . ')</option>';
	                        	}
		        			?>
			        	</select><br/>

			    <label>Actor:</label>
		        		<select name="aid" style="width:200px;">
		        			<option value=""></option>
		     
		        			<?php
	    						$actorQuery = "SELECT id, first, last FROM Actor";
	    						$rs = mysql_query($actorQuery, $db_connection);
	    						while ($row = mysql_fetch_row($rs)) {
	                        		echo '<option value="' . $row[0] . '">' . $row[2] . ', ' . $row[1] . '</option>';
	                        	}
		        			?>
			        	</select><br/>

			    <label>Role:</label>
		            	<input type="text" name="role" maxlength="50"><br/>

		        <label></label>
		        	<input type="submit" value="Add actor/movie" />
		    </form>



<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // get input
    $mid = $_POST["mid"];
	$aid = $_POST["aid"];
	$role = $_POST["role"];

    // sanitize input
	$mid = mysql_real_escape_string($mid, $db_connection);
	$aid = mysql_real_escape_string($aid, $db_connection);
	$role = mysql_real_escape_string($role, $db_connection);

	// add to MovieActor
	$insertQuery = "INSERT INTO MovieActor VALUES('$mid', '$aid', '$role')";
	if(mysql_query($insertQuery, $db_connection)) {
		if (!mysql_error())
			echo "Successful add!";
		else
			echo "Error:" . mysql_errno();
	}
	else
		echo "Error adding to MovieActor relation";

	// end connection
    mysql_close($db_connection);
}	
?>



		</div>

	</body>

</html>