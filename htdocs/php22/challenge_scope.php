<pre>
<?php
$a = 10;
$b = 10;
$c = 10;
$d = 10;
define('DEF', 10);
 
print 'fuga_before: a = ' . $a . "\n";//10
print 'fuga_before: b = ' . $b . "\n";//10
print 'fuga_before: c = ' . $c . "\n";//10
print 'fuga_before: d = ' . $d . "\n";//10
print 'fuga_before: DEF = ' . DEF  . "\n";//10
 
fuga($c);
 
print 'fuga_after: a = ' . $a . "\n";//10
print 'fuga_after: b = ' . $b . "\n";//10
print 'fuga_after: c = ' . $c . "\n";//10
print 'fuga_after: d = ' . $d . "\n";//11
print 'fuga_after: DEF = ' . DEF  . "\n";//10
 
function fuga($c) {
 
    global $d;//10
 
    $a++;//1
    print 'fuga: a = ' . $a . "\n";//1
 
    $b = 100;
    $b++;//101
    print 'fuga: b = ' . $b . "\n";//101
 
    $c++;//11
    print 'fuga: c = ' . $c . "\n";//11
 
    $d++;//11
    print 'fuga: d = ' . $d . "\n";//11
 
    define('DEF', 100);//error
    print 'fuga: DEF = ' . DEF . "\n";//10
}
?>
</pre>