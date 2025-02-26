CODE FACE SYNTAX HIGHLIGHTER

  Author: Donald Sipe <donald.sipe@gmail.com>
  Website: http://djsipe.com
  Version: 1.0

  This plugin is intended to provide on-demand syntax highlighting for
  programming code.  It supports many programming languages.  Code blocks are
  automatically detected within the HTML of your posts through JavaScript. Only 
  the needed language highlighting resources are loaded. Supported languages: 
  C++, C#, CSS, Delphi, Java, JavaScript, PHP, Python, Ruby, SQL, VB, XML/HTML.

  This package includes the "syntaxhighlighter" project:
  http://www.dreamprojections.com/syntaxhighlighter



INSTALLATION

  To install this plugin, unzip and copy the "codeface" directory into your 
  plugins directory.  This is typically /wp-content/plugins.
  
  Next, check that the theme you are using contains the following PHP function 
  call:  "wp_footer();".  This will be typically found somewhere in the 
  "footer.php" file.  If your theme doesn't contain this call, copy the
  following code into your footer above the closing </body> tag:
  
      <?php wp_footer(); ?>
  
  Finally, log into the WordPress Admin section and activate the plugin.


  
USAGE

  To highlight the code syntax of a given post, open the post for editing.  You
  should see two tabs "Visual" and "Code" above the rich text editor WordPress 
  provides.  Click the "Code" tab.  From there you can edit the HTML of your
  post.
    
  To use code highlighting, you'll have to wrap your example code in a <pre> or 
  <textarea> tag and pick the CSS class name for your language (see class names 
  below). For example:
  
      <pre class="php-codeface">
          <?php
               require_once "myFile.php";
          ?>
      </pre>
  
  NOTE: It's recommended you do *NOT* use <textarea> tags in your posts.  It 
  tends to freak out WordPress and you can end up loosing part or all of your 
  post.
  
  Code Face supports syntax highlighting for many different languages. You can
  select the appropriate language by adding a "class" attribute to the <pre> or
  <textarea> tag, like the example above.  Here are the class names you can use
  and the language they represent:
  
        CSS Class Name      Language
        ------------------  --------
        cplusplus-codeface  C++
        csharp-codeface     C#
        css-codeface        CSS
        delphi-codeface     Delphi
        java-codeface       Java
        js-codeface         JavaScript
        python-codeface     Python
        php-codeface        PHP
        ruby-codeface       Ruby
        sql-codeface        SQL
        vb-codeface         VB
        xml-codeface        XML
        html-codeface       HTML (alias for XML)
  
  When you finish editing your post, save it.  Code Face will automatically
  detect the code blocks and highlight them for you when you view it on the 
  front-end.