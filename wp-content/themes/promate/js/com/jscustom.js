/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var jvAjaxSearch = (function ($){
      var fnc = {
          
           setValue: function(){
                var data = new Array();
                $.each($('#listPlugins .jv-input'), function(i, item){
                    data[i] = {};
                    data[i].id = $(item).attr('data-id');
                    data[i].checked = $(item).find('.plg-checbox').is(':checked');
                    data[i].dname = $(item).find('.plg-name').val();
                });
                $('#jpluginchooser').val(JSON.stringify(data));
            },
            search : function(obj,lang){
                var mid = obj.attr('data-module'),
                    results = $('#jvAjaxSearchResults'+mid),
                    loadding = $('#jv-loading-'+mid)
                ;
                loadding.show();
                $.ajax({
                    'url' : 'index.php?option=com_jvajax_searchpro&lang='+lang+'&format=raw&module_id='+obj.attr('data-module')+'&search_w='+obj.val()
                }).success(function(json){
                    loadding.hide();
                    results.html(json).show( "fold", 1000 );
                })
            },
            setSkin : function (){
                var data = {};
                var loadding = $('#jvLoadding').find('input[name="loading"]');
                var bnt = $('#jvButton').find('input[name="bnt"]');
                loadding.each(function(){
                    if($(this).is(':checked')) data.loadding = $(this).val();
                });
                bnt.each(function(){
                    if($(this).is(':checked')) data.bnt = $(this).val();
                });
                data.skin = $('#jvskin').val();
                $('#jvSkinFields').val(JSON.stringify(data));
            }
      }
      return fnc;
})(jQuery);
