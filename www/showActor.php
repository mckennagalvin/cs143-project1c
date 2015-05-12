<!-- showActor.php: shows actor information -->

<html>

	<head>
		<title>Show Actor</title>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>	

	<?php include("navigation.php"); ?>

	<body>

		<div class = "container">
			<h1>Actor Info</h1>

			<form method="GET" action="#">
				<label>Search for other actors:</label>
					<input type="text" name="name">
				<input type="submit" value="Search">
			</form>
		</div>
		<?php

		if($_GET["name"]) {
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
            $q = $_GET['name'];
            $names = explode(' ', $q);
            //$names = mysql_real_escape_string($q, $db_connection);
            $query = "SELECT * FROM Actor WHERE first='$names[0]' AND last = '$names[1]'"; 

            //echo "$query";
            // issue query
            $rs = mysql_query($query, $db_connection);
            $nCols = mysql_num_fields($rs);

            //column names
            $row = mysql_fetch_row($rs);
            if($row){
            	echo '<h1>Info on this actor:</h1>';
	            echo '<p>';
	            /*output the following info for the movie:
					-Title
					-Year
					-Rating
					-Production Company
	            */
				$actorID = $row[0];
	            for ($i = 1; $i < $nCols; $i++) {
	                $columnName = mysql_field_name($rs, $i);
	                $columnName = ucfirst($columnName);
	                //put first and last name in proper order
	                if($i < 2){
	                	echo "Name: " . $row[$i+1] . " " . $row[$i] . "<br />";
	                	$i++;
	                }
	                else{
		                echo "$columnName: $row[$i]";
		                //check for date of death
		                if($i == $nCols-1 && $row[$i] == "")
		                	echo "--still alive--";
		                echo "<br />";

	                }
	            }

			}
			else
				echo '<h1>Actor Not Found</h1>';

			if($actorID){
				echo '<p>';
				echo '<h2>Movies acted in: </h2>';

				//List all actors in the Movie
				$query = "SELECT Q2.role as role, M.title 
							FROM Movie M RIGHT JOIN 
							(SELECT mid, role FROM MovieActor WHERE aid=" . $actorID . ") 
							Q2 ON M.id=Q2.mid;";;
				$rs = mysql_query($query, $db_connection);

		        $nCols = mysql_num_fields($rs);

		        while ($row = mysql_fetch_row($rs)) {
		            for ($k = 0; $k < $nCols; $k++) {
		                // TODO: handle null field?
		                echo  "As " . $row[$k] . " in <a href=\'#\';>" . $row[++$k] .  ' </a>';
		            }
		             echo '<br />';
		        }
		        echo '</p>';
		    }
            mysql_close($db_connection);
        }
		?>

	</body>

</html>