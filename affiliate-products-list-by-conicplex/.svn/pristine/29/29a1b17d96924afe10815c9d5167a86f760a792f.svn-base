(function() {
       tinymce.PluginManager.add('wdm_mce_button', function( editor, url ) {
           editor.addButton('wdm_mce_button', {
                       text: 'Affiliate Products List',
                       icon: false,
                       onclick: function() {

                          var modal = document.getElementById("myModal");
                          modal.style.display = "block";
                          document.getElementById("btnsubmit").onclick = function() 
                          {
                              var dpdata=document.getElementById('selectproductlist').value;
                              editor.insertContent('[aplbcp product_list='+dpdata+']');                     
                              modal.style.display = "none";
                          };
								window.onclick = function(event) {
								  if (event.target == modal) {
									modal.style.display = "none";
								  }
								} 
              }
            });
       });
})();