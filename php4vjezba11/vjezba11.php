<?php
function jeProst($broj) {
    if ($broj <= 1) {
        return false;
    }
    
    for ($i = 2; $i <= sqrt($broj); $i++) {
        if ($broj % $i == 0) {
            return false;
        }
    }
    return true;
}

echo "Prosti brojevi manji od 100 su:<br>";

for ($i = 2; $i < 100; $i++) {
    if (jeProst($i)) {
        echo $i . "<br>";
    }
}
?>
