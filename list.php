<?php 
include('config.php'); 
echo "<table border=1 >"; 
echo "<tr>"; 
echo "<td><b>RA</b></td>"; 
echo "<td><b>Nome</b></td>"; 
echo "<td><b>Nome Disciplina</b></td>"; 
echo "</tr>"; 
$result = mysqli_query($mysqli, "SELECT * FROM `tbl_aluno`"); 
while($row = mysqli_fetch_array($result)){ 
foreach($row AS $key => $value) { $row[$key] = stripslashes($value); } 
echo "<tr>";  
echo "<td valign='top'>" . nl2br( $row['RA']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['nome']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['nome_disciplina']) . "</td>";  
echo "<td valign='top'><a href=edit.php?RA={$row['RA']}>Editar</a></td><td><a href=delete.php?RA={$row['RA']}>Deletar</a></td> "; 
echo "</tr>"; 
} 
echo "</table>"; 
echo "<a href=add.php>Novo aluno</a>"; 
?>