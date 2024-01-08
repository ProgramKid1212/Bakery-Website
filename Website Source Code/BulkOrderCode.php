<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, intial-scale=1.0">
	
	<title>Orders Page</title>
	
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
		
		.full-container {
			display: flex;
			justify-content: center;
		}
		
		.flex-container {
			display: flex;
			flex-wrap: wrap;
			justify-content: space-around;
			background-color: #f1f1f1;
			width: 60vw;
		}
		
		.flex-container div {
			<!-- margin: 3%; -->
		}
		
		.heading {
			display: flex;
			background-color: #f1f1f1;
			flex-basis: 100%;
			justify-content: center;
			align-items: center;
			color: blue;
			
		}
		
		.image {
			background-color: #f1f1f1;
			display: flex;
			justify-content: center;
			align-items: center;
			flex-basis: 30%;
			text-align: center;
			margin-bottom: 15px;
			
		}
		
		.form {
			display: flex;
			justify-content: center;
			align-items: center;
			background-color: #f1f1f1;
			flex-basis: 70%;
		}
		
		.input {
			width: 100%;
			height: 20%;
			margin: 10px;
			padding: 10px;
			background-color: #f1f1f1;
		}
		
		form {
			display: flex;
			width: 100%;
			height: 40vh;
			flex-wrap: wrap;
			justify-content: center;
			align-items: center;
			flex-direction: row;
			color: red;
		}
		
		form label {
			width: 38%;
			text-align: center;
			font-size: 1.5vw;
		}
		
		form input {
			width: 60%;
			padding: 5px;
			margin-right: 2%;
		}
		
		form select {
			width: 60%;
			padding: 5px;
			margin-right: 2%;
		}
		
		
		img {
			max-width: 200px;
			max-height: 200px;
		}
		
		@media screen and (max-width:1050px) {
			.flex-container {
				width: 100vw;
			}
			form label {
				font-size: 4vw;
			}
			* {
				
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
		
		
		<div class="full-container">
			<div class="flex-container">
				<h1>Thank you for ordering!</h1>			
			</div>
		</div>
		

</body>
</html>