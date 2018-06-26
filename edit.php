<?php
include('config.php'); 
$ra = 0;
if (isset($_GET['RA']) ) { 
$ra = (int) $_GET['RA']; 
if (isset($_POST['submitted'])) { 
foreach($_POST AS $key => $value) { $_POST[$key] = mysqli_real_escape_string($mysqli, $value); } 
$sql = "UPDATE `tbl_aluno` SET  `RA` =  '{$_POST['RA']}' ,  `nome` =  '{$_POST['nome']}' ,  `nome_disciplina` =  '{$_POST['nome_disciplina']}'   WHERE `ra` = '$ra' "; 
mysqli_query($mysqli, $sql); 
echo "Aluno editado."; 
echo "<a href='index.php'>Back To Listing</a>"; 
}}
$row = mysqli_fetch_array ( mysqli_query($mysqli, "SELECT * FROM `tbl_aluno` WHERE `RA` = '$ra' "));
?>
<form action='' method='POST'> 
    <p><b>RA:</b><br /><input type='text' name='RA' value='<?php echo $row['RA'];?>' /></p>
    <p><b>Nome:</b><br /><input type='text' name='nome' value='<?php echo $row['nome'];?>' /></p>
    <p><b>Nome Disciplina:</b><br /><input type='text' name='nome_disciplina' value='<?php echo $row['nome_disciplina'];?>' /></p>
    <p><input type='submit' value='Editar aluno' /><input type='hidden' value='1' name='submitted' /></p>
</form>

