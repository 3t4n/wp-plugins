<div xmlns="http://www.w3.org/1999/html">
    <table class="widgetForm">
        <tr>
            <td>Title: </td>
            <td><input type="text" name="<?php echo $this->get_field_name( 'ptaTitle' ); ?>"value="<?php echo $instance["ptaTitle"] ?>"/></td>
        </tr>
        <tr>
            <td>Display horizontally: </td>
            <td>
                <input
                    type="checkbox"
                    name="<?php echo $this->get_field_name( 'ptaLayout' ); ?>"
                    value="horizontal"
                    <?php if($instance["ptaLayout"] === 'horizontal'){ echo 'checked="checked"'; } ?>
                />
            </td>
        </tr>
        <tr>
            <td>Select Theme: </td>
            <td>
                <select name="<?php echo $this->get_field_name( 'ptaWidgetTheme' ); ?>">
                    <option value="" <?php if($instance["ptaWidgetTheme"] === ''){ echo 'selected="selected"'; } ?>>Default</option>
                    <option value="noBorder" <?php if($instance["ptaWidgetTheme"] === 'noBorder'){ echo 'selected="selected"'; } ?>>No Border</option>
                    <option value="dark" <?php if($instance["ptaWidgetTheme"] === 'dark'){ echo 'selected="selected"'; } ?>>Dark</option>
                </select>
            </td>
        </tr>
        <tr>
            <td colspan="2"><hr></td>
        </tr>
        <tr>
            <td>Current location: </td>
            <td>
                <input
                    type="text"
                    name="<?php echo $this->get_field_name( 'ptaLocation' ); ?>"
                    placeholder="leave empty to auto detect"
                    title="Fill data by address, city, country, zipcode, place etc"
                    value="<?php echo $instance["ptaLocation"] ?>"
                />
            </td>
        </tr>

        <tr>
            <td colspan="2">Calculation method: </td>
        </tr>
        <tr>
            <td colspan="2">
                <select name="<?php echo $this->get_field_name( 'ptaMethod' ); ?>">
                    <option value=" " <?php if($instance["ptaMethod"] === ' '){ echo 'selected="selected"'; } ?>>Auto detect</option>
                    <option value="5" <?php if($instance["ptaMethod"] === '5'){ echo 'selected="selected"'; } ?>>Muslim World League</option>
                    <option value="1" <?php if($instance["ptaMethod"] === '1'){ echo 'selected="selected"'; } ?>>Egyptian General Authority of Survey</option>
                    <option value="2" <?php if($instance["ptaMethod"] === '2'){ echo 'selected="selected"'; } ?>>University Of Islamic Sciences, Karachi (Shafi)</option>
                    <option value="3" <?php if($instance["ptaMethod"] === '3'){ echo 'selected="selected"'; } ?>>University Of Islamic Sciences, Karachi (Hanafi) </option>
                    <option value="4" <?php if($instance["ptaMethod"] === '4'){ echo 'selected="selected"'; } ?>>Islamic Circle of North America</option>
                    <option value="6" <?php if($instance["ptaMethod"] === '6'){ echo 'selected="selected"'; } ?>>Umm Al-Qura</option>
                    <option value="7" <?php if($instance["ptaMethod"] === '7'){ echo 'selected="selected"'; } ?>>Fixed Isha</option>
                </select>
            </td>
        </tr>
    </table>
</div>
