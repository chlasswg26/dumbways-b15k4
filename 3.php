<?php
$x = 5;

for ($row = 1; $row <= $x; $row+=1){
    for ($col = 1; $col <= $x; $col+=1) {
        if (($col * $row) % 2 != 0) {
            echo '= ';
        } else {
            echo '* ';
        }
    }
    echo '<br />';
}