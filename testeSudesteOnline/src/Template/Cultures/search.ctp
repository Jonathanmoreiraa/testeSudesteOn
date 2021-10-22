<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $cultures
 */
?>
<?php use Cake\Routing\Router;?>
<div class="d-flex">
        <div class="mr-auto p-2">
            <h2 class="display-4 titulo">Listar Culturas</h2>
        </div>
    <a href="cadastrar.html">
        <div class="p-2">
        <?= $this->Html->link(__('Cadastrar'), ['controller' => 'cultures', 'action'=>'add'], ['class'=>'btn btn-outline-info btn-sm'])?>
        </div>
    </a>
</div>
<?= $this->Flash->render()?> <!--Mostra a imagem de alerta-->
<div class="busca">
    <form action="<?php echo $this->Url->build(['action'=>'search']) ?>" method="get">
        <div class="input-group">
            <input type="search" name="q" class="form-control" />
            <div class="input-group-prepend">
            <button class="btn btn-outline-success" type="submit"><i class="fas fa-search"></i></button>
            </div>
        </div>
    </form>
</div>
<div class="table-responsive">
    <table class="table table-striped table-hover table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Tipo</th><!--oculta o e-mail quando está na tela xs-->
                <th class="d-none d-sm-table-cell">Data do Cadastro</th>
                <th class="text-center">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($cultures as $culture): ?>
            <tr>
                <td><?= $this->Number->format($culture->id) ?></td>
                <td><?= h($culture->name) ?></td>
                <td><?= h($culture->type) ?></td>
                <td class="d-none d-sm-table-cell"><?= h($culture->created) ?></td>
                <td class="text-center">
                    <span class="d-none d-md-block">
                        <?= $this->Html->link(__('Visualizar'), ['controller' => 'cultures', 'action' => 'view', $culture->id], ['class'=>'btn btn-outline-success btn-sm']) ?>
                        <?= $this->Html->link(__('Editar'), ['controller'=>'cultures', 'action' => 'edit', $culture->id], ['class'=>'btn btn-outline-warning btn-sm']) ?>
                        <?php 
                            echo $this->Html->link(
                                $this->Html->tag('n', 'Apagar', ['class' => 'btn btn-outline-danger btn-sm']), 
                            '#', 
                            array(
                                'class'=>'btn-confirm', //tirar um dos dois
                                'data-toggle'=> 'modal',
                                'data-target' => '#apagarRegistro',
                                'data-action'=> Router::url(
                            array('action'=>'delete',$culture->id)
                            ),
                        'escape' => false), 
                        false);
                        ?>                    
                    </span>
                    <div class="dropdown d-block d-md-none">
                        <button class="btn cor dropdown-toggle btn-sm" type="button" id="acoesListar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Ações
                        </button>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="acoesListar">
                            <?= $this->Html->link(__('Visualizar'), ['controller' => 'cultures', 'action' => 'view', $culture->id], ['class'=>'dropdown-item']) ?>
                            <?= $this->Html->link(__('Editar'), ['controller'=>'cultures', 'action' => 'edit', $culture->id], ['class'=>'dropdown-item']) ?>
                            <?php 
                                echo $this->Html->link(
                                    $this->Html->tag('n', 'Apagar', ['class' => 'dropdown-item']), 
                                '#', 
                                array(
                                    'class'=>'btn-confirm', //tirar um dos dois
                                    'data-toggle'=> 'modal',
                                    'data-target' => '#apagarRegistro',
                                    'data-action'=> Router::url(
                                array('action'=>'delete',$culture->id)
                                ),
                            'escape' => false), 
                            false);
                            ?>                       
                        </div>
                    </div>    
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?= $this->element('pagination');//cita o doc pagination que está na past element?>
</div>
<?= $this->Element('modal-it')?>
