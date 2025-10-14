<?php
function calc($a, $b, $operation)
{
    if ($b >= 0)
        $expression = "$a $operation $b";
    else
        $expression = "$a $operation ($b)";

    switch ($operation) {

        case "+":
            $result = $a + $b;
            break;

        case "-":
            $result = $a - $b;
            break;

        case "*":
            $result = $a * $b;
            break;

        case "/":
            if($b == 0)
            {
                $result = "На ноль не делим";
                break;
            }
            $result = $a / $b;
            break;

        case "^":
            /*
            $result = $a;
            $startNum = $a;
            if ($b == 0)
                $result = 1;
            else if ($b < 0)
            {
                for ($i = -1; $i > $b; $i--) {
                    $result *= $startNum;
                }
                $result = "1/(" . $result . ")";
            }
            else
            {
                for ($i = 1; $i < $b; $i++) {
                    $result *= $startNum;
                }
            }
            */
            $expression = "$a<sup>$b</sup>";
            $result = pow($a, $b);
            break;

        case "√":
            $expression = "<sub>$b</sub>$operation$a";
            if ($b == 0) {
                $result = "Не бывает корня нулевой степени";
                break;
            }
            $result = pow($a, 1/$b);
            break;

        default:
            $result = "Незапланированная операция";
    }
    return [$result, $expression];
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $num1 = $_POST["num1"];
    $num2 = $_POST["num2"];
    $action = $_POST["action"];

    $massive = calc($num1, $num2, $action);
    $result = "$massive[1] = $massive[0]";

    echo "<h3>$result</h3>";

    $historyFile = "history.txt";
    $historyData = date('Y-m-d H:i:s') . "\t$result\n";
    file_put_contents($historyFile, $historyData, FILE_APPEND);
}
?>