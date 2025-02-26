<?php
/*
Plugin Name: Add Hierarchical Number To HeadLine
Plugin URI: https://wordpress.org/plugins/add-number-to-headline/
Description: This plug-in is a plug-in that adds a number string that can grasp the heading hierarchy at the head of all headings created by h1 to h9 in the article.
Version: 1.0.5
Author:kosuke
Author URI: http://web-village.com
License: GPL2
*/


/*  Copyright 2017 kosuke (email : clover0001bag@yahoo.co.jp)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as
     published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
/*共通ファイル読み込み*/
include 'include.php';
load_plugin_textdomain('your-unique-name', false, basename( dirname( __FILE__ ) ) . '/languages' ); //多言語化ファイル読み込み

/*プラグイン本体*/
class KOSUKE_cAddNumberToHeadLine{

  /***** プロパティ start *****/
  /*見出しに付与するための数字がなんであるかを格納するための変数*/
  public $arrayNumber;
  /*記事中の最大見出し*/
  public $largeHeadLine;
  /*見出しの検索位置*/
  public $HeadlineSearchPos;

  /*見出しに付与する数字の文字を取得する用の配列*/
  public $arrayNumberTypeChara;
  /*見出しに付与する数字間の文字を取得する変数*/
  public $numberCaughtTypeChara;

  /*見出しに付与する数字の種類*/
  public $numberType;
  /*見出しに付与する数字間の文字の種類*/
  public $numberCaughtType;

  /*一つ前に見つかった見出しを格納する変数*/
  public $beforeHeadline;

  /***** プロパティ end *****/

  public function __construct() {

    /*初期化*/
    $this->HeadlineSearchPos = 0;
    $this->largeHeadLine = 0;
    $this->numberType = '';
    $this->numberCaughtType = '';
    $this->arrayNumberTypeChara = [];
    $this->numberCaughtTypeChara = '';
    $this->beforeHeadline = 0;


    //配列の中身を作成する。
    for ( $i=1; $i <= HEADLINE_TAG_MAX; $i++ ) {
      $this->arrayNumber = ["Number$i"];
    }
    //配列の初期化
    for ( $i=1; $i <= HEADLINE_TAG_MAX; $i++ ) {
      $this->arrayNumber["Number$i"]=0;
    }

    /***** フック *****/
    /*設定ページを追加する*/
    add_action( 'admin_menu', array( $this, "add_plugin_admin_menu" ) );

    /*見出しに数字を追加する*/
    add_filter( 'the_content', array( $this, 'add_number_to_headLine' ) );
  }

  /*設定メニューのサブメニューにメニューを追加*/
  public function add_plugin_admin_menu(){
    /* プラグインページを登録 */
    add_submenu_page( 'options-general.php',
                       'AddHierarchicalHeadlineNumber',
                       'AddHierarchicalHeadlineNumber',
                       'administrator',
                       __FILE__,
                       array( $this, 'display_plugin_admin_page' ));
    /*数字の種類用*/
    register_setting(
         'headline-number-group', // option_group
         'headline_number_type', // option_name
         array( $this,'headline_number_type_validation')); // sanitize_callback
    /*数字間の種類用*/
    register_setting(
         'headline-number-group', // option_group
         'headline_number_Caught_type', // option_name
         array( $this,'headline_number_caught_validation')); // sanitize_callback
  }

  /*保存する数字のタイプの検証*/
  public function headline_number_type_validation($input){
    foreach ( ARRAY_HEAD_LINE_NUMBER_TYPE as $type ) {
      if($type == $input){
        return $input;
      }
    }
    add_settings_error(
           'headline_number_type',
           'HeadlineNumberTypeValidationError',
           __( 'illegal data', 'AddHeadlineNumber' ),
           'error'
      );
  }

  /*保存する数字間の文字の検証*/
  public function headline_number_caught_validation($input){
    foreach ( ARRAY_HEAD_LINE_NUMBER_CAUGHT_TYPE as $type ) {
      if( $type == $input ){
        return $input;
      }
    }
    add_settings_error(
           'headline_number_caught_type',
           'HeadlineNumberTypeCaughtValidationError',
           __( 'illegal data', 'AddHeadlineNumber' ),
           'error'
      );
  }

  /*ユーザー設定画面*/
  public function display_plugin_admin_page() {

    /*スタイルシート読み込み*/
    wp_enqueue_style( 'Add-Headline-Number' ,plugins_url( 'add-hierarchical-number-to-headline.css', __FILE__ ));
    /*保存情報を取得する*/
    $this->numberType = get_site_option( 'headline_number_type', HEADLINE_NUMBER_TYPE_NORMAL); //数字の種類
    $this->numberCaughtType = get_site_option('headline_number_Caught_type',HEADLINE_NUMBER_CAUGHT_TYPE_HYPHEN); //数字間の文字の種類
?>
    <!-- ユーザー設定画面 -->
    <div class="headline_design">
      <h1><?php _e('Heading number management screen') ?></h1>
      <p><?php _e('Please select the information to add to the headline.') ?></p>
      <hr />
      <h3><?php _e('Types of numbers') ?></h3>
        <form action="options.php" method="post">
          <table>
            <?php
              settings_fields( 'headline-number-group' );
              do_settings_sections( 'default' );

              foreach ( ARRAY_HEAD_LINE_NUMBER_TYPE as $type ) {
                echo '<tr><td>';
                echo '<input type="radio" name="headline_number_type" value='.$type.' ';
                if ( $this->numberType == $type ) {
                  echo "checked";
                }
                echo " />$type";
                echo '</td>';
                echo '<td>'.ARRAY_HEAD_LINE_NUMBER_TYPE_STR[ $type ][0].ARRAY_HEAD_LINE_NUMBER_CAUGHT_TYPE_STR[ $this->numberCaughtType ].ARRAY_HEAD_LINE_NUMBER_TYPE_STR[ $type ][1].ARRAY_HEAD_LINE_NUMBER_CAUGHT_TYPE_STR[ $this->numberCaughtType ].ARRAY_HEAD_LINE_NUMBER_TYPE_STR[ $type ][2];
                echo '</td></tr>';
              }
            ?>
          </table>
          <hr>
          <h3><?php _e('Types of characters between numbers') ?></h3>
          <table>
            <?php
              foreach ( ARRAY_HEAD_LINE_NUMBER_CAUGHT_TYPE as $type ) {
                echo "<tr><td>";
                echo '<input type="radio" name="headline_number_Caught_type" value='.$type.' ';
                if ( $this->numberCaughtType == $type ) {
                  echo "checked";
                }
                echo " />$type";
                echo '</td>';
                echo '<td>'.ARRAY_HEAD_LINE_NUMBER_TYPE_STR[ $this->numberType ][0].ARRAY_HEAD_LINE_NUMBER_CAUGHT_TYPE_STR[ $type ].ARRAY_HEAD_LINE_NUMBER_TYPE_STR[ $this->numberType ][1].ARRAY_HEAD_LINE_NUMBER_CAUGHT_TYPE_STR[ $type ].ARRAY_HEAD_LINE_NUMBER_TYPE_STR[ $this->numberType ][2];
                echo '</td></tr>';
              }
             ?>
          </table>
          <?php submit_button(); ?>
        </form>
    </div>
<?php
  }



  /*記事の見出しに数字を追加する */
  public function add_number_to_headLine($the_content){
      //見出しに付与する数字の種類を取得する。
      $this->numberType = get_site_option( 'headline_number_type', HEADLINE_NUMBER_TYPE_NORMAL);
      $this->numberCaughtType = get_site_option('headline_number_Caught_type',HEADLINE_NUMBER_CAUGHT_TYPE_HYPHEN);

      /*見出しに付与する情報を取得する。*/
      $this->arrayNumberTypeChara = ARRAY_HEAD_LINE_NUMBER_TYPE_STR[ $this->numberType ];
      $this->numberCaughtTypeChara = ARRAY_HEAD_LINE_NUMBER_CAUGHT_TYPE_STR[ $this->numberCaughtType ];

      //リセット
      for ( $i=1; $i <= HEADLINE_TAG_MAX; $i++ ) {
        $this->arrayNumber["Number$i"]=0;
      }
      $this->HeadlineSearchPos = 0;
      $this->beforeHeadline = 0;

      /*記事中にある一番大きい見出しを取得する 見出しが見つからなかったら何もしない。*/
      if( $this->largeHeadLine = $this->search_large_number($the_content) ){
        /*見出しが見つからなくなるまで処理を繰り返す*/
        while(1) {
          //次の見出しを検索する。
          if( -1 == ($headLine = $this->search_next($the_content)) ){
            //見出しが見つからないので処理が終了する
            break;
          }
          //見出しに付与する文字列を作成する
          $numberStr = $this->create_number_str($headLine);
          //見出しに文字列を付与する
          $the_content = $this->add_number($numberStr,$the_content);
        } //endwhile;
      } // endif;
    return $the_content;
  } // end AddHeadLineNumber

  /*記事の中から一番大きい見出しを調べる。*/
  public function search_large_number($the_content){

    for ($i=1; $i <= HEADLINE_TAG_MAX ; $i++) {
      $searchStr = '/<h'.$i.'.*?>/i';
      if( preg_match($searchStr,$the_content) ){
        return $i;
      }
    }
    return 0;
  } // end HeadLineLargeNumberSearch

  /*次の見出しが何か検索する。*/
  public function search_next($the_content){
    //見出しが見つかるまで
    while (1) {
      //<hを探す
      $this->HeadlineSearchPos = strpos($the_content, '<h', $this->HeadlineSearchPos);
      if(false === $this->HeadlineSearchPos){
        //見出しが見つからなかったら
        return -1;
      }

      //次に終了タグを探す
      if(false === ($endTagPos = strpos($the_content, '>', $this->HeadlineSearchPos))){
        //終了タグが見つからなかったら
        return -1;
      }

      //見つかった終了タグが見出しのものか調べる。 見出しの終了タグ書き忘れ対応
      $startTagPos = strpos($the_content,'<',$this->HeadlineSearchPos+1);
      if(($endTagPos > $startTagPos) && (false !== $startTagPos)){
        //終了タグの前に開始タグがあったらその終了タグは見出しの終了タグではないと判断。
        //終了タグ以降から見出しを探すようにする。
        $this->HeadlineSearchPos = $endTagPos;
        continue;
      }


      //<hの次が1~9の数字か？h9まで対応
      $searchStr = '/[1-'.HEADLINE_TAG_MAX.']/';
      preg_match( $searchStr, substr( $the_content,$this->HeadlineSearchPos), $matches, PREG_OFFSET_CAPTURE);
      if( 2 == $matches[0][1] ){
        //見つかった見出しが前に見つかった見出しより大きいか
        if( $this->beforeHeadline > intval( $matches[0][0] )){
          if($this->arrayNumber['Number'.((intval($matches[0][0])) - ($this->largeHeadLine) + 1)] <= HEADLINE_LARGE_NUMBER_SEARCH_MAX){
            $this->arrayNumber['Number'.((intval($matches[0][0])) - ($this->largeHeadLine) + 1)]++;
          }
          //見つかった見出し以降の見出しに付与する値をリセットする。
          for ( $i=(((intval($matches[0][0])) - ($this->largeHeadLine) + 1) + 1); $i <= HEADLINE_TAG_MAX; $i++ ) {
            $this->arrayNumber['Number'.$i] = 0;
          }
        } else {
          if( $this->arrayNumber['Number'.((intval($matches[0][0])) - ($this->largeHeadLine) + 1)] <= HEADLINE_LARGE_NUMBER_SEARCH_MAX ){
            $this->arrayNumber['Number'.((intval($matches[0][0])) - ($this->largeHeadLine) + 1)] += 1;
          }
        }
        $this->beforeHeadline = intval($matches[0][0]); //見つかった見出しを保存しておく。
        return intval($matches[0][0]); //見つかった数字をヘッダーの番号として返却する。
      }
      $this->HeadlineSearchPos++; //次の位置から検索していく。
    }
  } // end SearchNextHeadline

  /*見出しに付与する数字の文字列を作成する。*/
  public function create_number_str($HeadLine){
    $baseCount = $this->largeHeadLine;
    $insertCount = 1;
    $numberStr = '';
    //1-2-3のような見出しに付与する文字列を作成する。
    if($insertCount <= HEADLINE_LARGE_NUMBER_SEARCH_MAX + 1){
      for ( ;$baseCount <= $HeadLine;$baseCount++ ) {
         if( $insertCount > 1 ){
           $numberStr .= $this->numberCaughtTypeChara;
         }
         $numberStr .= $this->arrayNumberTypeChara[( $this->arrayNumber['Number'.$insertCount] == 0 ) ? 0 : ( $this->arrayNumber['Number'.$insertCount] - 1 )];
         $insertCount++;
      }
    }
    return $numberStr.'. ';
  } // end CreateHeadlineNumber

  /*見出しに数字を付与する*/
  public function add_number($NumberStr,$the_content){
    $this->HeadlineSearchPos = strpos($the_content,'>',$this->HeadlineSearchPos);
    $the_content = substr_replace($the_content, $NumberStr, $this->HeadlineSearchPos+1, 0);
    $this->HeadlineSearchPos++;
    return $the_content;
  }//end AddNumberHeadline

  //プラグイン停止時の処理
  public function headline_number_deactivate() {
         $this->remove_user_setting();
  }

  //ユーザー設定削除
  private static function remove_user_setting() {
          delete_option('headline_number_type');
          delete_option('headline_number_Caught_type');
     }
} //class end
/*実態を作成する*/
$AHLNClass = new KOSUKE_cAddNumberToHeadLine();

register_deactivation_hook( __FILE__, array( $AHLNClass, 'headline_number_deactivate' ) );

?>
