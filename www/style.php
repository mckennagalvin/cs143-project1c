<!-- style.php: contains css -->

<?
header('Content-Type: text/css');
?>

<link href='http://fonts.googleapis.com/css?family=Roboto:100,300,400' rel='stylesheet' type='text/css'>

body {
	margin: 0;
	padding: 0;
}

.container {
	width: 50%;
	margin: 50 auto 0 auto;
}

#nav {
    background-color: #eee;
    width: 100%;
    height: 40px;
    margin: 0;
    position: relative;
}

.navbar {
	margin: 0 auto 0 auto;
	padding: 0;
	height: 40px;
	position: absolute;
}

.navbar li {
	background-color: #eee;
	height: auto;
	text-align: center;
    float: left;
    list-style: none;
    font-family: "Roboto", sans-serif;
    font-weight: 300;
    font-size: 14px;
    margin: 0;
    padding: 0;
    width: 150px;
}

.navbar a {
	padding: 12px 0 12px 0;
	display: block;
    color: #333;
    text-decoration: none;
    border-left: 1px solid #fff;
    border-right: 1px solid #dbdbdb;
}

.navbar li:hover, a:hover, .navbar li ul li a:hover {
	background-color: #dbdbdb;
} 

.navbar li ul 	{
	display: none;
	height: auto;									
	margin: 0;
	padding: 0;		
}

.navbar li:hover ul {
	display: block;
}

 .navbar li ul li {
 	background-color: #eee;
 } 

.navbar li ul li a 	{
	border-bottom: 1px solid #dbdbdb;
	border-top: 1px solid #fff; 
}



