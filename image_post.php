<!DOCTYPE html>
<html lang="ja">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>sample</title>
</head>

<body>
	<main>
		<p>
			<?php

			// print_r($_FILES);

			//ファイルが送信されていない場合はエラー処理
			if (!isset($_FILES['image'])) {
				echo 'ファイルが送信されていません。';
				exit;
			}

			//ファイル名を使用して保存先ディレクトリを指定 basename()でファイルシステムトラバーサル攻撃を防ぐ
			$save = 'imgs/' . basename($_FILES['image']['name']);

			//move_uploaded_fileで、一時ファイルを保存先ディレクトリに移動させる
			if (move_uploaded_file($_FILES['image']['tmp_name'], $save)) {
				echo 'アップロード成功！';
			} else {
				echo 'アップロード失敗！';
			}

			// //// ファイル複数アップの場合 ////
			// //ファイルが送信されていない場合はエラー処理
			// if (!isset($_FILES['image'])) {
			// 	echo 'ファイルが送信されていません。';
			// 	exit;
			// }

			?></p>
	</main>
</body>

</html>