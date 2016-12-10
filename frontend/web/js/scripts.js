(function(window){
    var Item = function(){
        var element = null;
        var id = 0;
    }

    Item.prototype.add = function(){

    }
    Item.prototype.edit = function(elem){
        var self = this;
        self.id = $(elem).parent().parent().data('id');

        $.get('/item/add',function(data){
            self.element = $(data);

            $('body').append( self.element );
            self.element.modal();
            setTimeout(function(){
                item.removeFade();
            }, 500);

        });
    }
    Item.prototype.removeFade = function(){
        $('.modal-backdrop:not(.fade)').remove();
    }
    Item.prototype.save = function(){
        console.log('save');
    }
    Item.prototype.close = function(){
        console.log('close');
    }
    Item.prototype.remove = function(){}
    Item.prototype.changeState = function(state){}

    window.item = new Item();
})(window);