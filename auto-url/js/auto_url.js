(function($){
    $(document).ready(function(){
        var slash = $('<div>',{
            'class':'slash'
        }).text('/');
        var statisToken = $('<div>',{
            'class':'token staticToken'
        }).append($('<input>',{
            type:'text'
        }));
        var token = $('<div>',{
            'class':'token'
        });
        var removeButton = $('<a>',{
            'class':'removeToken',
            'href':'#',
            'title':'Remove Token'
        }).text('X');
            
        $('#tokens').show();
        $('#tokens div').button().draggable({
            connectToSortable: ".patternRow",
            helper: "clone"
        }).addClass('token');
        
        $('div.patternRow').each(function(){
            var that = this, t;
            var pattern = $(this).children('input').hide().val();
            var parts = pattern.split('/');
                        
            for(var i=0;i<parts.length;i++){
                var part = $.trim(parts[i]);
                if(part.length){
                    $(this).append(slash.clone());
                    if(part.match(/^%[a-z0-9]+%$/i)){
                        t = token.clone().text(part);
                        $(this).append(t);
                        t.button();
                        t.children('span').append(removeButton.clone());
                    }
                    else{
                        t = statisToken.clone();
                        $(this).append(t);
                        t.button().find('input').val(part);
                        t.children('span').append(removeButton.clone());
                    }
                }
            }

            $(this).sortable({
                items:'div',
                accept:'.token',
                placeholder: 'placeHolderToken ui-button ui-widget ui-state-default ui-corner-all',
                change:function(){
                    $(that).children('.slash').remove();
                },
                stop:function(e,u){
                    $(that).children('.token').before(slash.clone());
                    
                    if(u.item)
                        if(!$(u.item).find('span a.removeToken').length)
                            $(u.item).children('span').append(removeButton.clone());
                    
                    regenPattern(that);
                }
            });
        });
        
        $('div.staticToken input').live('blur', function(){
            regenPattern($(this).parents('div.patternRow'));
        });
        
        $('a.removeToken').live('click',function(){
            var row = $(this).parents('div.patternRow');
            $(this).parents('.token').remove();
            regenPattern(row);
            
            return false;
        });
        
        if($('input.searchBox').length && $('table.autoUrlTable').length){
            $('table.autoUrlTable').each(function(){
                var sb = $(this).prev('div.formRow').find('input.searchBox');
                var rows = $(this).find('tbody tr');
                var rowTexts = [];
                
                rows.each(function(){
                    var text = $(this).find('td:gt(0):lt(3)').text();
                    rowTexts.push(text);
                });
            
                sb.keyup(function(){
                    var key = sb.val();
                    
                    if(key.length > 0){
                        for(i=0;i<rowTexts.length;i++){
                            if(rowTexts[i].toLowerCase().indexOf(key.toLowerCase()) != -1){
                                $(rows[i]).show();
                            }else{
                                $(rows[i]).hide();
                            }
                        }
                    }
                });
            });
        }
        
        function regenPattern(row){
            var newPattern = '';
            $(row).children('.token').each(function(){
                var tokenText = !$(this).hasClass('staticToken')?$(this).text():$(this).find('input').val();
                tokenText = tokenText.replace(/^(%[a-z0-9_-]+%)(.+)/i, '$1');
                        
                if(tokenText.length){
                    newPattern += '/' + tokenText;
                }
            });

            $(row).children('input').val(newPattern);
            
            $(row).children('.slash').remove();
            $(row).children('.token').before(slash.clone());
        }
    });
})(jQuery)