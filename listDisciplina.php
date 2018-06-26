<?php 
include('config.php'); 
echo "<table border=1 >"; 
echo "<tr>"; 
echo "<td><b>Nome Disciplina</b></td>"; 
echo "<td><b>Nome Professor</b></td>"; 
echo "<td><b>Créditos</b></td>"; 
echo "</tr>"; 
$result = mysqli_query($mysqli, "SELECT * FROM `tbl_disciplina`"); 
while($row = mysqli_fetch_array($result)){ 
foreach($row AS $key => $value) { $row[$key] = stripslashes($value); } 
echo "<tr>";  
echo "<td valign='top'>" . nl2br( $row['nome_disciplina']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['nome_professor']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['creditos']) . "</td>";  
echo "<td valign='top'><a href=editDisciplina.php?nome_disciplina={$row['nome_disciplina']}>Edit</a></td><td><a href=deleteDisciplina.php?nome_disciplina={$row['nome_disciplina']}>Delete</a></td> "; 
echo "</tr>"; 
} 
echo "</table>"; 
echo "<a href=addDisciplina.php>Nova disciplina</a>"; 
?>