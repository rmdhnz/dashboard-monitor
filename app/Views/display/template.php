<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $title ?></title>
  <link rel="stylesheet" href="/css/styles.css">
</head>

<body class="px-0">
  <section class="d-flex flex-column justify-content-center align-items-center min-vh-100 bg-light px-0">
    <?= $this->renderSection('content') ?>
  </section>
</body>

</html>