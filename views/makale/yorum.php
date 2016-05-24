
<?php
	$YORUM = $_POST['COMMENT'];
	$METIN = $_POST['MID'];

	$METIN = explode('<', $METIN);
	$ID = "";
	date_default_timezone_set('Europe/Istanbul');
    
	$baglanti = new PDO("mysql:host=localhost;dbname=yii2advanced;charset=utf8","root", "");
	$baglanti -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
	foreach($baglanti->query("SELECT * from article WHERE content='".$METIN[0]."'") as $row)	
	{
		$ID = $row['id'];
	}
	
	$datetime = date('d.m.Y H:i:s');
	$gir = $baglanti -> prepare("INSERT INTO yorum SET makaleid = :a, yorum = :e");
	$sql_giris = $gir -> execute(array("a" => $ID, "e" => $YORUM."<br/><label style='color:blue;margin-left:80%'><i>	".$datetime." </i></label>"));
	echo "<script> window.location = 'http://localhost:8080/makale/backend/web/index.php?r=blog%2Fmakale%2Fmakaleview'; </script>";
	echo $ID;
	echo $YORUM;
?>