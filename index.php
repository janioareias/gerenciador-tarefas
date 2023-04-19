<?php

session_start();

if ( !isset($_SESSION['tasks']) ) {
    $_SESSION['tasks'] = array();
}

if ( isset($_GET['task_name']) ) {
    array_push($_SESSION['tasks'], $_GET['task_name']);
    unset($_GET['task_name']);
}

if ( isset($_GET['clear']) ) {
    unset($_SESSION['tasks']);
}

if ( isset($_GET['delete-last']) ) {
    array_pop($_SESSION['tasks']);
    unset($_GET['delete-last']);
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;500;900&display=swap" rel="stylesheet">
    <title>Gerenciador de Tarefas</title>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Gerenciador de Tarefas</h1>
        </div>
        <div class="form">
            <form action="" method="get">
                <label for="task_name">Tarefa:</label>
                <input type="text" name="task_name" placeholder="Nome da Tarefa: ">
                <button type="submit">Cadastrar</button>
            </form>
        </div>
        <div class="separator">
        </div>
        <div class="list-tasks">
            <?php
                if ( isset($_SESSION['tasks']) ) {
                    echo "<ul>";

                    foreach ($_SESSION['tasks'] as $key => $task) {
                        echo "<li>";
                        echo "<input type='checkbox' id='task$key' name='task[]' value='$key' style='margin-right: 5px;'>";
                        echo "<label for='task$key' style='margin-left: 5px;'>$task</label>";
                        echo "</li>";
                    }              
                    echo "<ul>";
                }
            ?>
        
        </div>

        <div class="buttons">
        <form action="" method="get">
            <input type="hidden" name="delete-last" value="delete-last">
            <button type="submit" class="btn-delete">Apagar última tarefa</button>
        </form>


        <form action="" method="get">
            <input type="hidden" name="clear" value="clear">
            <button type="submit" class="btn-clear">Limpar tarefas</button>
        </form>
        
        </div>
        <div class="footer">
            <p>Desenvolvido por Jânio Areias</p>
        </div>
    
    

</body>
</html>