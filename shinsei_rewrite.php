<?php

// CSV読み込み
$input = file_get_contents('shinsei.csv');
// Shift-JISからUTF-8へ変換
$input = mb_convert_encoding($input, 'UTF-8', 'SJIS-win');

// 一時ファイルにUTF-8エンコードされたCSVを書き込む
$tmp = tmpfile();
$meta = stream_get_meta_data($tmp);
fwrite($tmp, $input);

// 一時ファイルから読み込み
$csv = new SplFileObject($meta['uri']);
// CSVとしてファイルを読み込ませる
$csv->setFlags(SplFileObject::READ_CSV);

// 書き出し用のCSVファイル
$output = new SplFileObject('shinsei_output.csv', 'w');

foreach ($csv as $i => $row) {
	// 空行でない場合
	if ($row[0]) {
		// 1行目以降のセルを書き換える
		if ($i !== 0) {
			// 2列目のセルを書き換える
			$row[1] = '書き換えテスト';
		}

		// 行を書き出し
		$output->fputcsv($row);
	}
}

// CSV読み込み
$output = file_get_contents('shinsei_output.csv');
// UTF-8からShift-JISへ変換
$output = mb_convert_encoding($output, 'SJIS-win', 'UTF-8');
file_put_contents('shinsei_output.csv', $output);

// ファイル閉じる
$csv    = null;
$output = null;

?>

<!DOCTYPE html>
<html lang="ja">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>申請一覧</title>
</head>

<body>
	<main>
		<table>
			<thead>
				<tr>
					<th>申請一覧</th>
				</tr>
			</thead>
			<tbody>
				<a href="<?php echo $output; ?>">download</a>
			</tbody>
		</table>
	</main>
</body>

</html>