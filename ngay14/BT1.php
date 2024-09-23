<?php
function division($a, $b) {
    try {
        if ($b == 0) {
            throw new Exception("Error: Cannot divide by 0.");
        }
        $result = $a / $b;
        echo "Division result: " . $result;
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}

division(10, 0);
?>
