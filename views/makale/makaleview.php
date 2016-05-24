<?php
	$yorum = "";
?>

<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.ui/1.8.9/jquery-ui.js" type="text/javascript"></script>
    <link href="http://ajax.aspnetcdn.com/ajax/jquery.ui/1.8.9/themes/start/jquery-ui.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js "></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.ui/1.8.9/jquery-ui.js" type="text/javascript"></script>
    <link href="http://ajax.aspnetcdn.com/ajax/jquery.ui/1.8.9/themes/start/jquery-ui.css" rel="stylesheet" type="text/css" />	
	<script type="text/javascript" href="/css/carousel.js" media="print"></script>
	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="/css/ie.css" media="screen, projection" />
	<![endif]-->  
	<link rel="stylesheet" type="text/css" href="/css/main.css" />
	<link rel="stylesheet" type="text/css" href="/css/form.css" />	
	
</head>
	<body>
		<diV class="col-md-12">
			<div class="form-group has-success has-feedback">
				<div class="input-group">
					<span class="input-group-addon"><span class="glyphicon glyphicon-search"></span></span>
					<input id="SearchTable" type="text" class="form-control" placeholder="İçerik, Başlık, Kod Veya Tarih Araması Yap.." 
						style="width:100%;margin:auto"/><br/>
				</div>			
			</div>
		</div>
			<table class="table table-striped" style="border:3px solid;border-radius:5px 5px 5px 5px;box-shadow:0px 0px 15px 0px">
				<tr id="FIRSTROW" style="background:grey;color:white">
					<th>Makale Adı</th>
					<th>Makale Konu</th>
					<th>Makaleyi Oku</th>
				</tr>
		   <?php $sql = (new \yii\db\Query()) -> select('*') -> from('article') -> All();
			foreach($sql as $deneme) : 
			{?>
				<tr>
					<td>
						<?php echo $deneme['author_name'];  ?>
					</td>
					<td>
						<?php echo $deneme['article_name'];  ?>
					</td>
					<td style="display:none">
						<?php echo $deneme['content'];  ?>
					</td>
					<td>
					<?php $sql2 = (new \yii\db\Query()) -> select('*') -> from('yorum') -> All();
					$yorum = "";
					foreach($sql2 as $yorumlar) :
					{ 
						if($deneme['id'] == $yorumlar['makaleid']) { 
						$yorum = $yorum."</br><hr /></br><span style='color:blue' class='glyphicon glyphicon-user'></span>   -  	".$yorumlar['yorum'];
					} ?>
					<?php }endforeach; ?>
						<button style="background:white;border:none" value="<?php echo $deneme['content']."</br><b><hr /></b></br><b><span style='color:blue' class='glyphicon glyphicon-comment'></span>   YORUMLAR</b>".$yorum;  ?>" type="button" class="dialogGo" data-toggle="modal" data-target="#myModal">
						<a value="<?php echo $deneme['content'];  ?>" class="dialogGo" href="#"><span class="glyphicon glyphicon-book"></span></a>
						</button>
					</td>
				</tr>
				
			<?php }endforeach; ?>
		
		<div id="dialog" style="display:none; position: center;">       
        </div>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">OKUMA</h4>
      </div>
      <div class="modal-body">
        <div class="col-md-12">
                <div  class="col-md-12">
                    <center><h1><span class="glyphicon glyphicon-bookmark" style="color:blue"></span></</h1></center><br/>
					<hr />
					<div id="result" style="width:80%;margin:auto">
						<br/>
					..<br/>
					.<br/>
					</div>
					<form action="/makale/backend/modules/blog/views/makale/yorum.php" method="post">
						<br /><br />
						<center><b>YORUM GÖNDER</b></center>
						<hr style="border:2px solid black" />
						<textarea rows="5" name="COMMENT" class="form-control" style="resize:none" placeholder="Yorumunuz..."></textarea><br />
						<input type="text" id="hiddenid" name="MID" style="display:none" />
						<input type="submit" class="btn btn-primary" /><br />
					</form>
                </div>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
	
	</body>
</html>

<script>

	
 $(".dialogGo").click(function () {
		$("#result").html("asd");
		var text = (this).getAttribute("value");
		var metin = "";
		var sayac = 0;
		for(var i = 0;i<text.length;++i)
		{
			metin = metin + text[i];
			if(i%64==0 && i != 0 && sayac == 0)
			{
				metin = metin + "<br/>";
			}
			if(text[i] == '<')
			{
				sayac = 1;
			}
		}
		$("#result").html(metin);
		$("#hiddenid").val((this).getAttribute("value"));
    });
	

	$('#SearchTable').keyup(function() {
	  var gelen = $(this).val();
        $("tr").show();
        if (gelen != "") {
            $("tr").hide();
            $("#FIRSTROW").show();       
            $("tr:contains('" + gelen + "')").show();
        }
});
</script>