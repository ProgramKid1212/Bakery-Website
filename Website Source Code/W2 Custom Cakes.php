<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, intial-scale=1.0">
	
	<title>Custom Cake Orders</title>
	
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
			width: 70vw;
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
            flex-wrap: wrap;
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
			max-width: 400px;
			max-height: 400px;
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

<?php
    $cakeSize = $empID = 0;
    $cakeType = $customMessage = $userEmail = "";

    $arrCakes = array( "Chocolate", "Red Velvet","Cheesecake","Vanilla");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $servername = "sql304.epizy.com";
        $username = "epiz_34352232";
        $dbpassword = "9FYKhRQQYf2Y8";
        $dbname = "epiz_34352232_bakeryDatabase";

        $conn = new mysqli($servername, $username, $dbpassword, $dbname);

        if ($conn->connect_error) {
			  die("Connection failed: " . $conn->connect_error);
		}

        $sql = "SELECT empID FROM employees WHERE currentOrderID = '' LIMIT 1";
	    $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $empID = $row["empID"];
            echo '<script>window.alert("Employee ID: ' . $empID . '");</script>';
            $cakeType = validate_input($_POST["cakeType"]);
            $cakeSize = validate_input($_POST["cakeSize"]);
            $customMessage = validate_input($_POST["customMessage"]);
            $userEmail = validate_input($_POST["userEmail"]);

            $pre = $conn->prepare("INSERT INTO customCakeOrders (cakeType, cakeSize, customMessage, userEmail, empID) VALUES (?, ?, ?, ?, ?)");
                $pre->bind_param("sssss", $cakeType, $cakeSize, $customMessage, $userEmail, $empID);

            $pre->execute();

            $orderID = $conn->insert_id;

            $sql = "UPDATE employees SET currentOrderID='". $orderID . "' WHERE empID='" . $empID . "'";
            $conn->query($sql);

            $pre->close();
		    $conn->close();
        }
        else {
            echo '<script>window.alert("The order limit has been reached. Please try again another time."); window.location.replace("W2 Bulk Order.php")</script>';

            $pre->close();
            $conn->close();
            header('Location: W2 Custom Cakes.php'); 
        }
    }

    function validate_input($data) {
		  $data = trim($data);
		  $data = stripslashes($data);
		  $data = htmlspecialchars($data);
		  return $data;
	}

?>

<script>
    function switchImage(){
        var selectedImage = document.bakery.cakeType.options[document.bakery.cakeType.selectedIndex].value;
        document.cakeImg.src = ("images/" + (selectedImage) + ".jpg");

    }

</script>

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
				
				<div class="image">
					<img src="images/selectCake.jpg" name="cakeImg">
				</div>
				
				<div class="form">
                    <div class="heading">
                        <h2 >Custom Cake Form</h2>
                        <br>
                    </div>

					<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" name="bakery">

						
							<label for="typeCake">Cake Type:</label>
							<select name="cakeType" id="typeCake" onchange="switchImage()">
                                <option disabled selected value="selectCake"> -- select an option --</option>                                   
                                <option>Chocolate</option>
                                <option>Red Velvet</option>
                                <option>Cheesecake</option>
                                <option>Vanilla</option>

                                <!--<?php
                                    if ($item == ""){
                                        echo('<option disabled selected value="selectCake"> -- select an option --</option>');                                    
                                        echo('<option>Chocolate</option>');
                                        echo('<option>Red Velvet</option>');
                                        echo('<option>Cheesecake</option>');
                                        echo('<option>Vanilla</option>');
                                    }
                                    else{
                                        foreach ($arrCakes as $key => $value) {
                                            if ($value == $item) {
                                                echo('<option selected="selected" value='.$value.'>'.$value.'</option>');
                                            } else {
                                                echo('<option value='.$value.'>'.$value.'</option>');
                                            }
                                        }
                                    }
                                ?>-->
							</select>	

						    <label for="sizeCake">Cake Size:</label>
							<select name="cakeSize" id="sizeCake">
							  <option value="6">6 inches</option>
							  <option value="8">8 inches</option>
							  <option value="10">10 inches</option>
							  <option value="12">12 inches</option>
							</select>

							<label for="cakeMessage">Custom Message:</label>
							<input type="text" name="customMessage" id="cakeMessage">												
							
							<label for="email">Customer Email</label>
							<input type="text" name="userEmail" id="email">
							

							<input type="submit" class="submit" value="Place Order">
							
							
							
						
					</form>
				</div>
				
			</div>
		</div>
		

</body>
</html>