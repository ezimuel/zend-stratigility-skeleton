<html lang="en">
<head>
  <meta charset="utf-8">
  <?php foreach($this->meta as $content => $name): ?>
    <meta name="<?php echo $name ?>" content="<?php echo $content ?>">
  <?php endforeach; ?>

  <title><?php echo $this->title ?></title>

  <?php foreach($this->css as $css): ?>
    <link rel="stylesheet" href="<?php echo $css ?>">
  <?php endforeach; ?>
</head>
<body>
