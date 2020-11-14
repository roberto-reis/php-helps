(function($){

    $.fn.mudarCor = function(cor){
        this.each(function(){
            $(this).css('color', cor).css('text-decoration', 'none');
            $(this).hover(function(){
                $(this).css('background-color', '#999');
            }, function(){
                $(this).css('background-color', '#fff');
            });
        });
        return this;
    }


}(jQuery));