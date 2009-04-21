<?php
	function erro($valor){
		if(PEAR::isError($valor)){
			die('<pre>'.$valor->getMessage().$valor->getUserInfo().'</pre>');
		}
	}

	function data($valor, $modo = 'completo'){
		if($modo == 'curto'){
			$data = date('d/m/Y', $valor);
		}else{
			$data = date('d/m/Y', $valor).' às '.date('H:i:s', $valor);
		}
		return $data;
	}
?>
