<?php
// Include your database connection file
include_once '../assets/conn/dbconnect.php';

if(isset($_POST['SubmitButton'])) { //check if form was submitted
    $newNumber = $_POST['newNumber']; //get input text
    
    // Update the number in the table
    $query = "update token set t_number='$newNumber' where t_id=1";
    $result = mysqli_query($con, $query);

    // Check if the update was successful
    if($result) {
        echo $newNumber;
    } else {
        echo "Update failed. Please try again.";
    }
    exit; // Stop further execution
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Number Incrementer</title>
    <style>
       <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Number Incrementer</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
            margin: 50px;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            height: 200px;
        }

        #numberDisplay {
            font-size: 2em;
            margin: 10px 0;
        }

        button {
            font-size: 1em;
            padding: 10px 20px;
            cursor: pointer;
            background-color: #4caf50;
            color: white;
            border: none;
            border-radius: 5px;
            margin: 5px;
        }

        button:hover {
            background-color: #45a049;
        }

        #submitButton,
        #resetButton {
            font-size: 1em;
            padding: 10px 20px;
            cursor: pointer;
            border: none;
            border-radius: 5px;
            margin-top: 20px;
        }

        #submitButton {
            background-color: #3498db;
            color: white;
        }

        #submitButton:hover {
            background-color: #2980b9;
        }

        #resetButton {
            background-color: #e74c3c;
            color: white;
        }

        #resetButton:hover {
            background-color: #c0392b;
        }
    </style>
</head>
<body>
    </style>
</head>
<body>

<div class="container">
    <button id="decrementButton" onclick="decrement()">-</button>
    <div id="numberDisplay">0</div>
    <button id="incrementButton" onclick="increment()">+</button>

    <form action="<?=$_SERVER['PHP_SELF'];?>" method="post" onsubmit="return onSubmit()">
        <input type="hidden" id="newNumber" name="newNumber" value="0">
        <input type="submit" name="SubmitButton" value="Submit"/>
        <button type="button" id="resetButton" onclick="resetNumber()">Reset</button>
    </form>
</div>

<script>
    let currentNumber = 0;
    const numberDisplay = document.getElementById('numberDisplay');
    const numberField = document.getElementById('newNumber');
    
    function increment() {
        currentNumber++;
        updateNumberDisplay();
        numberField.value = currentNumber;
    }

    function decrement() {
        currentNumber--;
        updateNumberDisplay();
        numberField.value = currentNumber;
    }

    function updateNumberDisplay() {
        numberDisplay.textContent = currentNumber;
    }

    function onSubmit() {
        // Your JavaScript code here
        // You can remove the alert or customize it as needed
        alert("Number to be submitted: " + numberField.value);

        // Return true to allow the form submission to proceed
        return true;
    }

    function resetNumber() {
        currentNumber = 0;
        updateNumberDisplay();
        numberField.value = currentNumber;
    }
</script>

</body>
</html>
