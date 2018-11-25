<?php   
/* 
 *  Buscar endereço pelo CEP
 *  -   Utilizando WebService de CEP da republicavirtual.com.br 
 */  
function busca_cep($cep){
	$url=	"http://republicavirtual.com.br/web_cep.php";
	$retorno = @file_get_contents($url.'?cep='.urlencode($cep).'&formato=json');  
	if(!$retorno){  
		$retorno = "&retorno=0&retorno_txt=erro+ao+buscar+cep";  
	} 
	return $retorno;  
}  


$param= array();
$param["cep"]= isset($_REQUEST["cep"]) ? $_REQUEST["cep"] : "";
$param["retorno"]= "";
if($param["cep"] != "") {
	
	$json=	busca_cep($param["cep"]);  
	// echo $json;  
	// echo "<pre>";
	// print_r($json);
	// echo "</pre>";
	
	//die();
	$resultado_busca= json_decode($json);
	switch($resultado_busca->resultado){  
		case '2':  
			$param["retorno"]=	"<h3 class='green'>sucesso - cep único</h3>
								<br><b>Cidade: </b> ".$resultado_busca->cidade." 
								<br><b>UF: </b> ".$resultado_busca->uf." ";
			break;  
	  
		case '1':  
			$param["retorno"]=	"<h3 class='green'>sucesso - cep completo</h3>
								<br><b>Tipo de Logradouro: </b> ".$resultado_busca->tipo_logradouro." 
								<br><b>Logradouro: </b> ".$resultado_busca->logradouro." 
								<br><b>Bairro: </b> ".$resultado_busca->bairro." 
								<br><b>Cidade: </b> ".$resultado_busca->cidade." 
								<br><b>UF: </b> ".$resultado_busca->uf." ";  
			break;
		
		default:  
			$param["retorno"]=	"<h3 class='red'>Fala ao buscar cep: ".$param["cep"]."</h3>";  
			break;
	}  

}
echo $param["retorno"]; 
?>