<?php
//including the database connection file
include_once("config.php");

//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated
$result = mysqli_query($mysqli, "SELECT * FROM tbl_aluno"); // using mysqli_query instead
$resultDisciplina = mysqli_query($mysqli, "SELECT * FROM tbl_disciplina");
?>

<html>
<head>	
	<title>CRUD</title>

	<?php
        $parametro = filter_input(INPUT_GET, "parametro");
        
        if($parametro != "") {
            $preenche = "select * from tbl_disciplina where nome_disciplina = '$parametro' order by nome_disciplina ";
		} else {
			$preenche = "select * from tbl_disciplina order by nome_disciplina ";
        }

        $dados = mysqli_query($mysqli, $preenche);

        if($dados === FALSE) {
            // Consulta falhou, parar aqui 
            echo "error";
        }

        
		$total = mysqli_num_rows($dados);
	?>
	
	<?php
        $parametroAluno = filter_input(INPUT_GET, "parametroAluno");
        
        if($parametroAluno != "") {
            $preencheAluno = "select * from tbl_aluno where nome = '$parametroAluno' order by nome ";
		} else {
			$preencheAluno = "select * from tbl_aluno order by nome ";
        }

        $dadosAluno = mysqli_query($mysqli, $preencheAluno);

        if($dadosAluno === FALSE) {
            // Consulta falhou, parar aqui 
            echo "error";
        }

        
		$totalAluno = mysqli_num_rows($dadosAluno);
	?>
</head>

<body>
	<p>Pesquisar disciplina: </p>
	<p>
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>">
			<input type="text" name="parametro" />
			<input type="submit" name="Buscar" />
		</form>
	</p>

	<?php 
	include('config.php'); 
	echo "<table border=1 >"; 
	echo "<tr>"; 
	echo "<td><b>Nome Disciplina</b></td>"; 
	echo "<td><b>Nome Professor</b></td>"; 
	echo "<td><b>Créditos</b></td>"; 
	echo "</tr>"; 
	$arquivo_text = ' ';
	while($row = mysqli_fetch_array($dados)){ 
	foreach($row AS $key => $value) { $row[$key] = stripslashes($value); } 
	echo "<tr>";  
	echo "<td valign='top'>" . nl2br( $row['nome_disciplina']) . "</td>";  
	echo "<td valign='top'>" . nl2br( $row['nome_professor']) . "</td>";  
	echo "<td valign='top'>" . nl2br( $row['creditos']) . "</td>";  
	echo "<td valign='top'><a href=editDisciplina.php?nome_disciplina={$row['nome_disciplina']}>Editar</a></td><td><a href=deleteDisciplina.php?nome_disciplina={$row['nome_disciplina']}>Deletar</a></td> "; 
	echo "</tr>"; 
	$arquivo_text = "'$row[nome_disciplina]';'$row[nome_professor]';'$row[creditos]';";
	} 
	echo "</table>"; 
	echo "<a href=addDisciplina.php>Nova disciplina</a>"; 

	$exte = (isset($cvs)) ? '.cvs' : '.txt';
	$abbre = fopen("testeDisciplina".$exte, "w+");
	fwrite($abbre, $arquivo_text);
	?>
	<br /><br/><br/>
	
	<p>Pesquisar aluno: </p>
	<p>
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>">
			<input type="text" name="parametroAluno" />
			<input type="submit" name="Buscar" />
		</form>
	</p>
	<?php 
	include('config.php'); 
	echo "<table border=1 >"; 
	echo "<tr>"; 
	echo "<td><b>RA</b></td>"; 
	echo "<td><b>Nome</b></td>"; 
	echo "<td><b>Nome Disciplina</b></td>"; 
	echo "</tr>"; 
	while($row = mysqli_fetch_array($dadosAluno)){ 
	foreach($row AS $key => $value) { $row[$key] = stripslashes($value); } 
	echo "<tr>";  
	echo "<td valign='top'>" . nl2br( $row['RA']) . "</td>";  
	echo "<td valign='top'>" . nl2br( $row['nome']) . "</td>";  
	echo "<td valign='top'>" . nl2br( $row['nome_disciplina']) . "</td>";  
	echo "<td valign='top'><a href=edit.php?RA={$row['RA']}>Editar</a></td><td><a href=delete.php?RA={$row['RA']}>Deletar</a></td> "; 
	echo "</tr>";
	$arquivo_text = "'$row[RA]';'$row[nome]';'$row[nome_disciplina]';";
	} 
	echo "</table>"; 
	echo "<a href=add.php>Novo aluno</a>"; 

	$exte = (isset($cvs)) ? '.cvs' : '.txt';
	$abbre = fopen("testeAluno".$exte, "w+");
	fwrite($abbre, $arquivo_text);
	?>
</body>
</html>
