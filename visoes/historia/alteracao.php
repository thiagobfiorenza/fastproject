<?php
	$area = $par[0];
	$codigo = $par[2];

	if(!empty($_POST)){
		$sql = ('
			UPDATE
				historia
			SET
				nome = ?,
				prioridade = ?,
				andamento = ?,
				descricao = ?,
				observacao = ?,
				atualizacao = ?
			WHERE
				codigo = ?
		');

		$dados = array(
			$_POST['nome'],
			$_POST['prioridade'],
			$_POST['andamento'],
			$_POST['descricao'],
			$_POST['observacao'],
			date('Y-m-d H:i:s'),
			$codigo
		);
		
		$pre = $con->prepare($sql);
		erro($pre);
		$exe = $pre->execute($dados);
		erro($exe);

		header('Location: '.url.$area.'/detalhes/'.$codigo);
		die();
	}

	$sql = ('
		SELECT
			nome,
			descricao,
			observacao
		FROM
			historia
		WHERE
			codigo = ?
	');
	$dados = array($codigo);
	$pre = $con->prepare($sql);
	erro($pre);
	$exe = $pre->execute($dados);
	erro($exe);

	$tabela = $exe->fetchRow();

?>
				<h1>Alteração da história #<?php echo $codigo; ?></h1>
				<form method="post">
					<p>
						<label for="nome">Nome:</label>
						<input size="60" type="text" name="nome" id="nome" value="<?php echo $tabela->nome; ?>" />
					</p>
					<p>
						<label for="descricao">Descrição:</label>
						<textarea name="descricao" id="descricao" cols="60" rows="10"><?php echo $tabela->descricao; ?></textarea>
					</p>
					<p>
						<label for="observacao">Observação:</label>
						<textarea name="observacao" id="observacao" cols="60" rows="10"><?php echo $tabela->observacao; ?></textarea>
					</p>
					<p>
						<input id="enviar" type="submit" name="enviar" value="Alterar" />
					</p>
				</form>

