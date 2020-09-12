{"filter":false,"title":"ec_function.php","tooltip":"/include/model/ec_function.php","undoManager":{"mark":100,"position":100,"stack":[[{"start":{"row":157,"column":10},"end":{"row":157,"column":11},"action":"insert","lines":[" "],"id":391},{"start":{"row":157,"column":11},"end":{"row":157,"column":12},"action":"insert","lines":["="]}],[{"start":{"row":157,"column":12},"end":{"row":157,"column":13},"action":"insert","lines":[" "],"id":392}],[{"start":{"row":157,"column":13},"end":{"row":157,"column":15},"action":"insert","lines":["''"],"id":393}],[{"start":{"row":157,"column":15},"end":{"row":157,"column":16},"action":"insert","lines":[";"],"id":394}],[{"start":{"row":156,"column":21},"end":{"row":156,"column":22},"action":"insert","lines":["$"],"id":395},{"start":{"row":156,"column":22},"end":{"row":156,"column":23},"action":"insert","lines":["l"]},{"start":{"row":156,"column":23},"end":{"row":156,"column":24},"action":"insert","lines":["i"]},{"start":{"row":156,"column":24},"end":{"row":156,"column":25},"action":"insert","lines":["n"]},{"start":{"row":156,"column":25},"end":{"row":156,"column":26},"action":"insert","lines":["k"]},{"start":{"row":156,"column":26},"end":{"row":156,"column":27},"action":"insert","lines":[","]}],[{"start":{"row":162,"column":6},"end":{"row":163,"column":0},"action":"insert","lines":["",""],"id":396},{"start":{"row":163,"column":0},"end":{"row":163,"column":4},"action":"insert","lines":["    "]},{"start":{"row":163,"column":4},"end":{"row":163,"column":5},"action":"insert","lines":["r"]},{"start":{"row":163,"column":5},"end":{"row":163,"column":6},"action":"insert","lines":["e"]},{"start":{"row":163,"column":6},"end":{"row":163,"column":7},"action":"insert","lines":["t"]},{"start":{"row":163,"column":7},"end":{"row":163,"column":8},"action":"insert","lines":["u"]},{"start":{"row":163,"column":8},"end":{"row":163,"column":9},"action":"insert","lines":["r"]}],[{"start":{"row":163,"column":9},"end":{"row":163,"column":10},"action":"insert","lines":["n"],"id":397}],[{"start":{"row":163,"column":10},"end":{"row":163,"column":11},"action":"insert","lines":[" "],"id":398},{"start":{"row":163,"column":11},"end":{"row":163,"column":12},"action":"insert","lines":["$"]},{"start":{"row":163,"column":12},"end":{"row":163,"column":13},"action":"insert","lines":["e"]},{"start":{"row":163,"column":13},"end":{"row":163,"column":14},"action":"insert","lines":["r"]},{"start":{"row":163,"column":14},"end":{"row":163,"column":15},"action":"insert","lines":["r"]}],[{"start":{"row":163,"column":15},"end":{"row":163,"column":16},"action":"insert","lines":["o"],"id":399},{"start":{"row":163,"column":16},"end":{"row":163,"column":17},"action":"insert","lines":["r"]},{"start":{"row":163,"column":17},"end":{"row":163,"column":18},"action":"insert","lines":[";"]}],[{"start":{"row":51,"column":1},"end":{"row":52,"column":0},"action":"remove","lines":["",""],"id":400}],[{"start":{"row":58,"column":0},"end":{"row":58,"column":1},"action":"remove","lines":[" "],"id":401},{"start":{"row":57,"column":5},"end":{"row":58,"column":0},"action":"remove","lines":["",""]}],[{"start":{"row":53,"column":0},"end":{"row":53,"column":1},"action":"remove","lines":[" "],"id":402},{"start":{"row":52,"column":27},"end":{"row":53,"column":0},"action":"remove","lines":["",""]}],[{"start":{"row":161,"column":1},"end":{"row":162,"column":0},"action":"insert","lines":["",""],"id":403},{"start":{"row":162,"column":0},"end":{"row":163,"column":0},"action":"insert","lines":["",""]}],[{"start":{"row":131,"column":19},"end":{"row":131,"column":20},"action":"insert","lines":["_"],"id":404},{"start":{"row":131,"column":20},"end":{"row":131,"column":21},"action":"insert","lines":["u"]},{"start":{"row":131,"column":21},"end":{"row":131,"column":22},"action":"insert","lines":["s"]},{"start":{"row":131,"column":22},"end":{"row":131,"column":23},"action":"insert","lines":["e"]},{"start":{"row":131,"column":23},"end":{"row":131,"column":24},"action":"insert","lines":["r"]}],[{"start":{"row":162,"column":0},"end":{"row":162,"column":8},"action":"insert","lines":["function"],"id":405}],[{"start":{"row":162,"column":8},"end":{"row":162,"column":9},"action":"insert","lines":["　"],"id":406}],[{"start":{"row":162,"column":8},"end":{"row":162,"column":9},"action":"remove","lines":["　"],"id":407}],[{"start":{"row":162,"column":8},"end":{"row":162,"column":9},"action":"insert","lines":[" "],"id":408},{"start":{"row":162,"column":9},"end":{"row":162,"column":10},"action":"insert","lines":["{"]},{"start":{"row":162,"column":10},"end":{"row":162,"column":11},"action":"insert","lines":["}"]}],[{"start":{"row":162,"column":10},"end":{"row":164,"column":0},"action":"insert","lines":["","    ",""],"id":409}],[{"start":{"row":162,"column":10},"end":{"row":163,"column":0},"action":"insert","lines":["",""],"id":410},{"start":{"row":163,"column":0},"end":{"row":163,"column":4},"action":"insert","lines":["    "]}],[{"start":{"row":163,"column":4},"end":{"row":168,"column":2},"action":"insert","lines":["function get_drink_list($link) {","    // SQL生成","    $sql = 'SELECT drink_list.drink_id,drink_list.drink_name,drink_list.price,drink_list.create_at,drink_list.status,drink_list.display,inventory_table.stock FROM drink_list LEFT JOIN inventory_table ON inventory_table.drink_id = drink_list.drink_id';","    // クエリ実行","    return get_as_array($link, $sql);","} "],"id":411}],[{"start":{"row":163,"column":0},"end":{"row":164,"column":12},"action":"remove","lines":["    function get_drink_list($link) {","    // SQL生成"],"id":412},{"start":{"row":162,"column":10},"end":{"row":163,"column":0},"action":"remove","lines":["",""]}],[{"start":{"row":168,"column":0},"end":{"row":168,"column":1},"action":"remove","lines":["}"],"id":413},{"start":{"row":167,"column":4},"end":{"row":168,"column":0},"action":"remove","lines":["",""]},{"start":{"row":167,"column":0},"end":{"row":167,"column":4},"action":"remove","lines":["    "]},{"start":{"row":166,"column":2},"end":{"row":167,"column":0},"action":"remove","lines":["",""]},{"start":{"row":166,"column":1},"end":{"row":166,"column":2},"action":"remove","lines":[" "]}],[{"start":{"row":163,"column":12},"end":{"row":163,"column":137},"action":"remove","lines":["SELECT drink_list.drink_id,drink_list.drink_name,drink_list.price,drink_list.create_at,drink_list.status,drink_list.display,i"],"id":414}],[{"start":{"row":163,"column":16},"end":{"row":163,"column":124},"action":"remove","lines":["tory_table.stock FROM drink_list LEFT JOIN inventory_table ON inventory_table.drink_id = drink_list.drink_id"],"id":415},{"start":{"row":163,"column":15},"end":{"row":163,"column":16},"action":"remove","lines":["n"]},{"start":{"row":163,"column":14},"end":{"row":163,"column":15},"action":"remove","lines":["e"]},{"start":{"row":163,"column":13},"end":{"row":163,"column":14},"action":"remove","lines":["v"]},{"start":{"row":163,"column":12},"end":{"row":163,"column":13},"action":"remove","lines":["n"]}],[{"start":{"row":163,"column":12},"end":{"row":163,"column":41},"action":"insert","lines":["SELECT * FROM `address_table`"],"id":416}],[{"start":{"row":163,"column":20},"end":{"row":163,"column":21},"action":"remove","lines":[" "],"id":417},{"start":{"row":163,"column":19},"end":{"row":163,"column":20},"action":"remove","lines":["*"]}],[{"start":{"row":163,"column":38},"end":{"row":163,"column":39},"action":"remove","lines":["`"],"id":418},{"start":{"row":163,"column":37},"end":{"row":163,"column":38},"action":"remove","lines":["e"]},{"start":{"row":163,"column":36},"end":{"row":163,"column":37},"action":"remove","lines":["l"]},{"start":{"row":163,"column":35},"end":{"row":163,"column":36},"action":"remove","lines":["b"]},{"start":{"row":163,"column":34},"end":{"row":163,"column":35},"action":"remove","lines":["a"]},{"start":{"row":163,"column":33},"end":{"row":163,"column":34},"action":"remove","lines":["t"]},{"start":{"row":163,"column":32},"end":{"row":163,"column":33},"action":"remove","lines":["_"]},{"start":{"row":163,"column":31},"end":{"row":163,"column":32},"action":"remove","lines":["s"]},{"start":{"row":163,"column":30},"end":{"row":163,"column":31},"action":"remove","lines":["s"]},{"start":{"row":163,"column":29},"end":{"row":163,"column":30},"action":"remove","lines":["e"]},{"start":{"row":163,"column":28},"end":{"row":163,"column":29},"action":"remove","lines":["r"]},{"start":{"row":163,"column":27},"end":{"row":163,"column":28},"action":"remove","lines":["d"]},{"start":{"row":163,"column":26},"end":{"row":163,"column":27},"action":"remove","lines":["d"]},{"start":{"row":163,"column":25},"end":{"row":163,"column":26},"action":"remove","lines":["a"]},{"start":{"row":163,"column":24},"end":{"row":163,"column":25},"action":"remove","lines":["`"]}],[{"start":{"row":163,"column":24},"end":{"row":163,"column":25},"action":"insert","lines":["u"],"id":419},{"start":{"row":163,"column":25},"end":{"row":163,"column":26},"action":"insert","lines":["s"]},{"start":{"row":163,"column":26},"end":{"row":163,"column":27},"action":"insert","lines":["e"]},{"start":{"row":163,"column":27},"end":{"row":163,"column":28},"action":"insert","lines":["r"]}],[{"start":{"row":163,"column":24},"end":{"row":163,"column":28},"action":"remove","lines":["user"],"id":420},{"start":{"row":163,"column":24},"end":{"row":163,"column":28},"action":"insert","lines":["user"]}],[{"start":{"row":162,"column":9},"end":{"row":162,"column":10},"action":"insert","lines":["g"],"id":421},{"start":{"row":162,"column":10},"end":{"row":162,"column":11},"action":"insert","lines":["e"]},{"start":{"row":162,"column":11},"end":{"row":162,"column":12},"action":"insert","lines":["t"]}],[{"start":{"row":162,"column":12},"end":{"row":162,"column":13},"action":"insert","lines":[" "],"id":422}],[{"start":{"row":162,"column":12},"end":{"row":162,"column":13},"action":"remove","lines":[" "],"id":423}],[{"start":{"row":162,"column":12},"end":{"row":162,"column":13},"action":"insert","lines":["_"],"id":424},{"start":{"row":162,"column":13},"end":{"row":162,"column":14},"action":"insert","lines":["u"]},{"start":{"row":162,"column":14},"end":{"row":162,"column":15},"action":"insert","lines":["s"]},{"start":{"row":162,"column":15},"end":{"row":162,"column":16},"action":"insert","lines":["e"]},{"start":{"row":162,"column":16},"end":{"row":162,"column":17},"action":"insert","lines":["r"]}],[{"start":{"row":162,"column":9},"end":{"row":162,"column":17},"action":"remove","lines":["get_user"],"id":425},{"start":{"row":162,"column":9},"end":{"row":162,"column":22},"action":"insert","lines":["get_user_list"]}],[{"start":{"row":162,"column":22},"end":{"row":162,"column":23},"action":"insert","lines":["("],"id":426},{"start":{"row":162,"column":23},"end":{"row":162,"column":24},"action":"insert","lines":["$"]},{"start":{"row":162,"column":24},"end":{"row":162,"column":25},"action":"insert","lines":["l"]},{"start":{"row":162,"column":25},"end":{"row":162,"column":26},"action":"insert","lines":["i"]}],[{"start":{"row":162,"column":26},"end":{"row":162,"column":27},"action":"insert","lines":["n"],"id":427},{"start":{"row":162,"column":27},"end":{"row":162,"column":28},"action":"insert","lines":["k"]},{"start":{"row":162,"column":28},"end":{"row":162,"column":29},"action":"insert","lines":[")"]}],[{"start":{"row":162,"column":27},"end":{"row":162,"column":28},"action":"remove","lines":["k"],"id":428},{"start":{"row":162,"column":26},"end":{"row":162,"column":27},"action":"remove","lines":["n"]},{"start":{"row":162,"column":25},"end":{"row":162,"column":26},"action":"remove","lines":["i"]},{"start":{"row":162,"column":24},"end":{"row":162,"column":25},"action":"remove","lines":["l"]}],[{"start":{"row":162,"column":24},"end":{"row":162,"column":25},"action":"insert","lines":["k"],"id":429},{"start":{"row":162,"column":25},"end":{"row":162,"column":26},"action":"insert","lines":["e"]},{"start":{"row":162,"column":26},"end":{"row":162,"column":27},"action":"insert","lines":["y"]}],[{"start":{"row":162,"column":23},"end":{"row":162,"column":27},"action":"remove","lines":["$key"],"id":430},{"start":{"row":162,"column":23},"end":{"row":162,"column":27},"action":"insert","lines":["$key"]}],[{"start":{"row":165,"column":28},"end":{"row":165,"column":29},"action":"remove","lines":["k"],"id":431},{"start":{"row":165,"column":27},"end":{"row":165,"column":28},"action":"remove","lines":["n"]},{"start":{"row":165,"column":26},"end":{"row":165,"column":27},"action":"remove","lines":["i"]},{"start":{"row":165,"column":25},"end":{"row":165,"column":26},"action":"remove","lines":["l"]}],[{"start":{"row":165,"column":25},"end":{"row":165,"column":26},"action":"insert","lines":["k"],"id":432},{"start":{"row":165,"column":26},"end":{"row":165,"column":27},"action":"insert","lines":["e"]},{"start":{"row":165,"column":27},"end":{"row":165,"column":28},"action":"insert","lines":["y"]}],[{"start":{"row":163,"column":19},"end":{"row":163,"column":20},"action":"insert","lines":["("],"id":433},{"start":{"row":163,"column":20},"end":{"row":163,"column":21},"action":"insert","lines":[")"]}],[{"start":{"row":163,"column":20},"end":{"row":163,"column":21},"action":"remove","lines":[")"],"id":434},{"start":{"row":163,"column":19},"end":{"row":163,"column":20},"action":"remove","lines":["("]}],[{"start":{"row":163,"column":19},"end":{"row":163,"column":20},"action":"insert","lines":["u"],"id":435},{"start":{"row":163,"column":20},"end":{"row":163,"column":21},"action":"insert","lines":["s"]},{"start":{"row":163,"column":21},"end":{"row":163,"column":22},"action":"insert","lines":["e"]},{"start":{"row":163,"column":22},"end":{"row":163,"column":23},"action":"insert","lines":["r"]},{"start":{"row":163,"column":23},"end":{"row":163,"column":24},"action":"insert","lines":["_"]}],[{"start":{"row":163,"column":24},"end":{"row":163,"column":25},"action":"insert","lines":["n"],"id":436},{"start":{"row":163,"column":25},"end":{"row":163,"column":26},"action":"insert","lines":["a"]},{"start":{"row":163,"column":26},"end":{"row":163,"column":27},"action":"insert","lines":["m"]},{"start":{"row":163,"column":27},"end":{"row":163,"column":28},"action":"insert","lines":["e"]},{"start":{"row":163,"column":28},"end":{"row":163,"column":29},"action":"insert","lines":[","]}],[{"start":{"row":163,"column":29},"end":{"row":163,"column":30},"action":"insert","lines":[" "],"id":437}],[{"start":{"row":163,"column":29},"end":{"row":163,"column":30},"action":"remove","lines":[" "],"id":438}],[{"start":{"row":163,"column":29},"end":{"row":163,"column":30},"action":"insert","lines":[" "],"id":439},{"start":{"row":163,"column":30},"end":{"row":163,"column":31},"action":"insert","lines":["p"]},{"start":{"row":163,"column":31},"end":{"row":163,"column":32},"action":"insert","lines":["a"]},{"start":{"row":163,"column":32},"end":{"row":163,"column":33},"action":"insert","lines":["s"]},{"start":{"row":163,"column":33},"end":{"row":163,"column":34},"action":"insert","lines":["s"]},{"start":{"row":163,"column":34},"end":{"row":163,"column":35},"action":"insert","lines":["w"]},{"start":{"row":163,"column":35},"end":{"row":163,"column":36},"action":"insert","lines":["a"]}],[{"start":{"row":163,"column":35},"end":{"row":163,"column":36},"action":"remove","lines":["a"],"id":440}],[{"start":{"row":163,"column":35},"end":{"row":163,"column":36},"action":"insert","lines":["o"],"id":441}],[{"start":{"row":163,"column":30},"end":{"row":163,"column":36},"action":"remove","lines":["passwo"],"id":442},{"start":{"row":163,"column":30},"end":{"row":163,"column":38},"action":"insert","lines":["password"]}],[{"start":{"row":163,"column":38},"end":{"row":163,"column":39},"action":"insert","lines":[","],"id":443}],[{"start":{"row":163,"column":29},"end":{"row":163,"column":30},"action":"remove","lines":[" "],"id":444}],[{"start":{"row":163,"column":38},"end":{"row":163,"column":39},"action":"insert","lines":["c"],"id":445},{"start":{"row":163,"column":39},"end":{"row":163,"column":40},"action":"insert","lines":["r"]},{"start":{"row":163,"column":40},"end":{"row":163,"column":41},"action":"insert","lines":["e"]},{"start":{"row":163,"column":41},"end":{"row":163,"column":42},"action":"insert","lines":["a"]},{"start":{"row":163,"column":42},"end":{"row":163,"column":43},"action":"insert","lines":["e"]}],[{"start":{"row":163,"column":42},"end":{"row":163,"column":43},"action":"remove","lines":["e"],"id":446}],[{"start":{"row":163,"column":42},"end":{"row":163,"column":43},"action":"insert","lines":["t"],"id":447},{"start":{"row":163,"column":43},"end":{"row":163,"column":44},"action":"insert","lines":["e"]}],[{"start":{"row":163,"column":38},"end":{"row":163,"column":44},"action":"remove","lines":["create"],"id":448},{"start":{"row":163,"column":38},"end":{"row":163,"column":48},"action":"insert","lines":["created_at"]}],[{"start":{"row":163,"column":48},"end":{"row":163,"column":49},"action":"insert","lines":[" "],"id":449}],[{"start":{"row":104,"column":5},"end":{"row":105,"column":0},"action":"insert","lines":["",""],"id":450},{"start":{"row":105,"column":0},"end":{"row":105,"column":4},"action":"insert","lines":["    "]},{"start":{"row":105,"column":4},"end":{"row":105,"column":5},"action":"insert","lines":["l"]}],[{"start":{"row":105,"column":4},"end":{"row":105,"column":5},"action":"remove","lines":["l"],"id":451}],[{"start":{"row":105,"column":4},"end":{"row":105,"column":5},"action":"insert","lines":["e"],"id":452},{"start":{"row":105,"column":5},"end":{"row":105,"column":6},"action":"insert","lines":["l"]},{"start":{"row":105,"column":6},"end":{"row":105,"column":7},"action":"insert","lines":["s"]},{"start":{"row":105,"column":7},"end":{"row":105,"column":8},"action":"insert","lines":["e"]}],[{"start":{"row":102,"column":36},"end":{"row":103,"column":0},"action":"insert","lines":["",""],"id":453},{"start":{"row":103,"column":0},"end":{"row":103,"column":8},"action":"insert","lines":["        "]}],[{"start":{"row":103,"column":8},"end":{"row":103,"column":21},"action":"insert","lines":["return $data;"],"id":454}],[{"start":{"row":108,"column":0},"end":{"row":108,"column":17},"action":"remove","lines":["    return $data;"],"id":455},{"start":{"row":107,"column":1},"end":{"row":108,"column":0},"action":"remove","lines":["",""]},{"start":{"row":107,"column":0},"end":{"row":107,"column":1},"action":"remove","lines":[" "]},{"start":{"row":106,"column":8},"end":{"row":107,"column":0},"action":"remove","lines":["",""]}],[{"start":{"row":106,"column":8},"end":{"row":106,"column":9},"action":"insert","lines":["{"],"id":456},{"start":{"row":106,"column":9},"end":{"row":106,"column":10},"action":"insert","lines":["}"]}],[{"start":{"row":106,"column":9},"end":{"row":108,"column":4},"action":"insert","lines":["","        ","    "],"id":457}],[{"start":{"row":87,"column":15},"end":{"row":88,"column":0},"action":"insert","lines":["",""],"id":458},{"start":{"row":88,"column":0},"end":{"row":88,"column":4},"action":"insert","lines":["    "]},{"start":{"row":88,"column":4},"end":{"row":88,"column":5},"action":"insert","lines":["$"]},{"start":{"row":88,"column":5},"end":{"row":88,"column":6},"action":"insert","lines":["e"]},{"start":{"row":88,"column":6},"end":{"row":88,"column":7},"action":"insert","lines":["r"]}],[{"start":{"row":88,"column":7},"end":{"row":88,"column":8},"action":"insert","lines":["r"],"id":459},{"start":{"row":88,"column":8},"end":{"row":88,"column":9},"action":"insert","lines":["o"]},{"start":{"row":88,"column":9},"end":{"row":88,"column":10},"action":"insert","lines":["r"]}],[{"start":{"row":88,"column":10},"end":{"row":88,"column":11},"action":"insert","lines":[" "],"id":460},{"start":{"row":88,"column":11},"end":{"row":88,"column":12},"action":"insert","lines":["="]}],[{"start":{"row":88,"column":12},"end":{"row":88,"column":13},"action":"insert","lines":[" "],"id":461}],[{"start":{"row":88,"column":13},"end":{"row":88,"column":15},"action":"insert","lines":["''"],"id":462}],[{"start":{"row":88,"column":15},"end":{"row":88,"column":16},"action":"insert","lines":[";"],"id":463}],[{"start":{"row":88,"column":0},"end":{"row":88,"column":16},"action":"remove","lines":["    $error = '';"],"id":464},{"start":{"row":87,"column":15},"end":{"row":88,"column":0},"action":"remove","lines":["",""]}],[{"start":{"row":88,"column":1},"end":{"row":88,"column":4},"action":"insert","lines":["   "],"id":465}],[{"start":{"row":88,"column":4},"end":{"row":88,"column":5},"action":"insert","lines":["$"],"id":466},{"start":{"row":88,"column":5},"end":{"row":88,"column":6},"action":"insert","lines":["e"]},{"start":{"row":88,"column":6},"end":{"row":88,"column":7},"action":"insert","lines":["r"]},{"start":{"row":88,"column":7},"end":{"row":88,"column":8},"action":"insert","lines":["r"]},{"start":{"row":88,"column":8},"end":{"row":88,"column":9},"action":"insert","lines":["o"]},{"start":{"row":88,"column":9},"end":{"row":88,"column":10},"action":"insert","lines":["r"]}],[{"start":{"row":88,"column":10},"end":{"row":88,"column":11},"action":"insert","lines":[" "],"id":467},{"start":{"row":88,"column":11},"end":{"row":88,"column":12},"action":"insert","lines":["="]}],[{"start":{"row":88,"column":12},"end":{"row":88,"column":13},"action":"insert","lines":[" "],"id":468}],[{"start":{"row":88,"column":13},"end":{"row":88,"column":15},"action":"insert","lines":["''"],"id":469}],[{"start":{"row":88,"column":15},"end":{"row":88,"column":16},"action":"insert","lines":[";"],"id":470}],[{"start":{"row":106,"column":9},"end":{"row":107,"column":0},"action":"insert","lines":["",""],"id":471},{"start":{"row":107,"column":0},"end":{"row":107,"column":8},"action":"insert","lines":["        "]},{"start":{"row":107,"column":8},"end":{"row":107,"column":9},"action":"insert","lines":["$"]},{"start":{"row":107,"column":9},"end":{"row":107,"column":10},"action":"insert","lines":["e"]}],[{"start":{"row":107,"column":10},"end":{"row":107,"column":11},"action":"insert","lines":["r"],"id":472},{"start":{"row":107,"column":11},"end":{"row":107,"column":12},"action":"insert","lines":["r"]},{"start":{"row":107,"column":12},"end":{"row":107,"column":13},"action":"insert","lines":["o"]},{"start":{"row":107,"column":13},"end":{"row":107,"column":14},"action":"insert","lines":["r"]}],[{"start":{"row":107,"column":14},"end":{"row":107,"column":15},"action":"insert","lines":[" "],"id":473},{"start":{"row":107,"column":15},"end":{"row":107,"column":16},"action":"insert","lines":["="]}],[{"start":{"row":107,"column":16},"end":{"row":107,"column":17},"action":"insert","lines":[" "],"id":474}],[{"start":{"row":107,"column":17},"end":{"row":107,"column":19},"action":"insert","lines":["''"],"id":475}],[{"start":{"row":107,"column":18},"end":{"row":107,"column":24},"action":"insert","lines":["データベース"],"id":476}],[{"start":{"row":107,"column":24},"end":{"row":107,"column":25},"action":"insert","lines":["を"],"id":477}],[{"start":{"row":107,"column":24},"end":{"row":107,"column":25},"action":"remove","lines":["を"],"id":478},{"start":{"row":107,"column":23},"end":{"row":107,"column":24},"action":"remove","lines":["ス"]},{"start":{"row":107,"column":22},"end":{"row":107,"column":23},"action":"remove","lines":["ー"]},{"start":{"row":107,"column":21},"end":{"row":107,"column":22},"action":"remove","lines":["ベ"]},{"start":{"row":107,"column":20},"end":{"row":107,"column":21},"action":"remove","lines":["タ"]},{"start":{"row":107,"column":19},"end":{"row":107,"column":20},"action":"remove","lines":["ー"]},{"start":{"row":107,"column":18},"end":{"row":107,"column":19},"action":"remove","lines":["デ"]}],[{"start":{"row":107,"column":18},"end":{"row":107,"column":19},"action":"insert","lines":["s"],"id":479},{"start":{"row":107,"column":19},"end":{"row":107,"column":20},"action":"insert","lines":["q"]},{"start":{"row":107,"column":20},"end":{"row":107,"column":21},"action":"insert","lines":["i"]}],[{"start":{"row":107,"column":21},"end":{"row":107,"column":25},"action":"insert","lines":["実行失敗"],"id":480}],[{"start":{"row":107,"column":26},"end":{"row":107,"column":27},"action":"insert","lines":["."],"id":481}],[{"start":{"row":107,"column":27},"end":{"row":107,"column":28},"action":"insert","lines":["$"],"id":482},{"start":{"row":107,"column":28},"end":{"row":107,"column":29},"action":"insert","lines":["s"]},{"start":{"row":107,"column":29},"end":{"row":107,"column":30},"action":"insert","lines":["q"]},{"start":{"row":107,"column":30},"end":{"row":107,"column":31},"action":"insert","lines":["l"]}],[{"start":{"row":107,"column":31},"end":{"row":107,"column":32},"action":"insert","lines":[";"],"id":483}],[{"start":{"row":108,"column":8},"end":{"row":108,"column":9},"action":"insert","lines":["r"],"id":484},{"start":{"row":108,"column":9},"end":{"row":108,"column":10},"action":"insert","lines":["e"]},{"start":{"row":108,"column":10},"end":{"row":108,"column":11},"action":"insert","lines":["t"]},{"start":{"row":108,"column":11},"end":{"row":108,"column":12},"action":"insert","lines":["u"]},{"start":{"row":108,"column":12},"end":{"row":108,"column":13},"action":"insert","lines":["r"]},{"start":{"row":108,"column":13},"end":{"row":108,"column":14},"action":"insert","lines":["n"]}],[{"start":{"row":108,"column":14},"end":{"row":108,"column":15},"action":"insert","lines":[" "],"id":485},{"start":{"row":108,"column":15},"end":{"row":108,"column":16},"action":"insert","lines":["="]}],[{"start":{"row":108,"column":16},"end":{"row":108,"column":17},"action":"insert","lines":[" "],"id":486}],[{"start":{"row":108,"column":16},"end":{"row":108,"column":17},"action":"remove","lines":[" "],"id":487},{"start":{"row":108,"column":15},"end":{"row":108,"column":16},"action":"remove","lines":["="]}],[{"start":{"row":108,"column":15},"end":{"row":108,"column":16},"action":"insert","lines":["$"],"id":488},{"start":{"row":108,"column":16},"end":{"row":108,"column":17},"action":"insert","lines":["e"]},{"start":{"row":108,"column":17},"end":{"row":108,"column":18},"action":"insert","lines":["r"]},{"start":{"row":108,"column":18},"end":{"row":108,"column":19},"action":"insert","lines":["r"]},{"start":{"row":108,"column":19},"end":{"row":108,"column":20},"action":"insert","lines":["o"]},{"start":{"row":108,"column":20},"end":{"row":108,"column":21},"action":"insert","lines":["r"]}],[{"start":{"row":108,"column":21},"end":{"row":108,"column":22},"action":"insert","lines":[";"],"id":489}],[{"start":{"row":107,"column":20},"end":{"row":107,"column":21},"action":"remove","lines":["i"],"id":490}],[{"start":{"row":107,"column":20},"end":{"row":107,"column":21},"action":"insert","lines":["l"],"id":491}]]},"ace":{"folds":[],"scrolltop":2294,"scrollleft":0,"selection":{"start":{"row":107,"column":21},"end":{"row":107,"column":21},"isBackwards":false},"options":{"guessTabSize":true,"useWrapMode":false,"wrapToView":true},"firstLineState":0},"timestamp":1599894627218,"hash":"d084e274723d8136a0d5f03c71413330519c9315"}