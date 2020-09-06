<?php
if( isset( $_POST['my_name'] ) === TRUE  && !preg_match('/^\s*$/u', $_POST['my_name'])){
   print 'ようこそ ' . htmlspecialchars($_POST['my_name'] . 'さん', ENT_QUOTES, 'UTF-8');
} else {
   print '名前が未入力です';
}
?>