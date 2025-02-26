var tags = [];
var tagInput = null;
var tagContainer = null;
var tagHiddenInput = null;
var tagLabel = null;
var tagEntry = null;
var tag = null;

jQuery(document).ready(function(){

    jQuery(".cwf-tag-input").keyup(function(e){
        if(e.key === 'Enter'){
            e.preventDefault();
            tagInput = jQuery("#"+e.target.id);
            tagHiddenInput = tagInput.data('hidden');
            tagContainer = tagInput.parent();
            tagLabel = "";
            tags = [];

            tagContainer.children(".cwf-tag").each(function(){
                tagLabel = jQuery(this).data('item');
                tags.push(tagLabel);
            }); 

            if(tagInput.val()!=""){
                tagLabel = tagInput.val();
                if(!tagExists(tagLabel, tags)){
                    tags.push(tagInput.val());
                    addTags();
                    saveTags();
                }
                tagInput.val("");
            }
        }
    });

    jQuery(".cwf-tag-input").keydown(function(e){

        if (e.keyCode == '32') { // space
            
            e.preventDefault();
            tagInput = jQuery("#"+e.target.id);
            tagHiddenInput = tagInput.data('hidden');
            tagContainer = tagInput.parent();
            tagLabel = "";
            tags = [];

            tagContainer.children(".cwf-tag").each(function(){
                tagLabel = jQuery(this).data('item');
                tags.push(tagLabel);
            }); 

            if(tagInput.val() != ""){
                tagLabel = tagInput.val();
                if(!tagExists(tagLabel, tags)){
                    tags.push(tagLabel);
                    addTags();
                    saveTags();
                }
                tagInput.val("");
            }
        }
        else if(e.keyCode != '189' && e.keyCode != '8' && e.keyCode != '35' && e.keyCode != '36'
            && e.keyCode !='36' && e.keyCode != '37' && e.keyCode != '38' && e.keyCode != '39' 
            && e.keyCode != '40' && e.keyCode != '46' && e.keyCode != '9' && (e.keyCode < '65' ||  e.keyCode > '90')){
            e.preventDefault();
        }
    });

});


function addTags(){
    reset(tagContainer);
    tags.slice().reverse().forEach(function(tag){
        tagEntry = createTag(tag);
        tagContainer.prepend(tagEntry);
    });
}

function saveTags(){
    jQuery(tagContainer).append(
        '<input id="' + tagHiddenInput + "-" + tagLabel + '" type="hidden" name="' + tagHiddenInput + '[]" value="' + tagLabel + '"/>'
    );
}

function reset (){
    jQuery(tagContainer).children('.cwf-tag').remove();
}

function createTag(label){
    tag = document.createElement('div');
    tag.setAttribute('class', 'cwf-tag');
    tag.setAttribute('id', 'tag_' + label);
    tag.setAttribute('data-item', label);
    tag.innerHTML = label + " ";

    const tag_close = document.createElement('span');
    tag_close.setAttribute('class', 'cwf-tag-exit');
    tag_close.setAttribute('data-item', label);
    tag_close.setAttribute('data-hidden', tagHiddenInput);
    tag_close.setAttribute('data-container', jQuery(tagContainer).attr('id'));
    tag_close.setAttribute('onclick', 'deleteTag(this)');
    tag_close.innerHTML = "&#x2715;";
    tag.append(tag_close);
    return tag;
}

function deleteTag(elem){
    var label = jQuery(elem).data('item');
    var tag_id = "tag_" + label;
    var deletedTag = document.getElementById(tag_id);
    tagHiddenInput = jQuery(elem).data('hidden');
    tagContainer = jQuery(elem).data('container');
    console.log("tagContainer is: " + JSON.stringify(tagContainer));
    var container = jQuery("#"+tagContainer);
    console.log("container is: " + JSON.stringify(container));
    tags = [];

    container.children(".cwf-tag").each(function(){
        tagLabel = jQuery(this).data('item');
        tags.push(tagLabel);
    });

    tags.splice(tags.indexOf(tag_id.replace('tag_','')),1);
    jQuery(deletedTag).remove();
    jQuery("#"+tagHiddenInput+ "-" +label).remove();
}

function finaliseTags(elem){

    tags = [];
    tagInput = jQuery("input[name='" + elem + "']");
    tagHiddenInput = tagInput.data('hidden');
    tagContainer = tagInput.parent();
    tagLabel = "";

    tagContainer.children(".cwf-tag").each(function(){
        tagLabel = jQuery(this).data('item');
        tags.push(tagLabel);
    }); 

    if(tagInput.val() != ""){
        tagLabel = tagInput.val();
        if(!tagExists(tagLabel, tags)){
            tags.push(tagLabel);
            addTags();
            saveTags();
        }
        tagInput.val("");
    }
 }

 function tagExists(value,arr){
    var status = false;
 
    for(var i=0; i<arr.length; i++){
      var name = arr[i];
      if(name == value){
        status = true;
        break;
      }
    }
  
    return status;
 }