<?php

/*
Plugin Name: Another Processing Applet Plugin
Plugin URI: http://software.o-o.ro/
Description: Let's add ptocessing sketches to wordpress. Even if they have libraries. If it helps, consider rating/donating/ letting me know.
Version: 0.001 
Author: Andrew M
Author URI: http://software.o-o.ro/


READ THIS:
Abandon all hope ye who enter here.

THE SOFTWARE IS PROVIDED 'AS IS', WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.*/

add_shortcode('sketch', 'show_sketch');

function show_sketch($atts)
{
extract(shortcode_atts(array(
'name'=>'',
'listostuff'=>'',
'param'=>'',
 'width' => 400,
'height' =>400)
, $atts));

$param1=explode(";",$param);
foreach ($param1 as $p)
{$param2[]=explode(":",$param1);}
$out="<script type='text/javascript'
		src='http://www.java.com/js/deployJava.js'></script> 
	<script type='text/javascript'> 
	  /* <![CDATA[ */
 
	  var attributes = { 
            code: '$name',
            archive: '$listostuff',
            width: $width, 
            height: $height,
          };
          var parameters = { ";            

foreach($param2 as $p)
{$out.=$p[0].": '".$p[1]."',";}
$out.="
       
           };
          var version = '1.5';
          deployJava.runApplet(attributes, parameters, version);
 
          /* ]]> */
        </script> 
        
	<noscript> <div>
	  <!--[if !IE]> -->
	  <object classid='java:$name.class' 
            	  type='application/x-java-applet'
            	  archive='$listostuff'
            	  width='$width' height='$height'>
            
	    <param name='archive' value='$listostuff' />
	    
	    <param name='mayscript' value='true' />
	    <param name='scriptable' value='true' />
	     ";            

foreach($param2 as $p)
{$out.="<param name='".$p[0]."' value='".$p[1]."' />";}
$out.="
	    
	  <!--<![endif]-->
 
	   
	    <object classid='clsid:8AD9C840-044E-11D1-B3E9-00805F499D93'
		    codebase='http://java.sun.com/update/1.6.0/jinstall-6u20-windows-i586.cab'
		    width='$width' height='$height'  >
	      
	      <param name='code' value='$name' />
	      <param name='archive' value='$listostuff' />
	      
	   ";            

foreach($param2 as $p)
{$out.="<param name='".$p[0]."' value='".$p[1]."' />";}
$out.="
	     
	      <p>
		<strong>
		  This browser does not have a Java Plug-in.
		  <br />
		  <a href='http://www.java.com/getjava' title='Download Java Plug-in'>
		    Get the latest Java Plug-in here.
		  </a>
		</strong>
	      </p>
	      
	    </object>
	    
	  <!--[if !IE]> -->
	  </object>
	  <!--<![endif]-->
 
	</div> </noscript> 
 
      ";
return $out;
}

?>
