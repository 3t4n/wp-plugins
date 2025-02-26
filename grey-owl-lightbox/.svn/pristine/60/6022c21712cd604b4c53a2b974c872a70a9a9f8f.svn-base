<tr>
    <td class="event-name" colspan="2">
        <h3 class="table-part-title"><span class="goi-code"></span> <?php esc_html_e('Opens HTML element from DOM in lightbox', 'greyowl'); ?></h3>
        <a href="https://www.youtube.com/watch?v=U5DNY7g6bik" class="link-to-tutorial" target="_blank"><?php esc_html_e('view example video in YouTube', 'greyowl'); ?></a>
    </td>
</tr>
<tr>
    <td class="event-name">dom_html_element</td>
    <td class="description">
        <?php esc_html_e('opens html element in lightbox (does not copy javascript events)', 'greyowl'); ?>
    </td>
</tr>
<tr>
    <td class="event-name">width</td>
    <td class="description">
        <?php esc_html_e('width lightbox (responsive)', 'greyowl'); ?>
    </td>
</tr>
<tr>
    <td class="event-name">height</td>
    <td class="description">
        <?php esc_html_e('height lightbox (responsive)', 'greyowl'); ?>
    </td>
</tr>
<tr>
    <td class="event-name">before_open</td>
    <td class="description">
        <?php esc_html_e('This event has one parameter: is parameter returns the code as a jQuery object', 'greyowl'); ?>
    </td>
</tr>
<tr>
    <td class="event-name">variables</td>
    <td class="description">
        <?php esc_html_e('replaces variables in HTML code ( %1%, %example% ), two constructions can be used', 'greyowl'); ?>:
        <ul>
            <li><?php esc_html_e('object allows you to use static variables', 'greyowl'); ?> : { var_1 : 'name', var_2 : 'age' }</li>
            <li><?php esc_html_e('function allows you to use dynamic variables', 'greyowl'); ?> : function(){ return { var_1 : jQuery('input').val() } }</li>
        </ul>
    </td>
</tr>
<tr>
    <td class="event-name">html element attribute [data-gol-content]</td>
    <td class="description">
        <?php esc_html_e('hides an html element on the page', 'greyowl'); ?>
    </td>
</tr>
<tr>
    <td class="example-code" colspan="2">
        <div class="example-code-wrapper">
            <pre class="example-code-box" data-page-type="example.html">
<code>
&lt;<span class="c-red">button</span> <span class="c-yellow">class</span>="<span class="c-green">button-class</span>" <span class="c-yellow">data-color-text</span>="<span class="c-green">#6495ED</span>"&gt; open lightbox &lt;/<span class="c-red">button</span>&gt;</code>
            </pre>
        </div>
    </td>
</tr>
<tr>
    <td class="example-code" colspan="2">
        <div class="example-code-wrapper">
            <pre class="example-code-box" data-page-type="example.html">
<code>
&#60;<span class="c-red">div</span> <span class="c-yellow">class</span>="<span class="c-green">inside-element-class</span>" <span class="c-turquoise">data-gol-content</span>&#62;
    &#60;<span class="c-red">div</span> <span class="c-yellow">style</span>="<span class="c-green">color:</span><span class="c-light-red">%color%</span>"&#62;
        &#60;<span class="c-red">p</span>&#62; Your name: <span class="c-light-red">%1%</span> &#60;/<span class="c-red">p</span>&#62;
        &#60;<span class="c-red">p</span>&#62; Your age: <span class="c-light-red">%2%</span> &#60;/<span class="c-red">p</span>&#62;
        &#60;<span class="c-red">p</span>&#62; Your description: <span class="c-light-red">%var_desc%</span> &#60;/<span class="c-red">p</span>&#62;
    &#60;/<span class="c-red">div</span>&#62;
&#60;/<span class="c-red">div</span>&#62;
</code>
            </pre>
        </div>
    </td>
</tr>
<tr>
    <td class="example-code" colspan="2">
        <div class="example-code-wrapper">
            <pre class="example-code-box" data-page-type="script.js">
<code>
<span class="c-blue">jQuery</span>(<span class="c-green">'.button-class'</span>).<span class="c-blue">GreyOwlLightbox</span>(<span class="c-green">'click'</span>, {
    <span class="c-light-red">dom_html_element</span> : <span class="c-green">'inside-element-class'</span>,
    <span class="c-light-red">variables</span> : <span class="c-purple">function</span>(){
        <span class="c-purple">return</span> {
            <span class="c-light-red">width</span> : <span class="c-green">600</span>,
            <span class="c-light-red">height</span> : <span class="c-green">400</span>,
            <span class="c-light-red">1</span> : <span class="c-green">'Example Name'</span>,
            <span class="c-light-red">2</span> : <span class="c-yellow">21</span>,
            <span class="c-light-red">var_desc</span> : <span class="c-green">'example text'</span>,
            <span class="c-light-red">color</span> : <span class="c-blue">jQuery</span>( this ).<span class="c-blue">attr</span>(<span class="c-green">'data-color-text'</span>)
        }
    },
    <span class="c-light-red">before_open</span> : <span class="c-purple">function</span>( content ){ <span class="comment-text">// <span class="goi-info-b"></span> content = jQuery('[data-gol-content-box]') this lightbox content</span>
        content.<span class="c-blue">find</span>(<span class="c-green">'.inside-element-class a'</span>).<span class="c-blue">on</span>(<span class="c-green">'click'</span>, <span class="c-purple">function</span>(){
            <span class="comment-text">// do something...</span>
        });
    }
});</code>
            </pre>
        </div>
    </td>
</tr>
