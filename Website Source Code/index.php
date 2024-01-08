<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, intial-scale=1.0">
	
	<title>Greg's Bakery Homepage</title>
	
	<style>

		* {
			box-sizing: border-box;
			}

		body {
			background-image: url('images/breads-picture.jpeg');
			background-repeat: no-repeat;
			background-attachment: fixed;
			background-size: cover;
			font-family: georgia, serif;
			margin: 0px;
		}

		.header {
			background-color: #f1f1f1;
			padding: 12px;
			text-align: center;
			font-family: courier, monospace;
			max-width: 100%; 
			margin: 0px;
		}

		
		h1 {
			text-align: center;
			font-size: 60px;
		}	
		
		.spacing {
			display: flex;
			justify-content: center;
			background-color: #333;
			height: 50px;
			align-items: center;
			<!-- color: #333; -->
		}
		
		.navbar {
			display: flex;
			border: 1px solid black;
			justify-content: center;
			align-items: center;
			width: 33.3vw;
			height: 50px;
			color: white;
		}
		
		.flex-container {
			display: flex;
			flex-wrap: wrap;
			justify-content: space-around;
			background-color: #f1f1f1;
		}
		
		.item {
			background-color: #f1f1f1;
            transition: transform .2s;
			flex-basis: 414px;
			margin: 10px;
			padding: 20px;
			font-size: 30px;
			text-align: center;
            color: black;
		}
		
		.item:hover {
			background-color: #dfe2e8;
            transform: scale(1.08);
		}		
		
        img {
            height: 400px;
            width: 400px;
        }

		@media screen and (max-width:600px) {
			.sidecolumn {
				display: none;
			}
		}
		
	</style>
</head>

<body>
	<div class="header">
		<h1>GREG'S BAKERY</h1>
	</div>
	
	
	<div class="spacing">
		<a href="http://gregsbakery.000.pe/?i=1" style="text-decoration:none">
			<div class="navbar">Home Page</div>
		</a>
		
		<a href="W2 Custom Cakes.php" style="text-decoration:none">
			<div class="navbar">Custom Cakes</div>
		</a>
		
		<a href="W2 Bulk Order.php" style="text-decoration:none">
			<div class="navbar">Order Page</div>
		</a>
		
	</div>
	
	<br>
	<br>
	
	<div class="flex-container">
		<a href="W2 Bulk Order.php?item=Hamburger Rolls" style="text-decoration:none">
			<div class="item">
				<img src="images/HamburgerRolls.jpg">
				<br>
				<h3>Burger Rolls</h3>
			</div>
		</a>
		
		<a href="W2 Bulk Order.php?item=Hot Dog Rolls" style="text-decoration:none">
			<div class="item">
				<img src="images/HotDogRolls.jpg">
				<br>
				<h3>Hotdog Rolls</h3>
			</div>
		</a>
		
		<a href="W2 Bulk Order.php?item=Crossiants" style="text-decoration:none">
			<div class="item">
				<img src="images/Crossiants.jpg">
				<br>
				<h3>Crossiants</h3>
			</div>
		</a>
		
		<a href="W2 Bulk Order.php?item=Paninis" style="text-decoration:none">
			<div class="item">
				<img src="images/Paninis.jpg">
				<br>
				<h3>Paninis</h3>
			</div>
		</a>
		
		<a href="W2 Bulk Order.php?item=Bagels" style="text-decoration:none">
			<div class="item">
				<img src="images/Bagels.jpg">
				<br>
				<h3>Bagels</h3>
			</div>
		</a>
		
		<a href="W2 Bulk Order.php?item=Milktarts" style="text-decoration:none">
			<div class="item">
				<img src="images/Milktarts.jpg">
				<br>
				<h3>Milktarts</h3>
			</div>
		</a>
		
		<a href="W2 Bulk Order.php?item=Pies" style="text-decoration:none">
			<div class="item">
				<img src="images/Pies.jpg">
				<br>
				<h3>Pies</h3>
			</div>
		</a>
		
		<a href="W2 Bulk Order.php?item=Cupcakes" style="text-decoration:none">
			<div class="item">
				<img src="images/Cupcakes.jpg">
				<br>
				<h3>Cupcakes</h3>
			</div>
		</a>
	
	</div>
	
	
	
</body>

</html>