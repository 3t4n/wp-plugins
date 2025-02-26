<?php
/*
Plugin Name: Maniacal Maze
Description: A maze generator
Version: 3
Author: Colin Tomele
Author URI: http://maniacalventures.com
License: GPL2
*/
/*
Copyright 2018  Colin Tomele  (email : maniacalv@maniacalventures.com)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License, version 2, as 
published by the Free Software Foundation.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
if(!class_exists('maniacal_maze'))
{
	class maniacal_maze
	{
        # Assign any class variables    
        var $error_msg;
        
        # table padding values for regular wall and thick (bedrock)
        var $wall_default       = 4;
        var $wall_edge          = 8;
        var $max_cells          = 50;
        var $min_cells          = 3;
        var $cell_pixels        = 150;
        var $cell_wall          = 10;
        var $cell_count;
        # set the bits for directions
        var $bit_u              = 1;
        var $bit_r              = 2;
        var $bit_d              = 4;
        var $bit_l              = 8;
        
        # Construct the plugin object
		public function __construct()
		{
            # register our actions here
            add_action('wp_enqueue_scripts', array($this, 'enqueuer'));
        } # END public function __construct

        public function enqueuer()
        {
            # Define our paths to make things slightly easier to remember
            define('MANIACAL_MAZE_PATH', plugin_dir_path( __FILE__ ));
            define('MANIACAL_MAZE_URL', plugins_url('maniacal-maze'));
            
            # An easy place to set min and max values for 
            #   improving later or just changing easily and
            #   near the top of the code, unless I keep writing
            #   in which case I could make this super long and
            #   drop it way down. But that feels like work. And...
            #
            # All work and no play makes Colin a dull boy.
            # All work and no play makes Colin a dull boy.
            # All work and no play makes Colin a dull boy.
            # All work and no play makes Colin a dull boy.
            # All work and no play makes Colin a dull boy.
            # All work and no play makes Colin a dull boy.
            # All work and no play makes Colin a dull boy.
                        
            # add shortcode
            add_shortcode('maniacal_maze', array($this, 'maniacal_maze'));
            
            # include CSS framework
            wp_enqueue_style('maniacal_maze-fa', "https://use.fontawesome.com/releases/v5.2.0/css/all.css");
            
            # include CSS framework
            wp_enqueue_style('maniacal_maze-w3', MANIACAL_MAZE_URL . '/css/w3.css'); 
            
            # languages
            load_plugin_textdomain( 'maniacal_maze', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' ); 

        } # END public function admin_init
        
        public function check_form_error()
        {
            $error = array();
            
            if( empty( $_GET['cell_count'] ) ) {
                $this->error_msg = "You didn't include a cell count in the URL";
                return true;
            } # END if( empty( $_GET['cell_count'] ) )
            
            if((int)$_GET['cell_count'] != $_GET['cell_count']){
                $error[] = "Your cell count is not a number.";
            } elseif($_GET['cell_count'] < $this->min_cells) {
                $error[] = 'Your cell count is lower than the maximum amount of '.$this->min_cells.'.';
            } elseif($_GET['cell_count'] > $this->max_cells) {
                $error[] = 'Your cell count is wider than the maximum amount of '.$this->max_cells.'.';
            } else {
                $this->cell_count   = $_GET['cell_count'];
                $this->height       = $_GET['cell_count'];
                $this->width       = $_GET['cell_count'];
                
            } # if((int)$_GET['cell_count'] != $_GET['cell_count'])
            
            if(!empty($error)) {
                $this->error_msg = implode('<br/>', $error );
                return true;
            } # END if(!empty($error))
            
            return false;
            
        } # END public function check_form_error()
        
        public function make_maze( $h, $w ){
                        
            # create grid
            $walls = array();
            $bedrock = array();
            $cell = array();

            # fill each door with a 0 value and figure bedrock.
            for( $w=1; $w<=$this->width; $w++ ) {
                for($h=1; $h<=$this->height; $h++){
                    $walls[$w][$h] = 0;
                    $cell[$w][$h] = 0;
                    $bedrock[$w][$h] = 0;
                    # are we on the start of a row?
                    if( $w == 1 or ($w % $this->width+1 ) == 0 ) {
                        $bedrock[$w][$h] = $bedrock[$w][$h] | $this->bit_l;
                    } # END if( $w == 1 or ($w % $this->width+1 ) == 0 )
                    # are we on the end of a row?
                    if( $w == $this->width or ($w % $this->width ) == 0 ) {
                        $bedrock[$w][$h] = $bedrock[$w][$h] | $this->bit_r;
                    } # END if( $w == $this->width or ($w % $this->width ) == 0 )
                    # are we on the start of a column?
                    if( $h == 1 or ($h % $this->height+1 ) == 0 ) {
                        $bedrock[$w][$h] = $bedrock[$w][$h] | $this->bit_u;
                    } # END if( $h == 1 or ($h % $this->height+1 ) == 0 )
                    # are we on the end of a column?
                    if( $h == $this->height or ($h % $this->height ) == 0 ) {
                        $bedrock[$w][$h] = $bedrock[$w][$h] | $this->bit_d;
                    } # END if( $h == $this->height or ($h % $this->height ) == 0 )
                } # END for($h=1; $h<=$this->height; $h++)
            } # END for( $w=1; $w<=$this->width; $w++ )
            
            # You can break if you want to...
            $the_safety_break = 200000;

            # starting position
            $curW   = 1;
            $curH   = 1;
            
            # Testing loop for 2 iterations to figure how to 
            #   make this darned display work
            
            # lets make an array of the path we travel so we can 
            #   go backwards if we run into a room with no other exits.
            $history = array();
            $count = 0;
            $total = $this->width * $this-> height;
            $history[] = array( 'h' => $curW, 'w' => $curH );
            while( $count < $total ) {
                 
                if( $the_safety_break-- <= 0) wp_die("LOOOP");
                # Begin!
                
                if( $cell[$curW][$curH] == false ) {
                    $cell[$curW][$curH] = true;
                    $count++;
                } # END if( $cell[$curW][$curH] == false )
                # find walls with no bedrock
                $available_walls = array();
                
                $clear_walls = ~($bedrock[$curW][$curH] | $walls[$curW][$curH]);
                
                # Cycle through each direction                
                foreach( array( 'bit_u', 'bit_d', 'bit_l', 'bit_r' ) as $val ) {
                    # check each direction for clear walls
                    $compare = 0;
                    if( $clear_walls & $this->$val ) {
                        # check if direction is in use
                        switch( $val ){
                            case( 'bit_u' ):
                                $compare = $walls[$curW][$curH-1];
                                break;
                            case( 'bit_d' ):
                                $compare = $walls[$curW][$curH+1];
                                break;
                            case( 'bit_l' ):
                                $compare = $walls[$curW-1][$curH];
                                break;
                            case( 'bit_r' ):
                                $compare = $walls[$curW+1][$curH];
                                break;
                        } # END switch( $val )
                        # clear out any in use walls
                        if( empty( $compare ) ) {
                            $available_walls[] = $this->$val;                            
                        } # END if( empty( $compare ) )                        
                    } # END if( $clear_walls & $this->$val )
                } # END foreach( array( 'bit_u', 'bit_d', 'bit_l', 'bit_r' ) as $val ) {

                # if no available exits, go back one in history.
                if( count( array_keys( $available_walls ) ) < 1 ){
                    array_pop( $history );
                    end( $history );                    
                    $previous = current( $history );

                    $curW = $previous['w'];
                    $curH = $previous['h'];
                    continue;           
                }

                # pick one
                $exit_key = array_rand( $available_walls );
                
                # add door to that room in this room.
                $walls[$curW][$curH] = $walls[$curW][$curH] | $available_walls[$exit_key];

                # add door in THAT room to this room.
                # move to that cell
                switch( $available_walls[$exit_key] ){

                        case( $this->bit_u ):
                            $walls[$curW][$curH-1] = $walls[$curW][$curH-1] | $this->bit_d;
                            $curH--;
                            break;
                        case( $this->bit_d ):
                            $walls[$curW][$curH+1] = $walls[$curW][$curH+1] | $this->bit_u;
                            $curH++;
                            break;
                        case( $this->bit_l ):
                            $walls[$curW-1][$curH] = $walls[$curW-1][$curH] | $this->bit_r;
                            $curW--;
                            break;
                        case( $this->bit_r ):
                            $walls[$curW+1][$curH] = $walls[$curW+1][$curH] | $this->bit_l;
                            $curW++;
                            break;
                }
                
                if( $curW < 1 or $curW > $this->width or $curH < 1 or $curH > $this->height ) {
                    array_pop( $history );
                    end( $history );                    
                    $previous = current( $history );

                    $curW = $previous['w'];
                    $curH = $previous['h'];
                    continue;           
                }

                $history[] = array( 'w' => $curW, 'h' => $curH );
            } # END for( $t=1; $t<=2; $t++)            
            return $walls;
        } # END public function make_maze( $h, $w )
        
        public function maniacal_maze( $atts )
        {
            ob_start();
            # are you new here?
            # show the master page!
            $action = (!isset($_GET['action'])) ? null : $_GET['action'];
            
            switch($action){
                case'viewMaze':
                    # check for error
                    if($this->check_form_error() == true ) {
                        # If we have an error, show the main page again.
                        # If will automatically show the error.
                        require_once( MANIACAL_MAZE_PATH . 'maze-master.php' );
                        break;
                    } # END if($this->check_form_error() == true )
                    # No error means we can show the maze
                    require_once( MANIACAL_MAZE_PATH . 'maze-display.php' );
                    break;
                    
                default:
                    # Show the main page, which collects info to create the link.
                    require_once( MANIACAL_MAZE_PATH . 'maze-master.php' );
                    break;
            } # END switch($action)
            
            $contents = ob_get_contents();
            ob_end_clean();
            return $contents;
        } # END public function maniacal_maze( $atts )
        
    } # END class maniacal_maze
} # END if(!class_exists('maniacal_maze'))

if(!function_exists("br2nl")) {
    function br2nl($string)
    {
        return preg_replace("/<br[^>]*>\s*\r*\n*/is", "\n", $string);
    }
} # END if( !function_exists( "br2nl" ) )

if( !function_exists( "preme" ) ) {
	function preme( $arr="-----------------+=+-----------------" ) // print_array
	{
		if( $arr === TRUE )	$arr = "**TRUE**";
		if( $arr === FALSE )	$arr = "**FALSE**";
		if( $arr === NULL )	$arr = "**NULL**";
		
		echo "<pre>";
		print_r( $arr );
		echo "</pre>";
	
	} # END function preme
} # END if( !function_exists( "preme" ) )

$maniacal_maze = new maniacal_maze;
?>
