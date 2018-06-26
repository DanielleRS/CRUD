<?php
include('config.php'); 
$nome_disciplina = (string) $_GET['nome_disciplina']; 
mysqli_query($mysqli, "DELETE FROM `tbl_disciplina` WHERE `nome_disciplina` = '$nome_disciplina' ") ; 
echo "Disciplina excluído.<br /> "; 
?> 

<a href='index.php'>Voltar para a lista</a>