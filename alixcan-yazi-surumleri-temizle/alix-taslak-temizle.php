<?php
/*
Plugin Name: Taslak,Yazı Sürümlerini Kaldır
Plugin URI: http://alixcan.net/wordpress/eklentiler/wordpress-yazi-surumlerini-temizlemek-icin-plugin.html
Description: Sitenizdeki Yazı Tasalaklarını Ve Eski Yazı Sürümlerinizi Temizlemenize Yarıyan Ufak Bir Eklenti.
Version: 0.1
Date: 2011-05-11
Author: AlixcaN
Author URI: http://alixcan.net
*/

/**
 * @author AlixcaN
 * @copyright 2011
 * @mail AlixcaN@AlixcaN.Net
 */



//admin Menü Lünki Ekledik
add_action('admin_menu', 'da');

function da(){
  add_submenu_page( 'options-general.php', 'Taslak Temizle | AlixcaN', '&bull; Taslak Temizle', 6, 'AlixcaN-temizle', 'alix');
}

function alix(){?>
   
<div class="wrap"><div id="icon-options-general" class="icon32"><br /></div>
<h2>Yazı Sürümlerini Ve Taslakları Temizleyin</h2>
<table cellpadding="5" cellspacing="5" width="100%" class="form-table">
<tr>
    <td>
        <table class="form-table"><tbody><?php
        if (isset($_GET['islem'])){$islem = $_GET['islem'];}else{$islem = 'default';}
            switch ($islem){
                case 'yapilicak':
                echo '<tr><td>';
                    $durum = $_POST['kaldirsinmi'];
                    $pos = $_POST['Alix_Submit'];
                    if($pos){
                         if($durum == 'h'){
                               echo 'SEÇİM: Hayır. İşlem Yapılmayacaktır.';
                            }elseif($durum == 'e'){
                                echo 'SEÇİM: Evet.<br /> Tüm Veriler Siliniyor Lütfen Bekleyin?';
                                
                                $sql2 = mysql_query("DELETE a,b,c FROM wp_posts a LEFT JOIN wp_term_relationships b ON (a.ID = b.object_id) LEFT JOIN wp_postmeta c ON (a.ID = c.post_id) WHERE a.post_type = 'revision'");
                                if($sql2){
                                    echo '<div id="setting-error-settings_updated" class="updated settings-error"><p><strong>Tüm Veriler Silindi.</strong></p></div>';
                                    $sql3 = mysql_query("SELECT ID,post_title FROM wp_posts WHERE post_type = 'revision' ORDER BY ID asc");
                                    echo '<br />Toplam: '.mysql_num_rows($sql3).' Kayıt Silindi.<br />';
                                    echo '10 Saniye İçinde Yönlendiriliceksiniz.';
                                    header("Refresh: 10; url=options-general.php?page=AlixcaN-temizle");
                                }else{
                                    echo '<div id="setting-error-settings_updated" class="updated settings-error" style="background:red;"><p><strong>Silme İşlemi Sırasında Bir Hata Oluştu.</strong></p></div>';
                                    echo 'Veriler Silinirken Bir Hata Oluştu.<br /><strong>HATA:</strong> Sql Sorgusu Yapılamadı';
                                }
                                
                                
                            }elseif($durum == 'l'){
                                echo '<h3>Tüm Sürümler Listeleniyor!</h3>';
                                $sql = mysql_query("SELECT ID,post_title FROM wp_posts WHERE post_type = 'revision' ORDER BY ID asc");
                                echo 'Toplam: '.mysql_num_rows($sql).' Kayıt Bulundu.';
                                echo '<table><tr><td><strong>ID</strong></td><td><strong>Konu Adı</strong></td></tr>';
                                while($row = mysql_fetch_object($sql)){
                                    echo '<tr><td>#'.$row->ID.'</td><td>'.$row->post_title.'</td></tr>';
                                }
                                echo '</tr></table>';
                            }else {echo '<div id="setting-error-settings_updated" class="updated settings-error" style="background:red;"><p><strong>Yanlış İşlem Biçimi</strong></p></div>';}
                    }
                echo '</tr></td>';
                break;
                
                default:
                    echo '
                    <form method="post" action="options-general.php?page=AlixcaN-temizle&islem=yapilicak">
                   <tr>
                    <th scope="row">Verileri Kaldırmak<br />İstediğinizden Eminmisiniz?</th>
                        <td>
                            <fieldset><legend class="screen-reader-text"><span>Kaldırılsınmı ?</span></legend>
                                <label title="Hayır"><input type="radio" name="kaldirsinmi" value="h" checked="checked"/> <span>Hayır</span></label><br />
                                <label title="evet"><input type="radio" name="kaldirsinmi" value="e"/> <span>Evet</span></label><br />
                                <label title="listele"><input type="radio" name="kaldirsinmi" value="l"/> <span>Sadece Listele</span></label><br />
                            </fieldset>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <p class="submit"><input type="submit" name="Alix_Submit" id="submit" class="button-primary" value="Devam Et"></p>
                        </td>
                    </tr>
                </form>
                    ';
                    } /*switch biter*/ ?>
</tbody></table>
</td>
    <td valign="top" width="205">
    <a href="http://www.alixcan.net"><img src="https://s3.amazonaws.com/AlixcaNSite/alixcan_logo.png" alt=""/></a><br />
    Yazara Destek Olmak İstermisiniz ?<br /><div align="center">
    <form action="https://www.paypal.com/cgi-bin/webscr" method="post">
    <input type="hidden" name="cmd" value="_s-xclick">
    <input type="hidden" name="hosted_button_id" value="YSPHWT5EA6Q4E">
    <input type="image" src="https://www.paypalobjects.com/WEBSCR-640-20110429-1/tr_TR/TR/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - Online ödeme yapmanın daha güvenli ve kolay yolu!">
    <img alt="" border="0" src="https://www.paypalobjects.com/WEBSCR-640-20110429-1/en_US/i/scr/pixel.gif" width="1" height="1">
    </form></div></td>
</tr>
<tr>
    <td>Oluşabilicek Sorunlardan Hiç Bir Şekilde Sorumluluk Kabul Edilmez. Uygulama Yapmadan Önce Yedek Almayı Unutmayın.<br />Plugin ile İlgili Mailler Dikkate Alınmadan Silinicektir Sadece Plugin Konusuna Yapılan Yorumalara Cevap Verilicektir. http://alixcan.net?p=867<br />Yazar:<a href="http://www.alixcan.net/">AlixcaN</a> | İletişim: <a href="http://www.alixcan.net/iletisim">Burdan</a> | Plugin İle Sorunlar İçin <a href="http://alixcan.net?p=867">Burdan</a> İletişime Geçin.</td>
</tr>
</table>
</div>    
<?php 
}