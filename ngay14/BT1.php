<?php
function divide($numerator, $denominator) {
    try {
        if ($denominator == 0) {
            throw new Exception("Error: Division by zero is not allowed.");
        }
        $result = $numerator / $denominator;
        return $result;
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}

$numerator = 10;
$denominator = 0;

$result = divide($numerator, $denominator);
if ($result !== null) {
    echo "Result: $result";
}
?>
