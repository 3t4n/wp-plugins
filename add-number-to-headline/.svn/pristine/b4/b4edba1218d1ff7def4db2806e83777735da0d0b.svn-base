<?php
  /*見出しに付与する数字の種類*/
  const HEADLINE_NUMBER_TYPE_NORMAL = "headline_number_type_normal";
  const HEADLINE_NUMBER_TYPE_MARUMOZI = "headline_number_type_marumozi";
  const HEADLINE_NUMBER_TYPE_LARGE_ROMA = "headline_number_type_large_roma";
  const HEADLINE_NUMBER_TYPE_SMALL_ROMA = "headline_number_type_small_roma";
  const HEADLINE_NUMBER_TYPE_KANZI = "headline_number_type_kanzi";

  /*見出しに付与する数字の間の文字の種類*/
  const HEADLINE_NUMBER_CAUGHT_TYPE_HYPHEN = 'headline_number_Caught_Type_hyphen';
  const HEADLINE_NUMBER_CAUGHT_TYPE_PERIOD = 'headline_number_Caught_Type_period';

  const HYPHEN = '-';
  const PERIOD = '.';

  //見出しに付与する数字の最大値
  const HEADLINE_LARGE_NUMBER_SEARCH_MAX = 49;

  //見出しタグの最大数 １０個以上指定する場合は正規表現も変更する必要があるかも。
  const HEADLINE_TAG_MAX = 9;

  /*数字の種類を格納した配列*/
  const ARRAY_HEAD_LINE_NUMBER_TYPE = [
    HEADLINE_NUMBER_TYPE_NORMAL,
    HEADLINE_NUMBER_TYPE_MARUMOZI,
    HEADLINE_NUMBER_TYPE_LARGE_ROMA,
    HEADLINE_NUMBER_TYPE_SMALL_ROMA,
    HEADLINE_NUMBER_TYPE_KANZI
  ];

  /*数字間の文字の種類を格納した配列*/
  const ARRAY_HEAD_LINE_NUMBER_CAUGHT_TYPE = [
    HEADLINE_NUMBER_CAUGHT_TYPE_HYPHEN,
    HEADLINE_NUMBER_CAUGHT_TYPE_PERIOD
  ];

  const ARRAY_HEAD_LINE_NUMBER_TYPE_NORMAL = [
    '1','2','3','4','5','6','7','8','9','10',
    '11','12','13','14','15','16','17','18','19','20',
    '21','22','23','24','25','26','27','28','29','30',
    '31','32','33','34','35','36','37','38','39','40',
    '41','42','43','44','45','46','47','48','49','50'
  ];

  const ARRAY_HEAD_LINE_NUMBER_TYPE_MARUMOZI = [
    '①','②','③','④','⑤','⑥','⑦','⑧','⑨','⑩',
    '⑪','⑫','⑬','⑭','⑮','⑯','⑰','⑱','⑲','⑳',
    '㉑','㉒','㉓','㉔','㉕','㉖','㉗','㉘','㉙','㉚',
    '㉛','㉜','㉝','㉞','㉟','㊱','㊲','㊳','㊴','㊵',
    '㊶','㊷','㊸','㊹','㊺','㊻','㊼','㊽','㊾','㊿'
  ];

  const ARRAY_HEAD_LINE_NUMBER_TYPE_LARGE_ROMA = [
    'Ⅰ','Ⅱ','Ⅲ','Ⅳ','Ⅴ','Ⅵ','Ⅶ','Ⅷ','Ⅸ','Ⅹ',
    'Ⅺ','Ⅻ','XⅢ','ⅩⅣ','ⅩⅤ','ⅩⅥ','ⅩⅦ','ⅩⅧ','ⅩⅨ','ⅩⅩ',
    'ⅩⅪ','ⅩⅫ','ⅩXⅢ','ⅩⅩⅣ','ⅩⅩⅤ','ⅩⅩⅥ','ⅩⅩⅦ','ⅩⅩⅧ','ⅩⅩⅨ','ⅩⅩⅩ',
    'ⅩⅩⅪ','ⅩⅩⅫ','ⅩⅩXⅢ','ⅩⅩⅩⅣ','ⅩⅩⅩⅤ','ⅩⅩⅩⅥ','ⅩⅩⅩⅦ','ⅩⅩⅩⅧ','ⅩⅩⅩⅨ','ⅩⅩⅩⅩ',
    'ⅩⅩⅩⅪ','ⅩⅩⅩⅫ','ⅩⅩⅩXⅢ','ⅩⅩⅩⅩⅣ','ⅩⅩⅩⅩⅤ','ⅩⅩⅩⅩⅥ','ⅩⅩⅩⅩⅦ','ⅩⅩⅩⅩⅧ','ⅩⅩⅩⅩⅨ','ⅩⅩⅩⅩⅩ'
  ];

  const ARRAY_HEAD_LINE_NUMBER_TYPE_SMALL_ROMA = [
    'ⅰ','ⅱ','ⅲ','ⅳ','ⅴ','ⅵ','ⅶ','ⅷ','ⅸ','ⅹ',
    'ⅺ','ⅻ','ⅹⅲ','ⅹⅳ','ⅹⅴ','ⅹⅵ','ⅹⅶ','ⅹⅷ','ⅹⅸ','ⅹⅹ',
    'ⅹⅺ','ⅹⅻ','ⅹⅹⅲ','ⅹⅹⅳ','ⅹⅹⅴ','ⅹⅹⅵ','ⅹⅹⅶ','ⅹⅹⅷ','ⅹⅹⅸ','ⅹⅹⅹ',
    'ⅹⅹⅺ','ⅹⅹⅻ','ⅹⅹⅹⅲ','ⅹⅹⅹⅳ','ⅹⅹⅹⅴ','ⅹⅹⅹⅵ','ⅹⅹⅹⅶ','ⅹⅹⅹⅷ','ⅹⅹⅹⅸ','ⅹⅹⅹⅹ',
    'ⅹⅹⅹⅺ','ⅹⅹⅹⅻ','ⅹⅹⅹⅹⅲ','ⅹⅹⅹⅹⅳ','ⅹⅹⅹⅹⅴ','ⅹⅹⅹⅹⅵ','ⅹⅹⅹⅹⅶ','ⅹⅹⅹⅹⅷ','ⅹⅹⅹⅹⅸ','ⅹⅹⅹⅹⅹ'
  ];

  const ARRAY_HEAD_LINE_NUMBER_TYPE_KANZI = [
    '一','二','三','四','五','六','七','八','九','十',
    '十一','十二','十三','十四','十五','十六','十七','十八','十九','二十',
    '二一','二二','二三','二四','二五','二六','二七','二八','二九','三十',
    '三一','三二','三三','三四','三五','三六','三七','三八','三九','四十',
    '四一','四二','四三','四四','四五','四六','四七','四八','四九','五十'
  ];

  const ARRAY_HEAD_LINE_NUMBER_TYPE_STR = [
    HEADLINE_NUMBER_TYPE_NORMAL=>ARRAY_HEAD_LINE_NUMBER_TYPE_NORMAL,
    HEADLINE_NUMBER_TYPE_MARUMOZI=>ARRAY_HEAD_LINE_NUMBER_TYPE_MARUMOZI,
    HEADLINE_NUMBER_TYPE_LARGE_ROMA=>ARRAY_HEAD_LINE_NUMBER_TYPE_LARGE_ROMA,
    HEADLINE_NUMBER_TYPE_SMALL_ROMA=>ARRAY_HEAD_LINE_NUMBER_TYPE_SMALL_ROMA,
    HEADLINE_NUMBER_TYPE_KANZI=>ARRAY_HEAD_LINE_NUMBER_TYPE_KANZI
  ];

  const ARRAY_HEAD_LINE_NUMBER_CAUGHT_TYPE_STR = [
    HEADLINE_NUMBER_CAUGHT_TYPE_HYPHEN=>HYPHEN,
    HEADLINE_NUMBER_CAUGHT_TYPE_PERIOD=>PERIOD
  ];
?>
