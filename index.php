<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Processar arquivos de retorno BANRISUL</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$("a").click(function(){
				alert("foda-se");
			});
			$("#processa-form").submit(function(e){
				e.preventDefault();
				var formData = new FormData(this);
				$.ajax({
					url: "processa.php",
					type: "POST",
					data: formData,
					processData: false,
					contentType: false,
					success: function(data){
						$("#resposta").html("<p>"+data+"</p>");
						var height = (($(window).height() - $("header").height()) - $("footer").height()) - $("#formulario").height();
						$("article").css("height", height - (height * 0.10));	
					},
					error: function(data){
						console.log(data);
						alert("Ocorreu algum erro");
					}
				});
			});
		});
	</script>
	<style type="text/css">
		#container{
			margin: 0;
			padding: 0;
			font-family: Arial;
		}
		header{
			position: relative;
			top: 0;
			left: 0;
			width: 100%;
		}
		header h1{
			text-align: center;
		}
		article{
			margin: 0 auto;
			width: 100%;
		}
		#formulario{
			margin-bottom: 30px;
			width: 600px;
			max-height: 100%;
			margin: 0 auto;
		}
		#resposta{
			overflow-x: auto;
			margin: 0;
			padding: 0;
			width: 100%;
			text-align: center;
			height: 90%;
		}
		footer{
			position: absolute;
			bottom: 0;
			left: 0;
			width: 100%;
		}
		#report-error{
			float: right;
			font-size: 10px;
		}
	</style>
</head>
<body>
	<section id="container">
		<header>
			<h1>Processar arquivos de retorno BANRISUL</h1>
		</header>
		<article>
			<div id="formulario">
				<form id="processa-form" enctype="multipart/form-data">
					<input type="file" name="arquivo">
					<br>
					<input style="float:right;" type="submit" value="Processar">
				</form>
			</div>
			<div id="resposta"></div>
		</article>
		<footer>
			<a id="report-error" href="#">Reportar BUG</a>
		</footer>
	</section>
</body>
</html>