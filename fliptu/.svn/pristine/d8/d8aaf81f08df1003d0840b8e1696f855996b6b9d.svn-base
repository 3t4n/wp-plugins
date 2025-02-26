function validateName(x){

            // Validation rule
            var re = /[A-Za-z -']$/;
            // Check input
            if(re.test(document.getElementById(x).value)){
                // Style green
                document.getElementById(x).style.background ='#fff';
                // Hide error prompt
                document.getElementById(x + 'Error').style.display = "none";
                return true;
            }else{
                // Style red
                document.getElementById(x).style.background ='#e35152';
                // Show error prompt
                document.getElementById(x + 'Error').style.display = "block";
		
                return false;   
            }
        }
        // Validate email
        function validateEmail(x){ 
            var re = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
	     	email=document.getElementById(x).value;
            if(re.test(email)){
		
                document.getElementById(x).style.background ='#fff';
                document.getElementById(x +'Error').style.display = "none";
                return true;
            }else{
		
                 document.getElementById(x).style.background ='#e35152';
		 document.getElementById(x + 'Error').style.display = "block";
                return false;
            }
        }
        // Validate Select boxes
        function validateSelect(x){
            if(document.getElementById(x).selectedIndex !== 0){
                document.getElementById(x).style.background ='#ccffcc';
                document.getElementById(x + 'Error').style.display = "none";
                return true;
            }else{
                document.getElementById(x).style.background ='#e35152';
                return false;   
            }
        }
        function validateRadio(x){
            if(document.getElementById(x).checked){
                return true;
            }else{
                return false;
            }
        }
        function validateCheckbox(x){
            if(document.getElementById(x).checked){
                return true;
            }
            return false;
        } 

function validateEmpty(x){

            // Validation rule
            var re = /\S+/;
            // Check input
            if(re.test(document.getElementById(x).value)){
                // Style green
                document.getElementById(x).style.background ='#fff';
                // Hide error prompt
                document.getElementById(x + 'Error').style.display = "none";
                return true;
            }else{
                // Style red
                //document.getElementById(x).style.background ='#e35152';
		
                // Show error prompt
                document.getElementById(x + 'Error').style.display = "block";
		
                return false;   
            }
        }



function validatePass(x){

            // Validation rule
            
            // Check input
	var pass=document.getElementById(x).value;
            if(pass.length >5){
                // Style green
                document.getElementById(x).style.background ='#fff';
                // Hide error prompt
                document.getElementById(x + 'Error').style.display = "none";
                return true;
            }else{
                // Style red
                document.getElementById(x).style.background ='#e35152';
                // Show error prompt
                document.getElementById(x + 'Error').style.display = "block";
		
                return false;   
            }
        }

function validateAddForm(){
            // Set error catcher
           
            var error ='';
            // Check name
           
            
            if(!validateEmpty('fliptu_title')){
                
              document.getElementById('fliptu_titleError').innerHTML = "Please Enter Page Title!";
                error=1;
            }
            
             if(!validateEmpty('fliptu_value')){
               document.getElementById('fliptu_valueError').innerHTML = "Please Enter Embed Code!";
                error=1;
             }
            
            
            if(error!=''){
                return false;
            }
        }  

function validateHomeForm(){
            // Set error catcher
          
            var error ='';
            // Check name
           
            
            
             if(!validateEmpty('fliptu_value')){
               document.getElementById('fliptu_valueError').innerHTML = "Please Enter Embed Code!";
                error=1;
             }
            
            
            if(error!=''){
                return false;
            }
        }               

	      
        
