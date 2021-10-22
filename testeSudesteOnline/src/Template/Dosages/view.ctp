<?php
use Cake\Controller\Controller;
use Cake\Routing\Router;
?>
<div class="d-flex">
    <div class="mr-auto p-2">
        <h2 class="display-4 titulo">Visualizar Dosagens</h2>
    </div>
    <div class="p-2">
        <span class="d-none d-md-block">
            <?= $this->Html->link(__('Listar'), ['controller'=>'dosages', 'action'=>'index'], ['class'=>'btn btn-outline-secondary btn-sm'])?>
            <!--é preciso adicionar o $dosage->id para que o programa localize o usuário para editar-->
            <?= $this->Html->link(__('Editar'), ['controller'=>'dosages', 'action'=>'edit', $dosage->id], ['class'=>'btn btn-outline-warning btn-sm'])?>
           <?php 
                echo $this->Html->link(
                    $this->Html->tag('n', 'Apagar', ['class' => 'btn btn-outline-danger btn-sm']), 
                '#', 
                array(
                    'class'=>'btn-confirm', //tirar um dos dois
                    'data-toggle'=> 'modal',
                    'data-target' => '#apagarRegistro',
                    'data-action'=> Router::url(
                array('action'=>'delete',$dosage->id)
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
                <?= $this->Html->link(__('Listar'), ['controller'=>'dosages', 'action'=>'index'], ['class'=>'dropdown-item'])?>
                <!--é preciso adicionar o $dosage->id para que o programa localize o usuário para editar-->
                <?= $this->Html->link(__('Editar'), ['controller'=>'dosages', 'action'=>'edit', $dosage->id], ['class'=>'dropdown-item'])?>
                <?php 
                    echo $this->Html->link(
                        $this->Html->tag('n', 'Apagar', ['class' => 'dropdown-item']), 
                    '#', 
                    array(
                        'class'=>'btn-confirm', //tirar um dos dois
                        'data-toggle'=> 'modal',
                        'data-target' => '#apagarRegistro',
                        'data-action'=> Router::url(
                    array('action'=>'delete',$dosage->id)
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
    <dd class="col-sm-9"><?= $this->Number->format($dosage->id) ?></dd><!--dd é o conteúdo-->

    <dt class="col-sm-3">Produto</dt>
    <dd class="col-sm-9"><?= $dosage->has('product') ? $this->Html->link($dosage->product->name, ['controller' => 'Products', 'action' => 'view', $dosage->product->id]) : '' ?></dd>

    <dt class="col-sm-3">Praga</dt>
    <dd class="col-sm-9"><?= $dosage->has('pest') ? $this->Html->link($dosage->pest->name, ['controller' => 'Pests', 'action' => 'view', $dosage->pest->id]) : '' ?></dd>

    <dt class="col-sm-3">Cultura</dt>
    <dd class="col-sm-9"><?= $dosage->has('culture') ? $this->Html->link($dosage->culture->name, ['controller' => 'Cultures', 'action' => 'view', $dosage->culture->id]) : '' ?></dd>
    
    <dt class="col-sm-3">Dosagem permitida</dt><!--dt é o título-->
    <dd class="col-sm-9"><?= h($dosage->permitted_dosage) ?></dd><!--dd é o conteúdo-->

    <dt class="col-sm-3 text-truncate">Data do cadastro</dt>
    <dd class="col-sm-9"><?= h($dosage->created) ?></dd>

    <dt class="col-sm-3 text-truncate">Data do modificação</dt>
    <dd class="col-sm-9"><?= h($dosage->modified) ?></dd>
</dl>
<?= $this->Element('modal-it')?>