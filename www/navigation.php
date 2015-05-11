<!-- navigation.php: sidebar with links --> 


<html>

	<head>
		<title>Navigation</title>
		<link rel="stylesheet" type="text/css" href="style.php">
	</head>	

	<body style = "margin:0; padding:0;">

		<div id = "nav">
			<ul class = "navbar">

				<li><a href="./index.php">Home</a></li>

				<li><a href="#">Add</a>
					<ul>
						<li><a href="./addActor.php">Actor</a></li>
		    			<li><a href="./addMovie.php">Movie</a></li>
		    			<li><a href="./addActorMovie.php">Movie/Actor Relation</a></li>
		    		</ul>
				</li>

				<li><a href="#">Show</a>
					<ul>
						<li><a href="./showActor.php?aid=52794">Actor</a></li>
	      				<li><a href="./showMovie.php?mid=2632">Movie</a></li>	
		    		</ul>
				</li>
	      		    
	    		<li><a href="./search.php">Search</a></li>

	    	</ul>
	    </div>
 
	</body>

</html>
