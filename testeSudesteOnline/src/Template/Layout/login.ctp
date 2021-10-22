<?php
$cakeDescription = 'Desenvolve Itapê';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>
        <?= $cakeDescription ?>:
        Login
    </title>

    <?= $this->Html->css(['bootstrap.min','font-awesome.min','signin']) ?>
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body class="text-center">
    <div class="form-signin">
      <?= $this->Flash->render() ?>
      <?= $this->fetch('content') ?>
    </div>
    <?= $this->Html->script(['jquery-3.2.1.min','signin','popper','bootstrap.min']) ?>
</body>
</html>
