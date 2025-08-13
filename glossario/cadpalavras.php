<?php
require __DIR__.'/vendor/autoload.php';
use Kreait\Firebase\Factory;

if(isset($_POST['codigo'])){
    $factory = (new Factory())->withDatabaseUri('https://bdglossario-2ams-default-rtdb.firebaseio.com/');
    $database = $factory->createDatabase();
    $novaPalavra = [
        'Codigo'=>$_POST ['codigo'],
        'ingles' => $_POST ['pingles'],
        'traducao' => $_POST ['ptraducao']
];
$database->getReference('Termos/'.$_POST['codigo'])->set($novaPalavra);
$msg = 'Palavra adicionada com sucesso!';
}
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Cadastro de Palavras Glossário da Akemi</title>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" type="text/css" rel="stylesheet">
</head>
<body>
<center><img src="logo.png" height="400"></center><br><br>
<form name"Cadastro" method="POST">
<div class="container">
Código: <input type="text" name="codigo" id="codigo" value=""><br><br>
Palavra em Inglês: <input type="text" name="pingles" size="100" id="pingles" value=""><br><br>
Palavra em Português: <input type="text" name="ptraducao" size="100" id="ptraducao" value=""><br><br><br>
<center>
<input type="submit" value="Salvar">
<a href="index.html"><img src="btnVoltar.png" width="100"></a></center>
</div>

</form>
</body>
</html>