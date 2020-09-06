<?php
// 変数初期化
$fight = '';
$choice ='';
$enemy ='';
$hash = array();
$result = '';
if (isset($_POST['fight']) === TRUE) {
    $hash = array('グー', 'チョキ', 'パー' );
    $fight = htmlspecialchars($_POST['fight'], ENT_QUOTES, 'UTF-8');
    $enemy = $hash[array_rand($hash)];
    if ($fight === "rock") { $choice = 'グー'; 
        } 
    else if ($fight === "scissors") { $choice = 'チョキ';
    }
    else { $choice = 'パー'; 
    }

    if ($fight === "rock") {
        if($enemy === "チョキ"){
            $result = 'WIN!!';
        }
        else if ($enemy === "パー"){
            $result = 'LOSE...'; 
        }
        else {
            $result = 'DROW';
        }
    }
    else if($fight === "sicciors") {
        if($enemy === "パー"){
            $result = 'WIN!!';
        }
        else if ($enemy === "グー"){
            $result = 'LOSE...'; 
        }
        else {
            $result = 'DROW';
        }
    }
    else{
        if($enemy === "グー"){
            $result = 'WIN!!';
        }
        else if ($enemy === "チョキ"){
            $result = 'LOSE...'; 
        }
        else {
            $result = 'DROW';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
   <meta charset="UTF-8">
   <title>課題（中級）</title>
</head>
<body>
    <h1>じゃんけん勝負</h1>
        <p>自分：<?php print $choice;?></p>
        <p>相手：<?php print $enemy;?></p>
        <p>結果：<?php print $result?>
        </p>
    <form method="post">
        <input type="radio" name="fight" value="rock"<?php if ($fight === "rock") { print 'checked'; } ?>>グー
        <input type="radio" name="fight"value="scissors"<?php if ($fight === "scissors") { print 'checked'; }?>>チョキ
        <input type="radio" name="fight"value="paper"<?php if ($fight === "paper") { print 'checked'; }?>>パー<br>
        <input type="submit" value="勝負!!">
    </form>
</body>
</html>