<?php
	$area = $par[0];
	
	if(!empty($_POST)){
		$codigo = $con->nextId($area);
		
		$sql = ('
			INSERT INTO historia (
				codigo,
				nome,
				prioridade,
				andamento,
				situacao,
				inclusao
			)
			VALUES (
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
			1,
			'S',
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
				<h1>Inclusão de história</h1>
				<form method="post">
					<p>
						<label for="nome">Nome:</label>
						<textarea name="nome" id="nome" cols="40" rows="3"></textarea>
					</p>
					<p>
						<input id="enviar" type="submit" name="enviar" value="Incluir" />
					</p>
				</form>

