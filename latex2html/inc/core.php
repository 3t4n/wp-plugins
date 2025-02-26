<?php
defined( 'ABSPATH' ) OR exit;

if( !interface_exists( 'l2h_core_interface' ) )
{
  interface l2h_core_interface{
    // For settings
    public function l2h_latex_custom_style_adder();
    public function l2h_latex_mathjax_adder( $content );
    public function l2h_latex_preamble_adder( $content );
    public function l2h_latex_mathjax_single_adder();

    // For content
    public function l2h_latex_parse_headinfo( $content );
    public function l2h_latex_parse_email( $content );
    public function l2h_latex_parse_emphesis( $content );
    public function l2h_latex_parse_textcolor( $content );
    public function l2h_latex_parse_tableofcontents( $content );
    public function l2h_latex_parse_url( $content );
    public function l2h_latex_parse_thm( $content );
    public function l2h_latex_parse_fig( $content );
    public function l2h_latex_parse_footnote( $content );
    public function l2h_latex_parse_lists( $content );
    public function l2h_latex_parse_ref( $content );
    public function l2h_latex_parse_cite( $content );
    public function l2h_latex_parse_custom( $content );
    public function l2h_latex_parse_cleanup( $content );
  }
}

if( !class_exists( 'l2h_core_class' ) )
{
  class l2h_core_class implements l2h_core_interface{
    private $options, $preamble, $style, $thmenv, $thmids, $figids, $secids;
    private $funarr = [
      'l2h_latex_parse_cleanup',
      'l2h_latex_parse_headinfo',
      'l2h_latex_parse_email',
      'l2h_latex_parse_emphesis',
      'l2h_latex_parse_textcolor',
      'l2h_latex_parse_tableofcontents',
      'l2h_latex_parse_url',
      'l2h_latex_parse_thm',
      'l2h_latex_parse_fig',
      'l2h_latex_parse_footnote',
      'l2h_latex_parse_lists',
      'l2h_latex_parse_ref',
      'l2h_latex_parse_cite',
      'l2h_latex_parse_custom',
    ];
    // For settings
    public function __construct()
    {
      $this->options  = get_option( 'l2h_options' );
      $this->preamble = $this->options['latex_cmd'];
      $this->style    = $this->options['latex_style'];

      // Add International Support
      if ( isset( $this->options['enall'] ) && $this->options['enall'] ){
        $this->thmenv = array(
          'sec'      => 'Section',
          'fig'      => 'Figure',
          'thm'      => 'Theorem',
          'lem'      => 'Lemma',
          'cor'      => 'Corollary',
          'defn'     => 'Definition',
          'prop'     => 'Proposition',
          'rem'      => 'Remark',
          'rmk'      => 'Remark',
          'claim'    => 'Claim',
          'proof'    => 'Proof',
          'prob'     => 'Problem',
          'examp'    => 'Example',
          'answer'   => "Answer",
          'excs'     => 'Exercise',
          'abstract' => 'Abstract',
          'step'     => 'Step',
        );
      }else{
        $this->thmenv = array(
          'sec'      => __( 'Section', 'latex2html' ),
          'fig'      => __( 'Figure', 'latex2html' ),
          'thm'      => __( 'Theorem', 'latex2html' ),
          'lem'      => __( 'Lemma', 'latex2html' ),
          'cor'      => __( 'Corollary', 'latex2html' ),
          'defn'     => __( 'Definition', 'latex2html' ),
          'prop'     => __( 'Proposition', 'latex2html' ),
          'rem'      => __( 'Remark', 'latex2html' ),
          'rmk'      => __( 'Remark','latex2html' ),
          'claim'    => __( 'Claim', 'latex2html' ),
          'proof'    => __( 'Proof', 'latex2html' ),
          'prob'     => __( 'Problem', 'latex2html' ),
          'examp'    => __( 'Example', 'latex2html' ),
          'answer'   => __( 'Answer', 'latex2html' ),
          'excs'     => __( 'Exercise', 'latex2html' ),
          'abstract' => __( 'Abstract', 'latex2html' ),
          'step'     => __( 'Step', 'latex2html' ),
        );
      }
      // Register actions
      add_action( 'wp_head', array( $this, 'l2h_latex_custom_style_adder' ) );
      add_filter( 'the_content', array( $this, 'l2h_latex_mathjax_adder' ) );
      add_action( 'wp_enqueue_scripts', array( $this, 'l2h_enqueue_style' ) );
      add_action( 'admin_enqueue_scripts', array( $this, 'l2h_admin_enqueue_style' ) );

      // Call the render functions
      foreach( $this->funarr as $fun ){
        add_filter( 'the_content', [ $this, $fun ], 99 );
      }
    }
    public function l2h_latex_custom_style_adder()
    {
      echo '<style>' . "\n" . esc_html($this->style) . "\n</style>\n";
    }

    public function l2h_latex_mathjax_adder( $content )
    {
      if(  preg_match( '/\\\\\[(.*?)\\\\]/ims', $content ) || preg_match( '/\$(.*?)\$/ims', $content) || preg_match( '/\\\\begin\s*\{\s*(equation|equation\*|align|align\*|multline|multline\*|eqnarray|eqnarray\*|gather|gather\*|flalign|flalign\*|alignat|alignat\*)/ims', $content ) || preg_match( '/\\\\\((.*?)\\\\\)/ims', $content ) ){ 
        if( is_single() || !isset( $this->options['single'] ) || (isset( $this->options['single'] ) && !$this->options['single'] ) )
        {
          add_action( 'wp_footer', array( $this, 'l2h_latex_preamble_adder') );
          add_action( 'wp_footer', array( $this, 'l2h_latex_mathjax_single_adder' ) );
        }
      }
      return $content;
    }

    public function l2h_latex_preamble_adder( $content )
    {
      if( $this->preamble ){
        $this->preamble = preg_replace( '/\\\\/', '\\\\\\\\', $this->preamble );
?>
        <script type         = 'text/javascript'>
        newContainer = document.createElement('span');
        newContainer.style.setProperty('display','none','');
        newNode           = document.createElement('script');
        newNode.type      = 'math/tex';
        newNode.innerHTML = '<?php echo esc_js($this->preamble); ?>';
        newContainer.appendChild(newNode);
        document.body.insertBefore(newContainer,document.body.firstChild);
        </script>
<?php
      };
    }

    public function l2h_latex_mathjax_single_adder()
    {
      if( $this->options['mathjax_cdn'] && $this->options['mathjax_config'] )
      {
        $allowed_tags = [
          'script' => ['type' => true],
        ];
?>
        <script type = "text/x-mathjax-config">
        <?php echo wp_kses($this->options['mathjax_config'], $allowed_tags) . "\n"; ?>
        </script>
<?php
        // Ensure the MathJax CDN URL is properly escaped
        $mathjax_cdn = isset($this->options['mathjax_cdn']) ? esc_url($this->options['mathjax_cdn']) : '';

        // Only enqueue MathJax if the CDN URL is set
        if (!empty($mathjax_cdn)) {
          // Use a closure to access $mathjax_cdn in the function scope
          wp_enqueue_script(
            'mathjax'    ,     // Handle for the script
            $mathjax_cdn,      // Script URL from options
            array        (),   // No dependencies
            '2.7.5'      ,     // No version
            true  // Load script in footer
          );
        };
      }
    }



    public function l2h_enqueue_style( )
    {
      //styles for plugin
      wp_enqueue_style( 'l2h_style', plugin_dir_url( __FILE__ ) . 'css/latex.min.css', false, l2h_main_class::l2hVER , 'screen, print' );
      wp_enqueue_style( 'l2h_print_style', plugin_dir_url( __FILE__ ) . 'css/print.min.css', false, l2h_main_class::l2hVER, 'print' );
    }

    public function l2h_admin_enqueue_style( $hook )
    {
      if( $hook !='settings_page_latex2html' ){
        return;
      }
      //styles for admin
      wp_enqueue_style( 'l2h_admin', plugin_dir_url( __FILE__ ) . 'css/admin.css', false, l2h_main_class::l2hVER, 'all');
      //script for admin
      wp_enqueue_script( 'l2h_admin_js', plugin_dir_url( __FILE__ ) . 'js/l2h.js', array( 'jquery' ), '1.0.0', true );
    }

    // For content
    public function l2h_latex_parse_headinfo( $content )
    {
      //title, author, address, date
      $content = preg_replace('/\\\\(title|author|address|date)\s*(\[(?:[^\]]|\\\\\[|\\\\\]|(?2))*\])/', '\\\\$1', $content);
      $content = preg_replace('/\\\\(title|author|address|date)\s*(\{\s*(((?>[^{}]+)|(?2))*)\s*\})(<br\s*\/>)?/ims', '<span class="latex_$1">$3</span>', $content);
      //keywords
      $content = preg_replace('/\\\\(keywords)\s*(\{\s*(((?>[^{}]+)|(?2))*)\s*\})(<br\s*\/>)?/ims', '<span class="latex_$1"><span style="font-variant:small-caps;">Keywords.&#x00A0;</span>$3</span>', $content);
      // date \today
      $content = str_replace('\today', get_the_time('m/d/Y'), $content);

      return $content;
    }

    public function l2h_latex_parse_email( $content )
    {
      //email in the title
      $content = preg_replace('/\\\\email\s*\{\s*([a-zA-Z0-9_\.]+(@|\(at\))[a-zA-Z0-9_\.]+)\s*\}(<br\s*\/>)?/ims', '<span class="latex_email"><a href="mailto:$1">$1</a></span>', $content);
      //email in the content, not centered
      $content = preg_replace('/\\\\mailto\s*\{\s*([a-zA-Z0-9_\.]+(@|\(at\))[a-zA-Z0-9_\.]+)\s*\}(<br\s*\/>)?/ims', '<a href="mailto:$1">$1</a>', $content);

      return $content;
    }

    public function l2h_latex_parse_emphesis( $content )
    {
      //emphasis
      $content = preg_replace('/\\\\(emph|iemph)\s*(\{\s*(((?>[^{}]+)|(?2))*)\s*\})/ims', '<span class="latex_em">$3</span>', $content);
      //textit
      $content = preg_replace('/\\\\(textit)\s*(\{\s*(((?>[^{}]+)|(?2))*)\s*\})/ims', '<span class="latex_it">$3</span>', $content);
      //textbf
      /*$content = preg_replace('/\\\\(textbf)\s*(\{\s*(((?>[^{}]+)|(?2))*)\s*\})/ims', '<span class="latex_bf">$3</span>', $content);*/
      //underline
      $content = preg_replace('/\\\\underline\s*(\{\s*(((?>[^{}]+)|(?1))*)\s*\})/ims', '<span class="latex_underline">$2</span>', $content);
      //verbitem
      $content = preg_replace('/\\\\verb([|!])(.*?)\1/ims', '<code>$2</code>', $content);
      return $content;
    }

    public function l2h_latex_parse_textcolor( $content )
    {
      //textcolor
      $content = preg_replace('/\\\\textcolor\s*\{\s*(\w+)\s*\}\{\s*(([^{}]*?(\{[^{}]*?\})*?)*)\s*\}/ims', '<span style="color:$1">$2</span>', $content);

      return $content;
    }

    public function l2h_latex_parse_tableofcontents( $content )
    {
      //section, subsection, subsubsection
      $sec = 0; $subsec = 0; $subsubsec = 0;
      if ( isset( $this->options['enall'] ) && $this->options['enall'] ) {
        // If 'enall' is true, do not translate 'Contents'
        $tableofcontent = '<span id="contents"  style="text-align:center; font-size:18px; font-variant:small-caps;display:block;">Contents</span><br />
          <span id="sec:content"><a href="#contents">Contents</a></span><br />';
      } else {
        // If 'enall' is false or not set, translate 'Contents'
        $tableofcontent = '<span id="contents"  style="text-align:center; font-size:18px; font-variant:small-caps;display:block;">' . __( 'Contents', 'latex2html') . '</span><br />
          <span id="sec:content"><a href="#contents">' . esc_html__( 'Contents', 'latex2html') . '</a></span><br />';
      }
      $parten = '/((<br\s*\/?>)*\\\\(section|subsection|subsubsection)\s*(\{\s*((?>[^{}]+|(?4))*)\s*\})\s*(\\\\label\{(.*?)\})?(<br\s*\/?>)*)/ims';
      while( preg_match( $parten, $content, $m ) ){
        if($m[3] == 'section'){
          $sec++;
          $subsec    = 0;
          $subsubsec = 0;
          if( isset( $m[7] ) && $m[7] != '' ){
            $this->secids[$m[7]] = [ 'secid'=> "sec:" . $sec, 'secnum'=> $sec ];
          }
          $content = str_replace($m[1],
            '<span class="latex_'.$m[3].'">'.$sec.'.&#x00A0;'.$m[5].'<a id="sec:'.$sec.'"></a></span>
', $content);
$tableofcontent = $tableofcontent.'<span>&#x00A0;'.$sec.'.&#x00A0;&#x00A0;<a href="#sec:'.$sec.'">'.$m[5].'</a></span><br />';
        }
        elseif($m[3] == 'subsection'){
          $subsec++;
          $subsubsec = 0;
          if( isset( $m[7] ) && $m[7] != '' ){
            $this->secids[$m[7]] = [ 'secid'=> "sec:" . $sec . '.' . $subsec, 'secnum'=> $sec . '.' . $subsec ];
          }
          $content = str_replace($m[1],
            '<span class="latex_'.$m[3].'">'.$sec.'.'.$subsec.'.&#x00A0;'.$m[5].'<a id="sec:'.$sec.'.'.$subsec.'"></a></span>
', $content);
$tableofcontent = $tableofcontent.'<span>&#x00A0;&#x00A0;&#x00A0;'.$sec.'.'.$subsec.'.&#x00A0;&#x00A0;<a href="#sec:'.$sec.'.'.$subsec.'">'.$m[5].'</a></span><br />';
        }
        elseif($m[3] == 'subsubsection'){
          $subsubsec++;
          if( isset( $m[7] ) && $m[7] != '' ){
            $this->secids[$m[7]] = [ 'secid'=> "sec:" . $sec . '.' . $subsec . '.' . $subsubsec, 'secnum'=> $sec . '.' . $subsec . '.' . $subsubsec ];
          }
          $content = str_replace($m[1],
            '<span class="latex_'.$m[3].'">'.$sec.'.'.$subsec.'.'.$subsubsec.'.&#x00A0;'.$m[5].'<a id="sec:'.$sec.'.'.$subsec.'.'.$subsubsec.'"></a></span>', $content);
          $tableofcontent = $tableofcontent.'<span>&#x00A0;&#x00A0;&#x00A0;&#x00A0;&#x00A0;'.$sec.'.'.$subsec.'.'.$subsubsec.'.&#x00A0;&#x00A0;<a href="#sec:'.$sec.'.'.$subsec.'.'.$subsubsec.'">'.$m[5].'</a></span><br />';
        }
        //var_export($m);
      }
      //die(var_export($this->secids));
      //replace of \tableofcontents
      $content = str_replace('\tableofcontents', $tableofcontent, $content);

      return $content;
    }

    public function l2h_latex_parse_url( $content )
    {
      //url
      $content = preg_replace('/\\\\(url)\s*(\{\s*(((?>[^{}]+)|(?2))*)\s*\})/ims', '<a href="$3"  target="_blank" class="latex_url">$3</a>', $content);
      //href
      $content = preg_replace('/\\\\(href)\s*(\{\s*(((?>[^{}]+)|(?2))*)\s*\})(\{\s*(((?>[^{}]+)|(?2))*)\s*\})/ims', '<a href="$3" target="_blank" class="latex_url">$6</a>', $content);
      return $content;
    }

    public function l2h_latex_parse_thm( $content )
    {

      if ( isset( $this->options['enall'] ) && $this->options['enall'] ){
        $this->thmenv = array(
          'sec'      => 'Section',
          'fig'      => 'Figure',
          'thm'      => 'Theorem',
          'lem'      => 'Lemma',
          'cor'      => 'Corollary',
          'defn'     => 'Definition',
          'prop'     => 'Proposition',
          'rem'      => 'Remark',
          'rmk'      => 'Remark',
          'claim'    => 'Claim',
          'proof'    => 'Proof',
          'prob'     => 'Problem',
          'examp'    => 'Example',
          'answer'   => "Answer",
          'excs'     => 'Exercise',
          'abstract' => 'Abstract',
          'step'     => 'Step',
        );
      }else{
        $this->thmenv = array(
          'sec'      => __( 'Section', 'latex2html' ),
          'fig'      => __( 'Figure', 'latex2html' ),
          'thm'      => __( 'Theorem', 'latex2html' ),
          'lem'      => __( 'Lemma', 'latex2html' ),
          'cor'      => __( 'Corollary', 'latex2html' ),
          'defn'     => __( 'Definition', 'latex2html' ),
          'prop'     => __( 'Proposition', 'latex2html' ),
          'rem'      => __( 'Remark', 'latex2html' ),
          'rmk'      => __( 'Remark','latex2html' ),
          'claim'    => __( 'Claim', 'latex2html' ),
          'proof'    => __( 'Proof', 'latex2html' ),
          'prob'     => __( 'Problem', 'latex2html' ),
          'examp'    => __( 'Example', 'latex2html' ),
          'answer'   => __( 'Answer', 'latex2html' ),
          'excs'     => __( 'Exercise', 'latex2html' ),
          'abstract' => __( 'Abstract', 'latex2html' ),
          'step'     => __( 'Step', 'latex2html' ),
        );
      }
      if( !function_exists( 'thmreplace' ) ){
        function thmreplace( $thmname, $thmhead, $num, $thmid, $thmcontent, $thmenvarr ){
          $thm_content = '';
          if( $thmid !=null ){
            $thm_content .= "<span id='$thmid'></span>";
          }
          $thm_name     = $thmenvarr[$thmname];
          $thm_content .= "<div class='latex_$thmname'><span class='latex_" . $thmname . "_h'>" . $thmenvarr[$thmname] . ($thmname != 'abstract' && $thmname != 'proof' ?  ' ' . $num : '') . "</span>";
          if( $thmhead != null ){
            $thm_content .= " (<span class='latex_" . $thmname . "_name'>$thmhead</span>)";
          }
          $thm_content .= "<span class='latex_" . $thmname . "_h'>.</span> $thmcontent</div>";
          return $thm_content;
        }
      }

      $thm_strs = "abstract|thm|lem|cor|defn|prop|rem|prob|examp|answer|proof|excs|rmk|claim";
      //remove <p> for theorem
      $content = preg_replace('/<p>(\\\\begin\s*\{\s*(' . $thm_strs .')\s*\}.*?\\\\end\s*\{\s*\2\s*\}\s*)<\/p>/ims', '$1', $content);
      $content = preg_replace('/\\\\begin\s*\{\s*(' . $thm_strs . ')\s*\}(.*?)\\\\end\s*\{\s*\1\s*\}/ims', "<$1>$2</$1>", $content);
      //die(var_export($content));
      $partten = '/<(' . $thm_strs . ')>\s*(<br\s*\/?>)?\s*(\[(.*?)\])?\s*(<br\s*\/?>)?\s*(\\\\label\s*\{(.*?)\s*\})?\s*(<br\s*\/?>)?\s*(.*?)<\/\1>/ims';
      // m1 = thm, m3 = [...], m4= ..., m6=\label{...}, m7=..., m9=thmcontent
      if( preg_match_all( $partten, $content, $m) ){
        //die(var_export($m));
        // construct the index=>[counter, id]
        $thmarr = []; $thmnum = 0; $exampnum = 0; $rmknum = 0; $probnum = 0; $prob_ansnum = 0; $ansnum = 0; $excsnum = 0; $claimnum = 0;
        foreach( $m[1] as $index=> $name){
          if( in_array( $name, ['thm', 'lem', 'prop', 'cor', 'defn'] ) ){
            $thmnum                += 1;
            $thmarr['num'][$index]  = $thmnum;
          }
          if( $name == 'rem' || $name == 'rmk' ){
            $rmknum                += 1;
            $thmarr['num'][$index]  = $rmknum;
          }
          if( $name == 'examp' ){
            $exampnum              += 1;
            $thmarr['num'][$index]  = $exampnum;
          }
          if( $name == 'prob' ){
            $probnum               += 1;
            $prob_ansnum            = $probnum;
            $ansnum                 = 0;         // reset the answer by problem
            $thmarr['num'][$index]  = $probnum;
          }
          if( $name == 'excs' ){
            $excsnum               += 1;
            $prob_ansnum            = $excsnum;
            $ansnum                 = 0;         // reset the answer by exercise 
            $thmarr['num'][$index]  = $excsnum;
          }
          if( $name == 'claim' ){
            $claimnum              += 1;
            $thmarr['num'][$index]  = $claimnum;
          }
          if( $name == 'answer' ){
            $ansnum                += 1;
            $thmarr['num'][$index]  = $prob_ansnum . '.' . $ansnum;
          }
          if( !isset( $thmarr['num'][$index] ) ){
            $thmarr['num'][$index] = '';
          } 
          $thmenvarr = $this->thmenv;
          $content   = str_replace( $m[0][$index],  thmreplace( $m[1][$index], $m[4][$index], $thmarr['num'][$index], $m[7][$index], $m[9][$index], $thmenvarr ), $content );
          // store the info for \ref and \autoref
          if( $m[7][$index] != '' ){
            $id                        = $m[7][$index];
            $this->thmids[$id]['name'] = $m[1][$index];
            $this->thmids[$id]['num']  = $thmarr['num'][$index];
          }
        }
        //die(var_export($thmarr));
        //die(var_export($this->thmids));
      }
      return $content;
    }

    public function l2h_latex_parse_fig( $content ){
      if( !function_exists( 'figreplace' ) ){
        function figreplace( $name, $num, $id, $cap, $thmenvarr ){
          global $post;
          $fig_content = '';
          $fig_id      = '';

          if( $id != null ){
            $fig_id .= "<span id='" . esc_attr($id) . "'></span>";
          }

          $fig_name = esc_html($thmenvarr['fig']);
          $posturl  = get_permalink( $post->ID );
          $time     = get_post_field('post_date', $post->ID);
          $fig_url  = wp_upload_dir($time)['url'] . '/' . $name;

          // Use wp_get_attachment_image() for images
          $attachment_id = attachment_url_to_postid($fig_url);
          if ($attachment_id) {
            $fig_content .= wp_get_attachment_image($attachment_id, 'full', false, ['class' => 'latex_fig', 'alt' => esc_attr($name)]);
          } 
          //else {
          //    $fig_content .= "<center><img class='latex_fig' src='" . esc_url($fig_url) . "' alt='" . esc_attr($name) . "' /></center>";
          //}

          // Add caption if provided
          if( $cap != null ){
            $fig_content = "<figure>" . $fig_content . "<figcaption class='latex_fig_caption'>" . $fig_name . ' ' . $num . ". " . esc_html($cap) . "</figcaption></figure>";
          }

          return $fig_id . $fig_content;
        }
      }

      //remove <p> for figure 
      $content = preg_replace('/<p>\s*(\\\\begin\s*\{\s*(figure|wrapfigure)\s*\}.*?\\\\end\s*\{\s*\2\s*\})\s*<\/p>/ims', '$1', $content);
      $content = preg_replace('/\\\\begin\s*\{\s*(figure|wrapfigure)\s*\}({\w+})?({[^}]*})?(.*?)\\\\end\s*\{\s*\1\s*\}/ims', '<$1>$4</$1>', $content);
      //label within caption
      $content = preg_replace('/<figure>(.*?)\\\\caption{([^}]*?)\\\\label{(.*?)}}(.*?)<\/figure>/ims', '<figure>$1\caption{$2}\label{$3}$4</figure>', $content);
      $content = preg_replace('/<wrapfigure>(.*?)\\\\caption{([^}]*?)\\\\label{(.*?)}}(.*?)<\/wrapfigure>/ims', '<figure>$1\caption{$2}\label{$3}$4</figure>', $content);
      //label outside of caption
      $content = preg_replace('/<figure>(.*?)\\\\caption\{(.*?)\}.*?\\\\label\{(.*?)\}(.*?)<\/figure>/ims', '<figure>$1\caption{$2}\label{$3}$4</figure>', $content);
      $content = preg_replace('/<wrapfigure>(.*?)\\\\caption\{(.*?)\}.*?\\\\label\{(.*?)\}(.*?)<\/wrapfigure>/ims', '<figure>$1\caption{$2}\label{$3}$4</figure>', $content);
      //die(var_export($content));
      $partten = '/<figure>.*?\\\\includegraphics(.*?)?\{(.*?)\}.*?<\/figure>/ims';
      if( preg_match_all( $partten, $content, $m) ){
        $figarr = []; $fignum = 0;
        foreach( $m[2] as $index => $figname ){
          $fignum                 += 1;
          $figarr['name'][$index]  = $figname;
          $figarr['num'][$index]   = $fignum;
          $figarr['cap'][$index]   = null;
          $figarr['lab'][$index]   = null;
          if( preg_match('/.*?\\\\label{(.*?)}.*?/ims', $m[0][$index], $matl) ){
            $figarr['lab'][$index] = $matl[1];
            $figarr['cap'][$index] = ' ';
          }
          if( preg_match('/.*?\\\\caption{(.*?)}.*?/ims', $m[0][$index], $matc) ){
            $figarr['cap'][$index] = $matc[1];
          };
          $thmenvarr = $this->thmenv;
          $content   = str_replace( $m[0][$index],  figreplace( $figarr['name'][$index], $figarr['num'][$index], $figarr['lab'][$index], $figarr['cap'][$index], $thmenvarr ), $content );

          // store the info for \ref and \autoref
          if( $figarr['lab'][$index] != null ){
            $id                          = $figarr['lab'][$index];
            $this->figids[$id]['figid']  = $id;
            $this->figids[$id]['fignum'] = $figarr['num'][$index];
          }
        }
        //
        //die(var_export($figarr));
      }
      return $content;
    }

    public function l2h_latex_parse_footnote($content) {
      $footnotelist = '';

      // First, replace footnotemark with footnotetext
      $partten     = '/\\\\footnotemark(.*?)(<br\s*\/>\n?)?\\\\footnotetext\s*(\{\s*(((?>[^{}]+)|(?1))*)\s*\})/ims';
      $replace     = '\footnote[math]{$4}$1';
      $content_rep = preg_replace($partten, $replace, $content);
      while ($content != $content_rep) {
        $content     = $content_rep;
        $content_rep = preg_replace($partten, $replace, $content);
      }

      // Pattern to match \footnote{} (without recursion)
      $parten_footnote = '/\\\\footnote(\[math\])?\s*(\{(.*)\})/ims';

      if (preg_match_all($parten_footnote, $content, $m)) {
        $footnotelist = "<div class='latex-footnote'>\n\t<hr>\n\t<ol>";

        foreach ($m[3] as $index => $footnotetext) {
          $footnote_index = $index + 1;

          // Process nested braces inside footnote
          $footnotetext = $this->process_nested_braces($footnotetext);

          // Handle LaTeX references like \ref inside footnotes
          $footnotetext = preg_replace_callback('/\\\\ref\{([^}]+)\}/', function ($matches) {
            return '<a href="#' . esc_attr($matches[1]) . '">' . esc_html($matches[1]) . '</a>';
          }, $footnotetext);

          // Format the footnote display
          if ($m[1][$index] == "[math]") {
            $footnote_subst = "\\color{blue}{{}^{[ " . $footnote_index . " ]}}";
          } else {
            $footnote_subst = "<sup>[<a class='latex-footnote-index' href='#footnote-" . $footnote_index . "'>" . $footnote_index . "</a>]</sup>";
          }

          // Replace the footnote reference in the main content
          $content = str_replace($m[0][$index], $footnote_subst, $content);

          // Add the footnote content to the footnote list
          $footnotelist .= "\n\t\t<li id='footnote-" . $footnote_index . "'>" . $footnotetext . "</li>";
        }

        $footnotelist .= "\n\t</ol>\n</div>";
      }

      // Return the content with footnotes at the end
      return $content . $footnotelist;
    }

    private function process_nested_braces($footnotetext) {
      // This function processes the footnote content to correctly handle nested braces
      $open_braces    = 0;
      $processed_text = '';
      $len            = strlen($footnotetext);
      $i              = 0;

      while ($i < $len) {
        $char = $footnotetext[$i];

        if ($char === '{') {
          $open_braces++;
          $processed_text .= $char;
        } elseif ($char === '}') {
          $open_braces--;
          $processed_text .= $char;
        } elseif ($open_braces > 0) {
          $processed_text .= $char;
        } else {
          // If we are outside braces, treat it as regular text
          $processed_text .= $char;
        }

        $i++;
      }

      return $processed_text;
    }


    public function l2h_latex_parse_lists( $content )
    {
      //enumerate, itemize
      //remove <br />
      $content = preg_replace('/(<p>)?\\\begin\s*\{\s*(itemize|enumerate)\s*\}(<br\s*\/>\n?)?/ims', '\begin{$2}',$content);
      $content = preg_replace('/\\\\end\{(itemize|enumerate)\}(<br\s*\/>\n?)?(<\/p>)?/ims', '\end{$1}', $content);
      //proceed \item
      $parten = '/(\\\\item\s*(.*?)(<br\s*\/>\n?)?)(\\\\item|\\\\begin\s*\{\s*(itemize|enumerate)\s*\}|\\\\end\s*\{\s*(itemize|enumerate)\s*\})/ims';
      while( preg_match($parten, $content, $m)){
        $content = str_replace($m[1], '<li>'.$m[2].'</li>', $content);
      }
      //proceed \begin \end
      $content = preg_replace('/((<\/li>)?\\\\begin\s*\{\s*itemize)\s*\}/ims', '<ul>', $content);
      $content = preg_replace('/((<\/li>)?\\\\begin\s*\{\s*enumerate)\s*\}/ims', '<ol>', $content);
      $content = preg_replace('/(\\\\end\s*\{\s*itemize)\s*\}(?=(<li>)|(\\\\end\s*\{\s*itemize\s*\}))/ims', '</ul></li>', $content);
      $content = preg_replace('/(\\\\end\s*\{\s*enumerate)\s*\}(?=(<li>)|(\\\\end\s*\{\s*enumerate\s*\}))/ims', '</ol></li>', $content);
      $content = preg_replace('/(\\\\end\s*\{\s*itemize)\s*\}/ims', '</ul>', $content);
      $content = preg_replace('/(\\\\end\s*\{\s*enumerate)\s*\}/ims', '</ol>', $content);

      //quote environment
      $content = preg_replace('/(<br\s*\/>\n?)?(<p>)?\\\\begin\s*\{\s*quote\s*\}(<br\s*\/>\n?)?(.*?)(<br\s*\/>\n?)?\\\\end\s*\{\s*quote\s*\}(<br\s*\/>\n?)?(<\/p>)?/ims', '<blockquote>$4</blockquote>', $content);

      return $content;
    }

    public function l2h_latex_parse_ref( $content )
    {
      // refer the environments
      $parten = '/\\\\(ref|autoref|pageref)\s*\{\s*(.*?)\s*\}/ims';
      if( preg_match_all($parten, $content, $m) ){
        foreach( $m[1] as $index => $type ){
          $id = $m[2][$index];
          if( isset( $this->thmids[$id] ) ){
            $refname = $this->thmenv[$this->thmids[$id]['name']];
            $refnum  = $this->thmids[$id]['num'];
            $refid   = $id;
          }elseif( isset( $this->secids[$id] ) ){
            $refname = $this->thmenv[ 'sec' ];
            $refnum  = $this->secids[$id]['secnum'];
            $refid   = $this->secids[$id]['secid'];
          }elseif( isset( $this->figids[$id] ) ){
            $refname = $this->thmenv['fig'];
            $refnum  = $this->figids[$id]['fignum'];
            $refid   = $this->figids[$id]['figid'];
          }else{
            $refid   = '';
            $refname = '';
            $refnum  = '<span style="colro:red">' . $id . '</span>';
            //die(var_export($this->secids));
          }
          switch( $type ){
          case 'autoref': 
            $content = str_replace( $m[0][$index], "<a class='latex_ref' href=#$refid>$refname $refnum</a>", $content);
          default: 
            $content = str_replace( $m[0][$index], "<a class='latex_ref' href=#$refid>$refnum</a>", $content);
          }
        }
      }
      return $content;
    }

    public function l2h_latex_parse_cite( $content )
    {
      $partten = '/\\\\(nocite|cite|citep|citeauthor)\s*\{\s*(.*)?\s*\}(\*\{\s*(.*)?\s*\})??/imsU';
      if( preg_match_all($partten, $content, $m) ){
        global $wpdb;
        $tab_name = $wpdb->prefix . 'l2hbibtex';

        // Add reference at the end
        if ( isset( $this->options['enall'] ) && $this->options['enall'] ) {
          // If 'enall' is true, do not translate 'References'
          $content .= "<div class='bibtex'>\n\t<div class='bibtex_h'>References</div>\n\t<ol>";
        } else {
          // If 'enall' is false or not set, translate 'References'
          $content .= "<div class='bibtex'>\n\t<div class='bibtex_h'>" . esc_html__( 'References', 'latex2html' ) . "</div>\n\t<ol>";
        }
        $bibkeys              = array_unique( $m[2] );
        $bibkeys_num          = count( $bibkeys );
        $bibkeys_placeholders = array_fill(0, $bibkeys_num, '%s' );
        $bibkeys_format       = implode( ', ', $bibkeys_placeholders );
        // Define a cache key based on your query parameters
        $cache_key = 'bibitems_' . md5(implode('_', $bibkeys));  // Generate a unique key based on the bibkeys

        // Attempt to retrieve the data from the cache
        $bibitems = wp_cache_get($cache_key, 'bibtex_item');
        if (false === $bibitems) {
          // Data is not in cache, so we proceed with the database query
          $bibitems = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM $tab_name WHERE `bibkey` in ($bibkeys_format) ORDER BY `author`;", $bibkeys), ARRAY_A);
          // Cache the results for future use (duration 12 hours in this case)
          wp_cache_set($cache_key, $bibitems, 'bibtex_item', 12 * HOUR_IN_SECONDS);
        }
        // Want to update the query immediately After modifying or deleting a bibtex item, clear the cache
        //wp_cache_delete($cache_key, 'bibtex_item');

        //die( var_export($bibitems));
        $bibcontent = '';
        $bibarr     = [];
        foreach( $bibitems as $index=>$bibitem ){
          $bibcontent                   .= l2h_bibtex_class::l2h_bibtex_render( $bibitem );
          $bibarr[ $bibitem['bibkey'] ]  = [ $index, $bibitem['author'] ];
        }
        $content .= $bibcontent;
        $content .= "</ol></div>";
        // Replace the \cite{...}
        $replace = array_map( function( $type, $key, $star = null ) use ($bibarr) {
          global $wpdb;
          $tab_name = $wpdb->prefix . 'l2hbibtex';

          $sdata = $star != null ? ',' . $star : '';
          switch( $type ){
          case  'citep'                                       : 
            isset($bibarr[$key]) ? $citenum = $bibarr[$key][0]+1: $citenum = '? '. $key;
            return "[<a href=#" . $key . ">$citenum</a>" . $sdata . "]";
            break;
          case 'citeauthor': 
            return $bibarr[$key][1];
            break;
          case 'nocite': 
          case '*'     : 
            return;
            break;
          default: 
            // Check if the key exists in the array before accessing it
            if (isset($bibarr[$key]) && is_array($bibarr[$key]) && isset($bibarr[$key][0])) {
              $citenum = $bibarr[$key][0] + 1;
              return "[<a href='#" . $key . "'>$citenum</a>" . $sdata . "]";
            } else {
              // Handle the case where the key doesn't exist or the value is invalid
              return "[<a href='#" . $key . "'>N/A</a>" . $sdata . "]";
            }
          }
        }, $m[1], $m[2], $m[4]);
        $content = str_replace( $m[0], $replace, $content);
        // \citelist
        $content = preg_replace( "/\\\\citelist\{(.*?)\}/ims", '$1', $content );
        $content = preg_replace( '/(<a(.*?)>\d+<\/a>)\]\s*\[/ims', '$1, ', $content );
      }
      return $content;
    }

    public function l2h_latex_parse_custom( $content ){
      // for \step{step content} => Step 1. step content
      $stepnum  = 0;
      $stepname = $this->thmenv['step'];
      while(preg_match( '/\\\\step\s*(\{\s*(((?>[^{}]+)|(?1))*)\s*\}(<br\s*\/?>)?)/ims', $content, $m ) ){
        $stepnum += 1;

        $content = str_replace( $m[0], "<br /><span class='latex_step_h'>$stepname $stepnum.</span> <span class='latex_step_name'>$m[2]</span>.  ", $content );
        //die(var_export($m)); 
      }
      // for flushright
      $content = preg_replace('/\\\\begin{(flushright|flushleft)}(.*?)\\\\end{\\1}/s', '<div class="latex_$1">$2</div>', $content);
      // for quotation
      $content = preg_replace('/\\\\begin{\s*(description|quotation)\s*}(.*?)\\\\end{\s*\\1\s*}/s', '<div class="latex_$1">$2</div>', $content);
      return $content;
    }
    public function l2h_latex_parse_cleanup( $content )
    {
      //remove \documentclass and \usepackage
      $content = preg_replace('/\\\\(documentclass|usepackage)\s*(\[.*?\])?\s*\{[^\}]*\}(?:\s*%[^\r\n]*)?/ims', '', $content);
      //remove \bibliography...
      $content = preg_replace('/\\\\(bibliographystyle|bibliography)\s*\{\s*.*?\s*\}\s*(<br\s*\/?>)?/ims', '', $content);
      //remove \begin{document}...\end{document}
      $content = preg_replace('/\\\\begin\s*\{\s*document\s*\}(.*?)\\\\end\s*\{\s*document\s*\}(<br\s*\/?>)?/ims', '$1', $content);
      //remove \maketitle
      $content = preg_replace('/\\\\maketitle(<br\s*\/?>)?/ims', '', $content);
      //remove index
      $content = preg_replace('/\\\\index\s*\{\s*(([^\{\}]*?(\{[^\{\}]*?\})*?)*)\s*\}/ims', '', $content);
      //remove unsupported command
      $content = preg_replace('/\\\\hypersetup{[^}]*}/ims', '', $content);
      $content = preg_replace('/\\\\(setlength|addtolength|calclayout|setcounter|hyphenation|numberwithin|subjclass|vspace|fontfamily|selectfont|theoremstyle|par|footnotesize)(?![a-zA-Z])\*?(\s*\\[[^\]]*\])?(\s*\\{[^}]+\}(\s*\\{[^}]+\})?)?/', '', $content);

      //newcommand should placed at setting page of latex2html plugin
      $content = preg_replace('/\\\\(re)?newcommand\s*\\{\\\\\w+\\}\s*\\{\\\\?\w+\s*(\\{[^}]*\\})?\s*\\}\s*/ims', '', $content);
      //remove theorem environment, it should be use the template \begin{thm}...\end{thm}
      $content = preg_replace('/\\\\newtheorem\s*{\w+}\s*(\\[[^\\]]*\\])?\s*{\w+}\s*(\\[[^\\]]*\\])?/ims', '', $content);

      //remove comment: start with %
      // Step 1: Temporarily replace valid `%` in URLs to protect them
      $content = preg_replace_callback('/https?:\/\/[^\s]*%[^\s]*/', function($matches) {
        return str_replace('%', '__PERCENT__', $matches[0]);  // Replace % in URLs with a placeholder
      }, $content);

      // Step 2: Temporarily replace `\%` (escaped percent) to protect it
      $content = str_replace('\\%', '__ESCAPED_PERCENT__', $content);

      // Step 3: Temporarily replace `%` inside HTML tags (including attributes like `style="..."`)
      $content = preg_replace_callback('/(<[^>]*%[^>]*>)/', function($matches) {
        return str_replace('%', '__TAG_PERCENT__', $matches[0]);
      }, $content);

      // Step 4: Remove LaTeX-style comments (everything after `%` in text content)
      $content = preg_replace('/(^|[^<])%.*/m', '$1', $content);

      // Step 5: Restore protected `%` occurrences
      $content = str_replace('__PERCENT__', '%', $content);
      $content = str_replace('__ESCAPED_PERCENT__', '%', $content);
      $content = str_replace('__TAG_PERCENT__', '%', $content);


      //replace \\ to <br>
      $content = preg_replace('/\\\\\\\\\[[^]]*\]/ims', '<br>', $content);
      //remove the empty <p>
      $content = preg_replace('/<p>\s*<\/p>/ims', ' ', $content);
      //remove duplicated <br>
      $content = preg_replace('/(<br\s*\/?>)\s*\1/ims', '$1', $content);
      return $content;
    }
  }
}
