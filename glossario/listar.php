<?php
require __DIR__.'/vendor/autoload.php';
use Kreait\Firebase\Factory;

$factory (new Factory())->withDatabaseUri('https://bdglossario-2ams-default-rtdb.firebaseio.com/');

$database = $factory->createDatabase();
$palavra = $database ->getReference('Termos')->getSnapshot();
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Lista de palavras Glossário/title>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" type="text/css" rel="stylesheet" media="screen">
</head>
<body>
<center><img src="logo.png" height="480"></center><br><br>
    <table class="table table-bordered">
    <tread>
        <tr>
            <th scope="col">Inglês</th>
            <th scope="col">Português</th>
        </tr>
    </tread>
        <?php foreach($palavra->getValue() as $palavra): ?>
    <tbody>
        <tr>
            <td><?php echo $palavra ['TermoIngles'] ?></td>
            <td><?php echo $palavra ['TermoPortugues']?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
    </table>
    <center>
    <a href="cadpalavras_ams.php"><img src="btnCadastrar.png" width="100"></a>
    <a href="index.html"><img src="btnVoltar.png" width="100"></a>
    </center>
</body>
</html>