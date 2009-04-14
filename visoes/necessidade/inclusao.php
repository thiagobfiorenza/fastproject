<?php
	$area = $par[0];
	if(!empty($_POST)){
		$codigo = $con->nextId($area);
		
		$sql = ('
			INSERT INTO necessidade (
				codigo,
				nome,
				descricao,
				observacao,
				codigo_pessoa,
				situacao,
				inclusao
			)
			VALUES (
				?,
				?,
				?,
				?,
				?,
				?,
				?
			)
		');

		$dados = array(
			$codigo,
			$_POST['nome'],
			$_POST['descricao'],
			$_POST['observacao'],
			$_SESSION['fp']['codigo_pessoa'],
			'S',
			date('Y-m-d H:i:s')
		);
		
		$pre = $con->prepare($sql);
		erro($pre);
		$exe = $pre->execute($dados);
		erro($exe);

		header('Location: '.url.$area.'/detalhes/'.$codigo);
		die();
	}
?>
				<h1>Inclusão de necessidade</h1>
				<form method="post">
					<p>
						<label for="nome">Nome:</label>
						<input size="60" type="text" name="nome" id="nome" />
					</p>
					<p>
						<label for="descricao">Descrição:</label>
						<textarea name="descricao" id="descricao" cols="60" rows="10"></textarea>
					</p>
					<p>
						<label for="observacao">Observação:</label>
						<textarea name="observacao" id="observacao" cols="60" rows="10"></textarea>
					</p>
					<p>
						<input id="enviar" type="submit" name="enviar" value="Incluir" />
					</p>
				</form>
