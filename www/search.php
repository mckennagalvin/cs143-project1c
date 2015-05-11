<!-- search.php: lets users search for an actor/actress/movie -->

<html>

	<head>
		<title>Search</title>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>	

	<?php include("navigation.php"); 

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

                    $query = "SELECT last FROM Actor WHERE first=\"" . $keywords . "\""; 

                    //echo "$query";

                    // issue query
                    $rs = mysql_query($query, $db_connection);

    
                    // create table
                    echo '<table border="1"
                                 cellpadding="5"
                                 style="width:400px;border-collapse:collapse;">';
                    $nCols = mysql_num_fields($rs);

                    //column names
                    echo '<tr style="background-color:#eee;">';
                    for ($i = 0; $i < $nCols; $i++) {
                        $columnName = mysql_field_name($rs, $i);
                        echo '<td>' . $columnName . '</td>';
                    }
                    echo '</tr>';

                    // rest of table
                    while ($row = mysql_fetch_row($rs)) {
                        echo '<tr>';
                        for ($k = 0; $k < $nCols; $k++) {
                            // TODO: handle null field?
                            echo '<td>' . $row[$k] . '</td>';
                        }
                        echo '</tr>';
                    }
                    echo '</table>';

                    // end connection
                    mysql_close($db_connection);
                }



	?>

	<body>

		<div class = "container">
			<h1>Search Actors/Movies</h1>
			<form method="GET" action="#">
			<label>Keywords:</label>
	            	<input type="text" name="keywords">
	            <input type="submit" value="Search" />
			</form>
		</div>

	</body>

</html>