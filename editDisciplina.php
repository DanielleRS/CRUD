<?php
include('config.php'); 
$nome_disciplina = "";
if (isset($_GET['nome_disciplina']) ) { 
$nome_disciplina = (string) $_GET['nome_disciplina']; 
if (isset($_POST['submitted'])) { 
foreach($_POST AS $key => $value) { $_POST[$key] = mysqli_real_escape_string($mysqli, $value); } 
$sql = "UPDATE `tbl_disciplina` SET  `nome_disciplina` =  '{$_POST['nome_disciplina']}' ,  `nome_professor` =  '{$_POST['nome_professor']}' ,  `creditos` =  '{$_POST['creditos']}'   WHERE `nome_disciplina` = '$nome_disciplina' "; 
mysqli_query($mysqli, $sql); 
echo "Disciplina editada."; 
echo "<a href='index.php'>Voltar para a lista.</a>"; 
}}
$row = mysqli_fetch_array ( mysqli_query($mysqli, "SELECT * FROM `tbl_disciplina` WHERE `nome_disciplina` = '$nome_disciplina' "));
?>
<form action='' method='POST'> 
    <p><b>Nome disciplina:</b><br /><input type='text' name='nome_disciplina' value='<?php echo $row['nome_disciplina'];?>' /></p>
    <p><b>Nome professor:</b><br /><input type='text' name='nome_professor' value='<?php echo $row['nome_professor'];?>' /></p>
    <p><b>Créditos:</b><br /><input type='text' name='creditos' value='<?php echo $row['creditos'];?>' /></p>
    <p><input type='submit' value='Editar disciplina' /><input type='hidden' value='1' name='submitted' /></p>
</form>

