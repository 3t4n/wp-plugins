<div class="bmi_container">
    <div>
        <h4>Body Mass Index (BMI) Calculator</h4>
    </div>
    <div>
        <label htmlFor='weight'>Weight: </label>
        <input id="valWeight" name='weight' placeholder="Your weight" /> 
        <select id="weight_unit" name="wu">
            <option value="kg">kg</option>
            <option value="pounds">lbs</option>
        </select>
    </div>  
    <div>
       <div class="height_first_column">
        <label htmlFor='heightFeet'>Height: </label>
       <input name="heightCm"  placeholder="Your height (cm)" id="heightCm" />
      </div>
       <div class="heightinch">
            <select id="valFeet"
                name='heightFeet'>
                <option value="3">3 Feet</option>
                <option value="4">4 Feet</option>
                <option value="5" selected>5 Feet</option>
                <option value="6">6 Feet</option>
                <option value="7">7 Feet</option>
            </select>&nbsp;
            <select id="valInch" name='heightInch' >
                <option value="0">0 Inch</option>
                <option value="1">1 Inch</option>
                <option value="2">2 Inch</option>
                <option value="3">3 Inch</option>
                <option value="4">4 Inch</option>
                <option value="5">5 Inch</option>
                <option value="6">6 Inch</option>
                <option value="7">7 Inch</option>
                <option value="8">8 Inch</option>
                <option value="9">9 Inch</option>
                <option value="10">10 Inch</option>
                <option value="11">11 Inch</option>
            </select>&nbsp;&nbsp;
    </div>
    <div class="height_third_column">
        <select name="height_unit" id="heightUnit">
         <option value="inch">Inch</option>
         <option value="cm">cm</option>
        </select>
     </div>
</div>
<div>
    <button id="bmi_result" class="sb_btn">Calculate</button>
</div>
<div class="bmi_message">
    
</div>
 
</div>