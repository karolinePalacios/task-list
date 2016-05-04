<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Task List</title>
<meta name="description" content="Crie sua prórpia lista de Tarefas">
<meta name="keywords" content="task, list, manager, tarefa, lista, gerenciador">
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="css/animate.css" rel="stylesheet" type="text/css">
<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="css/latolatinfonts.css" rel="stylesheet" type="text/css">
<link href="css/bootstrap-theme.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="container" style="margin-top:25px;">
<div class="row">
<div class="col-md-10 col-md-offset-1">
<div class="panel panel-main">
<header class="panel-heading text-center">
<button type="button" class="btn btn-main pull-right listnew" data-toggle="tooltip" title="Cria uma nova Lista"><i class="fa fa-plus"></i></button>
<h1>Gerenciador de Tarefas</h1>
</header>
<div class="panel-body listholder">
<?php
require_once('save.php');
$CONTENT = pdo("SELECT `text` FROM `listManager` WHERE `id` = 1 LIMIT 1;");
print($CONTENT['text']);
?>
</div>
<footer class="panel-footer"></footer>
</div>
</div>
</div>
</div>
<script src="js/jquery-2.2.3.min.js" type="text/javascript"></script>
<script src="js/bootstrap.min.js" type="text/javascript"></script>
<script src="js/taskmanager.js" type="text/javascript"></script>
<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 
});
</script>
</body>
</html>