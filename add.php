<?php 
include('config.php'); 
if (isset($_POST['submitted'])) { 
	foreach($_POST AS $key => $value) { $_POST[$key] = mysqli_real_escape_string($mysqli, $value); } 
	$sql = "INSERT INTO `tbl_aluno` ( `RA` ,  `nome` ,  `nome_disciplina`  ) VALUES(  '{$_POST['RA']}' ,  '{$_POST['nome']}' ,  '{$_POST['nome_disciplina']}'  ) "; 
	mysqli_query($mysqli, $sql); 
	echo "Aluno adicionado.<br />"; 
	echo "<a href='index.php'>Voltar para a lista.</a>"; 
} 
?>

<form action='' method='POST'> 
	<p><b>RA:</b><br /><input type='text' name='RA'/></p>
	<p><b>Nome:</b><br /><input type='text' name='nome'/></p>
	<p><b>Nome Disciplina:</b><br /><input type='text' name='nome_disciplina'/></p>
	<p><input type='submit' value='Adicionar aluno' /><input type='hidden' value='1' name='submitted' /></p>
</form> 
