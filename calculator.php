<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link
      href="https://fonts.googleapis.com/css2?family=Sigmar+One&display=swap"
      rel="stylesheet"
    />
    <title>Calculator</title>
    <style>
       body {
         display: flex;
         flex-direction: column;
         font-family: Sigmar One;
         align-items: center;
       }
       form{
           background-color: tan;
           border: 3px solid black;
           border-radius: 15px;
           box-shadow: slategray -2px 2px ;
           width: 210px;
           padding: 15px;
       }
       div:first-of-type input {
         width: 40px;
         border 2px solid blue;
         box-shadow: 10px 2 px slategrey inset;
         box-sizing: borderbox;
       }
       div:first-of-type label {
         width: 60px;
         font-weight: bold;
         color: mediumblue;
       }
       .screen   {
        display: flex;
         flex-direction: row;
         justify-content: center;
         align-items: center;
           width: 100px;
           height: 40px;
           border: 2px solid black;
           border-radius: 15px;
           box-shadow: 10px 2 px slategrey inset;
           margin: 50px auto;
           background-color: rgb(186, 221, 243);
           font-family: Garamond;
           font-size: 1rem;

       }
       h1 {
         color: red;
         position: absolute;
         z-index: 20;
       }
       div > div {
         display: flex;
         flex-direction: row;
       }
       span input {
           background-color: rgb(186, 221, 243);
           color: red;
           text-align: center;
       }
       input{
           margin-top: 20px;
       }
       .operators input  {
           background-color: rgb(32, 178, 117);
           color: white;
           padding: 5px 0px;
           margin: 15px;
           width: 63px;
           border-radius: 5px;
           box-shadow: -1px 1px slategray;
       }
      .operators input:hover  {
           background-color: rgb(238, 144, 233);
           color: darkblue;
           font-size: 1.25rem;
           width: 73px;
       }
       .operators    {
           margin-top: 80px;
           text-align: center;
       }
    </style>
  </head>
  <body>
<?php

$result = "";

if (isset($_POST['operator'])) {
    if (!isset($_POST['numberOne'])) {
        $foutmelding = "Voer twee getallen in";
        exit;
    } elseif (!isset($_POST['numberTwo'])) {
        $foutmelding = "Voer twee getallen in";
          exit;
    } else {
        $getal_1 = $_POST['numberOne'];
        $getal_2 = $_POST['numberTwo'];
    }
    if (!is_numeric($getal_1)) {
        $foutmelding = "Voer twee getallen in";
    } elseif (!is_numeric($getal_2)) {
        $foutmelding = "Voer twee getallen in";
    } else {
        $operator = $_POST['operator'];
    }
  
    switch ($operator) {
        case 'Add':
            $result = $getal_1 + $getal_2;
            break;
        case 'Subtract':
            $result = $getal_1 - $getal_2;
            break;
        case 'Multiply':
            $result = $getal_1 * $getal_2;
            break;
        case 'Divide':
            $result = $getal_1 / $getal_2;
            break;
        case 'Modulo':
            $result = $getal_1 % $getal_2;
            break; 
    }
}

if (isset($foutmelding)) {
    echo $foutmelding;
}

?>

    <form action="calculator.php" method="POST">
      <div>
        <span>
          <input type="text" name="numberOne" id="numberOne" />
          <label for="numberOne">First Number</label>
        </span>
        <br />
        <span>
          <input type="text" name="numberTwo" id="numberTwo" />
          <label for="numberTwo">Second Number</label>
        </span>
      </div>
      <div class="screen">
        <h1>
            <?php 
           
                 echo $result; 
             
            ?>
        </h1>
      </div>

      <div class="operators">
        <input type="submit" name="operator" value="Add" />
        <input type="submit" name="operator" value="Subtract" />
        <input type="submit" name="operator" value="Multiply" />
        <input type="submit" name="operator" value="Divide" />
        <input type="submit" name="operator" value="Modulo" />
      </div>
    </form>
  </body>
</html>
