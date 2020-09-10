<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>自動販売機購入画面</title>
    <style>
        #flex {
            width: 600px;
        }

        #flex .drink {
            width: 120px;
            height: 210px;
            text-align: center;
            margin: 10px;
            float: left; 
        }

        #flex span {
            display: block;
            margin: 3px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .img_size{
            display: inline-block; 
            height: 125px;    
        }
        .img_size img{
            height: 100%;
        }
        .red {
            color: #FF0000;
        }

        #submit {
            clear: both;
        }

    </style>
</head>
<body>
    <h1>自動販売機</h1>
    <form action="result.php" method="post">
        <div>金額<input type="text" name="money" value=""></div>
        <div id="flex">
<?php foreach($drink_lists as $drink_list){ ?>
            <div class="drink">
                <span class="img_size"><img src=<?php print '../drink/image/'.str_replace(' ','',str_replace('-','',str_replace(':','',$drink_list['create_at']))).$drink_list['display'];?>></span>
                <span><?php print $drink_list['drink_name'];?></span>
                <span><?php print $drink_list['price'];?>円</span>
<?php if($drink_list['stock'] === '0'){ ?>
                <span class="red">売り切れ</span>
            </div>
<?php } else { ?>
                <input type="radio" name="drink_id" value=<?php print $drink_list['drink_id'];?>>
            </div>
<?php } }?>
        </div>
        <div id="submit">
            <input type="submit" value="■□■□■ 購入 ■□■□■">
        </div>
    </form>
</body>