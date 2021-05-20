<?php
require __DIR__ . '/vendor/autoload.php';

use App\Traitement;

if (!empty($_POST)) {

  $traitement = new Traitement();
  $traitement->process();
}


?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

  <title>Validation d'un formulaire avec php</title>
</head>

<body>
  <div class="container">
  <h1 class="display-4 text-center">Validation d'un formulaire a l'aide de beberlei/assert</h1>
    <form method="post">
      <div class="mb-3">
        <label for="" class="form-label">nom</label>
        <input type="text" class="form-control" id="" name="nom" aria-describedby="emailHelp">
      </div>
      <div class="mb-3">
        <label for="" class="form-label">prénom</label>
        <input type="text" class="form-control" id="" name="prenom" aria-describedby="emailHelp">
      </div>
      <div class="mb-3">
        <label for="" class="form-label">nom complet de père ou mère</label>
        <input type="text" class="form-control" id="" name="nomCompletPereOuMere" aria-describedby="emailHelp">
      </div>
      <div class="mb-3">
        <label for="" class="form-label">numéro de téléphone de père ou mère</label>
        <input type="tel" class="form-control" id="" name="telephoneMereOuPere" aria-describedby="emailHelp">
      </div>
      <div class="mb-3">
        <label for="" class="form-label">Date de naissane</label>
        <input type="text" class="form-control" id="" name="dateDeNaissance" aria-describedby="emailHelp">
      </div>

      <button type="submit" class="btn btn-primary">Soumettre</button>
    </form>
  </div>
</body>

</html>