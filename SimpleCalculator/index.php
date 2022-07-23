<?php
$ans
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator</title>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <style>
        body {
            background-color: #f5f5f5;
            padding: 100px;
        }
        form {
            margin-top: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 20px;
            background-color: burlywood;
        }
        input {
            margin: 20px;
        }
        button {
            margin: 20px;
            background-color: cadetblue;
        }
        select{
            font: 1.4em sans-serif;
        }
        p {
            margin: 20px;
            text-align: center;
            border: 1px solid #ccc;
            padding: 7px;
            background-color: cornsilk;
        }
    </style>
</head>
<body>
    <h1>Calculator</h1>
    <br>
    <form action="index.php" method="post">
        <input type="text" name="num1" placeholder="Number 1" required>
        <input type="text" name="num2" placeholder="Number 2" required>
        <select name="operator">
            <option>None</option>
            <option>Add</option>
            <option>Subtract</option>
            <option>Multiply</option>
            <option>Divide</option>
        </select>
        <br>
        <button type="submit" name="submit">Calculate</button>
        <?php
        if(isset($_POST['submit'])){
            $num1 = $_POST['num1'];
            $num2 = $_POST['num2'];
            $operator = $_POST['operator'];
            switch($operator){
                case "None":
                    $ans = "Please select an operator";
                    echo "<p>{$ans}</p>";
                    break;
                case "Add":
                    $ans = $num1 + $num2;
                    echo "<p>{$ans}</p>";
                    break;
                case "Subtract":
                    $ans = $num1 - $num2;
                    echo "<p>{$ans}</p>";
                    break;
                case "Multiply":
                    $ans = $num1 * $num2;
                    echo "<p>{$ans}</p>";
                    break;
                case "Divide":
                    echo $ans = $num1 / $num2;
                    echo "<p>{$ans}</p>";
                    break;
            }
        }
    ?>
    </form>
    
</body>
</html>