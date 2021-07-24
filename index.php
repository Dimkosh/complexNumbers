<?php
    include(__DIR__ . "/app/complexNumbers.php");

    $min = -20;
    $max = 20;
    for($i=0;$i<=20;$i++):
        $a1 = rand($min, $max);
        $a2 = rand($min, $max);
        $b1 = rand($min, $max);
        $b2 = rand($min, $max);
        $firstNumber = "{$a1}" . ((rand(0, 1) == 0) ? (($b1 > 0) ? "+" : "") : (($b1 > 0) ? "-" : "")) . "{$b1}i";
        $secondNumber = "{$a2}" . ((rand(0, 1) == 0) ? (($b2 > 0) ? "+" : "") : (($b2 > 0) ? "-" : "")) . "{$b2}i";
        
        echo "--------------------------------------------<br>";
        echo "n1={$firstNumber}<br>n2={$secondNumber}<br>";
        echo ComplexNumbers::Test($firstNumber, $secondNumber) . "<br>";
        echo "<br><br>";
    endfor;
?>