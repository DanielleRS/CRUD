<?php 
include('config.php'); 
if (isset($_POST['submitted'])) { 
	foreach($_POST AS $key => $value) { $_POST[$key] = mysqli_real_escape_string($mysqli, $value); } 
	$sql = "INSERT INTO `tbl_disciplina` ( `nome_disciplina` ,  `nome_professor` ,  `creditos`  ) VALUES(  '{$_POST['nome_disciplina']}' ,  '{$_POST['nome_professor']}' ,  '{$_POST['creditos']}'  ) "; 
	mysqli_query($mysqli, $sql); 
	echo "Disciplina adicionada.<br />"; 
	echo "<a href='index.php'>Voltar para a lista.</a>"; 
} 
?>

<form action='' method='POST'> 
	<p><b>Nome da disciplina:</b><br /><input type='text' name='nome_disciplina'/></p>
	<p><b>Nome do professor:</b><br /><input type='text' name='nome_professor'/></p>
	<p><b>Créditos:</b><br /><input type='text' name='creditos'/></p>
	<p><input type='submit' value='Adicionar disciplina' /><input type='hidden' value='1' name='submitted' /></p>
</form> 
