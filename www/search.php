<!-- search.php: lets users search for an actor/actress/movie -->

<html>

	<head>
		<title>Search</title>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>	

	<body>
	<?php include("navigation.php"); ?>

		<div class = "container">
			<h1>Search Actors/Movies</h1>
			<form method="GET" action="#">
			<label>Keywords:</label>
	            	<input type="text" name="keywords">
	            <input type="submit" value="Search" />
			</form>

	<?php 
	    if($_GET["keywords"]) {

	        // connect to database
	        $db_connection = mysql_connect("localhost", "cs143", "");
	        if(!$db_connection) {
	            $errmsg = mysql_error($db_connection);
	            print "Connection failed: $errmsg <br />";
	            exit(1);
	        }

	        // select database
	        mysql_select_db("CS143", $db_connection);

	        // get input and sanitize it
	        $q = $_GET['keywords'];
	        $keywords = mysql_real_escape_string($q, $db_connection);

	        //check for actors containing the keywords
	        echo "<h1>Actors with names containing '" . $keywords . "'</h1>";
	       	$query = "SELECT CONCAT_WS(' ',first, last) as name, dob, dod FROM Actor WHERE first LIKE '%" . $keywords . "%' OR last LIKE '%" . $keywords . "%';"; 
	       	// issue query
	        $rs = mysql_query($query, $db_connection);


	        // create table
	        echo '<table border="1"
	                     cellpadding="5"
	                     style="width:400px;border-collapse:collapse;">';
	        $nCols = mysql_num_fields($rs);

	        //List all Actors that match either first or last name to keywords
	        echo '<tr style="background-color:#eee;">';
	        for ($i = 0; $i < $nCols; $i++) {
	            $columnName = mysql_field_name($rs, $i);
	            $columnName = ucfirst($columnName);
	            echo '<td>' . $columnName . '</td>';
	        }
	        echo '</tr>';

	        //output all actor results
	        while ($row = mysql_fetch_row($rs)) {
	            echo '<tr>';
	            for ($k = 0; $k < $nCols; $k++) {
	                // TODO: handle null field?
	                if($k==0)
	                	echo "<td><a href=\"showActor.php?name=". $row[$k] .  
		                			"\">". $row[$k] . "</td> </a>";
	                else
	                	echo '<td>' . $row[$k] . '</td>';
	            }
	            echo '</tr>';
	        }
	        echo '</table>';





	        //Search for movies that contain the keywords in their title
	        echo "<h1>Movies containing '" . $keywords . "'</h1>";

	        //select movies that contain the keyword in their title
	        $query = "SELECT title, year FROM Movie WHERE title LIKE '%" . $keywords . "%'"; 
	        // issue query
	        $rs = mysql_query($query, $db_connection);


	        // create table of all movies
	        echo '<table border="1"
	                     cellpadding="5"
	                     style="width:400px;border-collapse:collapse;">';
	        $nCols = mysql_num_fields($rs);

	        //List all movies that contain the keywords
	        echo '<tr style="background-color:#eee;">';
	        for ($i = 0; $i < $nCols; $i++) {
	            $columnName = mysql_field_name($rs, $i);
	            $columnName = ucfirst($columnName);
	            echo '<td>' . $columnName . '</td>';
	        }
	        echo '</tr>';

	        // rest of table
	        while ($row = mysql_fetch_row($rs)) {
	            echo '<tr>';
	            for ($k = 0; $k < $nCols; $k++) {
	                // TODO: handle null field?
	                if($k==0)
	                	echo "<td> <a href=\"showMovie.php?title=" . $row[$k] . "\";>" . $row[$k] .  ' </a></td>';
	                else	
	                	echo '<td>' . $row[$k] . '</td>';
	            }
	            echo '</tr>';
	        }
	        echo '</table>';

	        // end connection
	        mysql_close($db_connection);
	    }
	?>
	</div>
	</body>

</html>