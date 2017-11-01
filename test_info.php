<?php
	$file = file("info.txt");
?>
<html>
<head>
	<title>テニスサークル交流サイト</title>
<link rel="stylesheet" type="text/css" href="mac.css"/>
<meta http-equiv="Content-Type" content="text/html;
charset=utf-8">
</head>
<body>
	<h1>テニスサークル交流サイト</h1>
	<p><a href="index.php">トップページへ戻る</a></p>
	<h2>お知らせ</h2>
	<?php
		//配列の要素があったら
		if(count($file) > 0) {
			//配列の一番最初の要素だけ見出しにする
			foreach($file as $key => $value) {
				if($key < 3) {
#					echo '<h3>'.$value.'</h3>';
					$value = 'みかん';
					echo $value;
				//それ以降は改行して配列内を表示
				} else {
					echo $value.'<br>';
				}
			}
		} else {
			echo 'お知らせはありません';
		}
		var_dump($file);
	?>
</body>
</html>