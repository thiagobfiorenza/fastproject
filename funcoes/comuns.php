<?php
	function erro($valor){
		if(PEAR::isError($valor)){
			die('<pre>'.$valor->getMessage().$valor->getUserInfo().'</pre>');
		}
	}

	function data($valor, $modo = 'completo'){
		if($modo == 'curto'){
			$data = substr($valor, 8, 2).'/'.substr($valor, 5,2).'/'.substr($valor, 0,4);
		}else{
			$data = substr($valor, 8, 2).'/'.substr($valor, 5,2).'/'.substr($valor, 0,4).' às '.substr($valor, 10);
		}
		return $data;
	}
?>
