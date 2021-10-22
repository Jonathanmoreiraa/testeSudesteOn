<!--Otimizar a páginação-->
<?php
        $paginator = $this->Paginator->setTemplates([
            'number'=>'<li class="page-item"><a href="{{url}}" class="page-link">{{text}}</a></li>', //a parte onde os números da qtd das páginas ficam
            'current'=>'<li class="page-item active"><a href="{{url}}" class="page-link">{{text}}</a></li>', //equivale a página específica do item que está, active deixa p item mostrando como ativo.
            'first'=>'<li class="page-item"><a href="{{url}}" class="page-link">&laquo Primeira</a></li>', 
            'last'=>'<li class="page-item"><a href="{{url}}" class="page-link">&raquo Última</a></li>', 
            'prevActive'=>'<li class="page-item"><a href="{{url}}" class="page-link">&lt</a></li>', //seta
            'nextActive'=>'<li class="page-item"><a href="{{url}}" class="page-link">&gt</a></li>', //seta

        ])
    ?>
    <!--cria a paginação abaixo da tabela-->
    <nav aria-label="paginacao">
        <ul class="pagination  pagination-sm justify-content-center"><!--diminui o tamanho dos ícones da paginação e centraliza na pág.-->
            <?php 
               echo $paginator->first();

               if ($paginator->hasPrev){ //precisa verificar, caso contrário aparecerá sempre
                   echo $paginator->prev();
               }
               echo $paginator->numbers();

               if ($paginator->hasNext){ //precisa verificar, caso contrário aparecerá sempre
                echo $paginator->next();
               } 

               echo $paginator->last();

            ?>
        </ul>
    </nav>