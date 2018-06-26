<?php 
    $parametro = filter_input(INPUT_GET, "parametro");
    if($parametro != "") {
        $preenche = "select * from tbl_aluno where nome like '$parametro%' order by nome ";
    } else {
        $preenche = "select * from tbl_aluno order by nome ";
    }

    $dados = mysqli_query($mysqllink, $preenche);

    if($dados === FALSE) {
        // Consulta falhou, parar aqui 
        echo "error";
    }

    $linha = mysqli_fetch_assoc($dados);
    $total = mysqli_num_rows($dados);

    echo "<p>
    <form action="$_SERVER['PHP_SELF'];">
        <input type="text" name="parametro" />
        <input type="submit" name="Buscar" />
    </form>
</p>";


?>