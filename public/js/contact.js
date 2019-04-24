$(document).ready(function() {
    $('#ajaxForm').submit(function(e){
        e.preventDefault();
        var form = $(this);
        var submit = form.find('.submit');
        submit;
        form.find('.error-message').remove();
        form.find('.error').removeClass('error');
        $.post(form.attr('action'),{name:$('#name').val() , prenom:$('#prenom').val() , objet:$('#objet').val()  , mail:$('#mail').val() , message:$('#message').val(), nospam:1}, function(data){
            if(data.errors){
                for(var i in data.errors){
                    $('#'+i).addClass('error').parent().append('<span class="error-message">'+data.errors[i]+'</span>');
                }
            }else{
                form.fadeOut(500,function(){
                    form.replaceWith('<div class="success">'+data.message+'</div>');
                });
            }
        },'json');
    });
    $('input,textarea').focus(function(e){
        var elem = $(this);
        if(elem.hasClass('error')){
            elem.removeClass('error');
            elem.siblings('.error-message').fadeOut(500,function(){ $(this).remove(); });
        }
    });
});