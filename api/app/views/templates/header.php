<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <title><?= $data['judul']; ?></title>
</head>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="<?= BASEURL ?>">Lite Tube</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <?php $where = strtolower(explode(" ", $data['judul'])[0]) ?>
        <a class="nav-link<?= $where == 'beranda' ? ' active' : NULL ?>" href="<?= BASEURL ?>">Beranda</a>
        <a class="nav-link<?= $where == 'fitur' ? ' active' : NULL ?>" href="<?= BASEURL ?>/fitur">Fitur</a>
        <a class="nav-link<?= $where == 'tentang' ? ' active' : NULL ?>" href="<?= BASEURL ?>/tentang">Tentang</a>
      </div>
    </div>
  </div>
</nav>

<body>