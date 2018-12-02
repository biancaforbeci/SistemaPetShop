$(function(){
    //pesquisar sem refresh na página
    $("#pesquisa").keyup(function(){
        var pesquisa = $(this).val();

        if(pesquisa != ''){
            var dados =  {
                palavra : pesquisa
            }            
            $.post('../controllers/busca.php', dados,function(retorna){
            $(".resultado").html(retorna);
            });

        }else{
            $(".resultado").html('');
        }





    });


});