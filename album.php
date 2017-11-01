<?php
include 'includes/login.php';

	// 画像ファイル名だけを格納する
	$images = array();
	// ページング用.5枚ごとに分割
	$num = 5;
	
	// ディレクトリを開き、album以下のディレクトリハンドルを返す。
	if($handle = opendir('./album')) {
		// ディレクトリを1行ずつ読み込んで返り値にする
		// ファイル名が取得できている限りtrueになる
		while($entry = readdir($handle)) {
			// カレントディレクトリ、その上の階層の名前は除く
			if($entry != '.' && $entry != '..') {
				$images[] = $entry;
			}
		}
		//　フォルダを閉じる
		closedir($handle);
	}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html;
charset=UTF-8">
<link rel="stylesheet" type="text/css" href="mac.css"/>
	<title>交流サイト：アルバム</title>
</head>
<body>
	<h1>交流サイト：アルバム</h1>
	<p>
		<a href="index.php">トップページに戻る</a>
		<a href="upload.php">写真をアップロードする</a>
	</p>
	<?php
		if(count($images) > 0) {
			// 配列を2要素ずつ分割する
			$images = array_chunk($images, $num);
			$page = 0;

			//　GETでページ数が指定されていたら&数値チェック
			if(isset($_GET['page']) &&
						is_numeric($_GET['page'])) {
				// 引数を数字で返す
				$page = intval($_GET['page']) - 1;
				if(!isset($images[$page])) {
					$page = 0;
				}
			}

			foreach($images[$page] as $img) {
				echo '<img src="./album/'.$img.'">';
			}

			echo '<p>';
			for($i = 1; $i <= count($images); $i++) {
				echo '<a href="album.php?page='.$i.'">'.$i.'</a>&nbsp;';
			}
			echo '</p>';
		} else {
			echo '<p>画像はまだありません。</p>';
		}
	?>
</body>
</html>