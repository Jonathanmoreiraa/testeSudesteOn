<?php

use Cake\Controller\Controller;
use Cake\Routing\Router;
?>
<div class="d-flex">
    <div class="mr-auto p-2">
        <h2 class="display-4 titulo">Usuário</h2>
    </div>
    <div class="p-2">
        <span class="d-none d-md-block">
            <?= $this->Html->link(__('Listar'), ['controller'=>'users', 'action'=>'index'], ['class'=>'btn btn-outline-secondary btn-sm'])?>
            <!--é preciso adicionar o $user->id para que o programa localize o usuário para editar-->
            <?= $this->Html->link(__('Editar'), ['controller'=>'users', 'action'=>'edit', $user->id], ['class'=>'btn btn-outline-warning btn-sm'])?>
           <?php 
                echo $this->Html->link(
                    $this->Html->tag('n', 'Apagar', ['class' => 'btn btn-outline-danger btn-sm']), 
                '#', 
                array(
                    'class'=>'btn-confirm', //tirar um dos dois
                    'data-toggle'=> 'modal',
                    'data-target' => '#apagarRegistro',
                    'data-action'=> Router::url(
                array('action'=>'delete',$user->id)
                ),
            'escape' => false), 
            false);
            ?>
            
        </span>
        <div class="dropdown d-block d-md-none">
            <button class="btn cor dropdown-toggle btn-sm" type="button" id="acoesListar" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                Ações
            </button>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="acoesListar">
                <?= $this->Html->link(__('Listar'), ['controller'=>'users', 'action'=>'index'], ['class'=>'dropdown-item'])?>
                <!--é preciso adicionar o $user->id para que o programa localize o usuário para editar-->
                <?= $this->Html->link(__('Editar'), ['controller'=>'users', 'action'=>'edit', $user->id], ['class'=>'dropdown-item'])?>
                <?php 
                    echo $this->Html->link(
                        $this->Html->tag('n', 'Apagar', ['class' => 'dropdown-item']), 
                    '#', 
                    array(
                        'class'=>'btn-confirm', //tirar um dos dois
                        'data-toggle'=> 'modal',
                        'data-target' => '#apagarRegistro',
                        'data-action'=> Router::url(
                    array('action'=>'delete',$user->id)
                    ),
                'escape' => false), 
                false);
                ?>            </div>
        </div>
    </div>
</div><hr>
<?= $this->Flash->render() ?>
<dl class="row">
    <dt class="col-sm-3">ID</dt><!--dt é o título-->
    <dd class="col-sm-9"><?= $this->Number->format($user->id) ?></dd><!--dd é o conteúdo-->

    <dt class="col-sm-3">Nome</dt>
    <dd class="col-sm-9"><?= h($user->name) ?></dd>

    <dt class="col-sm-3">Nome de usuário</dt>
    <dd class="col-sm-9"><?= h($user->username) ?></dd>

    <dt class="col-sm-3">E-mail</dt>
    <dd class="col-sm-9"><?= h($user->email) ?></dd>

    <dt class="col-sm-3 text-truncate">Data do cadastro</dt>
    <dd class="col-sm-9"><?= h($user->created) ?></dd>

</dl>
<?= $this->Element('modal-ex')?>