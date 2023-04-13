<?php

for ($i = 1; $i <= 100; $i++) {
    $prima = 0;
    for ($j = 1; $j <= $i; $j++) {
        if ($i % $j == 0) {
            $prima++;
        }
    }

    if ($prima == 2) {
        echo $i, " adalah bilangan prima <br>";
    }
}
?>