{"filter":false,"title":"ec_admin.php","tooltip":"/include/view/ec_admin.php","undoManager":{"mark":9,"position":9,"stack":[[{"start":{"row":0,"column":0},"end":{"row":67,"column":7},"action":"insert","lines":["","<!DOCTYPE html>","<html lang=\"ja\">","<head>","  <meta charset=\"utf-8\">","  <title>商品管理ページ</title>","  <link type=\"text/css\" rel=\"stylesheet\" href=\"./css/admin.css\">","</head>","<body>","  <h1>CodeSHOP 管理ページ</h1>","  <div>","    <a class=\"nemu\" href=\"./logout.php\">ログアウト</a>","    <a href=\"./admin_user.php\">ユーザ管理ページ</a>","  </div>","  <section>","    <h2>商品の登録</h2>","    <form method=\"post\" enctype=\"multipart/form-data\">","      <div><label>商品名: <input type=\"text\" name=\"new_name\" value=\"\"></label></div>","      <div><label>値　段: <input type=\"text\" name=\"new_price\" value=\"\"></label></div>","      <div><label>個　数: <input type=\"text\" name=\"new_stock\" value=\"\"></label></div>","      <div><label>商品画像:<input type=\"file\" name=\"new_img\"></label></div>","      <div><label>ステータス:","        <select name=\"new_status\">","          <option value=\"0\">非公開</option>","          <option value=\"1\" selected>公開</option>","        </select>","        </label>","      </div>","      <input type=\"hidden\" name=\"sql_kind\" value=\"insert\">","      <div><input type=\"submit\" value=\"商品を登録する\"></div>","    </form>","  </section>","  <section>","    <h2>商品情報の一覧・変更</h2>","    <table>","      <tr>","        <th>商品画像</th>","        <th>商品名</th>","        <th>価　格</th>","        <th>在庫数</th>","        <th>ステータス</th>","        <th>操作</th>","      </tr>","      <tr>","        <form method=\"post\">","          <td><img class=\"img_size\" src=\"./img_item/95884a7952ffd2359cb9a771fc977df0.png\"></td>","          <td class=\"name_width\">ワンピース</td>","          <td class=\"text_align_right\">5000円</td>","          <td><input type=\"text\"  class=\"input_text_width text_align_right\" name=\"update_stock\" value=\"43\">個&nbsp;&nbsp;<input type=\"submit\" value=\"変更する\"></td>","          <input type=\"hidden\" name=\"item_id\" value=\"364\">","          <input type=\"hidden\" name=\"sql_kind\" value=\"update\">","        </form>","        <form method=\"post\">","          <td><input type=\"submit\" value=\"公開 → 非公開にする\"></td>","          <input type=\"hidden\" name=\"change_status\" value=\"0\">","          <input type=\"hidden\" name=\"item_id\" value=\"364\">","          <input type=\"hidden\" name=\"sql_kind\" value=\"change\">","        </form>","        <form method=\"post\">","          <td><input type=\"submit\" value=\"削除する\"></td>","          <input type=\"hidden\" name=\"item_id\" value=\"364\">","          <input type=\"hidden\" name=\"sql_kind\" value=\"delete\">","        </form>","      <tr>","    </table>","  </section>","</body>","</html>"],"id":1}],[{"start":{"row":0,"column":0},"end":{"row":1,"column":0},"action":"remove","lines":["",""],"id":2}],[{"start":{"row":11,"column":15},"end":{"row":11,"column":16},"action":"insert","lines":["e"],"id":3},{"start":{"row":11,"column":16},"end":{"row":11,"column":17},"action":"insert","lines":["c"]},{"start":{"row":11,"column":17},"end":{"row":11,"column":18},"action":"insert","lines":["_"]}],[{"start":{"row":10,"column":28},"end":{"row":10,"column":29},"action":"insert","lines":["e"],"id":4},{"start":{"row":10,"column":29},"end":{"row":10,"column":30},"action":"insert","lines":["c"]},{"start":{"row":10,"column":30},"end":{"row":10,"column":31},"action":"insert","lines":["_"]}],[{"start":{"row":10,"column":27},"end":{"row":10,"column":28},"action":"insert","lines":["."],"id":5}],[{"start":{"row":10,"column":29},"end":{"row":10,"column":30},"action":"insert","lines":["h"],"id":6},{"start":{"row":10,"column":30},"end":{"row":10,"column":31},"action":"insert","lines":["t"]},{"start":{"row":10,"column":31},"end":{"row":10,"column":32},"action":"insert","lines":["d"]},{"start":{"row":10,"column":32},"end":{"row":10,"column":33},"action":"insert","lines":["o"]},{"start":{"row":10,"column":33},"end":{"row":10,"column":34},"action":"insert","lines":["c"]}],[{"start":{"row":10,"column":34},"end":{"row":10,"column":35},"action":"insert","lines":["s"],"id":7}],[{"start":{"row":10,"column":35},"end":{"row":10,"column":36},"action":"insert","lines":["/"],"id":8}],[{"start":{"row":11,"column":14},"end":{"row":11,"column":15},"action":"remove","lines":["/"],"id":9},{"start":{"row":11,"column":13},"end":{"row":11,"column":14},"action":"remove","lines":["."]}],[{"start":{"row":11,"column":13},"end":{"row":11,"column":23},"action":"insert","lines":["../htdocs/"],"id":10}]]},"ace":{"folds":[],"scrolltop":0,"scrollleft":0,"selection":{"start":{"row":11,"column":23},"end":{"row":11,"column":23},"isBackwards":false},"options":{"guessTabSize":true,"useWrapMode":false,"wrapToView":true},"firstLineState":0},"timestamp":1599974414515,"hash":"8ae24209585b9d0e2a7a1793453d515ed032aca2"}