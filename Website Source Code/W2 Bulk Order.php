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


<body onload="updateForm()">
<?php
    $arrItems = array("Hamburger Rolls", "Hot Dog Rolls", "Crossiants", "Paninis", "Bagels", "Milktarts", "Pies", "Cupcakes");

    $item = "";

    $item = $_GET["item"];

    if (!empty($_POST) &&$_SERVER["REQUEST_METHOD"] == "POST") {
        $orderAmt = $empID = $fullPrice = $orderID = 0;
        $itemID = $userEmail = $bakedItem = $pickupDate = "";


        $servername = "sql304.epizy.com";
        $username = "epiz_34352232";
        $dbpassword = "9FYKhRQQYf2Y8";
        $dbname = "epiz_34352232_bakeryDatabase";

        $conn = new mysqli($servername, $username, $dbpassword, $dbname);

        if ($conn->connect_error) {
			  die("Connection failed: " . $conn->connect_error);
		}

        $bakedItem = validate_input($_POST["bakedItem"]);


        switch ($bakedItem) {
            case "Hamburger Rolls":
                $itemID = "ham";
                break;
            case "Hot Dog Rolls":
                $itemID = "hdog";
                break;
            case "Crossiants":
                $itemID = "cross";
                break;
            case "Paninis":
                $itemID = "pani";
                break;
            case "Bagels":
                $itemID = "bagl";
                break;
            case "Milktarts":
                $itemID = "mtart";
                break;
            case "Pies":
                $itemID = "pie";
                break;
            case "Cupcakes":
                $itemID = "ccake";
                break;
        }

        $orderAmt = validate_input($_POST["orderAmt"]);
        $pickupDate = validate_input($_POST["datePick"]);
        $userEmail = validate_input($_POST["userEmail"]);

        $sql = "SELECT empID FROM employees WHERE currentOrderID = '' LIMIT 1";
	    $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $empID = $row["empID"];


            $pre = $conn->prepare("INSERT INTO ordersTable (orderAmt, pickupDate, userEmail, itemID, empID) VALUES (?, ?, ?, ?, ?)");
                $pre->bind_param("sssss", $orderAmt, $pickupDate, $userEmail, $itemID, $empID);

            $pre->execute();

            $orderID = $conn->insert_id;

            $sql = "UPDATE employees SET currentOrderID='". $orderID . "' WHERE empID='" . $empID . "'";
            $conn->query($sql);

            echo "New records created successfully";

            $pre->close();
		    $conn->close();
            header('Location: BulkOrderCode.php');
        }
        else {
            echo '<script>window.alert("The order limit has been reached. Please try again another time."); window.location.replace("W2 Bulk Order.php")</script>';

            $pre->close();
            $conn->close();
            header('Location: W2 Bulk Order.php');            
        }



    //Write subquery using ANY to check if employee not already have an order

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
        var selectedImage = document.bakery.bakedItem.options[document.bakery.bakedItem.selectedIndex].value;
        selectedImage = selectedImage.replace(/\s+/g, '');
        document.itemImg.src = ("images/" + (selectedImage) + ".jpg");
    }

    function currentDate(){
	    var datus = new Date();
  
        bakery.datePick.value = datus.toISOString().split("T")[0];
        bakery.datePick.min = datus.toISOString().split("T")[0];
        datus.setDate(datus.getDate() + 2);
        bakery.datePick.max = datus.toISOString().split("T")[0];
        }
    
    function updateForm(){
        switchImage()
        currentDate()
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
					<img src="images/selectItem.jpg" name="itemImg">
				</div>

				
				<div class="form">
                    <div class="heading">
                        <h2 >Bulk Orders</h2>
                        <br>
                    </div>

					<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" name="bakery">
						
							<label for="baked">Item:</label>
							<select name="bakedItem" id="baked" onchange="switchImage()">
                                <?php
                                if ($item == ""){
                                    echo('<option disabled selected value="selectItem"> -- select an option --</option>');                                    
                                    echo('<option>Hamburger Rolls</option>');
                                    echo('<option>Hot Dog Rolls</option>');
                                    echo('<option>Crossiants</option>');
                                    echo('<option>Paninis</option>');
                                    echo('<option>Bagels</option>');
                                    echo('<option>Milktarts</option>');
                                    echo('<option>Pies</option>');
                                    echo('<option>Cupcakes</option>');
                                }
                                else{
                                    foreach ($arrItems as $key => $value) {
                                        if ($value == $item) {
                                            echo('<option selected="selected" value='.$value.'>'.$value.'</option>');
                                        } else {
                                            echo('<option value='.$value.'>'.$value.'</option>');
                                        }
                                    }
                                }
                                ?>
							</select>	

						
							<label for="amtItem">Number of Goods:</label>
							<input type="number" name="orderAmt" id="amtItem" min="10" max="150">
                            
                            <label for="datePick">Pickup Date:</label>
                            <input type="date" name="datePick" onload="currentDate()">
							
							<label for="email">Customer Email</label>
							<input type="text" name="userEmail" id="email">
							
							<input type="submit" class="submit" value="Place Order">
							
							
							
						
					</form>
				</div>
				
			</div>
		</div>
		

</body>
</html>