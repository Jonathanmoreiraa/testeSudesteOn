<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $cakeDescription = 'Administrativo'; //deixando a pág. no administrativo ?>
    </title>
    <?= $this->Html->meta('icon') ?>
    
    <!-- fazendo o estilo da página-->
    <?= $this->Html->css(['bootstrap.min-1.css']) ?>
    <?= $this->Html->script(['all.min.js']) ?>
    <?= $this->Html->css(['fontawesome.min.css']) ?>
    <?= $this->Html->css(['dashboard.css']) ?>




    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<!--acrescenta a barra nas páginas-->
<body>
    <!--uso do element para linkar o cabeçalho com o resto do programa-->
    <?= $this->element('cabecalho')?>
    <div class="d-flex">
        <?= $this->element('menu')?>
        <div class="content p-1">
            <div class="list-group-item">
                <?= $this->fetch('content') ?>
            </div>
    </div>
</div>
    
 <!--Mostra as opções de usuário-->
    <?= $this->Html->script(['jquery-3.2.1.slim.min.js','popper.min.js', 'bootstrap.min.js', 'dashboard.js']) ?>
    <?= $this->fetch('script') ?>

</html>

