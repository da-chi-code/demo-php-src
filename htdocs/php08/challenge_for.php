<?php
$sum = 0;
for ($i = 1; $i < 101; $i++) {
    if($i % 3 === 0)  {
        $sum += $i;
    }  
}
print $sum;
?>