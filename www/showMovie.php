<!-- showMovie.php: shows movie information -->
<html>

	<head>
		<title>Show Movie</title>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>	
	<body>
	<?php include("navigation.php"); ?>
		<div class = "container">
			<h1>Movies</h1>

			<form method="GET" action="#">
				<label>Search for movies:</label>
					<input type="text" name="title">
				<input type="submit" value="Search">
			</form>
		
	<?php

		if($_GET["title"]) {
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
            $q = $_GET['title'];

            $query = "SELECT * 
            			FROM Movie 
            			WHERE title=\"" . $q . "\""; 

            // issue query
            $rs = mysql_query($query, $db_connection);
            $nCols = mysql_num_fields($rs);

            //column names
            $row = mysql_fetch_row($rs);
            if($row){
            	echo "<h2>Result for movie: '" . $q ."'</h2>";
	            /*output the following info for the movie:
					-Title
					-Year
					-Rating
					-Production Company
	            */
				$movieID = $row[0];
	            for ($i = 1; $i < $nCols; $i++) {
	                $columnName = mysql_field_name($rs, $i);
	                $columnName = ucfirst($columnName);
	                if($i == 3)
	                	echo "MPAA ";
	                if($i == 4)
	                	echo "Production ";
	                echo $columnName . ": " . $row[$i] . '<br />';
	            }

	            /*output director and Genre Information:
					-Director(year born)
					-Genre
	            */
				//Find the Genres of the Movie
				$query = "SELECT genre 
							FROM MovieGenre 
							WHERE mid=\"" . $movieID . "\"";

				$rs = mysql_query($query, $db_connection);
				$columnName = mysql_field_name($rs, 0);
				$columnName = ucfirst($columnName);
				echo $columnName . ": ";

				//List all genres of the movie
				while ($row = mysql_fetch_row($rs)){
					echo $row[0] . ", ";
				}
				echo "<br />";

				//Find the directors for the movie
				$query = "SELECT D.first, D.last, D.dob 
							FROM Director D RIGHT JOIN 
							(SELECT did 
								FROM MovieDirector 
								WHERE mid=" . $movieID . ") 
							Q2 ON D.id=Q2.did;";

				$rs = mysql_query($query, $db_connection);
				$nCols = mysql_num_fields($rs);
				$columnName = mysql_field_name($rs, 0);
				$columnName = ucfirst($columnName);

				echo "Director: ";
				while($row = mysql_fetch_row($rs)){

					for ($i = 0; $i < $nCols; $i++) {
		                $columnName = mysql_field_name($rs, $i);
		                $columnName = ucfirst($columnName);
		                if($row[$i] == "")
		                	echo "";
		                else if($i < 1)
		                	echo $row[$i] . " ";
		                else if($i == $nCols-1)
		                	echo "(" . $row[$i] . ") ";
		                else
		                	echo $row[$i] . ', ';
		            }
	        }

			}
			else
				echo '<h2>Movie Not Found</h2>';

			if($movieID){
				echo '<p>';
				echo '<h2>Actors in this movie: </h2>';

				//List all actors in the Movie
				$query = "SELECT A.first, A.last, Q2.role 
				FROM Actor A RIGHT JOIN 
							(SELECT aid, role 
								FROM MovieActor 
								WHERE mid=" . $movieID . ") 
						Q2 ON A.id=Q2.aid;";

						
				$rs = mysql_query($query, $db_connection);

		        $nCols = mysql_num_fields($rs);

		        echo '<table class = "resultTable">';
	           	echo '<tr>';
	           	
	           	for ($i = 1; $i < $nCols; $i++) {
		            $columnName = mysql_field_name($rs, $i);
		            $columnName = ucfirst($columnName);
		            if($i == 1){
		            	echo "<th> Actor </th>";
		            }
		            else
		            	echo '<th>' . $columnName . '</th>';
	        	}
	        	echo '</tr>';

		        while ($row = mysql_fetch_row($rs)) {
		        	echo "<tr>";
		            for ($k = 0; $k < $nCols; $k++) {
		                // TODO: handle null field?
		                if($k == $nCols - 1)
		                	echo "<td>" . $row[$k] . "</td> ";
		                //List the actor's names as links to their profiles
		                else{
		                	$names = $row[$k] . " " . $row[$k+1];
		                	echo "<td><a href=\"showActor.php?name=". $names .  
		                			"\">". $names . "</td> </a>";
		                	$k++;
		                }
		            }
		             echo '</tr>';
		        }; 
		        echo '</p>';
		    }
            mysql_close($db_connection);
        }
	?>


	</div>
	</body>

</html>