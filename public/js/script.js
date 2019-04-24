//console.log(123);
$('#sales').click(function(){
    if($(this).prop("checked")==true)
    {
        $('.block-sales').show();
    }
    else{
        $('.block-sales').hide();
    }

});