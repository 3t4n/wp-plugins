(function() {
    
function boot(){
    
if (document.getElementById('lh_localforage-script').getAttribute('data-persist_globally')){
    
console.log(document.getElementById('lh_localforage-script').getAttribute('data-persist_globally'));
    
    
var global_array = JSON.parse(document.getElementById('lh_localforage-script').getAttribute('data-persist_globally'));   

console.log('the array is ');   
  
console.log(global_array); 


for(var i = 0; i < global_array.length; i++) {
    
add_global_persistence(global_array[i]);    
    
    
}
    
}


if (document.getElementById('lh_localforage-script').getAttribute('data-persist_locally')){
    
console.log(document.getElementById('lh_localforage-script').getAttribute('data-persist_locally'));
    
    
var local_array = JSON.parse(document.getElementById('lh_localforage-script').getAttribute('data-persist_locally'));   

console.log('the array is ');   
  
console.log(local_array); 


for(var j = 0; j < local_array.length; j++) {
    
add_local_persistence(local_array[j]);    
    
    
}
    
}
    
    
}
    
function remove_from_local_storage(element_id, key_name){
    
localforage.getItem(key_name).then(function(value) {

if ((value.hasOwnProperty(window.location.href)) && (value[window.location.href].hasOwnProperty(element_id))){

      console.log('the removable property exists');

delete value[window.location.href][element_id];  

update_store_value(key_name, value);

    
}
    
    
}).catch(function(err) {


 console.log('the key does not exist');


});    
    
    
}
    

function add_clear_to_form(element, element_id){
    
 if (!element.getAttribute("data-clear_on_submit")){
    
element.setAttribute("data-clear_on_submit", element_id);  
    
} else {
    
var previous = element.getAttribute("data-clear_on_submit").trim();

element.setAttribute("data-clear_on_submit", previous + ' ' + element_id);
    
    
    
}
    
    
}


function add_selector_to_element(element, selector){
    
element.setAttribute("data-persist_selector", selector);  
    
}
   
    

function set_value_from_local_by_id(element_id, key_name){
    
localforage.getItem(key_name).then(function(value) {

if ((value.hasOwnProperty(window.location.href)) && (value[window.location.href].hasOwnProperty(element_id))){
    
document.getElementById(element_id).value = value[window.location.href][element_id];
    
}
    
    
}).catch(function(err) {





});
    
}

function set_value_from_global_by_attribute(element, key_name){
    
if (element.getAttribute("data-persist_selector")){
    
localforage.getItem(key_name).then(function(value) {

if ((value.hasOwnProperty(element.getAttribute("data-persist_selector")))){
    
element.value = value[element.getAttribute("data-persist_selector")];
    
}
    
    
}).catch(function(err) {





});

}
    
}

function build_new_local_object(element_id, value){
    
var new_object = {[window.location.href]: {
    [element_id] : value
  }};

return new_object;

}

function update_old_local_object(old_object, element_id, value){
    
if ((old_object.hasOwnProperty(window.location.href)) && (old_object[window.location.href].hasOwnProperty(element_id))){
    

      
      console.log('IT HAS THE PROPERTY');
      
      old_object[window.location.href][element_id] = value;
      
} else {
    
console.log('IT does not have THE PROPERTY');
    
    
old_object[window.location.href][element_id] = value;    
    
    
}



return old_object;

}

function update_store_value(key_name, key_value){
    
localforage.setItem(key_name, key_value).then(function (value) {
    // Do other things once the value has been saved.
    console.log(value);
}).catch(function(err) {
    // This code runs if there were any errors
    console.log(err);
});

    
    
    
}

function update_local_store(key_name, element_id, new_value){
    
var new_object;
    
localforage.getItem(key_name).then(function(value) {

console.log('the value is');  
console.log(value); 

if (value !== null) {
        
new_object = update_old_local_object(value, element_id, new_value);

} else {
    
new_object = build_new_local_object(element_id, new_value);    
    
}

console.log('the new object is ');  
console.log(new_object); 

update_store_value(key_name, new_object);



}).catch(function(err) {

console.log('the error is');  
console.log(err); 

current_object = build_new_local_object(element_id, new_value);

update_store_value(key_name, current_object);




});

}

function persist_locally(event){
    
    if (event.target.getAttribute("id")){
    
console.log('keyup: %s', event.target.getAttribute("id"));  

update_local_store('lh_localforage-local', event.target.getAttribute("id"), event.target.value);

}
    
}
    
function add_local_persistence(selectors){
    
    var matches = document.querySelectorAll(selectors);
    
    
    var i;
for (i = 0; i < matches.length; i++) {
    
    if (matches[i].getAttribute("id") && ((matches[i].tagName.toLowerCase() == 'textarea') || (matches[i].tagName.toLowerCase() == 'input')) && matches[i].form){
        
    
    
    matches[i].addEventListener('keyup', persist_locally);
    
    if (matches[i].value !== null || matches[i].value !== ""){
    
    set_value_from_local_by_id(matches[i].getAttribute("id"),'lh_localforage-local');
    
    }
    
    add_clear_to_form(matches[i].form, matches[i].getAttribute("id"));

 
 
    
    }

    
    
}
    
    
    
    
}

function build_new_global_object(element_id, value){
    
var new_object = {
    [element_id] : value
  };

return new_object;

}

function update_old_global_object(old_object, element_id, value){
    
if (old_object.hasOwnProperty(element_id)){
    

      
      console.log('IT HAS THE PROPERTY');
      
      old_object[element_id] = value;
      
} else {
    
console.log('IT does not have THE PROPERTY');
    
    
old_object[element_id] = value;    
    
    
}



return old_object;

}

function update_global_store(key_name, subkey, new_value){
    
    var new_object;
    
localforage.getItem(key_name).then(function(value) {

console.log('the value is');  
console.log(value); 

if (value !== null) {
        
new_object = update_old_global_object(value, subkey, new_value);

} else {
    
new_object = build_new_global_object(subkey, new_value);    
    
}

console.log('the new object is ');  
console.log(new_object); 

update_store_value(key_name, new_object);





}).catch(function(err) {

console.log('the error is');  
console.log(err); 

current_object = build_new_global_object(subkey, new_value);

update_store_value(key_name, current_object);



});
    
    
    
    
}



function persist_globally(event){
    
        if (event.target.getAttribute("data-persist_selector")){
            
            
console.log('blur: %s', event.target.getAttribute("data-persist_selector"));  

update_global_store('lh_localforage-global', event.target.getAttribute("data-persist_selector"), event.target.value);
            
            
        }
    
    
    
}

function add_global_persistence(selector){
    
matches = document.querySelectorAll(selector);
    
var i;
for (i = 0; i < matches.length; i++) {
    
    if (((matches[i].tagName.toLowerCase() == 'textarea') || (matches[i].tagName.toLowerCase() == 'input')) && matches[i].form  && !matches[i].getAttribute("data-persist_selector")){
        
    
        
    matches[i].addEventListener('blur', persist_globally);
    add_selector_to_element(matches[i], selector);
    
    if (matches[i].value !== null || matches[i].value !== ""){
    set_value_from_global_by_attribute(matches[i], 'lh_localforage-global');
    }
    

}

}

}

function clear_on_submit(event){
    
var clearables = event.target.getAttribute("data-clear_on_submit").split(" ");

for(var i = 0; i < clearables.length; i++) {
    
    
remove_from_local_storage(clearables[i],'lh_localforage-local');
    
    
}
    
    

}

function add_clear_on_submit_listener(selectors){
    
        var matches = document.querySelectorAll(selectors);
    
    
    var i;
for (i = 0; i < matches.length; i++) {
    
    if (matches[i].getAttribute("data-clear_on_submit")){
        
        
      matches[i].addEventListener('submit', clear_on_submit);  
        
    }
    
    
    
    
}
    
}

//add_local_persistence('#comment');

add_clear_on_submit_listener('form');

//add_global_persistence('input[type="email"]');


boot();

    
})();