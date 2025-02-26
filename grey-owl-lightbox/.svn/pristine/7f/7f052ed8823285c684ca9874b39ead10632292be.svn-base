<tr>
    <td class="event-name">go-lightbox</td>
    <td class="description"><?php esc_html_e('To activate the html attributes in the button you need to add the attribute “go-lightbox”', 'greyowl'); ?></td>
</tr>
<tr>
    <td class="example-code" colspan="2">
        <div class="example-code-wrapper">
            <pre class="example-code-box" data-page-type="example.html">
<code>
&#60;<span class="c-red">button</span> <span class="c-turquoise">go-lightbox</span>&#62; open lightbox &#60;/<span class="c-red">button</span>&#62;</code>
            </pre>
        </div>
    </td>
</tr>
<tr>
    <td class="event-name">data-go-image</td>
    <td class="description"><?php esc_html_e('opens image in lightbox', 'greyowl'); ?></td>
</tr>
<tr>
    <td class="example-code" colspan="2">
        <div class="example-code-wrapper">
            <pre class="example-code-box" data-page-type="example.html">
<code>
&#60;<span class="c-red">button</span> <span class="c-turquoise">go-lightbox</span> <span class="c-yellow">data-go-image</span>="<span class="c-green">https://your.site/image-path/image.jpg</span>"&#62; open image &#60;/<span class="c-red">button</span>&#62;</code>
            </pre>
        </div>
    </td>
</tr>
<tr>
    <td class="event-name">data-go-video-url</td>
    <td class="description"><?php esc_html_e('opens video in lightbox, returns an embed, works on the basis of a wordpress object', 'greyowl'); ?></td>
</tr>
<tr>
    <td class="event-name">data-go-video-widt</td>
    <td class="description"><?php esc_html_e('maximum video width', 'greyowl'); ?></td>
</tr>
<tr>
    <td class="example-code" colspan="2">
        <div class="example-code-wrapper">
            <pre class="example-code-box" data-page-type="example.html">
<code>
&#60;<span class="c-red">button</span> <span class="c-turquoise">go-lightbox</span> <span class="c-yellow">data-go-video-url</span>="<span class="c-green">https://www.example-tube.com/your-video</span>" <span class="c-yellow">data-go-video-width</span>="<span class="c-green">1200</span>"&#62; open video &#60;/<span class="c-red">button</span>&#62;</code>
            </pre>
        </div>
    </td>
</tr>
<tr>
    <td class="event-name">data-go-ajax-callback</td>
    <td class="description"><?php esc_html_e('Creates the request ajax and returns the data from the function na in the file function.php', 'greyowl'); ?></td>
</tr>
<tr>
    <td class="example-code" colspan="2">
        <div class="example-code-wrapper">
            <pre class="example-code-box" data-page-type="example.html">
<code>
&#60;<span class="c-red">button</span> <span class="c-turquoise">go-lightbox</span> <span class="c-yellow">data-go-ajax-callback</span>="<span class="c-green">example_attribute_callback</span>"&#62; open lightbox &#60;/<span class="c-red">button</span>&#62;</code>
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
    <span class="c-blue">gol_set_callback</span>( <span class="c-green">'example_attribute_callback'</span>, <span class="c-green">'your_function_action_2'</span> );
}
<span class="c-purple">function</span> <span class="c-blue">your_function_action_2</span>( <span class="c-red">$params</span> ){
    <span class="comment-text">// do something...</span>
}</code>
            </pre>
        </div>
    </td>
</tr>
<tr>
    <td class="event-name">data-go-callback-params</td>
    <td class="description"><?php esc_html_e('With this attribute, you can pass parameters to the callback function', 'greyowl'); ?></td>
</tr>
<tr>
    <td class="example-code" colspan="2">
        <div class="example-code-wrapper">
            <pre class="example-code-box" data-page-type="example.html">
<code>
&#60;<span class="c-red">button</span> <span class="c-turquoise">go-lightbox</span> <span class="c-yellow">data-go-ajax-callback</span>="<span class="c-green">example_callback_2</span>" <span class="c-yellow">data-go-callback-params</span>="<span class="c-green">example_params_2</span>"&#62; click me &#60;/<span class="c-red">button</span>&#62;</code>
            </pre>
        </div>
    </td>
</tr>
<tr>
    <td class="example-code" colspan="2">
        <div class="example-code-wrapper">
            <pre class="example-code-box" data-page-type="script.js">
<code>
<span class="c-purple">function</span> <span class="c-blue">example_params_2</span>(){
    <span class="c-purple">var</span> obj_params = { <span class="c-light-red">param_key</span> : <span class="c-green">'param_value'</span> };
    <span class="c-purple">return</span> obj_params;
};</code>
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
    <span class="c-blue">gol_set_callback</span>( <span class="c-green">'example_callback_2'</span>, <span class="c-purple">function</span>( <span class="c-red">$params</span> ){
        <span class="c-turquoise">echo</span> <span class="c-red">$params</span>[<span class="c-green">'param_key'</span>];
    });
}</code>
            </pre>
        </div>
    </td>
</tr>
