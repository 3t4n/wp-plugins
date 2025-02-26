// Controls the Images to include for the recipe schema on the post and page edit screen 
var recipeIncludedImages = document.getElementById("essdrs_recipe_images_to_include");

// Use both tab and dropdown as click event to check current status and display the correct amount of image inputs
[document.getElementById('essdrs_recipe_images_to_include'),
document.getElementById('essdrs_recipe_tab_heading')].forEach(item => {
item.addEventListener('click', function handleChange() {
    
    var recipeImageCount = recipeIncludedImages.value;
    const recipeImageCount1  = document.getElementById("essdrs_schema_recipe_image_1");
    const recipeImageCount2  = document.getElementById("essdrs_schema_recipe_image_2");    
    const recipeImageCount3  = document.getElementById("essdrs_schema_recipe_image_3");    
    const recipeImageCount4  = document.getElementById("essdrs_schema_recipe_image_4");   
    const recipeImageCount5  = document.getElementById("essdrs_schema_recipe_image_5");   
    const recipeImageCount6  = document.getElementById("essdrs_schema_recipe_image_6");
    const recipeImageCount7  = document.getElementById("essdrs_schema_recipe_image_7");    
    const recipeImageCount8  = document.getElementById("essdrs_schema_recipe_image_8");    
    const recipeImageCount9  = document.getElementById("essdrs_schema_recipe_image_9");   
    const recipeImageCount10  = document.getElementById("essdrs_schema_recipe_image_10");      
    
    if (recipeImageCount > 9 ) {

        recipeImageCount1.style.display = 'block';
        recipeImageCount2.style.display = 'block';        
        recipeImageCount3.style.display = 'block';
        recipeImageCount4.style.display = 'block';
        recipeImageCount5.style.display = 'block';
        recipeImageCount6.style.display = 'block';
        recipeImageCount7.style.display = 'block';
        recipeImageCount8.style.display = 'block';
        recipeImageCount9.style.display = 'block';
        recipeImageCount10.style.display = 'block';

    } else if (recipeImageCount > 8 ) {
        
        recipeImageCount1.style.display = 'block';
        recipeImageCount2.style.display = 'block';        
        recipeImageCount3.style.display = 'block';
        recipeImageCount4.style.display = 'block';
        recipeImageCount5.style.display = 'block';
        recipeImageCount6.style.display = 'block';
        recipeImageCount7.style.display = 'block';
        recipeImageCount8.style.display = 'block';
        recipeImageCount9.style.display = 'block';
        recipeImageCount10.style.display = 'none';
        
    } else if (recipeImageCount > 7 ) {
        
        recipeImageCount1.style.display = 'block';
        recipeImageCount2.style.display = 'block';        
        recipeImageCount3.style.display = 'block';
        recipeImageCount4.style.display = 'block';
        recipeImageCount5.style.display = 'block';
        recipeImageCount6.style.display = 'block';
        recipeImageCount7.style.display = 'block';
        recipeImageCount8.style.display = 'block';
        recipeImageCount9.style.display = 'none';
        recipeImageCount10.style.display = 'none';
        
    } else if (recipeImageCount > 6 ) {
        
        recipeImageCount1.style.display = 'block';
        recipeImageCount2.style.display = 'block';        
        recipeImageCount3.style.display = 'block';
        recipeImageCount4.style.display = 'block';
        recipeImageCount5.style.display = 'block';
        recipeImageCount6.style.display = 'block';
        recipeImageCount7.style.display = 'block';
        recipeImageCount8.style.display = 'none';
        recipeImageCount9.style.display = 'none';
        recipeImageCount10.style.display = 'none';
        
    } else if (recipeImageCount > 5 ) {
        
        recipeImageCount1.style.display = 'block';
        recipeImageCount2.style.display = 'block';        
        recipeImageCount3.style.display = 'block';
        recipeImageCount4.style.display = 'block';
        recipeImageCount5.style.display = 'block';
        recipeImageCount6.style.display = 'block';
        recipeImageCount7.style.display = 'none';
        recipeImageCount8.style.display = 'none';
        recipeImageCount9.style.display = 'none';
        recipeImageCount10.style.display = 'none';
        
    } else if (recipeImageCount > 4 ) {
        
        recipeImageCount1.style.display = 'block';
        recipeImageCount2.style.display = 'block';        
        recipeImageCount3.style.display = 'block';
        recipeImageCount4.style.display = 'block';
        recipeImageCount5.style.display = 'block';
        recipeImageCount6.style.display = 'none';
        recipeImageCount7.style.display = 'none';
        recipeImageCount8.style.display = 'none';
        recipeImageCount9.style.display = 'none';
        recipeImageCount10.style.display = 'none';
        
    } else if (recipeImageCount > 3 ) {
        
        recipeImageCount1.style.display = 'block';
        recipeImageCount2.style.display = 'block';        
        recipeImageCount3.style.display = 'block';
        recipeImageCount4.style.display = 'block';
        recipeImageCount5.style.display = 'none';
        recipeImageCount6.style.display = 'none';
        recipeImageCount7.style.display = 'none';
        recipeImageCount8.style.display = 'none';
        recipeImageCount9.style.display = 'none';
        recipeImageCount10.style.display = 'none';
        
    } else if (recipeImageCount > 2 ) {
        
        recipeImageCount1.style.display = 'block';
        recipeImageCount2.style.display = 'block';        
        recipeImageCount3.style.display = 'block';
        recipeImageCount4.style.display = 'none';
        recipeImageCount5.style.display = 'none';
        recipeImageCount6.style.display = 'none';
        recipeImageCount7.style.display = 'none';
        recipeImageCount8.style.display = 'none';
        recipeImageCount9.style.display = 'none';
        recipeImageCount10.style.display = 'none';
        
    } else if (recipeImageCount > 1 ) {
        
        recipeImageCount1.style.display = 'block';
        recipeImageCount2.style.display = 'block';        
        recipeImageCount3.style.display = 'none';
        recipeImageCount4.style.display = 'none';
        recipeImageCount5.style.display = 'none';
        recipeImageCount6.style.display = 'none';
        recipeImageCount7.style.display = 'none';
        recipeImageCount8.style.display = 'none';
        recipeImageCount9.style.display = 'none';
        recipeImageCount10.style.display = 'none';
        
    } else if (recipeImageCount > 0 ) {
        
        recipeImageCount1.style.display = 'block';
        recipeImageCount2.style.display = 'none';        
        recipeImageCount3.style.display = 'none';
        recipeImageCount4.style.display = 'none';
        recipeImageCount5.style.display = 'none';
        recipeImageCount6.style.display = 'none';
        recipeImageCount7.style.display = 'none';
        recipeImageCount8.style.display = 'none';
        recipeImageCount9.style.display = 'none';
        recipeImageCount10.style.display = 'none';
        
    } else if (recipeImageCount == 0 ) {
        
        recipeImageCount1.style.display = 'none';
        recipeImageCount2.style.display = 'none';        
        recipeImageCount3.style.display = 'none';
        recipeImageCount4.style.display = 'none';
        recipeImageCount5.style.display = 'none';
        recipeImageCount6.style.display = 'none';
        recipeImageCount7.style.display = 'none';
        recipeImageCount8.style.display = 'none';
        recipeImageCount9.style.display = 'none';
        recipeImageCount10.style.display = 'none';
        
    }

})
})

// Deal with removing the text from hidden inputs on image urls for recipe schema
recipeIncludedImages.addEventListener('click', function handleChangingText() {
    
    const recipeImageUrl1 = document.getElementById('essdrs_schema_recipe_image_1');
    const recipeImageUrl2 = document.getElementById('essdrs_schema_recipe_image_2');
    const recipeImageUrl3 = document.getElementById('essdrs_schema_recipe_image_3');
    const recipeImageUrl4 = document.getElementById('essdrs_schema_recipe_image_4');
    const recipeImageUrl5 = document.getElementById('essdrs_schema_recipe_image_5');
    const recipeImageUrl6 = document.getElementById('essdrs_schema_recipe_image_6');
    const recipeImageUrl7 = document.getElementById('essdrs_schema_recipe_image_7');
    const recipeImageUrl8 = document.getElementById('essdrs_schema_recipe_image_8');
    const recipeImageUrl9 = document.getElementById('essdrs_schema_recipe_image_9');
    const recipeImageUrl10 = document.getElementById('essdrs_schema_recipe_image_10');

[recipeImageUrl1, recipeImageUrl2, recipeImageUrl3,
recipeImageUrl4, recipeImageUrl5, recipeImageUrl6,
recipeImageUrl7, recipeImageUrl8,
recipeImageUrl9, recipeImageUrl10].forEach(item => {
    
    if (item.style.display == 'none') {
        
        var recipeUrlInputs = item.querySelector("input");
        recipeUrlInputs.value = '';
        
    }
    
})

})

// Controls the Images to include for the recipe schema on the post and page edit screen 
var recipeIncludedIngredient = document.getElementById("essdrs_recipe_ingredients_to_include");

// Use both tab and dropdown as click event to check current status and display the correct amount of image inputs
[document.getElementById('essdrs_recipe_ingredients_to_include'),
document.getElementById('essdrs_recipe_tab_heading')].forEach(item => {
item.addEventListener('click', function handleChange() {
    
    var recipeIngredientCount = recipeIncludedIngredient.value;
    const recipeingredientCount1  = document.getElementById("essdrs_schema_recipe_ingredient_1");
    const recipeingredientCount2  = document.getElementById("essdrs_schema_recipe_ingredient_2");
    const recipeingredientCount3  = document.getElementById("essdrs_schema_recipe_ingredient_3");
    const recipeingredientCount4  = document.getElementById("essdrs_schema_recipe_ingredient_4");
    const recipeingredientCount5  = document.getElementById("essdrs_schema_recipe_ingredient_5");
    const recipeingredientCount6  = document.getElementById("essdrs_schema_recipe_ingredient_6");    
    const recipeingredientCount7  = document.getElementById("essdrs_schema_recipe_ingredient_7");
    const recipeingredientCount8  = document.getElementById("essdrs_schema_recipe_ingredient_8");    
    const recipeingredientCount9  = document.getElementById("essdrs_schema_recipe_ingredient_9");
    const recipeingredientCount10 = document.getElementById("essdrs_schema_recipe_ingredient_10");    
    const recipeingredientCount11 = document.getElementById("essdrs_schema_recipe_ingredient_11");
    const recipeingredientCount12 = document.getElementById("essdrs_schema_recipe_ingredient_12");
    const recipeingredientCount13 = document.getElementById("essdrs_schema_recipe_ingredient_13");
    const recipeingredientCount14 = document.getElementById("essdrs_schema_recipe_ingredient_14");
    const recipeingredientCount15 = document.getElementById("essdrs_schema_recipe_ingredient_15");
    const recipeingredientCount16 = document.getElementById("essdrs_schema_recipe_ingredient_16");    
    const recipeingredientCount17 = document.getElementById("essdrs_schema_recipe_ingredient_17");
    const recipeingredientCount18 = document.getElementById("essdrs_schema_recipe_ingredient_18");    
    const recipeingredientCount19 = document.getElementById("essdrs_schema_recipe_ingredient_19");
    const recipeingredientCount20 = document.getElementById("essdrs_schema_recipe_ingredient_20");     
    const recipeingredientCount21 = document.getElementById("essdrs_schema_recipe_ingredient_21");
    const recipeingredientCount22 = document.getElementById("essdrs_schema_recipe_ingredient_22");
    const recipeingredientCount23 = document.getElementById("essdrs_schema_recipe_ingredient_23");
    const recipeingredientCount24 = document.getElementById("essdrs_schema_recipe_ingredient_24");
    const recipeingredientCount25 = document.getElementById("essdrs_schema_recipe_ingredient_25");
    
    if (recipeIngredientCount > 24 ) {
        
        recipeingredientCount1.style.display = 'block';
        recipeingredientCount2.style.display = 'block';        
        recipeingredientCount3.style.display = 'block';
        recipeingredientCount4.style.display = 'block';
        recipeingredientCount5.style.display = 'block';
        recipeingredientCount6.style.display = 'block';
        recipeingredientCount7.style.display = 'block';
        recipeingredientCount8.style.display = 'block';
        recipeingredientCount9.style.display = 'block';
        recipeingredientCount10.style.display = 'block';
        recipeingredientCount11.style.display = 'block';
        recipeingredientCount12.style.display = 'block';
        recipeingredientCount13.style.display = 'block';
        recipeingredientCount14.style.display = 'block';
        recipeingredientCount15.style.display = 'block';
        recipeingredientCount16.style.display = 'block';
        recipeingredientCount17.style.display = 'block';
        recipeingredientCount18.style.display = 'block';
        recipeingredientCount19.style.display = 'block';
        recipeingredientCount20.style.display = 'block';
        recipeingredientCount21.style.display = 'block';
        recipeingredientCount22.style.display = 'block';
        recipeingredientCount23.style.display = 'block';
        recipeingredientCount24.style.display = 'block';
        recipeingredientCount25.style.display = 'block';

    } else if (recipeIngredientCount > 23 ) {
        
        recipeingredientCount1.style.display = 'block';
        recipeingredientCount2.style.display = 'block';        
        recipeingredientCount3.style.display = 'block';
        recipeingredientCount4.style.display = 'block';
        recipeingredientCount5.style.display = 'block';
        recipeingredientCount6.style.display = 'block';
        recipeingredientCount7.style.display = 'block';
        recipeingredientCount8.style.display = 'block';
        recipeingredientCount9.style.display = 'block';
        recipeingredientCount10.style.display = 'block';
        recipeingredientCount11.style.display = 'block';
        recipeingredientCount12.style.display = 'block';
        recipeingredientCount13.style.display = 'block';
        recipeingredientCount14.style.display = 'block';
        recipeingredientCount15.style.display = 'block';
        recipeingredientCount16.style.display = 'block';
        recipeingredientCount17.style.display = 'block';
        recipeingredientCount18.style.display = 'block';
        recipeingredientCount19.style.display = 'block';
        recipeingredientCount20.style.display = 'block';
        recipeingredientCount21.style.display = 'block';
        recipeingredientCount22.style.display = 'block';
        recipeingredientCount23.style.display = 'block';
        recipeingredientCount24.style.display = 'block';
        recipeingredientCount25.style.display = 'none';
        
    } else if (recipeIngredientCount > 22 ) {
        
        recipeingredientCount1.style.display = 'block';
        recipeingredientCount2.style.display = 'block';        
        recipeingredientCount3.style.display = 'block';
        recipeingredientCount4.style.display = 'block';
        recipeingredientCount5.style.display = 'block';
        recipeingredientCount6.style.display = 'block';
        recipeingredientCount7.style.display = 'block';
        recipeingredientCount8.style.display = 'block';
        recipeingredientCount9.style.display = 'block';
        recipeingredientCount10.style.display = 'block';
        recipeingredientCount11.style.display = 'block';
        recipeingredientCount12.style.display = 'block';
        recipeingredientCount13.style.display = 'block';
        recipeingredientCount14.style.display = 'block';
        recipeingredientCount15.style.display = 'block';
        recipeingredientCount16.style.display = 'block';
        recipeingredientCount17.style.display = 'block';
        recipeingredientCount18.style.display = 'block';
        recipeingredientCount19.style.display = 'block';
        recipeingredientCount20.style.display = 'block';
        recipeingredientCount21.style.display = 'block';
        recipeingredientCount22.style.display = 'block';
        recipeingredientCount23.style.display = 'block';
        recipeingredientCount24.style.display = 'none';
        recipeingredientCount25.style.display = 'none';
        
    } else if (recipeIngredientCount > 21 ) {
        
        recipeingredientCount1.style.display = 'block';
        recipeingredientCount2.style.display = 'block';        
        recipeingredientCount3.style.display = 'block';
        recipeingredientCount4.style.display = 'block';
        recipeingredientCount5.style.display = 'block';
        recipeingredientCount6.style.display = 'block';
        recipeingredientCount7.style.display = 'block';
        recipeingredientCount8.style.display = 'block';
        recipeingredientCount9.style.display = 'block';
        recipeingredientCount10.style.display = 'block';
        recipeingredientCount11.style.display = 'block';
        recipeingredientCount12.style.display = 'block';
        recipeingredientCount13.style.display = 'block';
        recipeingredientCount14.style.display = 'block';
        recipeingredientCount15.style.display = 'block';
        recipeingredientCount16.style.display = 'block';
        recipeingredientCount17.style.display = 'block';
        recipeingredientCount18.style.display = 'block';
        recipeingredientCount19.style.display = 'block';
        recipeingredientCount20.style.display = 'block';
        recipeingredientCount21.style.display = 'block';
        recipeingredientCount22.style.display = 'block';
        recipeingredientCount23.style.display = 'none';
        recipeingredientCount24.style.display = 'none';
        recipeingredientCount25.style.display = 'none';
        
    } else if (recipeIngredientCount > 20 ) {
        
        recipeingredientCount1.style.display = 'block';
        recipeingredientCount2.style.display = 'block';        
        recipeingredientCount3.style.display = 'block';
        recipeingredientCount4.style.display = 'block';
        recipeingredientCount5.style.display = 'block';
        recipeingredientCount6.style.display = 'block';
        recipeingredientCount7.style.display = 'block';
        recipeingredientCount8.style.display = 'block';
        recipeingredientCount9.style.display = 'block';
        recipeingredientCount10.style.display = 'block';
        recipeingredientCount11.style.display = 'block';
        recipeingredientCount12.style.display = 'block';
        recipeingredientCount13.style.display = 'block';
        recipeingredientCount14.style.display = 'block';
        recipeingredientCount15.style.display = 'block';
        recipeingredientCount16.style.display = 'block';
        recipeingredientCount17.style.display = 'block';
        recipeingredientCount18.style.display = 'block';
        recipeingredientCount19.style.display = 'block';
        recipeingredientCount20.style.display = 'block';
        recipeingredientCount21.style.display = 'block';
        recipeingredientCount22.style.display = 'none';
        recipeingredientCount23.style.display = 'none';
        recipeingredientCount24.style.display = 'none';
        recipeingredientCount25.style.display = 'none';
        
    } else if (recipeIngredientCount > 19 ) {
        
        recipeingredientCount1.style.display = 'block';
        recipeingredientCount2.style.display = 'block';        
        recipeingredientCount3.style.display = 'block';
        recipeingredientCount4.style.display = 'block';
        recipeingredientCount5.style.display = 'block';
        recipeingredientCount6.style.display = 'block';
        recipeingredientCount7.style.display = 'block';
        recipeingredientCount8.style.display = 'block';
        recipeingredientCount9.style.display = 'block';
        recipeingredientCount10.style.display = 'block';
        recipeingredientCount11.style.display = 'block';
        recipeingredientCount12.style.display = 'block';
        recipeingredientCount13.style.display = 'block';
        recipeingredientCount14.style.display = 'block';
        recipeingredientCount15.style.display = 'block';
        recipeingredientCount16.style.display = 'block';
        recipeingredientCount17.style.display = 'block';
        recipeingredientCount18.style.display = 'block';
        recipeingredientCount19.style.display = 'block';
        recipeingredientCount20.style.display = 'block';
        recipeingredientCount21.style.display = 'none';
        recipeingredientCount22.style.display = 'none';
        recipeingredientCount23.style.display = 'none';
        recipeingredientCount24.style.display = 'none';
        recipeingredientCount25.style.display = 'none';
        
    } else if (recipeIngredientCount > 18 ) {
        
        recipeingredientCount1.style.display = 'block';
        recipeingredientCount2.style.display = 'block';        
        recipeingredientCount3.style.display = 'block';
        recipeingredientCount4.style.display = 'block';
        recipeingredientCount5.style.display = 'block';
        recipeingredientCount6.style.display = 'block';
        recipeingredientCount7.style.display = 'block';
        recipeingredientCount8.style.display = 'block';
        recipeingredientCount9.style.display = 'block';
        recipeingredientCount10.style.display = 'block';
        recipeingredientCount11.style.display = 'block';
        recipeingredientCount12.style.display = 'block';
        recipeingredientCount13.style.display = 'block';
        recipeingredientCount14.style.display = 'block';
        recipeingredientCount15.style.display = 'block';
        recipeingredientCount16.style.display = 'block';
        recipeingredientCount17.style.display = 'block';
        recipeingredientCount18.style.display = 'block';
        recipeingredientCount19.style.display = 'block';
        recipeingredientCount20.style.display = 'none';
        recipeingredientCount21.style.display = 'none';
        recipeingredientCount22.style.display = 'none';
        recipeingredientCount23.style.display = 'none';
        recipeingredientCount24.style.display = 'none';
        recipeingredientCount25.style.display = 'none';
        
    } else if (recipeIngredientCount > 17 ) {
        
        recipeingredientCount1.style.display = 'block';
        recipeingredientCount2.style.display = 'block';        
        recipeingredientCount3.style.display = 'block';
        recipeingredientCount4.style.display = 'block';
        recipeingredientCount5.style.display = 'block';
        recipeingredientCount6.style.display = 'block';
        recipeingredientCount7.style.display = 'block';
        recipeingredientCount8.style.display = 'block';
        recipeingredientCount9.style.display = 'block';
        recipeingredientCount10.style.display = 'block';
        recipeingredientCount11.style.display = 'block';
        recipeingredientCount12.style.display = 'block';
        recipeingredientCount13.style.display = 'block';
        recipeingredientCount14.style.display = 'block';
        recipeingredientCount15.style.display = 'block';
        recipeingredientCount16.style.display = 'block';
        recipeingredientCount17.style.display = 'block';
        recipeingredientCount18.style.display = 'block';
        recipeingredientCount19.style.display = 'none';
        recipeingredientCount20.style.display = 'none';
        recipeingredientCount21.style.display = 'none';
        recipeingredientCount22.style.display = 'none';
        recipeingredientCount23.style.display = 'none';
        recipeingredientCount24.style.display = 'none';
        recipeingredientCount25.style.display = 'none';
        
    } else if (recipeIngredientCount > 16 ) {
        
        recipeingredientCount1.style.display = 'block';
        recipeingredientCount2.style.display = 'block';        
        recipeingredientCount3.style.display = 'block';
        recipeingredientCount4.style.display = 'block';
        recipeingredientCount5.style.display = 'block';
        recipeingredientCount6.style.display = 'block';
        recipeingredientCount7.style.display = 'block';
        recipeingredientCount8.style.display = 'block';
        recipeingredientCount9.style.display = 'block';
        recipeingredientCount10.style.display = 'block';
        recipeingredientCount11.style.display = 'block';
        recipeingredientCount12.style.display = 'block';
        recipeingredientCount13.style.display = 'block';
        recipeingredientCount14.style.display = 'block';
        recipeingredientCount15.style.display = 'block';
        recipeingredientCount16.style.display = 'block';
        recipeingredientCount17.style.display = 'block';
        recipeingredientCount18.style.display = 'none';
        recipeingredientCount19.style.display = 'none';
        recipeingredientCount20.style.display = 'none';
        recipeingredientCount21.style.display = 'none';
        recipeingredientCount22.style.display = 'none';
        recipeingredientCount23.style.display = 'none';
        recipeingredientCount24.style.display = 'none';
        recipeingredientCount25.style.display = 'none';
        
    } else if (recipeIngredientCount > 15 ) {
        
        recipeingredientCount1.style.display = 'block';
        recipeingredientCount2.style.display = 'block';        
        recipeingredientCount3.style.display = 'block';
        recipeingredientCount4.style.display = 'block';
        recipeingredientCount5.style.display = 'block';
        recipeingredientCount6.style.display = 'block';
        recipeingredientCount7.style.display = 'block';
        recipeingredientCount8.style.display = 'block';
        recipeingredientCount9.style.display = 'block';
        recipeingredientCount10.style.display = 'block';
        recipeingredientCount11.style.display = 'block';
        recipeingredientCount12.style.display = 'block';
        recipeingredientCount13.style.display = 'block';
        recipeingredientCount14.style.display = 'block';
        recipeingredientCount15.style.display = 'block';
        recipeingredientCount16.style.display = 'block';
        recipeingredientCount17.style.display = 'none';
        recipeingredientCount18.style.display = 'none';
        recipeingredientCount19.style.display = 'none';
        recipeingredientCount20.style.display = 'none';
        recipeingredientCount21.style.display = 'none';
        recipeingredientCount22.style.display = 'none';
        recipeingredientCount23.style.display = 'none';
        recipeingredientCount24.style.display = 'none';
        recipeingredientCount25.style.display = 'none';
        
    } else if (recipeIngredientCount > 14 ) {
        
        recipeingredientCount1.style.display = 'block';
        recipeingredientCount2.style.display = 'block';        
        recipeingredientCount3.style.display = 'block';
        recipeingredientCount4.style.display = 'block';
        recipeingredientCount5.style.display = 'block';
        recipeingredientCount6.style.display = 'block';
        recipeingredientCount7.style.display = 'block';
        recipeingredientCount8.style.display = 'block';
        recipeingredientCount9.style.display = 'block';
        recipeingredientCount10.style.display = 'block';
        recipeingredientCount11.style.display = 'block';
        recipeingredientCount12.style.display = 'block';
        recipeingredientCount13.style.display = 'block';
        recipeingredientCount14.style.display = 'block';
        recipeingredientCount15.style.display = 'block';
        recipeingredientCount16.style.display = 'none';
        recipeingredientCount17.style.display = 'none';
        recipeingredientCount18.style.display = 'none';
        recipeingredientCount19.style.display = 'none';
        recipeingredientCount20.style.display = 'none';
        recipeingredientCount21.style.display = 'none';
        recipeingredientCount22.style.display = 'none';
        recipeingredientCount23.style.display = 'none';
        recipeingredientCount24.style.display = 'none';
        recipeingredientCount25.style.display = 'none';
        
    } else if (recipeIngredientCount > 13 ) {
        
        recipeingredientCount1.style.display = 'block';
        recipeingredientCount2.style.display = 'block';        
        recipeingredientCount3.style.display = 'block';
        recipeingredientCount4.style.display = 'block';
        recipeingredientCount5.style.display = 'block';
        recipeingredientCount6.style.display = 'block';
        recipeingredientCount7.style.display = 'block';
        recipeingredientCount8.style.display = 'block';
        recipeingredientCount9.style.display = 'block';
        recipeingredientCount10.style.display = 'block';
        recipeingredientCount11.style.display = 'block';
        recipeingredientCount12.style.display = 'block';
        recipeingredientCount13.style.display = 'block';
        recipeingredientCount14.style.display = 'block';
        recipeingredientCount15.style.display = 'none';
        recipeingredientCount16.style.display = 'none';
        recipeingredientCount17.style.display = 'none';
        recipeingredientCount18.style.display = 'none';
        recipeingredientCount19.style.display = 'none';
        recipeingredientCount20.style.display = 'none';
        recipeingredientCount21.style.display = 'none';
        recipeingredientCount22.style.display = 'none';
        recipeingredientCount23.style.display = 'none';
        recipeingredientCount24.style.display = 'none';
        recipeingredientCount25.style.display = 'none';
        
    } else if (recipeIngredientCount > 12 ) {
        
        recipeingredientCount1.style.display = 'block';
        recipeingredientCount2.style.display = 'block';        
        recipeingredientCount3.style.display = 'block';
        recipeingredientCount4.style.display = 'block';
        recipeingredientCount5.style.display = 'block';
        recipeingredientCount6.style.display = 'block';
        recipeingredientCount7.style.display = 'block';
        recipeingredientCount8.style.display = 'block';
        recipeingredientCount9.style.display = 'block';
        recipeingredientCount10.style.display = 'block';
        recipeingredientCount11.style.display = 'block';
        recipeingredientCount12.style.display = 'block';
        recipeingredientCount13.style.display = 'block';
        recipeingredientCount14.style.display = 'none';
        recipeingredientCount15.style.display = 'none';
        recipeingredientCount16.style.display = 'none';
        recipeingredientCount17.style.display = 'none';
        recipeingredientCount18.style.display = 'none';
        recipeingredientCount19.style.display = 'none';
        recipeingredientCount20.style.display = 'none';
        recipeingredientCount21.style.display = 'none';
        recipeingredientCount22.style.display = 'none';
        recipeingredientCount23.style.display = 'none';
        recipeingredientCount24.style.display = 'none';
        recipeingredientCount25.style.display = 'none';
        
    } else if (recipeIngredientCount > 11 ) {
        
        recipeingredientCount1.style.display = 'block';
        recipeingredientCount2.style.display = 'block';        
        recipeingredientCount3.style.display = 'block';
        recipeingredientCount4.style.display = 'block';
        recipeingredientCount5.style.display = 'block';
        recipeingredientCount6.style.display = 'block';
        recipeingredientCount7.style.display = 'block';
        recipeingredientCount8.style.display = 'block';
        recipeingredientCount9.style.display = 'block';
        recipeingredientCount10.style.display = 'block';
        recipeingredientCount11.style.display = 'block';
        recipeingredientCount12.style.display = 'block';
        recipeingredientCount13.style.display = 'none';
        recipeingredientCount14.style.display = 'none';
        recipeingredientCount15.style.display = 'none';
        recipeingredientCount16.style.display = 'none';
        recipeingredientCount17.style.display = 'none';
        recipeingredientCount18.style.display = 'none';
        recipeingredientCount19.style.display = 'none';
        recipeingredientCount20.style.display = 'none';
        recipeingredientCount21.style.display = 'none';
        recipeingredientCount22.style.display = 'none';
        recipeingredientCount23.style.display = 'none';
        recipeingredientCount24.style.display = 'none';
        recipeingredientCount25.style.display = 'none';
        
    } else if (recipeIngredientCount > 10 ) {
        
        recipeingredientCount1.style.display = 'block';
        recipeingredientCount2.style.display = 'block';        
        recipeingredientCount3.style.display = 'block';
        recipeingredientCount4.style.display = 'block';
        recipeingredientCount5.style.display = 'block';
        recipeingredientCount6.style.display = 'block';
        recipeingredientCount7.style.display = 'block';
        recipeingredientCount8.style.display = 'block';
        recipeingredientCount9.style.display = 'block';
        recipeingredientCount10.style.display = 'block';
        recipeingredientCount11.style.display = 'block';
        recipeingredientCount12.style.display = 'none';
        recipeingredientCount13.style.display = 'none';
        recipeingredientCount14.style.display = 'none';
        recipeingredientCount15.style.display = 'none';
        recipeingredientCount16.style.display = 'none';
        recipeingredientCount17.style.display = 'none';
        recipeingredientCount18.style.display = 'none';
        recipeingredientCount19.style.display = 'none';
        recipeingredientCount20.style.display = 'none';
        recipeingredientCount21.style.display = 'none';
        recipeingredientCount22.style.display = 'none';
        recipeingredientCount23.style.display = 'none';
        recipeingredientCount24.style.display = 'none';
        recipeingredientCount25.style.display = 'none';
        
    } else if (recipeIngredientCount > 9 ) {
        
        recipeingredientCount1.style.display = 'block';
        recipeingredientCount2.style.display = 'block';        
        recipeingredientCount3.style.display = 'block';
        recipeingredientCount4.style.display = 'block';
        recipeingredientCount5.style.display = 'block';
        recipeingredientCount6.style.display = 'block';
        recipeingredientCount7.style.display = 'block';
        recipeingredientCount8.style.display = 'block';
        recipeingredientCount9.style.display = 'block';
        recipeingredientCount10.style.display = 'block';
        recipeingredientCount11.style.display = 'none';
        recipeingredientCount12.style.display = 'none';
        recipeingredientCount13.style.display = 'none';
        recipeingredientCount14.style.display = 'none';
        recipeingredientCount15.style.display = 'none';
        recipeingredientCount16.style.display = 'none';
        recipeingredientCount17.style.display = 'none';
        recipeingredientCount18.style.display = 'none';
        recipeingredientCount19.style.display = 'none';
        recipeingredientCount20.style.display = 'none';
        recipeingredientCount21.style.display = 'none';
        recipeingredientCount22.style.display = 'none';
        recipeingredientCount23.style.display = 'none';
        recipeingredientCount24.style.display = 'none';
        recipeingredientCount25.style.display = 'none';
        
    } else if (recipeIngredientCount > 8 ) {
        
        recipeingredientCount1.style.display = 'block';
        recipeingredientCount2.style.display = 'block';        
        recipeingredientCount3.style.display = 'block';
        recipeingredientCount4.style.display = 'block';
        recipeingredientCount5.style.display = 'block';
        recipeingredientCount6.style.display = 'block';
        recipeingredientCount7.style.display = 'block';
        recipeingredientCount8.style.display = 'block';
        recipeingredientCount9.style.display = 'block';
        recipeingredientCount10.style.display = 'none';
        recipeingredientCount11.style.display = 'none';
        recipeingredientCount12.style.display = 'none';
        recipeingredientCount13.style.display = 'none';
        recipeingredientCount14.style.display = 'none';
        recipeingredientCount15.style.display = 'none';
        recipeingredientCount16.style.display = 'none';
        recipeingredientCount17.style.display = 'none';
        recipeingredientCount18.style.display = 'none';
        recipeingredientCount19.style.display = 'none';
        recipeingredientCount20.style.display = 'none';
        recipeingredientCount21.style.display = 'none';
        recipeingredientCount22.style.display = 'none';
        recipeingredientCount23.style.display = 'none';
        recipeingredientCount24.style.display = 'none';
        recipeingredientCount25.style.display = 'none';
        
    } else if (recipeIngredientCount > 7 ) {
        
        recipeingredientCount1.style.display = 'block';
        recipeingredientCount2.style.display = 'block';        
        recipeingredientCount3.style.display = 'block';
        recipeingredientCount4.style.display = 'block';
        recipeingredientCount5.style.display = 'block';
        recipeingredientCount6.style.display = 'block';
        recipeingredientCount7.style.display = 'block';
        recipeingredientCount8.style.display = 'block';
        recipeingredientCount9.style.display = 'none';
        recipeingredientCount10.style.display = 'none';
        recipeingredientCount11.style.display = 'none';
        recipeingredientCount12.style.display = 'none';
        recipeingredientCount13.style.display = 'none';
        recipeingredientCount14.style.display = 'none';
        recipeingredientCount15.style.display = 'none';
        recipeingredientCount16.style.display = 'none';
        recipeingredientCount17.style.display = 'none';
        recipeingredientCount18.style.display = 'none';
        recipeingredientCount19.style.display = 'none';
        recipeingredientCount20.style.display = 'none';
        recipeingredientCount21.style.display = 'none';
        recipeingredientCount22.style.display = 'none';
        recipeingredientCount23.style.display = 'none';
        recipeingredientCount24.style.display = 'none';
        recipeingredientCount25.style.display = 'none';
        
    } else if (recipeIngredientCount > 6 ) {
        
        recipeingredientCount1.style.display = 'block';
        recipeingredientCount2.style.display = 'block';        
        recipeingredientCount3.style.display = 'block';
        recipeingredientCount4.style.display = 'block';
        recipeingredientCount5.style.display = 'block';
        recipeingredientCount6.style.display = 'block';
        recipeingredientCount7.style.display = 'block';
        recipeingredientCount8.style.display = 'none';
        recipeingredientCount9.style.display = 'none';
        recipeingredientCount10.style.display = 'none';
        recipeingredientCount11.style.display = 'none';
        recipeingredientCount12.style.display = 'none';
        recipeingredientCount13.style.display = 'none';
        recipeingredientCount14.style.display = 'none';
        recipeingredientCount15.style.display = 'none';
        recipeingredientCount16.style.display = 'none';
        recipeingredientCount17.style.display = 'none';
        recipeingredientCount18.style.display = 'none';
        recipeingredientCount19.style.display = 'none';
        recipeingredientCount20.style.display = 'none';
        recipeingredientCount21.style.display = 'none';
        recipeingredientCount22.style.display = 'none';
        recipeingredientCount23.style.display = 'none';
        recipeingredientCount24.style.display = 'none';
        recipeingredientCount25.style.display = 'none';
        
    } else if (recipeIngredientCount > 5 ) {
        
        recipeingredientCount1.style.display = 'block';
        recipeingredientCount2.style.display = 'block';        
        recipeingredientCount3.style.display = 'block';
        recipeingredientCount4.style.display = 'block';
        recipeingredientCount5.style.display = 'block';
        recipeingredientCount6.style.display = 'block';
        recipeingredientCount7.style.display = 'none';
        recipeingredientCount8.style.display = 'none';
        recipeingredientCount9.style.display = 'none';
        recipeingredientCount10.style.display = 'none';
        recipeingredientCount11.style.display = 'none';
        recipeingredientCount12.style.display = 'none';
        recipeingredientCount13.style.display = 'none';
        recipeingredientCount14.style.display = 'none';
        recipeingredientCount15.style.display = 'none';
        recipeingredientCount16.style.display = 'none';
        recipeingredientCount17.style.display = 'none';
        recipeingredientCount18.style.display = 'none';
        recipeingredientCount19.style.display = 'none';
        recipeingredientCount20.style.display = 'none';
        recipeingredientCount21.style.display = 'none';
        recipeingredientCount22.style.display = 'none';
        recipeingredientCount23.style.display = 'none';
        recipeingredientCount24.style.display = 'none';
        recipeingredientCount25.style.display = 'none';
        
    } else if (recipeIngredientCount > 4 ) {
        
        recipeingredientCount1.style.display = 'block';
        recipeingredientCount2.style.display = 'block';        
        recipeingredientCount3.style.display = 'block';
        recipeingredientCount4.style.display = 'block';
        recipeingredientCount5.style.display = 'block';
        recipeingredientCount6.style.display = 'none';
        recipeingredientCount7.style.display = 'none';
        recipeingredientCount8.style.display = 'none';
        recipeingredientCount9.style.display = 'none';
        recipeingredientCount10.style.display = 'none';
        recipeingredientCount11.style.display = 'none';
        recipeingredientCount12.style.display = 'none';
        recipeingredientCount13.style.display = 'none';
        recipeingredientCount14.style.display = 'none';
        recipeingredientCount15.style.display = 'none';
        recipeingredientCount16.style.display = 'none';
        recipeingredientCount17.style.display = 'none';
        recipeingredientCount18.style.display = 'none';
        recipeingredientCount19.style.display = 'none';
        recipeingredientCount20.style.display = 'none';
        recipeingredientCount21.style.display = 'none';
        recipeingredientCount22.style.display = 'none';
        recipeingredientCount23.style.display = 'none';
        recipeingredientCount24.style.display = 'none';
        recipeingredientCount25.style.display = 'none';
        
    }  else if (recipeIngredientCount > 3 ) {
        
        recipeingredientCount1.style.display = 'block';
        recipeingredientCount2.style.display = 'block';        
        recipeingredientCount3.style.display = 'block';
        recipeingredientCount4.style.display = 'block';
        recipeingredientCount5.style.display = 'none';
        recipeingredientCount6.style.display = 'none';
        recipeingredientCount7.style.display = 'none';
        recipeingredientCount8.style.display = 'none';
        recipeingredientCount9.style.display = 'none';
        recipeingredientCount10.style.display = 'none';
        recipeingredientCount11.style.display = 'none';
        recipeingredientCount12.style.display = 'none';
        recipeingredientCount13.style.display = 'none';
        recipeingredientCount14.style.display = 'none';
        recipeingredientCount15.style.display = 'none';
        recipeingredientCount16.style.display = 'none';
        recipeingredientCount17.style.display = 'none';
        recipeingredientCount18.style.display = 'none';
        recipeingredientCount19.style.display = 'none';
        recipeingredientCount20.style.display = 'none';
        recipeingredientCount21.style.display = 'none';
        recipeingredientCount22.style.display = 'none';
        recipeingredientCount23.style.display = 'none';
        recipeingredientCount24.style.display = 'none';
        recipeingredientCount25.style.display = 'none';
        
    }else if (recipeIngredientCount > 2 ) {
        
        recipeingredientCount1.style.display = 'block';
        recipeingredientCount2.style.display = 'block';        
        recipeingredientCount3.style.display = 'block';
        recipeingredientCount4.style.display = 'none';
        recipeingredientCount5.style.display = 'none';
        recipeingredientCount6.style.display = 'none';
        recipeingredientCount7.style.display = 'none';
        recipeingredientCount8.style.display = 'none';
        recipeingredientCount9.style.display = 'none';
        recipeingredientCount10.style.display = 'none';
        recipeingredientCount11.style.display = 'none';
        recipeingredientCount12.style.display = 'none';
        recipeingredientCount13.style.display = 'none';
        recipeingredientCount14.style.display = 'none';
        recipeingredientCount15.style.display = 'none';
        recipeingredientCount16.style.display = 'none';
        recipeingredientCount17.style.display = 'none';
        recipeingredientCount18.style.display = 'none';
        recipeingredientCount19.style.display = 'none';
        recipeingredientCount20.style.display = 'none';
        recipeingredientCount21.style.display = 'none';
        recipeingredientCount22.style.display = 'none';
        recipeingredientCount23.style.display = 'none';
        recipeingredientCount24.style.display = 'none';
        recipeingredientCount25.style.display = 'none';
        
    } else if (recipeIngredientCount > 1 ) {
        
        recipeingredientCount1.style.display = 'block';
        recipeingredientCount2.style.display = 'block';        
        recipeingredientCount3.style.display = 'none';
        recipeingredientCount4.style.display = 'none';
        recipeingredientCount5.style.display = 'none';
        recipeingredientCount6.style.display = 'none';
        recipeingredientCount7.style.display = 'none';
        recipeingredientCount8.style.display = 'none';
        recipeingredientCount9.style.display = 'none';
        recipeingredientCount10.style.display = 'none';
        recipeingredientCount11.style.display = 'none';
        recipeingredientCount12.style.display = 'none';
        recipeingredientCount13.style.display = 'none';
        recipeingredientCount14.style.display = 'none';
        recipeingredientCount15.style.display = 'none';
        recipeingredientCount16.style.display = 'none';
        recipeingredientCount17.style.display = 'none';
        recipeingredientCount18.style.display = 'none';
        recipeingredientCount19.style.display = 'none';
        recipeingredientCount20.style.display = 'none';
        recipeingredientCount21.style.display = 'none';
        recipeingredientCount22.style.display = 'none';
        recipeingredientCount23.style.display = 'none';
        recipeingredientCount24.style.display = 'none';
        recipeingredientCount25.style.display = 'none';
        
    } else if (recipeIngredientCount > 0 ) {
        
        recipeingredientCount1.style.display = 'block';
        recipeingredientCount2.style.display = 'none';        
        recipeingredientCount3.style.display = 'none';
        recipeingredientCount4.style.display = 'none';
        recipeingredientCount5.style.display = 'none';
        recipeingredientCount6.style.display = 'none';
        recipeingredientCount7.style.display = 'none';
        recipeingredientCount8.style.display = 'none';
        recipeingredientCount9.style.display = 'none';
        recipeingredientCount10.style.display = 'none';
        recipeingredientCount11.style.display = 'none';
        recipeingredientCount12.style.display = 'none';
        recipeingredientCount13.style.display = 'none';
        recipeingredientCount14.style.display = 'none';
        recipeingredientCount15.style.display = 'none';
        recipeingredientCount16.style.display = 'none';
        recipeingredientCount17.style.display = 'none';
        recipeingredientCount18.style.display = 'none';
        recipeingredientCount19.style.display = 'none';
        recipeingredientCount20.style.display = 'none';
        recipeingredientCount21.style.display = 'none';
        recipeingredientCount22.style.display = 'none';
        recipeingredientCount23.style.display = 'none';
        recipeingredientCount24.style.display = 'none';
        recipeingredientCount25.style.display = 'none';
        
    } else if (recipeIngredientCount == 0 ) {
        
        recipeingredientCount1.style.display = 'none';
        recipeingredientCount2.style.display = 'none';        
        recipeingredientCount3.style.display = 'none';
        recipeingredientCount4.style.display = 'none';
        recipeingredientCount5.style.display = 'none';
        recipeingredientCount6.style.display = 'none';
        recipeingredientCount7.style.display = 'none';
        recipeingredientCount8.style.display = 'none';
        recipeingredientCount9.style.display = 'none';
        recipeingredientCount10.style.display = 'none';
        recipeingredientCount11.style.display = 'none';
        recipeingredientCount12.style.display = 'none';
        recipeingredientCount13.style.display = 'none';
        recipeingredientCount14.style.display = 'none';
        recipeingredientCount15.style.display = 'none';
        recipeingredientCount16.style.display = 'none';
        recipeingredientCount17.style.display = 'none';
        recipeingredientCount18.style.display = 'none';
        recipeingredientCount19.style.display = 'none';
        recipeingredientCount20.style.display = 'none';
        recipeingredientCount21.style.display = 'none';
        recipeingredientCount22.style.display = 'none';
        recipeingredientCount23.style.display = 'none';
        recipeingredientCount24.style.display = 'none';
        recipeingredientCount25.style.display = 'none';
        
    }

})
})

// Deal with removing the text from hidden inputs on image urls for recipe schema
recipeIncludedIngredient.addEventListener('click', function handleChangingText() {
    
    const recipeIngredient1 = document.getElementById('essdrs_schema_recipe_ingredient_1');
    const recipeIngredient2 = document.getElementById('essdrs_schema_recipe_ingredient_2');
    const recipeIngredient3 = document.getElementById('essdrs_schema_recipe_ingredient_3');
    const recipeIngredient4 = document.getElementById('essdrs_schema_recipe_ingredient_4');    
    const recipeIngredient5 = document.getElementById('essdrs_schema_recipe_ingredient_5');    
    const recipeIngredient6 = document.getElementById('essdrs_schema_recipe_ingredient_6');
    const recipeIngredient7 = document.getElementById('essdrs_schema_recipe_ingredient_5');
    const recipeIngredient8 = document.getElementById('essdrs_schema_recipe_ingredient_8');
    const recipeIngredient9 = document.getElementById('essdrs_schema_recipe_ingredient_9');    
    const recipeIngredient10 = document.getElementById('essdrs_schema_recipe_ingredient_10');     
    const recipeIngredient11 = document.getElementById('essdrs_schema_recipe_ingredient_11');
    const recipeIngredient12 = document.getElementById('essdrs_schema_recipe_ingredient_12');
    const recipeIngredient13 = document.getElementById('essdrs_schema_recipe_ingredient_13');
    const recipeIngredient14 = document.getElementById('essdrs_schema_recipe_ingredient_14');    
    const recipeIngredient15 = document.getElementById('essdrs_schema_recipe_ingredient_15');     
    const recipeIngredient16 = document.getElementById('essdrs_schema_recipe_ingredient_16');
    const recipeIngredient17 = document.getElementById('essdrs_schema_recipe_ingredient_17');
    const recipeIngredient18 = document.getElementById('essdrs_schema_recipe_ingredient_18');
    const recipeIngredient19 = document.getElementById('essdrs_schema_recipe_ingredient_19');    
    const recipeIngredient20 = document.getElementById('essdrs_schema_recipe_ingredient_20');     
    const recipeIngredient21 = document.getElementById('essdrs_schema_recipe_ingredient_21');
    const recipeIngredient22 = document.getElementById('essdrs_schema_recipe_ingredient_22');
    const recipeIngredient23 = document.getElementById('essdrs_schema_recipe_ingredient_23');
    const recipeIngredient24 = document.getElementById('essdrs_schema_recipe_ingredient_24');    
    const recipeIngredient25 = document.getElementById('essdrs_schema_recipe_ingredient_25');     
    
[recipeIngredient1, recipeIngredient2, recipeIngredient3, recipeIngredient4, recipeIngredient5,
recipeIngredient6, recipeIngredient7, recipeIngredient8, recipeIngredient9, recipeIngredient10,
recipeIngredient11, recipeIngredient12, recipeIngredient13, recipeIngredient14, recipeIngredient15,
recipeIngredient16, recipeIngredient17, recipeIngredient18, recipeIngredient19, recipeIngredient20,
recipeIngredient21, recipeIngredient22, recipeIngredient23, recipeIngredient24, recipeIngredient25].forEach(item => {
    
    if (item.style.display == 'none') {
        
        var recipeUrlInputs = item.querySelector("input");
        recipeUrlInputs.value = '';
        
    }
    
})

})

// Controls the Images to include for the recipe schema on the post and page edit screen 
var recipeIncludedsteps = document.getElementById("essdrs_recipe_ingredients_steps");

// Use both tab and dropdown as click event to check current status and display the correct amount of image inputs
[document.getElementById('essdrs_recipe_ingredients_steps'),
document.getElementById('essdrs_recipe_tab_heading')].forEach(item => {
item.addEventListener('click', function handleChange() {
    
    var recipeStepCount = recipeIncludedsteps.value;
    
    const recipeStepCount1  = document.getElementById("essdrs_schema_recipe_step_1");
    const recipeStepCount2  = document.getElementById("essdrs_schema_recipe_step_2");
    const recipeStepCount3  = document.getElementById("essdrs_schema_recipe_step_3");
    const recipeStepCount4  = document.getElementById("essdrs_schema_recipe_step_4");
    const recipeStepCount5  = document.getElementById("essdrs_schema_recipe_step_5");
    const recipeStepCount6  = document.getElementById("essdrs_schema_recipe_step_6");    
    const recipeStepCount7  = document.getElementById("essdrs_schema_recipe_step_7");
    const recipeStepCount8  = document.getElementById("essdrs_schema_recipe_step_8");    
    const recipeStepCount9  = document.getElementById("essdrs_schema_recipe_step_9");
    const recipeStepCount10 = document.getElementById("essdrs_schema_recipe_step_10");    
    const recipeStepCount11 = document.getElementById("essdrs_schema_recipe_step_11");
    const recipeStepCount12 = document.getElementById("essdrs_schema_recipe_step_12");
    const recipeStepCount13 = document.getElementById("essdrs_schema_recipe_step_13");
    const recipeStepCount14 = document.getElementById("essdrs_schema_recipe_step_14");
    const recipeStepCount15 = document.getElementById("essdrs_schema_recipe_step_15");
    const recipeStepCount16 = document.getElementById("essdrs_schema_recipe_step_16");    
    const recipeStepCount17 = document.getElementById("essdrs_schema_recipe_step_17");
    const recipeStepCount18 = document.getElementById("essdrs_schema_recipe_step_18");    
    const recipeStepCount19 = document.getElementById("essdrs_schema_recipe_step_19");
    const recipeStepCount20 = document.getElementById("essdrs_schema_recipe_step_20");     
    const recipeStepCount21 = document.getElementById("essdrs_schema_recipe_step_21");
    const recipeStepCount22 = document.getElementById("essdrs_schema_recipe_step_22");
    const recipeStepCount23 = document.getElementById("essdrs_schema_recipe_step_23");
    const recipeStepCount24 = document.getElementById("essdrs_schema_recipe_step_24");
    const recipeStepCount25 = document.getElementById("essdrs_schema_recipe_step_25");
    
    if (recipeStepCount > 24 ) {
        
        recipeStepCount1.style.display = 'block';
        recipeStepCount2.style.display = 'block';        
        recipeStepCount3.style.display = 'block';
        recipeStepCount4.style.display = 'block';
        recipeStepCount5.style.display = 'block';
        recipeStepCount6.style.display = 'block';
        recipeStepCount7.style.display = 'block';
        recipeStepCount8.style.display = 'block';
        recipeStepCount9.style.display = 'block';
        recipeStepCount10.style.display = 'block';
        recipeStepCount11.style.display = 'block';
        recipeStepCount12.style.display = 'block';
        recipeStepCount13.style.display = 'block';
        recipeStepCount14.style.display = 'block';
        recipeStepCount15.style.display = 'block';
        recipeStepCount16.style.display = 'block';
        recipeStepCount17.style.display = 'block';
        recipeStepCount18.style.display = 'block';
        recipeStepCount19.style.display = 'block';
        recipeStepCount20.style.display = 'block';
        recipeStepCount21.style.display = 'block';
        recipeStepCount22.style.display = 'block';
        recipeStepCount23.style.display = 'block';
        recipeStepCount24.style.display = 'block';
        recipeStepCount25.style.display = 'block';

    } else if (recipeStepCount > 23 ) {
        
        recipeStepCount1.style.display = 'block';
        recipeStepCount2.style.display = 'block';        
        recipeStepCount3.style.display = 'block';
        recipeStepCount4.style.display = 'block';
        recipeStepCount5.style.display = 'block';
        recipeStepCount6.style.display = 'block';
        recipeStepCount7.style.display = 'block';
        recipeStepCount8.style.display = 'block';
        recipeStepCount9.style.display = 'block';
        recipeStepCount10.style.display = 'block';
        recipeStepCount11.style.display = 'block';
        recipeStepCount12.style.display = 'block';
        recipeStepCount13.style.display = 'block';
        recipeStepCount14.style.display = 'block';
        recipeStepCount15.style.display = 'block';
        recipeStepCount16.style.display = 'block';
        recipeStepCount17.style.display = 'block';
        recipeStepCount18.style.display = 'block';
        recipeStepCount19.style.display = 'block';
        recipeStepCount20.style.display = 'block';
        recipeStepCount21.style.display = 'block';
        recipeStepCount22.style.display = 'block';
        recipeStepCount23.style.display = 'block';
        recipeStepCount24.style.display = 'block';
        recipeStepCount25.style.display = 'none';
        
    } else if (recipeStepCount > 22 ) {
        
        recipeStepCount1.style.display = 'block';
        recipeStepCount2.style.display = 'block';        
        recipeStepCount3.style.display = 'block';
        recipeStepCount4.style.display = 'block';
        recipeStepCount5.style.display = 'block';
        recipeStepCount6.style.display = 'block';
        recipeStepCount7.style.display = 'block';
        recipeStepCount8.style.display = 'block';
        recipeStepCount9.style.display = 'block';
        recipeStepCount10.style.display = 'block';
        recipeStepCount11.style.display = 'block';
        recipeStepCount12.style.display = 'block';
        recipeStepCount13.style.display = 'block';
        recipeStepCount14.style.display = 'block';
        recipeStepCount15.style.display = 'block';
        recipeStepCount16.style.display = 'block';
        recipeStepCount17.style.display = 'block';
        recipeStepCount18.style.display = 'block';
        recipeStepCount19.style.display = 'block';
        recipeStepCount20.style.display = 'block';
        recipeStepCount21.style.display = 'block';
        recipeStepCount22.style.display = 'block';
        recipeStepCount23.style.display = 'block';
        recipeStepCount24.style.display = 'none';
        recipeStepCount25.style.display = 'none';
        
    } else if (recipeStepCount > 21 ) {
        
        recipeStepCount1.style.display = 'block';
        recipeStepCount2.style.display = 'block';        
        recipeStepCount3.style.display = 'block';
        recipeStepCount4.style.display = 'block';
        recipeStepCount5.style.display = 'block';
        recipeStepCount6.style.display = 'block';
        recipeStepCount7.style.display = 'block';
        recipeStepCount8.style.display = 'block';
        recipeStepCount9.style.display = 'block';
        recipeStepCount10.style.display = 'block';
        recipeStepCount11.style.display = 'block';
        recipeStepCount12.style.display = 'block';
        recipeStepCount13.style.display = 'block';
        recipeStepCount14.style.display = 'block';
        recipeStepCount15.style.display = 'block';
        recipeStepCount16.style.display = 'block';
        recipeStepCount17.style.display = 'block';
        recipeStepCount18.style.display = 'block';
        recipeStepCount19.style.display = 'block';
        recipeStepCount20.style.display = 'block';
        recipeStepCount21.style.display = 'block';
        recipeStepCount22.style.display = 'block';
        recipeStepCount23.style.display = 'none';
        recipeStepCount24.style.display = 'none';
        recipeStepCount25.style.display = 'none';
        
    } else if (recipeStepCount > 20 ) {
        
        recipeStepCount1.style.display = 'block';
        recipeStepCount2.style.display = 'block';        
        recipeStepCount3.style.display = 'block';
        recipeStepCount4.style.display = 'block';
        recipeStepCount5.style.display = 'block';
        recipeStepCount6.style.display = 'block';
        recipeStepCount7.style.display = 'block';
        recipeStepCount8.style.display = 'block';
        recipeStepCount9.style.display = 'block';
        recipeStepCount10.style.display = 'block';
        recipeStepCount11.style.display = 'block';
        recipeStepCount12.style.display = 'block';
        recipeStepCount13.style.display = 'block';
        recipeStepCount14.style.display = 'block';
        recipeStepCount15.style.display = 'block';
        recipeStepCount16.style.display = 'block';
        recipeStepCount17.style.display = 'block';
        recipeStepCount18.style.display = 'block';
        recipeStepCount19.style.display = 'block';
        recipeStepCount20.style.display = 'block';
        recipeStepCount21.style.display = 'block';
        recipeStepCount22.style.display = 'none';
        recipeStepCount23.style.display = 'none';
        recipeStepCount24.style.display = 'none';
        recipeStepCount25.style.display = 'none';
        
    } else if (recipeStepCount > 19 ) {
        
        recipeStepCount1.style.display = 'block';
        recipeStepCount2.style.display = 'block';        
        recipeStepCount3.style.display = 'block';
        recipeStepCount4.style.display = 'block';
        recipeStepCount5.style.display = 'block';
        recipeStepCount6.style.display = 'block';
        recipeStepCount7.style.display = 'block';
        recipeStepCount8.style.display = 'block';
        recipeStepCount9.style.display = 'block';
        recipeStepCount10.style.display = 'block';
        recipeStepCount11.style.display = 'block';
        recipeStepCount12.style.display = 'block';
        recipeStepCount13.style.display = 'block';
        recipeStepCount14.style.display = 'block';
        recipeStepCount15.style.display = 'block';
        recipeStepCount16.style.display = 'block';
        recipeStepCount17.style.display = 'block';
        recipeStepCount18.style.display = 'block';
        recipeStepCount19.style.display = 'block';
        recipeStepCount20.style.display = 'block';
        recipeStepCount21.style.display = 'none';
        recipeStepCount22.style.display = 'none';
        recipeStepCount23.style.display = 'none';
        recipeStepCount24.style.display = 'none';
        recipeStepCount25.style.display = 'none';
        
    } else if (recipeStepCount > 18 ) {
        
        recipeStepCount1.style.display = 'block';
        recipeStepCount2.style.display = 'block';        
        recipeStepCount3.style.display = 'block';
        recipeStepCount4.style.display = 'block';
        recipeStepCount5.style.display = 'block';
        recipeStepCount6.style.display = 'block';
        recipeStepCount7.style.display = 'block';
        recipeStepCount8.style.display = 'block';
        recipeStepCount9.style.display = 'block';
        recipeStepCount10.style.display = 'block';
        recipeStepCount11.style.display = 'block';
        recipeStepCount12.style.display = 'block';
        recipeStepCount13.style.display = 'block';
        recipeStepCount14.style.display = 'block';
        recipeStepCount15.style.display = 'block';
        recipeStepCount16.style.display = 'block';
        recipeStepCount17.style.display = 'block';
        recipeStepCount18.style.display = 'block';
        recipeStepCount19.style.display = 'block';
        recipeStepCount20.style.display = 'none';
        recipeStepCount21.style.display = 'none';
        recipeStepCount22.style.display = 'none';
        recipeStepCount23.style.display = 'none';
        recipeStepCount24.style.display = 'none';
        recipeStepCount25.style.display = 'none';
        
    } else if (recipeStepCount > 17 ) {
        
        recipeStepCount1.style.display = 'block';
        recipeStepCount2.style.display = 'block';        
        recipeStepCount3.style.display = 'block';
        recipeStepCount4.style.display = 'block';
        recipeStepCount5.style.display = 'block';
        recipeStepCount6.style.display = 'block';
        recipeStepCount7.style.display = 'block';
        recipeStepCount8.style.display = 'block';
        recipeStepCount9.style.display = 'block';
        recipeStepCount10.style.display = 'block';
        recipeStepCount11.style.display = 'block';
        recipeStepCount12.style.display = 'block';
        recipeStepCount13.style.display = 'block';
        recipeStepCount14.style.display = 'block';
        recipeStepCount15.style.display = 'block';
        recipeStepCount16.style.display = 'block';
        recipeStepCount17.style.display = 'block';
        recipeStepCount18.style.display = 'block';
        recipeStepCount19.style.display = 'none';
        recipeStepCount20.style.display = 'none';
        recipeStepCount21.style.display = 'none';
        recipeStepCount22.style.display = 'none';
        recipeStepCount23.style.display = 'none';
        recipeStepCount24.style.display = 'none';
        recipeStepCount25.style.display = 'none';
        
    } else if (recipeStepCount > 16 ) {
        
        recipeStepCount1.style.display = 'block';
        recipeStepCount2.style.display = 'block';        
        recipeStepCount3.style.display = 'block';
        recipeStepCount4.style.display = 'block';
        recipeStepCount5.style.display = 'block';
        recipeStepCount6.style.display = 'block';
        recipeStepCount7.style.display = 'block';
        recipeStepCount8.style.display = 'block';
        recipeStepCount9.style.display = 'block';
        recipeStepCount10.style.display = 'block';
        recipeStepCount11.style.display = 'block';
        recipeStepCount12.style.display = 'block';
        recipeStepCount13.style.display = 'block';
        recipeStepCount14.style.display = 'block';
        recipeStepCount15.style.display = 'block';
        recipeStepCount16.style.display = 'block';
        recipeStepCount17.style.display = 'block';
        recipeStepCount18.style.display = 'none';
        recipeStepCount19.style.display = 'none';
        recipeStepCount20.style.display = 'none';
        recipeStepCount21.style.display = 'none';
        recipeStepCount22.style.display = 'none';
        recipeStepCount23.style.display = 'none';
        recipeStepCount24.style.display = 'none';
        recipeStepCount25.style.display = 'none';
        
    } else if (recipeStepCount > 15 ) {
        
        recipeStepCount1.style.display = 'block';
        recipeStepCount2.style.display = 'block';        
        recipeStepCount3.style.display = 'block';
        recipeStepCount4.style.display = 'block';
        recipeStepCount5.style.display = 'block';
        recipeStepCount6.style.display = 'block';
        recipeStepCount7.style.display = 'block';
        recipeStepCount8.style.display = 'block';
        recipeStepCount9.style.display = 'block';
        recipeStepCount10.style.display = 'block';
        recipeStepCount11.style.display = 'block';
        recipeStepCount12.style.display = 'block';
        recipeStepCount13.style.display = 'block';
        recipeStepCount14.style.display = 'block';
        recipeStepCount15.style.display = 'block';
        recipeStepCount16.style.display = 'block';
        recipeStepCount17.style.display = 'none';
        recipeStepCount18.style.display = 'none';
        recipeStepCount19.style.display = 'none';
        recipeStepCount20.style.display = 'none';
        recipeStepCount21.style.display = 'none';
        recipeStepCount22.style.display = 'none';
        recipeStepCount23.style.display = 'none';
        recipeStepCount24.style.display = 'none';
        recipeStepCount25.style.display = 'none';
        
    } else if (recipeStepCount > 14 ) {
        
        recipeStepCount1.style.display = 'block';
        recipeStepCount2.style.display = 'block';        
        recipeStepCount3.style.display = 'block';
        recipeStepCount4.style.display = 'block';
        recipeStepCount5.style.display = 'block';
        recipeStepCount6.style.display = 'block';
        recipeStepCount7.style.display = 'block';
        recipeStepCount8.style.display = 'block';
        recipeStepCount9.style.display = 'block';
        recipeStepCount10.style.display = 'block';
        recipeStepCount11.style.display = 'block';
        recipeStepCount12.style.display = 'block';
        recipeStepCount13.style.display = 'block';
        recipeStepCount14.style.display = 'block';
        recipeStepCount15.style.display = 'block';
        recipeStepCount16.style.display = 'none';
        recipeStepCount17.style.display = 'none';
        recipeStepCount18.style.display = 'none';
        recipeStepCount19.style.display = 'none';
        recipeStepCount20.style.display = 'none';
        recipeStepCount21.style.display = 'none';
        recipeStepCount22.style.display = 'none';
        recipeStepCount23.style.display = 'none';
        recipeStepCount24.style.display = 'none';
        recipeStepCount25.style.display = 'none';
        
    } else if (recipeStepCount > 13 ) {
        
        recipeStepCount1.style.display = 'block';
        recipeStepCount2.style.display = 'block';        
        recipeStepCount3.style.display = 'block';
        recipeStepCount4.style.display = 'block';
        recipeStepCount5.style.display = 'block';
        recipeStepCount6.style.display = 'block';
        recipeStepCount7.style.display = 'block';
        recipeStepCount8.style.display = 'block';
        recipeStepCount9.style.display = 'block';
        recipeStepCount10.style.display = 'block';
        recipeStepCount11.style.display = 'block';
        recipeStepCount12.style.display = 'block';
        recipeStepCount13.style.display = 'block';
        recipeStepCount14.style.display = 'block';
        recipeStepCount15.style.display = 'none';
        recipeStepCount16.style.display = 'none';
        recipeStepCount17.style.display = 'none';
        recipeStepCount18.style.display = 'none';
        recipeStepCount19.style.display = 'none';
        recipeStepCount20.style.display = 'none';
        recipeStepCount21.style.display = 'none';
        recipeStepCount22.style.display = 'none';
        recipeStepCount23.style.display = 'none';
        recipeStepCount24.style.display = 'none';
        recipeStepCount25.style.display = 'none';
        
    } else if (recipeStepCount > 12 ) {
        
        recipeStepCount1.style.display = 'block';
        recipeStepCount2.style.display = 'block';        
        recipeStepCount3.style.display = 'block';
        recipeStepCount4.style.display = 'block';
        recipeStepCount5.style.display = 'block';
        recipeStepCount6.style.display = 'block';
        recipeStepCount7.style.display = 'block';
        recipeStepCount8.style.display = 'block';
        recipeStepCount9.style.display = 'block';
        recipeStepCount10.style.display = 'block';
        recipeStepCount11.style.display = 'block';
        recipeStepCount12.style.display = 'block';
        recipeStepCount13.style.display = 'block';
        recipeStepCount14.style.display = 'none';
        recipeStepCount15.style.display = 'none';
        recipeStepCount16.style.display = 'none';
        recipeStepCount17.style.display = 'none';
        recipeStepCount18.style.display = 'none';
        recipeStepCount19.style.display = 'none';
        recipeStepCount20.style.display = 'none';
        recipeStepCount21.style.display = 'none';
        recipeStepCount22.style.display = 'none';
        recipeStepCount23.style.display = 'none';
        recipeStepCount24.style.display = 'none';
        recipeStepCount25.style.display = 'none';
        
    } else if (recipeStepCount > 11 ) {
        
        recipeStepCount1.style.display = 'block';
        recipeStepCount2.style.display = 'block';        
        recipeStepCount3.style.display = 'block';
        recipeStepCount4.style.display = 'block';
        recipeStepCount5.style.display = 'block';
        recipeStepCount6.style.display = 'block';
        recipeStepCount7.style.display = 'block';
        recipeStepCount8.style.display = 'block';
        recipeStepCount9.style.display = 'block';
        recipeStepCount10.style.display = 'block';
        recipeStepCount11.style.display = 'block';
        recipeStepCount12.style.display = 'block';
        recipeStepCount13.style.display = 'none';
        recipeStepCount14.style.display = 'none';
        recipeStepCount15.style.display = 'none';
        recipeStepCount16.style.display = 'none';
        recipeStepCount17.style.display = 'none';
        recipeStepCount18.style.display = 'none';
        recipeStepCount19.style.display = 'none';
        recipeStepCount20.style.display = 'none';
        recipeStepCount21.style.display = 'none';
        recipeStepCount22.style.display = 'none';
        recipeStepCount23.style.display = 'none';
        recipeStepCount24.style.display = 'none';
        recipeStepCount25.style.display = 'none';
        
    } else if (recipeStepCount > 10 ) {
        
        recipeStepCount1.style.display = 'block';
        recipeStepCount2.style.display = 'block';        
        recipeStepCount3.style.display = 'block';
        recipeStepCount4.style.display = 'block';
        recipeStepCount5.style.display = 'block';
        recipeStepCount6.style.display = 'block';
        recipeStepCount7.style.display = 'block';
        recipeStepCount8.style.display = 'block';
        recipeStepCount9.style.display = 'block';
        recipeStepCount10.style.display = 'block';
        recipeStepCount11.style.display = 'block';
        recipeStepCount12.style.display = 'none';
        recipeStepCount13.style.display = 'none';
        recipeStepCount14.style.display = 'none';
        recipeStepCount15.style.display = 'none';
        recipeStepCount16.style.display = 'none';
        recipeStepCount17.style.display = 'none';
        recipeStepCount18.style.display = 'none';
        recipeStepCount19.style.display = 'none';
        recipeStepCount20.style.display = 'none';
        recipeStepCount21.style.display = 'none';
        recipeStepCount22.style.display = 'none';
        recipeStepCount23.style.display = 'none';
        recipeStepCount24.style.display = 'none';
        recipeStepCount25.style.display = 'none';
        
    } else if (recipeStepCount > 9 ) {
        
        recipeStepCount1.style.display = 'block';
        recipeStepCount2.style.display = 'block';        
        recipeStepCount3.style.display = 'block';
        recipeStepCount4.style.display = 'block';
        recipeStepCount5.style.display = 'block';
        recipeStepCount6.style.display = 'block';
        recipeStepCount7.style.display = 'block';
        recipeStepCount8.style.display = 'block';
        recipeStepCount9.style.display = 'block';
        recipeStepCount10.style.display = 'block';
        recipeStepCount11.style.display = 'none';
        recipeStepCount12.style.display = 'none';
        recipeStepCount13.style.display = 'none';
        recipeStepCount14.style.display = 'none';
        recipeStepCount15.style.display = 'none';
        recipeStepCount16.style.display = 'none';
        recipeStepCount17.style.display = 'none';
        recipeStepCount18.style.display = 'none';
        recipeStepCount19.style.display = 'none';
        recipeStepCount20.style.display = 'none';
        recipeStepCount21.style.display = 'none';
        recipeStepCount22.style.display = 'none';
        recipeStepCount23.style.display = 'none';
        recipeStepCount24.style.display = 'none';
        recipeStepCount25.style.display = 'none';
        
    } else if (recipeStepCount > 8 ) {
        
        recipeStepCount1.style.display = 'block';
        recipeStepCount2.style.display = 'block';        
        recipeStepCount3.style.display = 'block';
        recipeStepCount4.style.display = 'block';
        recipeStepCount5.style.display = 'block';
        recipeStepCount6.style.display = 'block';
        recipeStepCount7.style.display = 'block';
        recipeStepCount8.style.display = 'block';
        recipeStepCount9.style.display = 'block';
        recipeStepCount10.style.display = 'none';
        recipeStepCount11.style.display = 'none';
        recipeStepCount12.style.display = 'none';
        recipeStepCount13.style.display = 'none';
        recipeStepCount14.style.display = 'none';
        recipeStepCount15.style.display = 'none';
        recipeStepCount16.style.display = 'none';
        recipeStepCount17.style.display = 'none';
        recipeStepCount18.style.display = 'none';
        recipeStepCount19.style.display = 'none';
        recipeStepCount20.style.display = 'none';
        recipeStepCount21.style.display = 'none';
        recipeStepCount22.style.display = 'none';
        recipeStepCount23.style.display = 'none';
        recipeStepCount24.style.display = 'none';
        recipeStepCount25.style.display = 'none';
        
    } else if (recipeStepCount > 7 ) {
        
        recipeStepCount1.style.display = 'block';
        recipeStepCount2.style.display = 'block';        
        recipeStepCount3.style.display = 'block';
        recipeStepCount4.style.display = 'block';
        recipeStepCount5.style.display = 'block';
        recipeStepCount6.style.display = 'block';
        recipeStepCount7.style.display = 'block';
        recipeStepCount8.style.display = 'block';
        recipeStepCount9.style.display = 'none';
        recipeStepCount10.style.display = 'none';
        recipeStepCount11.style.display = 'none';
        recipeStepCount12.style.display = 'none';
        recipeStepCount13.style.display = 'none';
        recipeStepCount14.style.display = 'none';
        recipeStepCount15.style.display = 'none';
        recipeStepCount16.style.display = 'none';
        recipeStepCount17.style.display = 'none';
        recipeStepCount18.style.display = 'none';
        recipeStepCount19.style.display = 'none';
        recipeStepCount20.style.display = 'none';
        recipeStepCount21.style.display = 'none';
        recipeStepCount22.style.display = 'none';
        recipeStepCount23.style.display = 'none';
        recipeStepCount24.style.display = 'none';
        recipeStepCount25.style.display = 'none';
        
    } else if (recipeStepCount > 6 ) {
        
        recipeStepCount1.style.display = 'block';
        recipeStepCount2.style.display = 'block';        
        recipeStepCount3.style.display = 'block';
        recipeStepCount4.style.display = 'block';
        recipeStepCount5.style.display = 'block';
        recipeStepCount6.style.display = 'block';
        recipeStepCount7.style.display = 'block';
        recipeStepCount8.style.display = 'none';
        recipeStepCount9.style.display = 'none';
        recipeStepCount10.style.display = 'none';
        recipeStepCount11.style.display = 'none';
        recipeStepCount12.style.display = 'none';
        recipeStepCount13.style.display = 'none';
        recipeStepCount14.style.display = 'none';
        recipeStepCount15.style.display = 'none';
        recipeStepCount16.style.display = 'none';
        recipeStepCount17.style.display = 'none';
        recipeStepCount18.style.display = 'none';
        recipeStepCount19.style.display = 'none';
        recipeStepCount20.style.display = 'none';
        recipeStepCount21.style.display = 'none';
        recipeStepCount22.style.display = 'none';
        recipeStepCount23.style.display = 'none';
        recipeStepCount24.style.display = 'none';
        recipeStepCount25.style.display = 'none';
        
    } else if (recipeStepCount > 5 ) {
        
        recipeStepCount1.style.display = 'block';
        recipeStepCount2.style.display = 'block';        
        recipeStepCount3.style.display = 'block';
        recipeStepCount4.style.display = 'block';
        recipeStepCount5.style.display = 'block';
        recipeStepCount6.style.display = 'block';
        recipeStepCount7.style.display = 'none';
        recipeStepCount8.style.display = 'none';
        recipeStepCount9.style.display = 'none';
        recipeStepCount10.style.display = 'none';
        recipeStepCount11.style.display = 'none';
        recipeStepCount12.style.display = 'none';
        recipeStepCount13.style.display = 'none';
        recipeStepCount14.style.display = 'none';
        recipeStepCount15.style.display = 'none';
        recipeStepCount16.style.display = 'none';
        recipeStepCount17.style.display = 'none';
        recipeStepCount18.style.display = 'none';
        recipeStepCount19.style.display = 'none';
        recipeStepCount20.style.display = 'none';
        recipeStepCount21.style.display = 'none';
        recipeStepCount22.style.display = 'none';
        recipeStepCount23.style.display = 'none';
        recipeStepCount24.style.display = 'none';
        recipeStepCount25.style.display = 'none';
        
    } else if (recipeStepCount > 4 ) {
        
        recipeStepCount1.style.display = 'block';
        recipeStepCount2.style.display = 'block';        
        recipeStepCount3.style.display = 'block';
        recipeStepCount4.style.display = 'block';
        recipeStepCount5.style.display = 'block';
        recipeStepCount6.style.display = 'none';
        recipeStepCount7.style.display = 'none';
        recipeStepCount8.style.display = 'none';
        recipeStepCount9.style.display = 'none';
        recipeStepCount10.style.display = 'none';
        recipeStepCount11.style.display = 'none';
        recipeStepCount12.style.display = 'none';
        recipeStepCount13.style.display = 'none';
        recipeStepCount14.style.display = 'none';
        recipeStepCount15.style.display = 'none';
        recipeStepCount16.style.display = 'none';
        recipeStepCount17.style.display = 'none';
        recipeStepCount18.style.display = 'none';
        recipeStepCount19.style.display = 'none';
        recipeStepCount20.style.display = 'none';
        recipeStepCount21.style.display = 'none';
        recipeStepCount22.style.display = 'none';
        recipeStepCount23.style.display = 'none';
        recipeStepCount24.style.display = 'none';
        recipeStepCount25.style.display = 'none';
        
    }  else if (recipeStepCount > 3 ) {
        
        recipeStepCount1.style.display = 'block';
        recipeStepCount2.style.display = 'block';        
        recipeStepCount3.style.display = 'block';
        recipeStepCount4.style.display = 'block';
        recipeStepCount5.style.display = 'none';
        recipeStepCount6.style.display = 'none';
        recipeStepCount7.style.display = 'none';
        recipeStepCount8.style.display = 'none';
        recipeStepCount9.style.display = 'none';
        recipeStepCount10.style.display = 'none';
        recipeStepCount11.style.display = 'none';
        recipeStepCount12.style.display = 'none';
        recipeStepCount13.style.display = 'none';
        recipeStepCount14.style.display = 'none';
        recipeStepCount15.style.display = 'none';
        recipeStepCount16.style.display = 'none';
        recipeStepCount17.style.display = 'none';
        recipeStepCount18.style.display = 'none';
        recipeStepCount19.style.display = 'none';
        recipeStepCount20.style.display = 'none';
        recipeStepCount21.style.display = 'none';
        recipeStepCount22.style.display = 'none';
        recipeStepCount23.style.display = 'none';
        recipeStepCount24.style.display = 'none';
        recipeStepCount25.style.display = 'none';
        
    }else if (recipeStepCount > 2 ) {
        
        recipeStepCount1.style.display = 'block';
        recipeStepCount2.style.display = 'block';        
        recipeStepCount3.style.display = 'block';
        recipeStepCount4.style.display = 'none';
        recipeStepCount5.style.display = 'none';
        recipeStepCount6.style.display = 'none';
        recipeStepCount7.style.display = 'none';
        recipeStepCount8.style.display = 'none';
        recipeStepCount9.style.display = 'none';
        recipeStepCount10.style.display = 'none';
        recipeStepCount11.style.display = 'none';
        recipeStepCount12.style.display = 'none';
        recipeStepCount13.style.display = 'none';
        recipeStepCount14.style.display = 'none';
        recipeStepCount15.style.display = 'none';
        recipeStepCount16.style.display = 'none';
        recipeStepCount17.style.display = 'none';
        recipeStepCount18.style.display = 'none';
        recipeStepCount19.style.display = 'none';
        recipeStepCount20.style.display = 'none';
        recipeStepCount21.style.display = 'none';
        recipeStepCount22.style.display = 'none';
        recipeStepCount23.style.display = 'none';
        recipeStepCount24.style.display = 'none';
        recipeStepCount25.style.display = 'none';
        
    } else if (recipeStepCount > 1 ) {
        
        recipeStepCount1.style.display = 'block';
        recipeStepCount2.style.display = 'block';        
        recipeStepCount3.style.display = 'none';
        recipeStepCount4.style.display = 'none';
        recipeStepCount5.style.display = 'none';
        recipeStepCount6.style.display = 'none';
        recipeStepCount7.style.display = 'none';
        recipeStepCount8.style.display = 'none';
        recipeStepCount9.style.display = 'none';
        recipeStepCount10.style.display = 'none';
        recipeStepCount11.style.display = 'none';
        recipeStepCount12.style.display = 'none';
        recipeStepCount13.style.display = 'none';
        recipeStepCount14.style.display = 'none';
        recipeStepCount15.style.display = 'none';
        recipeStepCount16.style.display = 'none';
        recipeStepCount17.style.display = 'none';
        recipeStepCount18.style.display = 'none';
        recipeStepCount19.style.display = 'none';
        recipeStepCount20.style.display = 'none';
        recipeStepCount21.style.display = 'none';
        recipeStepCount22.style.display = 'none';
        recipeStepCount23.style.display = 'none';
        recipeStepCount24.style.display = 'none';
        recipeStepCount25.style.display = 'none';
        
    } else if (recipeStepCount > 0 ) {
        
        recipeStepCount1.style.display = 'block';
        recipeStepCount2.style.display = 'none';        
        recipeStepCount3.style.display = 'none';
        recipeStepCount4.style.display = 'none';
        recipeStepCount5.style.display = 'none';
        recipeStepCount6.style.display = 'none';
        recipeStepCount7.style.display = 'none';
        recipeStepCount8.style.display = 'none';
        recipeStepCount9.style.display = 'none';
        recipeStepCount10.style.display = 'none';
        recipeStepCount11.style.display = 'none';
        recipeStepCount12.style.display = 'none';
        recipeStepCount13.style.display = 'none';
        recipeStepCount14.style.display = 'none';
        recipeStepCount15.style.display = 'none';
        recipeStepCount16.style.display = 'none';
        recipeStepCount17.style.display = 'none';
        recipeStepCount18.style.display = 'none';
        recipeStepCount19.style.display = 'none';
        recipeStepCount20.style.display = 'none';
        recipeStepCount21.style.display = 'none';
        recipeStepCount22.style.display = 'none';
        recipeStepCount23.style.display = 'none';
        recipeStepCount24.style.display = 'none';
        recipeStepCount25.style.display = 'none';
        
    } else if (recipeStepCount == 0 ) {
        
        recipeStepCount1.style.display = 'none';
        recipeStepCount2.style.display = 'none';        
        recipeStepCount3.style.display = 'none';
        recipeStepCount4.style.display = 'none';
        recipeStepCount5.style.display = 'none';
        recipeStepCount6.style.display = 'none';
        recipeStepCount7.style.display = 'none';
        recipeStepCount8.style.display = 'none';
        recipeStepCount9.style.display = 'none';
        recipeStepCount10.style.display = 'none';
        recipeStepCount11.style.display = 'none';
        recipeStepCount12.style.display = 'none';
        recipeStepCount13.style.display = 'none';
        recipeStepCount14.style.display = 'none';
        recipeStepCount15.style.display = 'none';
        recipeStepCount16.style.display = 'none';
        recipeStepCount17.style.display = 'none';
        recipeStepCount18.style.display = 'none';
        recipeStepCount19.style.display = 'none';
        recipeStepCount20.style.display = 'none';
        recipeStepCount21.style.display = 'none';
        recipeStepCount22.style.display = 'none';
        recipeStepCount23.style.display = 'none';
        recipeStepCount24.style.display = 'none';
        recipeStepCount25.style.display = 'none';
        
    }

})

})

// Deal with removing the text from hidden inputs on all inputs for steps on recipe schema
recipeIncludedsteps.addEventListener('click', function handleChangingText() {
    
    const recipeStep1 = document.getElementById('essdrs_schema_recipe_step_1');
    const recipeStep2 = document.getElementById('essdrs_schema_recipe_step_2');
    const recipeStep3 = document.getElementById('essdrs_schema_recipe_step_3');
    const recipeStep4 = document.getElementById('essdrs_schema_recipe_step_4');    
    const recipeStep5 = document.getElementById('essdrs_schema_recipe_step_5');    
    const recipeStep6 = document.getElementById('essdrs_schema_recipe_step_6');
    const recipeStep7 = document.getElementById('essdrs_schema_recipe_step_5');
    const recipeStep8 = document.getElementById('essdrs_schema_recipe_step_8');
    const recipeStep9 = document.getElementById('essdrs_schema_recipe_step_9');    
    const recipeStep10 = document.getElementById('essdrs_schema_recipe_step_10');     
    const recipeStep11 = document.getElementById('essdrs_schema_recipe_step_11');
    const recipeStep12 = document.getElementById('essdrs_schema_recipe_step_12');
    const recipeStep13 = document.getElementById('essdrs_schema_recipe_step_13');
    const recipeStep14 = document.getElementById('essdrs_schema_recipe_step_14');    
    const recipeStep15 = document.getElementById('essdrs_schema_recipe_step_15');     
    const recipeStep16 = document.getElementById('essdrs_schema_recipe_step_16');
    const recipeStep17 = document.getElementById('essdrs_schema_recipe_step_17');
    const recipeStep18 = document.getElementById('essdrs_schema_recipe_step_18');
    const recipeStep19 = document.getElementById('essdrs_schema_recipe_step_19');    
    const recipeStep20 = document.getElementById('essdrs_schema_recipe_step_20');     
    const recipeStep21 = document.getElementById('essdrs_schema_recipe_step_21');
    const recipeStep22 = document.getElementById('essdrs_schema_recipe_step_22');
    const recipeStep23 = document.getElementById('essdrs_schema_recipe_step_23');
    const recipeStep24 = document.getElementById('essdrs_schema_recipe_step_24');    
    const recipeStep25 = document.getElementById('essdrs_schema_recipe_step_25');     
    
[recipeStep1, recipeStep2, recipeStep3, recipeStep4, recipeStep5,
recipeStep6, recipeStep7, recipeStep8, recipeStep9, recipeStep10,
recipeStep11, recipeStep12, recipeStep13, recipeStep14, recipeStep15,
recipeStep16, recipeStep17, recipeStep18, recipeStep19, recipeStep20,
recipeStep21, recipeStep22, recipeStep23, recipeStep24, recipeStep25].forEach(item => {
    
    if (item.style.display == 'none') {
        
        var recipeUrlInputs = item.querySelectorAll("input").forEach(item => {
            item.value = '';
        })
        
    }
    
})

})

// Recipe video options show and hide 
var essdrs_recipe_schema_tab_item = document.getElementById("essdrs_recipe_tab_heading");
var essdrs_video_status = document.getElementById("essdrs_recipe_video_active");
var essdrs_video_url = document.getElementById("essdrs_recipe_video_option_url");
var essdrs_video_embed = document.getElementById("essdrs_recipe_video_option_embed");

essdrs_recipe_schema_tab_item.addEventListener('click', function handleHideReview() {
    
    if (document.querySelector('#essdrs_recipe_video_active:checked') ) {
   
        essdrs_video_url.style.display = 'block';
        essdrs_video_embed.style.display = 'block'; 
        
    } else {
        
        essdrs_video_url.style.display = 'none';
        essdrs_video_embed.style.display = 'none';
        
    }    
    
})

essdrs_video_status.addEventListener('change', function handleHideVideo() {
    
    if (document.querySelector('#essdrs_recipe_video_active:checked') ) {
        
        if (essdrs_video_url.style.display = 'none') {
        
            essdrs_video_url.style.display = 'block';
            essdrs_video_embed.style.display = 'block'; 
                
        } 
        
    } else {
        
        essdrs_video_url.style.display = 'none';
        essdrs_video_embed.style.display = 'none';
        
    }
    
})

// Recipe review options show and hide 
var essdrs_recipe_schema_tab_item = document.getElementById("essdrs_recipe_tab_heading");
var essdrs_review_status = document.getElementById("essdrs_recipe_rating_active");
var essdrs_recipe_rating_value = document.getElementById("essdrs_recipe_rating_value");
var essdrs_recipe_rating_amount = document.getElementById("essdrs_recipe_rating_amount");

essdrs_recipe_schema_tab_item.addEventListener('click', function handleHideReview() {
    
    if (document.querySelector('#essdrs_recipe_rating_active:checked') ) {
   
        essdrs_recipe_rating_value.style.display = 'block';
        essdrs_recipe_rating_amount.style.display = 'block'; 
            
    } else {
        
        essdrs_recipe_rating_value.style.display = 'none';
        essdrs_recipe_rating_amount.style.display = 'none';
        
    }    
    
})

essdrs_review_status.addEventListener('change', function handleHideReview() {

    if (document.querySelector('#essdrs_recipe_rating_active:checked') ) {
        
        if (essdrs_recipe_rating_value.style.display = 'none') {
        
            essdrs_recipe_rating_value.style.display = 'block';
            essdrs_recipe_rating_amount.style.display = 'block'; 
                
        } 
        
    } else {
        
        essdrs_recipe_rating_value.style.display = 'none';
        essdrs_recipe_rating_amount.style.display = 'none';
        
    }
    
})

// Job posting schema remote job show and hide fields
// when tab is clicked -> make sure hidden if toggle on 

var essdrs_job_tab_heading = document.getElementById("essdrs_job_tab_heading");

essdrs_job_tab_heading.addEventListener('click', function handleHideReview() {
    
    var essdrs_job_posting_schema_regional_toggle_fields = document.getElementById("essdrs_job_posting_schema_regional_toggle_fields")
    
    if (document.querySelector('#essdrs_job_remote:checked') ) {

        essdrs_job_posting_schema_regional_toggle_fields.style.display = 'none';
 
    } else {
        
        essdrs_job_posting_schema_regional_toggle_fields.style.display = 'block';
        
    }    
    
})

// toggle listener for remote job fields
var essdrs_job_posting_checkbox = document.getElementById("essdrs_job_remote");

essdrs_job_posting_checkbox.addEventListener('change', function handleHideReview() {
    
    var essdrs_job_posting_schema_regional_toggle_fields = document.getElementById("essdrs_job_posting_schema_regional_toggle_fields");

    if (document.querySelector('#essdrs_job_remote:checked') ) {
        
        essdrs_job_posting_schema_regional_toggle_fields.style.display = 'none';
        
    } else {
        
        essdrs_job_posting_schema_regional_toggle_fields.style.display = 'block';

    }
    
})


// Person schema media links show / hide if checked / unchecked
// when tab is clicked -> make sure hidden if toggle on 
var essdrs_person_tab_heading = document.getElementById("essdrs_person_tab_heading");
essdrs_person_tab_heading.addEventListener('click', function handleHideMediaLinks() {
    
    var essdrs_facebook_link_field = document.getElementById("essdrs_facebook_link_field")
    
    if (document.querySelector('#essdrs_person_facebook:checked') ) {

        essdrs_facebook_link_field.style.display = 'block';
 
    } else {
        
        essdrs_facebook_link_field.style.display = 'none';
        
    }    
    
    var essdrs_twitter_link_field = document.getElementById("essdrs_twitter_link_field")
    
    if (document.querySelector('#essdrs_person_twitter:checked') ) {

        essdrs_twitter_link_field.style.display = 'block';
 
    } else {
        
        essdrs_twitter_link_field.style.display = 'none';
        
    } 
    
    var essdrs_instagram_link_field = document.getElementById("essdrs_instagram_link_field")
    
    if (document.querySelector('#essdrs_person_instagram:checked') ) {

        essdrs_instagram_link_field.style.display = 'block';
 
    } else {
        
        essdrs_instagram_link_field.style.display = 'none';
        
    } 
    
    var essdrs_youtube_link_field = document.getElementById("essdrs_youtube_link_field")
    
    if (document.querySelector('#essdrs_person_youtube:checked') ) {

        essdrs_youtube_link_field.style.display = 'block';
 
    } else {
        
        essdrs_youtube_link_field.style.display = 'none';
        
    }
    
    var essdrs_linkedin_link_field = document.getElementById("essdrs_linkedin_link_field")
    
    if (document.querySelector('#essdrs_person_linkedin:checked') ) {

        essdrs_linkedin_link_field.style.display = 'block';
 
    } else {
        
        essdrs_linkedin_link_field.style.display = 'none';
        
    }
    
    var essdrs_pinterest_link_field = document.getElementById("essdrs_pinterest_link_field")
    
    if (document.querySelector('#essdrs_person_pinterest:checked') ) {

        essdrs_pinterest_link_field.style.display = 'block';
 
    } else {
        
        essdrs_pinterest_link_field.style.display = 'none';
        
    }
    
    var essdrs_wikipedia_link_field = document.getElementById("essdrs_wikipedia_link_field")
    
    if (document.querySelector('#essdrs_person_wikipedia:checked') ) {

        essdrs_wikipedia_link_field.style.display = 'block';
 
    } else {
        
        essdrs_wikipedia_link_field.style.display = 'none';
        
    }
    
    var essdrs_github_link_field = document.getElementById("essdrs_github_link_field")
    
    if (document.querySelector('#essdrs_person_github:checked') ) {

        essdrs_github_link_field.style.display = 'block';
 
    } else {
        
        essdrs_github_link_field.style.display = 'none';
        
    }
    
    var essdrs_website_link_field = document.getElementById("essdrs_website_link_field")
    
    if (document.querySelector('#essdrs_person_website:checked') ) {

        essdrs_website_link_field.style.display = 'block';
 
    } else {
        
        essdrs_website_link_field.style.display = 'none';
        
    }
    
})

// toggle listener for person schema media link fields
var essdrs_person_facebook = document.getElementById("essdrs_person_facebook");
essdrs_person_facebook.addEventListener('change', function handleHideMediaLinks() {
    
    var essdrs_facebook_link_field = document.getElementById("essdrs_facebook_link_field");

    if (document.querySelector('#essdrs_person_facebook:checked') ) {
        
        essdrs_facebook_link_field.style.display = 'block';
                
    } else {
        
        essdrs_facebook_link_field.style.display = 'none';
    }

})

var essdrs_person_twitter = document.getElementById("essdrs_person_twitter");
essdrs_person_twitter.addEventListener('change', function handleHideMediaLinks() {
    
    var essdrs_twitter_link_field = document.getElementById("essdrs_twitter_link_field");

    if (document.querySelector('#essdrs_person_twitter:checked') ) {
        
        essdrs_twitter_link_field.style.display = 'block';
                
    } else {
        
        essdrs_twitter_link_field.style.display = 'none';
    }

})

var essdrs_person_instagram = document.getElementById("essdrs_person_instagram");
essdrs_person_instagram.addEventListener('change', function handleHideMediaLinks() {
    
    var essdrs_instagram_link_field = document.getElementById("essdrs_instagram_link_field");

    if (document.querySelector('#essdrs_person_instagram:checked') ) {
        
        essdrs_instagram_link_field.style.display = 'block';
                
    } else {
        
        essdrs_instagram_link_field.style.display = 'none';
    }

})

var essdrs_person_youtube = document.getElementById("essdrs_person_youtube");
essdrs_person_youtube.addEventListener('change', function handleHideMediaLinks() {
    
    var essdrs_youtube_link_field = document.getElementById("essdrs_youtube_link_field");

    if (document.querySelector('#essdrs_person_youtube:checked') ) {
        
        essdrs_youtube_link_field.style.display = 'block';
                
    } else {
        
        essdrs_youtube_link_field.style.display = 'none';
    }

})

var essdrs_person_linkedin = document.getElementById("essdrs_person_linkedin");
essdrs_person_linkedin.addEventListener('change', function handleHideMediaLinks() {
    
    var essdrs_linkedin_link_field = document.getElementById("essdrs_linkedin_link_field");

    if (document.querySelector('#essdrs_person_linkedin:checked') ) {
        
        essdrs_linkedin_link_field.style.display = 'block';
                
    } else {
        
        essdrs_linkedin_link_field.style.display = 'none';
    }

})

var essdrs_person_pinterest = document.getElementById("essdrs_person_pinterest");
essdrs_person_pinterest.addEventListener('change', function handleHideMediaLinks() {
    
    var essdrs_pinterest_link_field = document.getElementById("essdrs_pinterest_link_field");

    if (document.querySelector('#essdrs_person_pinterest:checked') ) {
        
        essdrs_pinterest_link_field.style.display = 'block';
                
    } else {
        
        essdrs_pinterest_link_field.style.display = 'none';
    }

})

var essdrs_person_wikipedia = document.getElementById("essdrs_person_wikipedia");
essdrs_person_wikipedia.addEventListener('change', function handleHideMediaLinks() {
    
    var essdrs_wikipedia_link_field = document.getElementById("essdrs_wikipedia_link_field");

    if (document.querySelector('#essdrs_person_wikipedia:checked') ) {
        
        essdrs_wikipedia_link_field.style.display = 'block';
                
    } else {
        
        essdrs_wikipedia_link_field.style.display = 'none';
    }

})

var essdrs_person_github = document.getElementById("essdrs_person_github");
essdrs_person_github.addEventListener('change', function handleHideMediaLinks() {
    
    var essdrs_github_link_field = document.getElementById("essdrs_github_link_field");

    if (document.querySelector('#essdrs_person_github:checked') ) {
        
        essdrs_github_link_field.style.display = 'block';
                
    } else {
        
        essdrs_github_link_field.style.display = 'none';
    }

})

var essdrs_person_website = document.getElementById("essdrs_person_website");
essdrs_person_website.addEventListener('change', function handleHideMediaLinks() {
    
    var essdrs_website_link_field = document.getElementById("essdrs_website_link_field");

    if (document.querySelector('#essdrs_person_website:checked') ) {
        
        essdrs_website_link_field.style.display = 'block';
                
    } else {
        
        essdrs_website_link_field.style.display = 'none';
    }

})

// Events schema handle multivalue form show and hide etc.
// Show hide attendance fields when option is changed in the form

var essdrs_event_attendance = document.getElementById("essdrs_event_attendance");

essdrs_event_attendance.addEventListener('change', function handleHideAttendanceFields() {
    
    var essdrs_events_attendance_online_fields = document.getElementById("essdrs-events-attendance-online-wrapper");
    var essdrs_events_attendance_offline_fields = document.getElementById("essdrs-events-attendance-offline-wrapper");
    var essdrs_event_attendance_value = document.querySelector('#essdrs_event_attendance').value;

    if ( essdrs_event_attendance_value == 'Online' ) {
        
        essdrs_events_attendance_online_fields.style.display = 'block';
        essdrs_events_attendance_offline_fields.style.display = 'none';
        
    } else if ( essdrs_event_attendance_value == 'Offline' ) {
        
        essdrs_events_attendance_online_fields.style.display = 'none';
        essdrs_events_attendance_offline_fields.style.display = 'block';        
        
    } else if ( essdrs_event_attendance_value == 'Mixed' ){
        
        essdrs_events_attendance_online_fields.style.display = 'block';
        essdrs_events_attendance_offline_fields.style.display = 'block'; 
        
    }

})

// Show hide attendance fields when events tab is clicked based on current value
var essdrs_events_tab_heading = document.getElementById("essdrs_events_tab_heading");

essdrs_events_tab_heading.addEventListener('click', function handleHideAttendanceFields() {
    
    var essdrs_events_attendance_online_fields = document.getElementById("essdrs-events-attendance-online-wrapper");
    var essdrs_events_attendance_offline_fields = document.getElementById("essdrs-events-attendance-offline-wrapper");
    
    var essdrs_event_attendance_value = document.querySelector('#essdrs_event_attendance').value;

    if ( essdrs_event_attendance_value == 'Online' ) {
        
        essdrs_events_attendance_online_fields.style.display = 'block';
        essdrs_events_attendance_offline_fields.style.display = 'none';
        
    } else if ( essdrs_event_attendance_value == 'Offline' ) {
        
        essdrs_events_attendance_online_fields.style.display = 'none';
        essdrs_events_attendance_offline_fields.style.display = 'block';        
        
    } else if ( essdrs_event_attendance_value == 'Mixed' ){
        
        essdrs_events_attendance_online_fields.style.display = 'block';
        essdrs_events_attendance_offline_fields.style.display = 'block'; 
        
    }

})

// Show hide performer name field when option is changed in the form

var essdrs_performer_type = document.getElementById("essdrs_performer_type");

essdrs_performer_type.addEventListener('change', function handleHidePerformer() {
    
    var essdrs_events_performer_name = document.getElementById("essdrs_events_performer_name");
    var essdrs_performer_type_value = document.querySelector('#essdrs_performer_type').value;

    if ( essdrs_performer_type_value != 'None' ) {
        
        essdrs_events_performer_name.style.display = 'block';
        
    } else if ( essdrs_performer_type_value == 'None' ) {
        
        essdrs_events_performer_name.style.display = 'none';        
        
    }

})

// Show hide performer name field when events tab is clicked based on current value
var essdrs_events_tab_heading = document.getElementById("essdrs_events_tab_heading");

essdrs_events_tab_heading.addEventListener('click', function handleHidePerformer() {
    
    var essdrs_events_performer_name = document.getElementById("essdrs_events_performer_name");
    var essdrs_performer_type_value = document.querySelector('#essdrs_performer_type').value;

    if ( essdrs_performer_type_value != 'None' ) {
        
        essdrs_events_performer_name.style.display = 'block';
        
    } else if ( essdrs_performer_type_value == 'None' ) {
        
        essdrs_events_performer_name.style.display = 'none';        
        
    }

})

// Show hide organizer fields when option is changed in the form
var essdrs_organizer_type = document.getElementById("essdrs_organizer_type");

essdrs_organizer_type.addEventListener('change', function handleHideOrganizer() {
    
    var essdrs_events_organizer_name = document.getElementById("essdrs_events_organizer_name");
    var essdrs_events_organizer_url = document.getElementById("essdrs_events_organizer_url");
    var essdrs_organizer_type_value = document.querySelector('#essdrs_organizer_type').value;

    if ( essdrs_organizer_type_value != 'No' ) {
        
        essdrs_events_organizer_name.style.display = 'block';
        essdrs_events_organizer_url.style.display = 'block';

    } else if ( essdrs_organizer_type_value == 'No' ) {
        
        essdrs_events_organizer_name.style.display = 'none';
        essdrs_events_organizer_url.style.display = 'none';    

    }

})

// Show hide organizer fields when events tab is clicked based on current value
var essdrs_events_tab_heading = document.getElementById("essdrs_events_tab_heading");

essdrs_events_tab_heading.addEventListener('click', function handleHideOrganizer() {
    
    var essdrs_events_organizer_name = document.getElementById("essdrs_events_organizer_name");
    var essdrs_events_organizer_url = document.getElementById("essdrs_events_organizer_url");
    var essdrs_organizer_type_value = document.querySelector('#essdrs_organizer_type').value;

    if ( essdrs_organizer_type_value != 'No' ) {
        
        essdrs_events_organizer_name.style.display = 'block';
        essdrs_events_organizer_url.style.display = 'block';

    } else if ( essdrs_organizer_type_value == 'No' ) {
        
        essdrs_events_organizer_name.style.display = 'none';
        essdrs_events_organizer_url.style.display = 'none';    
        
    }

})


// Show hide ticket fields based on how many are currently selected

var essdrs_ticket_types = document.getElementById("essdrs_ticket_types");

essdrs_ticket_types.addEventListener('change', function handleHideTickets() {
    
    var essdrs_schema_event_ticket_1 = document.getElementById("essdrs_schema_event_ticket_1");
    var essdrs_schema_event_ticket_2 = document.getElementById("essdrs_schema_event_ticket_2");
    var essdrs_schema_event_ticket_3 = document.getElementById("essdrs_schema_event_ticket_3");    
    var essdrs_schema_event_ticket_4 = document.getElementById("essdrs_schema_event_ticket_4");    
    var essdrs_schema_event_ticket_5 = document.getElementById("essdrs_schema_event_ticket_5");    
    var essdrs_ticket_types_value = document.querySelector('#essdrs_ticket_types').value;

    if ( essdrs_ticket_types_value == 1 ) {
        
        essdrs_schema_event_ticket_1.style.display = 'block';
        essdrs_schema_event_ticket_2.style.display = 'none';
        essdrs_schema_event_ticket_3.style.display = 'none';
        essdrs_schema_event_ticket_4.style.display = 'none';
        essdrs_schema_event_ticket_5.style.display = 'none';
        
    } else if( essdrs_ticket_types_value == 2 ) {
        
        essdrs_schema_event_ticket_1.style.display = 'block';
        essdrs_schema_event_ticket_2.style.display = 'block';
        essdrs_schema_event_ticket_3.style.display = 'none';
        essdrs_schema_event_ticket_4.style.display = 'none';
        essdrs_schema_event_ticket_5.style.display = 'none';
        
    } else if( essdrs_ticket_types_value == 3 ) {
        
        essdrs_schema_event_ticket_1.style.display = 'block';
        essdrs_schema_event_ticket_2.style.display = 'block';
        essdrs_schema_event_ticket_3.style.display = 'block';
        essdrs_schema_event_ticket_4.style.display = 'none';
        essdrs_schema_event_ticket_5.style.display = 'none';
        
    } else if( essdrs_ticket_types_value == 4 ) {
        
        essdrs_schema_event_ticket_1.style.display = 'block';
        essdrs_schema_event_ticket_2.style.display = 'block';
        essdrs_schema_event_ticket_3.style.display = 'block';
        essdrs_schema_event_ticket_4.style.display = 'block';
        essdrs_schema_event_ticket_5.style.display = 'none';
        
    } else if( essdrs_ticket_types_value == 5 ) {
        
        essdrs_schema_event_ticket_1.style.display = 'block';
        essdrs_schema_event_ticket_2.style.display = 'block';
        essdrs_schema_event_ticket_3.style.display = 'block';
        essdrs_schema_event_ticket_4.style.display = 'block';
        essdrs_schema_event_ticket_5.style.display = 'block';
        
    }

})


// Show hide ticket fields based on how many are currently selected wehn tab clicked
var essdrs_events_tab_heading = document.getElementById("essdrs_events_tab_heading");

essdrs_events_tab_heading.addEventListener('click', function handleHideTickets() {
    
    var essdrs_schema_event_ticket_1 = document.getElementById("essdrs_schema_event_ticket_1");
    var essdrs_schema_event_ticket_2 = document.getElementById("essdrs_schema_event_ticket_2");
    var essdrs_schema_event_ticket_3 = document.getElementById("essdrs_schema_event_ticket_3");    
    var essdrs_schema_event_ticket_4 = document.getElementById("essdrs_schema_event_ticket_4");    
    var essdrs_schema_event_ticket_5 = document.getElementById("essdrs_schema_event_ticket_5");    
    var essdrs_ticket_types_value = document.querySelector('#essdrs_ticket_types').value;

    if ( essdrs_ticket_types_value == 1 ) {
        
        essdrs_schema_event_ticket_1.style.display = 'block';
        essdrs_schema_event_ticket_2.style.display = 'none';
        essdrs_schema_event_ticket_3.style.display = 'none';
        essdrs_schema_event_ticket_4.style.display = 'none';
        essdrs_schema_event_ticket_5.style.display = 'none';
        
    } else if( essdrs_ticket_types_value == 2 ) {
        
        essdrs_schema_event_ticket_1.style.display = 'block';
        essdrs_schema_event_ticket_2.style.display = 'block';
        essdrs_schema_event_ticket_3.style.display = 'none';
        essdrs_schema_event_ticket_4.style.display = 'none';
        essdrs_schema_event_ticket_5.style.display = 'none';
        
    } else if( essdrs_ticket_types_value == 3 ) {
        
        essdrs_schema_event_ticket_1.style.display = 'block';
        essdrs_schema_event_ticket_2.style.display = 'block';
        essdrs_schema_event_ticket_3.style.display = 'block';
        essdrs_schema_event_ticket_4.style.display = 'none';
        essdrs_schema_event_ticket_5.style.display = 'none';
        
    } else if( essdrs_ticket_types_value == 4 ) {
        
        essdrs_schema_event_ticket_1.style.display = 'block';
        essdrs_schema_event_ticket_2.style.display = 'block';
        essdrs_schema_event_ticket_3.style.display = 'block';
        essdrs_schema_event_ticket_4.style.display = 'block';
        essdrs_schema_event_ticket_5.style.display = 'none';
        
    } else if( essdrs_ticket_types_value == 5 ) {
        
        essdrs_schema_event_ticket_1.style.display = 'block';
        essdrs_schema_event_ticket_2.style.display = 'block';
        essdrs_schema_event_ticket_3.style.display = 'block';
        essdrs_schema_event_ticket_4.style.display = 'block';
        essdrs_schema_event_ticket_5.style.display = 'block';
        
    }

})