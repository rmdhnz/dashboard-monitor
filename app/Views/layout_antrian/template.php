<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $title ?></title>
  <link rel="stylesheet" href="/css/styles.css">
</head>

<body>
  <section class="d-flex flex-column justify-content-center align-items-center min-vh-100 bg-light">
    <?= $this->renderSection('content') ?>
  </section>
</body>

</html>