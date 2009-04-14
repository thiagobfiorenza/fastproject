<?php
	$area = $par[0];
?>
		<h1>Necessidades</h1>
			<a href="<?php echo url.$area.'/inclusao'; ?>">Inclua uma <?php echo $area; ?></a>
<?php
	$sql = ('
		SELECT
			n.codigo,
			n.nome,
			p.nome pessoa,
			n.inclusao
		FROM
			necessidade n,
			pessoa p
		WHERE
			n.situacao = ?
	');
	$dados = array(
		'S'
	);
	
	$pre = $con->prepare($sql);
	erro($pre);
	$exe = $pre->execute($dados);
	erro($exe);
	if($exe->numRows() > 0){
?>
		<table>
			<thead>
				<tr>
					<th>Código</th>
					<th>Nome</th>
					<th>Pessoa</th>
					<th>Inclusão</th>
					<th>Detalhes</th>
					<th>Alterar</th>
					<th>Excluir</th>
				</tr>
			</thead>
			<tbody>
<?
		while($tabela = $exe->fetchRow()){
?>
				<tr>
					<td><?php echo '#'.$tabela->codigo; ?></td>
					<td><?php echo $tabela->nome; ?></td>
					<td><?php echo $tabela->pessoa; ?></td>
					<td><?php echo data($tabela->inclusao, 'curto'); ?></td>
					<td><a href="<?php echo url . $area.'/detalhes/' . $tabela->codigo; ?>">Veja os detalhes desta <?php echo $area; ?></a></td>
					<td><a href="<?php echo url . $area.'/alteracao/' . $tabela->codigo; ?>">Altere esta <?php echo $area; ?></a></td>
					<td><a href="<?php echo url . $area.'/exclusao/' . $tabela->codigo; ?>">Exclua esta <?php echo $area; ?></a></td>
				</tr>
<?php
		}
?>
			</tbody>
		</table>
<?php
	}else{
?>
		<p>Nenhuma <?php echo $area; ?> foi cadastrada</p>
<?php
	}
?>
