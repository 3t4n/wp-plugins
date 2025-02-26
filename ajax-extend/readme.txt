=== ajax-extend ===
Contributors: sunjanle
Tags: ajax, AJAX, Ajax, javascript, plugins, functions, core functions, plugin functions
Requires at least: 3.1
Tested up to: 3.2.1
Stable tag: 1.0    

'ajax-extend' allows you call functions, a function in one plugin or a function you write or even a core wordpress function, via Ajax, in the easiest way.

== Description ==

ajax-extend allows you call functions, a function in one plugin or a function you write or even a core wordpress function, via Ajax, in the easiest way.

Example:
The javascript code:
<pre style="font: 9pt Verdana, Fixedsys, Verdana, Tahoma;">
$j.ajax( {
    url : home_url,
    type : <font color=#FF00FF>'POST'</font>,
    dataType : <font color=#FF00FF>'html'</font>,
    data : {
        <font color=#FF00FF>'ajax&#95;extend&#95;mark'</font> : 1, <font color=#008000>/* this is indispensable if you want ajax-extend to call the function you need. */</font>
        <font color=#FF00FF>'ajax&#95;extend&#95;action'</font> : <font color=#FF00FF>'my&#95;<font color=#0000FF>function</font>'</font>, <font color=#008000>/* the function name (a WP core function, or a function in one plugin. any functions loaded by wp()) */</font>
        <font color=#FF00FF>'name'</font> : <font color=#FF00FF>'sunjianle'</font>,
    },
    success : <font color=#0000FF>function</font>(data, textStatus, errorThron) {
        alert(data);
    }
});
</pre>

The background PHP code:
<pre style="font: 9pt Verdana, Fixedsys, Verdana, Tahoma;">
<font color=#0000FF>function</font> my_function()
{
    $name = $_POST[<font color=#FF00FF>"name"</font>];
    <font color=#FF0000>echo</font> <font color=#FF00FF>"Hello, "</font> . $name;

    <font color=#0000FF>global</font> $wpdb;
    $query_sql = "select user_login
                from wp_users
                limit 0,10";
    $users = $wpdb-&gt;get_results($wpdb-&gt;prepare($query_sql));
    foreach($users as $user){
        <font color=#FF0000>echo</font> $users-&gt;user_login;
    }
}
</pre>

== Installation ==

Automatic install:
Using the WordPress dashboard
* Login to your weblog
* Go to Plugins
* Select Add New
* Search for ajax-extend
* Select Install
* Select Install Now
* Select Activate Plugin

Manual:
* Upload "ajax-extend" folder to the "/wp-content/plugins/" directory.
* Activate the plugin through the "Plugins" menu in WordPress.

== Frequently Asked Questions ==

= How to do with ajax-extend? =

The javascript code:
<pre style="font: 9pt Verdana, Fixedsys, Verdana, Tahoma;">
$j.ajax( {
    url : home_url,
    type : <font color=#FF00FF>'POST'</font>,
    dataType : <font color=#FF00FF>'html'</font>,
    data : {
        <font color=#FF00FF>'ajax&#95;extend&#95;mark'</font> : 1, <font color=#008000>/* this is indispensable if you want ajax-extend to call the function you need. */</font>
        <font color=#FF00FF>'ajax&#95;extend&#95;action'</font> : <font color=#FF00FF>'my&#95;<font color=#0000FF>function</font>'</font>, <font color=#008000>/* the function name (a WP core function, or a function in one plugin. any functions loaded by wp()) */</font>
        <font color=#FF00FF>'name'</font> : <font color=#FF00FF>'sunjianle'</font>,
    },
    success : <font color=#0000FF>function</font>(data, textStatus, errorThron) {
        alert(data);
    }
});
</pre>

The background PHP code:
<pre style="font: 9pt Verdana, Fixedsys, Verdana, Tahoma;">
<font color=#0000FF>function</font> my_function()
{
    $name = $_POST[<font color=#FF00FF>"name"</font>];
    <font color=#FF0000>echo</font> <font color=#FF00FF>"Hello, "</font> . $name;

    <font color=#0000FF>global</font> $wpdb;
    $query_sql = "select user_login
                from wp_users
                limit 0,10";
    $users = $wpdb-&gt;get_results($wpdb-&gt;prepare($query_sql));
    foreach($users as $user){
        <font color=#FF0000>echo</font> $users-&gt;user_login;
    }
}
</pre>

= How can I test if ajax-extend is working? = 

= How does ajax-extend work? =

<pre style="font: 9pt Verdana, Fixedsys, Verdana, Tahoma;">
add_action( <font color=#FF00FF>"wp"</font>, <font color=#FF00FF>"ajax_operation"</font> );

<font color=#0000FF>function</font> ajax_operation()
{
<font color=#008000>    /*</font>
<font color=#008000>     * ajax_extend_mark : </font>
<font color=#008000>     * ajax_extend_action :</font>
<font color=#008000>     */</font>
    <font color=#0000FF>if</font>(<font color=#FF0000>isset</font>($_REQUEST[<font color=#FF00FF>"ajax_extend_mark"</font>]))
    {
        $function_name = $_REQUEST[<font color=#FF00FF>"ajax_extend_action"</font>];
        <font color=#0000FF>if</font>(!<font color=#FF0000>function_exists</font>($function_name))
            <font color=#0000FF>return</font>;
        <font color=#FF0000>call_user_func</font>($function_name);
        <font color=#FF0000>die</font>();
    }    
}
</pre>

That is the core code and the all code of ajax-extend. What you need to understand the code above.

= Are there any limitations to which functions I can use? =
Yes.
1. Functions must return valid HTML - this will be called in php and returned via the Ajax call
2. Functions cannot accept any parameters (at least at the moment)

== Changelog ==

= 1.0 =
First release

