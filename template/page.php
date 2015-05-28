<?php $this->layout('template', ['title' => 'Page action']) ?>

<?php $this->start('navbar') ?>
<ul class="nav navbar-nav">
    <li><a href="/">Home</a></li>
    <li class="active"><a href="/page">Page</a></li>
</ul>
<?php $this->stop() ?>

<div class="row">
  <h1><?php echo $this->e($value) ?></h1>
</div>
