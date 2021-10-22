<?php

use Cake\Controller\Controller;
use Cake\Routing\Router;
?>
<div class="d-flex">
    <div class="mr-auto p-2">
        <h2 class="display-4 titulo">Visualizar Pragas</h2>
    </div>
    <div class="p-2">
        <span class="d-none d-md-block">
            <?= $this->Html->link(__('Listar'), ['controller'=>'Pests', 'action'=>'index'], ['class'=>'btn btn-outline-secondary btn-sm'])?>
            <!--é preciso adicionar o $pest->id para que o programa localize o usuário para editar-->
            <?= $this->Html->link(__('Editar'), ['controller'=>'Pests', 'action'=>'edit', $pest->id], ['class'=>'btn btn-outline-warning btn-sm'])?>
           <?php 
                echo $this->Html->link(
                    $this->Html->tag('n', 'Apagar', ['class' => 'btn btn-outline-danger btn-sm']), 
                '#', 
                array(
                    'class'=>'btn-confirm', //tirar um dos dois
                    'data-toggle'=> 'modal',
                    'data-target' => '#apagarRegistro',
                    'data-action'=> Router::url(
                array('action'=>'delete',$pest->id)
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
                <?= $this->Html->link(__('Listar'), ['controller'=>'Pests', 'action'=>'index'], ['class'=>'dropdown-item'])?>
                <!--é preciso adicionar o $pest->id para que o programa localize o usuário para editar-->
                <?= $this->Html->link(__('Editar'), ['controller'=>'Pests', 'action'=>'edit', $pest->id], ['class'=>'dropdown-item'])?>
                <?php 
                    echo $this->Html->link(
                        $this->Html->tag('n', 'Apagar', ['class' => 'dropdown-item']), 
                    '#', 
                    array(
                        'class'=>'btn-confirm', //tirar um dos dois
                        'data-toggle'=> 'modal',
                        'data-target' => '#apagarRegistro',
                        'data-action'=> Router::url(
                    array('action'=>'delete',$pest->id)
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
    <dd class="col-sm-9"><?= $this->Number->format($pest->id) ?></dd><!--dd é o conteúdo-->

    <dt class="col-sm-3">Nome</dt>
    <dd class="col-sm-9"><?= h($pest->name) ?></dd>

    <dt class="col-sm-3">Nome científico</dt>
    <dd class="col-sm-9"><?= h($pest->scientific_name) ?></dd>

    <dt class="col-sm-3">Grupo da praga</dt>
    <dd class="col-sm-9"><?= h($pest->pest_group) ?></dd>
    
    <dt class="col-sm-3 text-truncate">Data do cadastro</dt>
    <dd class="col-sm-9"><?= h($pest->created) ?></dd>

    <dt class="col-sm-3 text-truncate">Data do modificação</dt>
    <dd class="col-sm-9"><?= h($pest->modified) ?></dd>
</dl>
<?= $this->Element('modal-it')?>