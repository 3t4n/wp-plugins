<tr>
    <td class="event-name" colspan="2">
        <h3 class="table-part-title"><span class="goi-code"></span> <?php esc_html_e('AJAX callback', 'greyowl'); ?></h3>
        <a href="https://www.youtube.com/watch?v=ZCJVM2L0Zkg" class="link-to-tutorial" target="_blank"><?php esc_html_e('view example video in YouTube', 'greyowl'); ?></a>
    </td>
</tr>
<tr>
    <td class="event-name">callback_ajax</td>
    <td class="description">
        <?php esc_html_e('This event makes an Ajax request, to register the request, in the function.php file use the function', 'greyowl'); ?> gol_set_callback ( 'event_name', 'your_function' );
    </td>
</tr>
<tr>
    <td class="event-name">callback_ajax_params</td>
    <td class="description"><?php esc_html_e('this event serves to transfer parameters to the php function.', 'greyowl'); ?></td>
</tr>
<tr>
    <td class="event-name">before_open</td>
    <td class="description">
        <?php esc_html_e('This event has two parameters:', 'greyowl'); ?><br>
        1) <?php esc_html_e('the first parameter returns the code as a jQuery object', 'greyowl'); ?><br>
        2) <?php esc_html_e('transfer data from the php file to the second parameter of the event using this function "gol_callback_parameters( array() )"', 'greyowl'); ?>
    </td>
</tr>
<tr>
    <td class="event-name">after_open</td>
    <td class="description">
        <?php esc_html_e('This event has two parameters:', 'greyowl'); ?><br>
        1) <?php esc_html_e('the first parameter returns the code as a jQuery object', 'greyowl'); ?><br>
        2) <?php esc_html_e('transfer data from the php file to the second parameter of the event using this function "gol_callback_parameters( array() )"', 'greyowl'); ?>
    </td>
</tr>
<tr>
    <td class="event-name">after_close</td>
    <td class="description">
        <?php esc_html_e('The event fires after the lightbox is closed', 'greyowl'); ?>
    </td>
</tr>
<tr>
    <td class="example-code" colspan="2">
        <div class="example-code-wrapper">
            <pre class="example-code-box" data-page-type="script.js">
<code>
<span class="c-blue">jQuery</span>(<span class="c-green">'.button-class'</span>).<span class="c-blue">GreyOwlLightbox</span>(<span class="c-green">'click'</span>, {
    <span class="c-light-red">callback_ajax</span> : <span class="c-green">'example_callback_name'</span>,
    <span class="c-light-red">callback_ajax_params</span> : <span class="c-purple">function</span>(){
        <span class="c-purple">return</span> { <span class="c-purple">name</span> : <span class="c-green">'Your Name'</span>, <span class="c-purple">age</span> : <span class="c-yellow">21</span> };
    },
    <span class="c-light-red">before_open</span> : <span class="c-purple">function</span>( content, params ){
        var returned_value = params.your_key;
        content.<span class="c-blue">find</span>(<span class="c-green">'.inside-element-class'</span>).<span class="c-blue">on</span>(<span class="c-green">'click'</span>, <span class="c-purple">function</span>(){
            <span class="comment-text">// do something...</span>
        });
    },
    <span class="c-light-red">after_open</span> : <span class="c-purple">function</span>( content, params ){
        <span class="c-purple">var</span> returned_value = params.your_key;
        content.<span class="c-blue">find</span>(<span class="c-green">'.inside-element-class'</span>).<span class="c-blue">on</span>(<span class="c-green">'click'</span>, <span class="c-purple">function</span>(){
            <span class="comment-text">// do something...</span>
        });
    },
    <span class="c-light-red">after_close</span> : <span class="c-purple">function</span>(){
        <span class="comment-text">/* <span class="goi-info-b"></span> fire the event after closing the Lightbox */</span>
        <span class="c-blue">your_event_after_closing_lightbox</span>();
    },
});</code>
            </pre>
        </div>
    </td>
</tr>
<tr>
    <td class="example-code" colspan="2">
        <div class="example-code-wrapper">
            <pre class="example-code-box" data-page-type="function.php">
<code>
<span class="comment-text"><span class="goi-attention-c-filled"></span> /* to avoid errors, if the plugin suddenly disconnects, use "function_exists" (recommended) */</span>
<span class="c-purple">if</span>( <span class="c-turquoise">function_exists</span>(<span class="c-green">'gol_set_callback'</span>) ){
    <span class="c-blue">gol_set_callback</span>( <span class="c-green">'example_callback_name'</span>, <span class="c-green">'your_function_action_1'</span> );
}
<span class="c-purple">function</span> <span class="c-blue">your_function_action_1</span>( <span class="c-red">$params</span> ){
    <span class="comment-text"><span class="goi-attention-c-filled"></span> /* to avoid errors, if the plugin suddenly disconnects, use "function_exists" (recommended) */</span>
    <span class="c-purple">if</span>( <span class="c-turquoise">function_exists</span>(<span class="c-green">'gol_callback_parameters'</span>) ){
        <span class="comment-text">/* <span class="goi-info-b"></span> returns data to the second parameter of the "before_open" event */</span>
        <span class="c-red">$return_params</span> = <span class="c-turquoise">array</span>( <span class="c-green">'your_key'</span> <span class="c-turquoise">=></span> <span class="c-green">'yout value'</span> );
        <span class="c-blue">gol_callback_parameters</span>( <span class="c-red">$return_params</span> );
    }
    <span class="c-turquoise">echo</span> <span class="c-green">'&#60;p&#62; your name: '</span> . <span class="c-red">$params</span>[<span class="c-green">'name'</span>] . <span class="c-green">'&#60;/p&#62;'</span>;
    <span class="c-turquoise">echo</span> <span class="c-green">'&#60;p&#62; your age: '</span> . <span class="c-red">$params</span>[<span class="c-green">'age'</span>] . <span class="c-green">'&#60;/p&#62;'</span>;
}</code>
            </pre>
        </div>
    </td>
</tr>
