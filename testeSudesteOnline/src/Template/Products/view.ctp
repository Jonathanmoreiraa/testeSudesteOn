<?php

use Cake\Controller\Controller;
use Cake\Routing\Router;
?>
<div class="d-flex">
    <div class="mr-auto p-2">
        <h2 class="display-4 titulo">Visualizar Defensivos Agrícolas</h2>
    </div>
    <div class="p-2">
        <span class="d-none d-md-block">
            <?= $this->Html->link(__('Listar'), ['controller'=>'products', 'action'=>'index'], ['class'=>'btn btn-outline-secondary btn-sm'])?>
            <!--é preciso adicionar o $product->id para que o programa localize o usuário para editar-->
            <?= $this->Html->link(__('Editar'), ['controller'=>'products', 'action'=>'edit', $product->id], ['class'=>'btn btn-outline-warning btn-sm'])?>
           <?php 
                echo $this->Html->link(
                    $this->Html->tag('n', 'Apagar', ['class' => 'btn btn-outline-danger btn-sm']), 
                '#', 
                array(
                    'class'=>'btn-confirm', //tirar um dos dois
                    'data-toggle'=> 'modal',
                    'data-target' => '#apagarRegistro',
                    'data-action'=> Router::url(
                array('action'=>'delete',$product->id)
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
                <?= $this->Html->link(__('Listar'), ['controller'=>'products', 'action'=>'index'], ['class'=>'dropdown-item'])?>
                <!--é preciso adicionar o $product->id para que o programa localize o usuário para editar-->
                <?= $this->Html->link(__('Editar'), ['controller'=>'products', 'action'=>'edit', $product->id], ['class'=>'dropdown-item'])?>
                <?php 
                    echo $this->Html->link(
                        $this->Html->tag('n', 'Apagar', ['class' => 'dropdown-item']), 
                    '#', 
                    array(
                        'class'=>'btn-confirm', //tirar um dos dois
                        'data-toggle'=> 'modal',
                        'data-target' => '#apagarRegistro',
                        'data-action'=> Router::url(
                    array('action'=>'delete',$product->id)
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
    <dd class="col-sm-9"><?= $this->Number->format($product->id) ?></dd><!--dd é o conteúdo-->

    <dt class="col-sm-3">Nome</dt>
    <dd class="col-sm-9"><?= h($product->name) ?></dd>

    <dt class="col-sm-3">Classe</dt>
    <dd class="col-sm-9"><?= h($product->class) ?></dd>

    <dt class="col-sm-3">Lote</dt>
    <dd class="col-sm-9"><?= h($product->lote) ?></dd>

    <dt class="col-sm-3">Composição do produto</dt>
    <dd class="col-sm-9"><?= h($product->product_composition) ?></dd>
    
    <dt class="col-sm-3">Cadastrado por</dt>
    <dd class="col-sm-9"><?= $product->has('user') ? $this->Html->link($product->user->name, ['controller' => 'Users', 'action' => 'view', $product->user->id]) : '' ?></dd>

    <dt class="col-sm-3 text-truncate">Data do cadastro</dt>
    <dd class="col-sm-9"><?= h($product->created) ?></dd>

    <dt class="col-sm-3 text-truncate">Data do modificação</dt>
    <dd class="col-sm-9"><?= h($product->modified) ?></dd>
</dl>
<?= $this->Element('modal-it')?>