<?php

$str = ''; // 出力用の空の文字列
$array = [];

$file = fopen('shinsei.txt', 'r'); // ファイルを開く(読み取り専用) flock($file, LOCK_EX); // ファイルをロック
if ($file) {
  while ($line = fgets($file)) { // fgets()で1行ずつ取得→$lineに格納
    $str .= "<tr><td>{$line}</td></tr>"; // 取得したデータを$strに入れる
    array_push($array, $line);
  }
}
flock($file, LOCK_UN); // ロック解除
fclose($file); // ファイル閉じる
// ($strに全部の情報が入る!)

// var_dump($array);

// かっこいい配列（PHP）
$great_array = array_map(function ($x) {
  return [
    'shiten' => explode(' ', $x)[0],
    'reqNo' => explode(' ', $x)[1],
    'cause' => explode(' ', $x)[2],
    'name' => explode(' ', $x)[3],
    'kana' => explode(' ', $x)[4],
    'birth' => explode(' ', $x)[5],
    'tel' => explode(' ', $x)[6],
    'item' => explode(' ', $x)[7],
    'fieldAdd' => explode(' ', $x)[8],
    'area' => explode(' ', $x)[9],
    'levels' => explode(' ', $x)[10],
    'damages' => explode(' ', $x)[11],
    'amounts' => explode(' ', $x)[12],
    'memo' => str_replace("\n", '', explode(' ', $x)[13]),
  ];
}, $array);

// var_dump($great_array);
// exit();

$fp = fopen('shinsei.csv', 'w');

foreach ($great_array as $fields) {
  fputcsv($fp, $fields);
}

fclose($fp);

?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>申請一覧</title>
  <style>
    body {
      font-family: Roboto, "Yu Gothic Medium", "游ゴシック Medium", YuGothic, "游ゴシック体", "ヒラギノ角ゴ Pro W3", "メイリオ", sans-serif;
    }

    th {
      color: #666;
      font-size: 1.2rem;
      text-align: center;
    }
  </style>
</head>

<body>
  <main>
    <table>
      <thead>
        <tr>
          <th>////////////// 申請一覧 //////////////</th>
        </tr>
      </thead>
      <tbody>
        <?= $str ?>
      </tbody>
    </table>
  </main>

  <script>
    const greatArray = <?= json_encode($great_array) ?>; //ポイントはJSON形式でJSにデータを渡すこと！
    console.log(greatArray);
  </script>

</body>

</html>