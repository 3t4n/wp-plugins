<script>
    cell_pixels = <?php echo $this->cell_pixels; ?>;
    cell_wall = <?php echo $this->cell_wall; ?>;
    cell_count = <?php echo $this->cell_count; ?>;
    jQuery(function($) {
        
        $(document).ready(function() {
            curW = 1;
            curH = 1;
            maze = [];
            dones = [];
            canvas = document.getElementById("myCanvas");
            ctx = canvas.getContext("2d");
            <?php
            $maze = $this->make_maze( $this->cell_count, $this->cell_count );
            
            
            for($w=1; $w<=$this->cell_count; $w++) {
                
                $line = array();
                $done_line = array();
                
                for($h=1; $h<=$this->cell_count; $h++) {
                    $line[] = $maze[$w][$h];
                    $done_line[] = '0';
                } # END for($h=1; $h<=$this->cell_count; $h++)
                
                $final = implode( ',', $line);
                $done_final = implode( ',', $done_line );
                
                echo "  maze[{$w}]=[{$final}]; \r\n";
                echo "  dones[{$w}]=[{$done_final}]; \r\n";
                
            } # END for($w=1; $w<$this->cell_count; $w++)
            ?>
            $(window).resize(function() {
                checkViewport();
            });
            
            checkViewport();            
            draw_blank();
            draw_cell();
            
            $("#myCanvas").on('click', function() {
                var rect = canvas.getBoundingClientRect();
                
                var x = event.clientX - rect.left
                var y = event.clientY - rect.top;
                
                var clickW = Math.ceil((x/rect.width)*cell_count);
                var clickH = Math.ceil((y/rect.height)*cell_count);

                if( clickW == curW+1 ) {
                    move_right();
                    
                } else if( clickW == curW-1 ) {
                    move_left();
                    
                } else if( clickH == curH+1 ) {
                    move_down();
                   
                } else if( clickH == curH-1 ) {
                    move_up();
                   
                }
                draw_cell();
            });
            $(document).keydown(function(e) {
                switch(e.which) {
                    case 37: // left
                        move_left();
                        break;
                        
                    case 38: // up
                        move_up();
                        break;
                        
                    case 39: // right
                        move_right();
                        break;
                        
                    case 40: // down
                        move_down();
                        break;
                        
                    default: 
                        return; // exit this handler for other keys
                        break;
                }
                
                draw_cell();
                e.preventDefault(); // prevent the default action (scroll / move caret)
            });
        
            function move_down() {
                if(!(4 & maze[curW][curH-1])) {
                    return false;
                }
                if( curH >= cell_count ) {
                   curH = cell_count;
                } else {
                    blank_cell();
                   curH++;
                }
            }
            function move_up() {
                if(!(1 & maze[curW][curH-1])) {
                    return false;
                }
                if( curH <= 1 ) {
                    curH = 1;
                } else {
                    blank_cell();
                    curH--;
                }                
            }
            function move_right() {
                if(!(2 & maze[curW][curH-1])) {
                    return false;
                }
                if( curW >= cell_count ) {
                    curW = cell_count;
                } else {
                    blank_cell();
                    curW++;
                }
            }
            function move_left() {
                if(!(8 & maze[curW][curH-1])) {
                    return false;
                }
                if( curW <= 1 ) {
                    curW = 1;
                } else {
                    blank_cell();
                    curW--;
                }                
            }

            function draw_blank() {
                for( w=1; w<=cell_count;w++) {
                    for( h=1; h<=cell_count;h++) {
                        var base_color = "#666";
                        if(w==1 && h==1) {
                            base_color = "#090";
                        }
                        if(w==cell_count && h==cell_count ) {
                            base_color = "#900";
                        }
                        var offsetW    = ((w-1)*cell_pixels)+cell_wall;
                        var offsetH    = ((h-1)*cell_pixels)+cell_wall;
                        
                        ctx.fillStyle = "#777";
                        ctx.fillRect(offsetW, offsetH, cell_pixels, cell_pixels );
                        
                        ctx.fillStyle = base_color;
                        ctx.fillRect(offsetW+cell_wall, offsetH+cell_wall, cell_pixels-(cell_wall*2), cell_pixels -(cell_wall*2) );
                    }
                }
                
            }
            function blank_cell() {
                var offsetW    = ((curW-1)*cell_pixels)+cell_wall;
                var offsetH    = ((curH-1)*cell_pixels)+cell_wall;
                ground_color = "#FFF";
                if(curW==1 && curH==1) {
                    ground_color = "#090";
                }
                if(curW==cell_count && curH==cell_count) {
                    ground_color = "#900";
                }

                ctx.fillStyle = ground_color;
                
                ctx.fillRect(offsetW+cell_wall, offsetH+cell_wall, cell_pixels-(cell_wall*2), cell_pixels -(cell_wall*2) );
                
            }
            function draw_cell() {
                
                if( dones[curW][curH] == 1 ) {
                    ground_color = "#66F";
                    var offsetW    = ((curW-1)*cell_pixels)+cell_wall;
                    var offsetH    = ((curH-1)*cell_pixels)+cell_wall;
                    ctx.fillStyle = ground_color;
                    ctx.fillRect(offsetW+(cell_wall*3), offsetH+(cell_wall*3), cell_pixels-(cell_wall*6), cell_pixels -(cell_wall*6) );
                    return true;
                }
                dones[curW][curH] = 1;
                
                // ground and walls!
                var offsetW    = ((curW-1)*cell_pixels)+cell_wall;
                var offsetH    = ((curH-1)*cell_pixels)+cell_wall;

                ctx.fillStyle = "#000";
                ctx.fillRect(offsetW, offsetH, cell_pixels, cell_pixels );
                
                ctx.fillStyle = "#FFF";
                ctx.fillRect(offsetW+cell_wall, offsetH+cell_wall, cell_pixels-(cell_wall*2), cell_pixels -(cell_wall*2) )
                
                ctx.fillStyle = "#66F";
                ctx.fillRect(offsetW+(cell_wall*3), offsetH+(cell_wall*3), cell_pixels-(cell_wall*6), cell_pixels -(cell_wall*6) );
                
                ground_color = "#FFF";
                
                if( maze[curW][curH-1] & 1 ){
                    offsetH    = ((curH-1)*cell_pixels)+cell_wall;   
                    
                    ctx.fillStyle = ground_color;
                    //ctx.fillStyle = "#284";
                    if( curH => 0 ) {
                        ctx.fillRect(offsetW+cell_wall, offsetH-cell_wall, cell_pixels-(cell_wall*2), cell_wall*2 );
                    } else {
                        //ctx.fillStyle = "#842";
                        ctx.fillRect(offsetW+cell_wall, offsetH-cell_wall, cell_pixels-(cell_wall*2), cell_wall );
                    }
                } 
                if( maze[curW][curH-1] & 4 ){
                    ctx.fillStyle = ground_color;                    
                    offsetH    = ((curH-1)*cell_pixels)+cell_wall;                
                    if( curH < cell_count ) {
                        //ctx.fillStyle = "#800";
                        ctx.fillRect(offsetW+cell_wall, offsetH+cell_pixels-cell_wall, cell_pixels-(cell_wall*2), cell_wall *2);
                    } else {
                        //ctx.fillStyle = "#888";
                        ctx.fillRect(offsetW+cell_wall, offsetH+cell_pixels-cell_wall, cell_pixels-(cell_wall*2), cell_wall );
                    }
                } 
                if( maze[curW][curH-1] & 8 ){
                    offsetW    = ((curW-1)*cell_pixels)+cell_wall;   
                    
                    ctx.fillStyle = ground_color;
                    
                    if( cur => 0 ) {
                        ctx.fillRect( offsetW-cell_wall, (offsetH+cell_wall), cell_wall*2, cell_pixels-(cell_wall*2) );
                    } else {
                        
                       ctx.fillRect( offsetW+cell_pixels-cell_wall, (offsetH+cell_wall), cell_wall, cell_pixels-(cell_wall*2) );
                    }

                }
                if( maze[curW][curH-1] & 2 ){
                    offsetW    = ((curW-1)*cell_pixels)+cell_wall;
                    ctx.fillStyle = ground_color;
                    if( curW < cell_count ) {                        
                         ctx.fillRect( offsetW-cell_wall+cell_pixels, (offsetH+cell_wall), cell_wall*2, cell_pixels-(cell_wall*2) );
                    } else {
                        ctx.fillRect( offsetW+cell_pixels-cell_wall, (offsetH+cell_wall), cell_wall, cell_pixels-(cell_wall*2) );
                    }
                }
                return true;
            }
        });
        
        function checkViewport() {
            var max_width = jQuery(window).height()*.8;
            var max_height = jQuery(window).width()*.8;
            
            var maze_size = Math.min( max_width, max_height);
            $("#myCanvas").width(maze_size+'px');
            $("#myCanvas").height(maze_size+'px');
            $("#coveringCanvas").width(maze_size+'px');
            $("#coveringCanvas").height(maze_size+'px');
        }
    });

</script>
<?php
$maze = $this->make_maze( $this->cell_count, $this->cell_count );
?>
<div class="maniacal_maze_master">
    <div class="w3-card-2 w3-round" id="maniacal-maze-measure">
    <div class="w3-padding w3-center w3-row w3-teal w3-xlarge">
        Your <?php echo $this->width;?> by <?php echo $this->height;?> maze!
    </div>
    <div class="w3-row w3-dark-grey w3-center">
        <canvas id="myCanvas" style="background:#222;" width="<?php echo ($this->cell_wall*2)+($this->cell_pixels * $this->width);?>" height="<?php echo ($this->cell_wall*2)+($this->cell_pixels * $this->height); ?>"></canvas>            
    </div>
    <a class="w3-text-white w3-hover-text-amber w3-xlarge" href="<?php echo strtok($_SERVER["REQUEST_URI"],'?'); ?>"><div class="w3-row w3-padding w3-teal w3-hover-green w3-center">
            Click here to try again
    </div></a>
</div>

