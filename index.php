<?php   
#	Mostrar erros
error_reporting(E_ALL);
ini_set('display_errors', '1');
ini_set('arg_separator.output','&amp;');
date_default_timezone_set('Brazil/East');

#	Cabe�alho
header("Content-Type: text/html;  charset=utf-8",true);
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
header('Pragma: no-cache');
header('Expires: 0');
?> 
	

<!DOCTYPE html>
<html>
	<head>
        <!--	metatags	-->
        <meta charset="utf-8">
        <title>.:: Busca cep ::.</title>
        <!-- site css -->
        <style type="text/css">
            /**		Template **/
            body,td,th { 
				font-family: "Open Sans", "Helvetica Neue", Helvetica, Arial, sans-serif;
			}
			h1,h2,h3,h4,h5,h6 {
				font-family: "Open Sans", "Helvetica Neue", Helvetica, Arial, sans-serif;
			}
			#box {
				width: 400px; margin: 0 auto; text-align:center;
			}
			/**		Colors		*/
			.yellow { color:#FFA400; }
			.red { color:#8F1D21; }
			.green { color:#006442; }
        </style>
        <!--	Js	-->
        <script type="text/javascript" src="js/ajax.js"></script>
		<!--	jQuery	-->
        <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
	</head>
	<body>
	
		<h1>Buscar endereço pelo CEP</h1>
		<div id="box">
			<fieldset>
				<legend>buscar cep</legend>
					<strong>CEP:</strong>
					<input type="text" id="cep" name="cep" size="9" />
					<input type="button" value="buscar" onclick="buscar_cep()"/>
					<div id="resultado"></div>
			</fieldset>
		</div>

	</body>
</html>


<script>
	function buscar_cep(){
		cep=	document.getElementById('cep').value;
		if(cep == ''){
			alert("Informe o CEP a ser buscado!");
			return false;
		}
		
		url= "control/controle_cep.php?act=buscar&cep="+cep;
		el= document.getElementById("resultado");
		el.innerHTML= "";
		ajaxGet(url, el, true);
		
	}

	$(document).ready(function(){
		//	Máscaras
		$("#cep").mask("99999-999");
	});
</script>