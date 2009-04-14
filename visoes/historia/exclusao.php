<?php
	$area = $par[0];
	$acao = $par[1];
	$codigo = $par[2];
	$resposta = $par[3];

	if(isset($resposta)){
		if($resposta == 'sim'){
			$sql = ('
				UPDATE
					historia
				SET
					situacao = ?
				WHERE
					codigo = ?
			');
			$dados = array(
				'N',
				$codigo
			);
			$pre = $con->prepare($sql);
			erro($pre);
			$exe = $pre->execute($dados);
			erro($exe);
		}
		header('Location: '.url.$area);
		die();
	}
?>
				<h1>Exclusão da <?php echo $area.' #'.$codigo; ?></h1>

				<p>Tem certeza que deseja excluir a história <?php echo $codigo; ?>?</p>
				<p><a href="<?php echo url.$area.'/'.$acao.'/'.$codigo.'/sim'; ?>">Sim</a> ou <a href="<?php echo url.$area.'/'.$acao.'/'.$codigo.'/nao'; ?>">Não</a></p>
