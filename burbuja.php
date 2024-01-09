<?php
function ordenado($arr) {
    $n = count($arr);
    $swapped = true;
    while ($swapped) {
        $swapped = false;
        for ($i = 0; $i < $n - 1; $i++) {
            if ($arr[$i] > $arr[$i + 1]) {
                // Intercambiar $arr[$i] y $arr[$i + 1]
                $temp = $arr[$i];
                $arr[$i] = $arr[$i + 1];
                $arr[$i + 1] = $temp;
                $swapped = true;
            }
        }
    }
    return $arr;
}

// Ejemplo de uso:
$array = [64, 34, 25, 12, 22, 11, 90];
$sortedArray = ordenado($array);

echo "Array ordenado: ";
foreach ($sortedArray as $item) {
    echo $item . " ";
}
