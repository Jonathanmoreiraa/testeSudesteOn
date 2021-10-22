<ul class="list-group">
    <li class="list-goup-item">
        <div class="modal fade" id="apagarRegistro" tabindex="-1" role="dialog" aria-labelledby="apagarRegistroLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-danger text-white ">
                    <h5 class="modal-title" id="exampleModalLabel">EXCLUIR ITEM</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                    Tem certeza que deseja excluir esse item?
                    </div>
                    <div class="modal-footer">
                        <div><?php echo $this->Form->postLink('Apagar',
                            array('action' => 'delete'),
                            array('class' => 'btn btn-danger'),
                            false,
                            );?></button>
                        <div type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button>
                    </div>
                </div>
            </div>
        </div> 
    </li>
</ul>