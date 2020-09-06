<?php
$sum = 0;
for ($i = 1; $i < 101; $i++) {
    if($i % 15 === 0)  {
        print 'FizBuzz'.'<br>';
    } 
    else if($i % 3 === 0){
        print 'Fiz'.'<br>';    
    }
    else if($i % 5 === 0){
        print 'Buzz'.'<br>';     
    }
    else{
        print $i .'<br>';
    }
}
?>