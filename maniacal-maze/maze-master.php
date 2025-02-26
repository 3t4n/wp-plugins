<link href="https://fonts.googleapis.com/css?family=Wallpoet" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Kanit:900" rel="stylesheet">
<style>
    .w3-myfont {
        font-family: 'Wallpoet', cursive;
    }
    
    .w3-myfont-button {
        font-family: 'Kanit', sans-serif;
    }
</style>
<div class=wrap>
    <div id="icon-options-general" class="icon32"></div>
    <h2>
        <?php _e( 'Maniacal Maze Random Maze Generator', 'maniacal_maze' ); ?>
    </h2>
</div>
<?php
if(!empty($this->error_msg))
{
?>
<div id="maniacal_maze_master" class="w3-container">
    <div class="w3-card-2 w3-hover-shadow w3-margin w3-round">
        <div class="w3-container w3-red w3-xxlarge w3-center">Error!</div>

        <div class="w3-padding w3-white w3-center">
            <?php echo $this->error_msg; ?>
        </div>
    </div>
</div>
<?php
}
?>

<div id="maniacal_maze_master" class="w3-container">
    <div class="w3-card-2 w3-hover-shadow w3-margin w3-round">
        <div class="w3-container w3-teal w3-xxlarge w3-center">Choose your settings!</div>
        <div class="w3-padding w3-blue-grey w3-center">Choose your settings below. You can choose how many cells wide and high your maze is!
        </div>
        <div class="w3-row w3-black">
            <div id="disp-cells" class="w3-col s12 m4 w3-myfont w3-black w3-text-green w3-center" style="font-size:10vh; line-height: 15vh;">
                <?php echo $this->min_cells; ?>
            </div>
            <div class="w3-col s12 m8 w3-light-grey">
                <div class="w3-cell-row" style="height:33.3%">
                    <div class="w3-cell w3-padding w3-center w3-amber w3-padding w3-hover-orange w3-text-white w3-myfont-button w3-xlarge" style="width:50%" id="MM_add1"><strong>ADD</strong>
                    </div>
                    <div class="w3-cell w3-padding w3-center w3-amber w3-padding w3-hover-orange w3-text-white w3-myfont-button w3-xlarge" style="width:50%" id="MM_add5"><strong>ADD 5</strong>
                    </div>
                </div>
                <div class="w3-cell-row" style="height:33.3%">
                        <div class="w3-cell w3-padding w3-center w3-amber w3-padding w3-hover-red w3-text-white w3-myfont-button w3-xlarge" style="width:50%" id="MM_min"><strong>MIN</strong>
                    </div>
                        <div class="w3-cell w3-padding w3-center w3-amber w3-padding w3-hover-green w3-text-white w3-myfont-button w3-xlarge" style="width:50%" id="MM_max"><strong>MAX</strong>
                    </div>
                </div>
                <div class="w3-cell-row" style="height:33.3%">
                    <div class="w3-cell w3-padding w3-center w3-amber w3-padding w3-hover-orange w3-text-white w3-myfont-button w3-xlarge" style="width:50%" id="MM_less1">
                        <strong>LESS</strong>
                    </div>
                    <div class="w3-cell w3-padding w3-center w3-amber w3-padding w3-hover-orange w3-text-white w3-myfont-button w3-xlarge" style="width:50%" id="MM_less5">
                        <strong>LESS 5</strong>
                    </div>
                </div>
            </div>
        </div>
        <div class="w3-container w3-teal w3-center">
            <div class="w3-button w3-margin w3-white w3-xlarge w3-round w3-hover-shadow" id="maze-submit">
                GO!
            </div>
        </div>
    </div>
</div>
<script>
    jQuery(window).load(function() {
        var disp_cells = jQuery('#maniacal_maze_master #disp-cells').html();
        jQuery('#maniacal_maze_master div#MM_add1').on('click', function() {
            disp_cells = check_int_cells( disp_cells );
            disp_cells += 1;
            disp_cells = check_in_range( disp_cells );
            change_display( disp_cells );
        });
        jQuery('#maniacal_maze_master div#MM_add5').on('click', function() {
            disp_cells = check_int_cells( disp_cells );
            disp_cells += 5;
            disp_cells = check_in_range( disp_cells );
            change_display( disp_cells );
        });
        jQuery('#maniacal_maze_master div#MM_less1').on('click', function() {
            disp_cells = check_int_cells( disp_cells );
            disp_cells -= 1;
            disp_cells = check_in_range( disp_cells );
            console.log(disp_cells);
            change_display( disp_cells );
        });
        jQuery('#maniacal_maze_master div#MM_less5').on('click', function() {
            disp_cells = check_int_cells( disp_cells );
            disp_cells -= 5;
            disp_cells = check_in_range( disp_cells );
            change_display( disp_cells );
        });
        jQuery('#maniacal_maze_master div#MM_min').on('click', function() {
            disp_cells = <?php echo $this->min_cells; ?>;
            change_display( disp_cells );
        });
        jQuery('#maniacal_maze_master div#MM_max').on('click', function() {
            disp_cells = <?php echo $this->max_cells; ?>;
            change_display( disp_cells );
        });
        
        jQuery('#maniacal_maze_master div#maze-submit').on('click', function() {

            if (typeof disp_cells == 'undefined') {
                disp_cells = '<?php echo $this->min_cells; ?>';
            } else if(parseInt(disp_cells) !== disp_cells || disp_cells < <?php echo $this->min_cells; ?> || disp_cells > <?php echo $this->max_cells; ?>) {
                disp_cells = '<?php echo $this->min_cells; ?>';
            }
            window.location = "?action=viewMaze&cell_count=" + disp_cells + "#maniacal-maze-measure";
        });
        
        function check_in_range( disp_cells ) {
            if (disp_cells > <?php echo $this->max_cells; ?>) {
                disp_cells = <?php echo $this->max_cells; ?>;
            }
            if (disp_cells < <?php echo $this->min_cells; ?>) {
                disp_cells = <?php echo $this->min_cells; ?>;
            }
                
            return disp_cells;
        }
        function change_display( disp_cells ) {
            jQuery('#maniacal_maze_master #disp-cells').html(disp_cells);
            jQuery('#maniacal_maze_master #disp-cells-val').attr('value', disp_cells);
        }
        
        function check_int_cells( disp_cells ) {
            if (parseInt(disp_cells) !== disp_cells) {
                disp_cells = <?php echo $this->min_cells; ?>;
            }
            return disp_cells;
        }     
    });
</script>