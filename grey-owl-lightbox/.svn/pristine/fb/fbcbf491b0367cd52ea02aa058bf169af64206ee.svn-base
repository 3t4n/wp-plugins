<tr>
    <td class="event-name" colspan="2">
        <h3 class="table-part-title"><span class="goi-youtube"></span> <?php esc_html_e('Opens video in lightbox', 'greyowl'); ?></h3>
        <a href="https://www.youtube.com/watch?v=yUYKzRo2Tbc" class="link-to-tutorial" target="_blank"><?php esc_html_e('view example video in YouTube', 'greyowl'); ?></a>
    </td>
</tr>
<tr>
    <td class="event-name">embed_url</td>
    <td class="description"><?php esc_html_e('opens video in lightbox, returns an embed, works on the basis of a wordpress object', 'greyowl'); ?></td>
</tr>
<tr>
    <td class="event-name">max_width</td>
    <td class="description"><?php esc_html_e('maximum video width', 'greyowl'); ?></td>
</tr>
<tr>
    <td class="example-code" colspan="2">
        <div class="example-code-wrapper">
            <pre class="example-code-box" data-page-type="example.html">
<code>
&lt;<span class="c-red">button</span> <span class="c-yellow">class</span>="<span class="c-green">button-class</span>"&gt; open video &lt;/<span class="c-red">button</span>&gt;
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
    <span class="c-light-red">embed_url</span> : <span class="c-green">'https://www.youtube.com/example_youtube_video'</span>,
    <span class="c-light-red">max_width</span> : <span class="c-yellow">1200</span>
});

<span class="comment-text">//-----------------  OR  --------------------//</span>

<span class="c-blue">jQuery</span>(<span class="c-green">'.button-class'</span>).<span class="c-blue">GreyOwlLightbox</span>(<span class="c-green">'click'</span>, <span class="c-purple">function</span>(){
    <span class="c-purple">return</span> {
        <span class="c-light-red">embed_url</span> : <span class="c-blue">jQuery</span>( <span class="c-purple">this</span> ).<span class="c-blue">attr</span>(<span class="c-green">'data-url-video'</span>), <span class="comment-text">// <span class="goi-info-b"></span> data attribute with video address can be added to the button</span>
        <span class="c-light-red">max_width</span> : <span class="c-yellow">1200</span>
    }
});</code>
            </pre>
        </div>
    </td>
</tr>
