<!DOCTYPE html>
<html lang="ja">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>写真一覧</title>
	<style>
		body {
			font-family: Roboto, "Yu Gothic Medium", "游ゴシック Medium", YuGothic, "游ゴシック体", "ヒラギノ角ゴ Pro W3", "メイリオ", sans-serif;
		}

		p {
			color: #666;
			font-size: 1.2rem;
			text-align: center;
		}
	</style>
</head>

<body>
	<main>
		<p>////////////// 写真一覧 //////////////</p>

		<?php
		//ディレクトリ名
		$dir_path = "imgs";
		if (is_dir($dir_path)) {
			if (is_readable($dir_path)) { // ? ファイルが読み込み可能かどうか
				$ch_dir = dir($dir_path); //ディレクトリクラス
				//ディレクトリ内の画像を一覧表示
				while (false !== ($file_name = $ch_dir->read())) {
					$ln_path = $ch_dir->path . "/" . $file_name;
					if (@getimagesize($ln_path)) { //画像かどうか？
						echo "<a href = \"imgview.php?d=" . urlencode(mb_convert_encoding($ln_path, "UTF-8")) . "\" target = \"_blank\" >";
						echo "<img src = \"" . $ln_path . "\" width=\"200\"></a>";
						print_r($file_name);
						echo "　　";
					}
				}
				$ch_dir->close();
			} else {
				echo "<p>" . htmlspecialchars($dir_path) . "　は読み込みが許可されていません。";
			}
		} else {
			echo 'DIR 画像がありません';
		}
		?>

	</main>

</body>

</html>