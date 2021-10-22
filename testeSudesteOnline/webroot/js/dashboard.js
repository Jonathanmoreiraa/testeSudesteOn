$(document).ready(function () {
    //Apresentar ou ocultar o menu
    $('.sidebar-toggle').on('click', function () {
        $('.sidebar').toggleClass('toggled');
    });

    //Crregar aberto o sub menu
    var active = $('.sidebar .active');
    if(active.length && active.parent('.collapse').length){
        var parent = active.parent('.collapse');
        parent.prev('a').attr('aria-expanded', true);
        parent.addClass('show');
    }
});
//fazer a modal apagar aparecer na tela.
$(document).ready(function() {
    $(".btn-confirm").on("click", function () {
       var action = $(this).attr('data-action');
       $("form").attr('action',action);
  });
  });
$(document).ready(function(){
    $( "#test" ).hover(function() {
           $('.modal').modal({
        show: true
    });
  });  
});
/* $(document).ready(function () {
    $('a[data-confirm]').on('click', function(ev){
        var href = $(this).attr('href');
        if(!$('#apagarRegistro').lenght){
            $('body').append('<div class="modal fade" id="apagarRegistro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog" role="document"><div class="modal-content"><div class="modal-header">Excluir Item<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="modal-body">Quer excluir esse item?</div><div class="modal-footer"><button type="button" class="btn btn-success" data-dismiss="modal">Close</button><a class="btn btn-danger text-white" id="dataconfirmOK">Save changes</a></div></div></div></div>'
            );
        }
        $('#data-confirmOK').attr('href', href);
        $('#apagarRegistro').modal({shown:true});
        
    });
}); */


function previewImagem(){
    var image = document.querySelector('input[name=image]').files[0];
    var preview = document.querySelector('#preview-img');

    var reader = new FileReader();
    reader.onloadend = function(){
        preview.src = reader.result;
    };
    if(image){
        reader.readAsDataURL(image);
    }else{
        preview.src = "";
    }

}