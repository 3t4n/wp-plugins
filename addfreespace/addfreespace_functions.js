(function($){
    $(window).load(function() {
        //格納データを表示
        //データは#dataに入ってる
        var Str = $('#data').text();
        if(Str.length!=0){
            var Cnt = 1;
            //var TempRowArr2 = JSON.parse(Str);
            var TempRowArr2 = JSON.parse(data);
            if('simple' in TempRowArr2){
                TempRowArr2['simple'].forEach(function(thisrow,index,TempArr){
                    $('#addfreespace_simple_tablebody').append(RetRowHtmlSimple(Cnt,thisrow));   
                    Cnt++;
                });
            }
            Cnt = 1;
            if('ab' in TempRowArr2){
                TempRowArr2['ab'].forEach(function(thisrow,index,TempArr){
                    $('#addfreespace_ab_tablebody').append(RetRowHtmlAB(Cnt,thisrow));   
                    Cnt++;
                });
            }
        }
        
        AddTableRowSimple();
        AddTableRowAB();
        if($('#Lang').text()=='ja'){
            FillJapaneseWords();            
        }else{
            FillEnglishWords();
        }
        $('#btn_addrow_simple').click(function(){
            AddTableRowSimple();
        });
        $('#btn_addrow_ab').click(function(){
            AddTableRowAB();
        });
        $('#btn_check_del_all_simple').click(function(){
            Click_btn_check_del_all('simple');
        });
        $('#btn_check_del_all_ab').click(function(){
            Click_btn_check_del_all('ab');
        });
        $('.LangJaBtn').click(function(){
            FillJapaneseWords();
        });
        $('.LangEnBtn').click(function(){
            FillEnglishWords();
        });
        //ratio 正の整数制限 jquery.numeric.js使用
        $(".positive-integer").numeric({
            decimal: false, 
            negative: false
        });
        // *「右クリック貼り付け」対応
        $(".antirc").change(function() {
            $(this).keyup();
        });
    });
    function AddTableRowSimple(){
        //trのidの最大値を確認
        var idnum = 0;
        var BiggestNum = 0;
        $('#addfreespace_simple_tablebody').children('tr').each(function(){
            var classStr = $(this).attr('class');
            var thisNum = parseInt(
                classStr.replace('row','')
                );
            if(BiggestNum < thisNum){
                BiggestNum = thisNum;
            }
            idnum += 1;
        });
        $('#addfreespace_simple_tablebody').append(RetRowHtmlSimple(BiggestNum + 1,BlankRowSimple));
        if($('#Lang').text()=='ja'){
            FillJapaneseWords();
        }else{
            FillEnglishWords();
        }
    }
    function AddTableRowAB(){
        //trのidの最大値を確認
        var idnum = 0;
        var BiggestNum = 0;
        $('#addfreespace_ab_tablebody').children('tr').each(function(){
            var classStr = $(this).attr('class');
            var thisNum = parseInt(
                classStr.replace('row','')
                );
            if(BiggestNum < thisNum){
                BiggestNum = thisNum;
            }
            idnum += 1;
        });
        $('#addfreespace_ab_tablebody').append(RetRowHtmlAB(BiggestNum + 1,BlankRowAB));
        if($('#Lang').text()=='ja'){
            FillJapaneseWords();
        }else{
            FillEnglishWords();
        }
    }
    function FillEnglishWords(){
        $('#Lang').text('en');
        
        $('.explain_addfreespace').text('By using this plug-in, you can output html to top of post, bottom of post, position of "<!--more-->". By changing priority, you can tune position finely. You can also do an A/B test. ');
        
        $('#table_head_0').text('PC/mobile');
        $('#table_head_1').text('post/page');
        $('#table_head_2').text('title/content');   //実際には使わない。
        $('#table_head_3').text('top/more/bottom');
        $('#table_head_4').html('position<br />※1');
        $('#table_head_5').text('html etc');
        $('#table_head_6').html('delete<br /><div style="margin:5px;"><a class="button" id="btn_check_del_all_simple">Check all</a></div>');

        $('#table_head_ab_0').text('PC/mobile');
        $('#table_head_ab_1').text('post/page');
        $('#table_head_ab_2').text('title/content');   //実際には使わない。
        $('#table_head_ab_3').text('top/more/bottom');
        $('#table_head_ab_4').html('position<br />※1');
        $('#table_head_ab_5').text('html etc');
        $('#table_head_ab_6').html('delete<br /><div style="margin:5px;"><a class="button" id="btn_check_del_all_simple">Check all</a></div>');

        $('.select_tbm_upper').text('top of post');
        $('.select_tbm_more').text('<!--more-->');
        $('.select_tbm_lower').text('bottom of post');
        $('.label_of_post').text('post');
        $('.label_of_page').text('page');
        $('.ratio').text('Display ratio(integer)');
        $('.del_label').text('del');
        
        $('.explain_priority').html('※1\'position\' is priority of \'add_filter\'. If you do not understand well about it, please set it to 11.');
        
        $('.btn_submit').attr('value','submit!');
        $('#btn_addrow_simple').text('add row');
        $('#btn_addrow_ab').text('add row');

        $('#explain_ab_test').html('Please do not touch this form, if you do not understand well about "AB test".<br />This plug-in outputs Pattern A or Pattern B in possibility expressed in "ratio".');
        $('#urikomi').html('To the person who wants to do A/B test on a more complicated condition:<br />I accept an order of work of the plug-in development. Give me a message in <a href="https://twitter.com/kazunii_ac" target="_blank">twitter</a> or <a href="https://www.facebook.com/kazuo.dobashi" target="_blank">Facebook</a>!<br />I continue the Extensions of this plug-in piecemeal. Give me a message in <a href="https://twitter.com/kazunii_ac" target="_blank">twitter</a> or <a href="https://www.facebook.com/kazuo.dobashi" target="_blank">Facebook</a> if you have a demand.');
    }
    function FillJapaneseWords(){
        $('#Lang').text('ja');

        $('.explain_addfreespace').text('このプラグインでは、記事の上下や「<!--more-->」の位置へhtmlを出力できます。上下位置の微調整も可能です。A/Bテストもできます。');
        
        $('#table_head_0').text('PC/モバイル');
        $('#table_head_1').text('投稿/ページ');
        $('#table_head_2').text('タイトル/本文');   //実際には使わない。
        $('#table_head_3').text('上/more/下');
        $('#table_head_4').html('上下位置<br />※1');
        $('#table_head_5').text('表示するhtmlなど');
        $('#table_head_6').html('削除<br /><div style="margin:5px;"><a class="button" id="btn_check_del_all_simple">Check all</a></div>');

        $('#table_head_ab_0').text('PC/モバイル');
        $('#table_head_ab_1').text('投稿/ページ');
        $('#table_head_ab_2').text('タイトル/本文');   //実際には使わない。
        $('#table_head_ab_3').text('上/more/下');
        $('#table_head_ab_4').html('上下位置<br />※1');
        $('#table_head_ab_5').text('表示するhtmlなど');
        $('#table_head_ab_6').html('削除<br /><div style="margin:5px;"><a class="button" id="btn_check_del_all_ab">Check all</a></div>');

        $('.select_tbm_upper').text('記事上');
        $('.select_tbm_more').text('<!--more-->');
        $('.select_tbm_lower').text('記事下');
        $('.label_of_post').text('投稿');
        $('.label_of_page').text('ページ');
        $('.ratio').text('表示比率（整数）');
        $('.del_label').text('削除');
        
        $('.explain_priority').html('※1「上下位置」の数字は、大きくなるほど記事から遠くに表示されるようになっています。<br />記事下の場合は大きいほど下へ、記事上の場合は大きいほど上に表示されます。<br />適当に変更して表示位置を確認してみて下さい。');

        $('.btn_submit').attr('value','反映!');
        $('#btn_addrow_simple').text('行を追加');
        $('#btn_addrow_ab').text('行を追加');

        $('#explain_ab_test').html('A/Bテストがどういうものかわからない方は、ここは触らないで下さい。<br />記事等を表示するたびに、Pattern A または Pattern B を「表示比率」の確率で切り替えて表示します。');
        $('#urikomi').html('もっと複雑な条件でA/Bテストをしたい方へ：<br />個別のプラグイン開発をお仕事としてお請けします。<a href="https://twitter.com/kazunii_ac" target="_blank">twitter</a>または<a href="https://www.facebook.com/kazuo.dobashi" target="_blank">Facebook</a>でメッセージを下さい！<br />このプラグイン自体の機能拡張も細々と続けていきます。ご要望があれば<a href="https://twitter.com/kazunii_ac" target="_blank">twitter</a>か<a href="https://www.facebook.com/kazuo.dobashi" target="_blank">Facebook</a>でご連絡下さい。');
    }
    function Click_btn_check_del_all(SimpleOrAB){
        //全部にチェックが入っていた場合は全てのチェックを外す
        var Flg = true; //ループフラグ
        var IsNotCheckedExists = false;  //チェックが入っていなかったらtrueにする
        var Cnt = 1;
        while(Flg){
            if($('#row' + Cnt + '_delete_' + SimpleOrAB)[0]){
                //要素が存在している
                if($('#row' + Cnt + '_delete_' + SimpleOrAB).attr('checked')=='checked'){
                //チェックが入っている
                //何もしない（Flgはtrueのまま）
                }else{
                    //チェックが入ってない
                    IsNotCheckedExists = true;
                    Flg = false;
                }
            }else{
                //要素が存在してない
                Flg = false;
            }
            Cnt += 1;
        }

        Flg = true; //ループフラグ
        Cnt = 1;
        if(IsNotCheckedExists){
            //チェックが入っていないのがあった場合
            //全てチェックする
            while(Flg){
                if($('#row' + Cnt + '_delete_' + SimpleOrAB)[0]){
                    //存在している
                    $('#row' + Cnt + '_delete_' + SimpleOrAB).attr('checked','checked');
                }else{
                    //存在してない
                    Flg = false;
                }
                Cnt += 1;
            }
        }else{
            //チェックが全て入っていた場合
            //全てチェックを外す
            while(Flg){
                if($('#row' + Cnt + '_delete_' + SimpleOrAB)[0]){
                    //存在している
                    $('#row' + Cnt + '_delete_' + SimpleOrAB).removeAttr('checked');
                }else{
                    //存在してない
                    Flg = false;
                }
                Cnt += 1;
            }            
        }
    }
})(jQuery);
