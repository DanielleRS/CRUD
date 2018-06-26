<?php
include('config.php'); 
$ra = (int) $_GET['RA']; 
mysqli_query($mysqli, "DELETE FROM `tbl_aluno` WHERE `ra` = '$ra' ") ; 
echo "Aluno excluído.<br /> "; 
?> 

<a href='index.php'>Voltar para a lista</a>