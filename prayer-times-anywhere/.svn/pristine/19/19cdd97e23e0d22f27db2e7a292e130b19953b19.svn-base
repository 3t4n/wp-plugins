<?php
require_once('PrayerTimePrinter.php');
ini_set('auto_detect_line_endings', true);

$timetable = new PrayerTimePrinter();

if (! empty($_POST['p_t_a_location'])){
    $location = $_POST['p_t_a_location'];
    delete_option('p_t_a_location');
    add_option('p_t_a_location', $location);
} else {
    delete_option('p_t_a_location');
}

if (! empty($_POST['p_t_a_prayersLocal'])){
    $prayersLocal = $_POST['p_t_a_prayersLocal'];
    delete_option('p_t_a_prayersLocal');
    add_option('p_t_a_prayersLocal', $prayersLocal);
}

if ( ! empty($_POST['p_t_a_numbersLocal'])){
    $numbersLocal = $_POST['p_t_a_numbersLocal'];
    delete_option('p_t_a_numbersLocal');
    add_option('p_t_a_numbersLocal', $numbersLocal);
}

if (! empty($_POST['prayerMethod'])){
    $prayerMethod = trim($_POST['prayerMethod']);
    delete_option('prayerMethod');
    add_option('prayerMethod', $prayerMethod);
}
?>
<div id="pta_language">
    <h1>Change Language</h1>
    <form enctype="multipart/form-data" name="csvUpload" method="post" action="">
    <table border="1" class="admin">
        <tr><th colspan="6">Display prayer name in your language</th></tr>
        <tr><th>Fajr</th><th>Sunrise</th><th>Zuhr</th><th>Asr</th><th>Magrib</th><th>Isha</th></tr>
        <tr>
            <?php $prayers = $timetable->getLocalPrayerNames();
            foreach($prayers as $key => $val) { ?>
                <td><input type="text" name="p_t_a_prayersLocal[<?php echo $key;?>]" value="<?php echo $val;?>"/></td>
            <?php } ?>
        </tr>
    </table>
    </br>
    <table border="1" class="admin">
        <tr><th colspan="10">Numbers in your language</th></tr>
        <tr>
            <?php $numbers = $timetable->getLocalNumbers();
            foreach($numbers as $key => $val) { ?>
                <th><?php echo $key ?></th>
            <?php } ?>
        </tr>
        <tr>
            <?php foreach($numbers as $key => $val) { ?>
                <td><input type="text" maxlength="1" size="1" name="p_t_a_numbersLocal[<?php echo $key;?>]" value="<?php echo $val;?>"/></td>
            <?php } ?>
        </tr>
    </table>
    <?php submit_button('Translate Language');?>
    </form>
</div>
<div class="shortcodes">
    <h3>SHORTCODES</h3>
    <dl>
        <dt><b>[prit_pta]</b></dt>
        <dd>Print prayer start time vertically</dd>
        <dt><b>[prit_pta layout='horizontal']</b></dt>
        <dd>Print prayer start time horizontally</dd>
        <dt><b>[prit_pta theme='dark']</b></dt>
        <dd>Print prayer start time in dark theme. Other option is 'noBorder'</dd>
        <dt><b>[prit_pta location='New York']</b></dt>
        <dd>Print prayer start time for New York</dd>
        <dt><b>[prit_pta method=3]</b></dt>
        <dd>Print prayer start time for 3</dd>
        <pre>
            5 = Muslim World League
            1 = Egyptian General Authority of Survey
            2 = University Of Islamic Sciences, Karachi (Shafi
            3 = University Of Islamic Sciences, Karachi (Hanafi)
            4 = Islamic Circle of North America
            6 = Umm Al-Qura
            7 = Fixed Isha

        </pre>
    </dl>
</div>
