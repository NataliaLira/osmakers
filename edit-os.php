<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title></title>
</head>
<body>
  <?php 
include "./includes/dbc.php";

$id = $_GET['id'];
$query = $dbc->prepare("select
o.*,
	b.nome,
	t.nome
from (
oss o
	inner join bairros b on o.id_bairro=b.id
	inner join tipos_de_os t on o.id_tipo=t.id
) WHERE o.id=:id;");
$query->execute([':id' => $id]);
$os = $query->fetchAll(PDO::FETCH_ASSOC);


// var_dump($os);
// exit;
  ?>

<form action="" method="post">
<input type="text" name="" value="<?= $os[0]['endereco']?>">
</form>

</body>
</html>