<?php
$pasta = "/FolhaPagBanrisul/arquivos/";
$file = $_FILES["arquivo"];
$nome = $pasta.$file["name"];

$check = false;

$palavras_chave = array('PREFEITURA MUNICIPAL', 'PREFEITURA MUNICIPAL DE BANRISUL CONSIST', 'FUNDO DE APOSENTADORIA E PENSA');
$ext = pathinfo($file["name"], PATHINFO_EXTENSION);

if(preg_match('/G0D/',$ext)){
	if(move_uploaded_file($file['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . $nome)){
		if($arquivo = fopen('arquivos/'.$file['name'], 'r')){
		while(!feof($arquivo)) {
			$linhas = fgets($arquivo);

			if(!preg_match('/BD/',$linhas)){
					$palavra_chave = implode("|", $palavras_chave);

					if(!preg_match("/".$palavra_chave."/", $linhas)){
						$final = preg_replace("/[^A-z ]/", "", $linhas);
						echo str_replace("BRL", " ", $final). "<br />";
						if(preg_match("/[A-z]/", $final)){
							$check = true;
						}
					}
			}
		}
		if($check == false){
			echo "Nenhum erro encontrado neste arquivo";
		}
		}else{
			echo "Erro ao processar o arquivo";
		}
	}else{
		echo "Erro ao fazer o upload do arquivo";
	}
}else{
	echo "Arquivo invalido";
}
?>
