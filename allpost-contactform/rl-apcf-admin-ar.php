<?php
/*****************************************************
         "All Post Contact Form"'s Core File 
            Created by RainbowLink Inc. 
 *****************************************************/
$rl_apcf_admin_Menu_Title = "نموذج الاتصال";
$rl_apcf_admin_Menu_Desc = "تعيين كل ما بعد الاتصال نموذج!";
$rl_apcf_admin_Save_btn = "حفظ.";
$rl_apcf_admin_eg = "(مثال الاعداد)";
$rl_apcf_admin_saved = 'حفظ.';

$rl_apcf_admin_H1 = '(1) تعيين نافذه التاكيد الخاص بك وتقديم نافذه & استقبال نظام البريد الكتروني.';
$rl_apcf_admin_confirmation_window = 'تعيين اطار التاكيد الخاص بك.';
$rl_apcf_admin_submission_window = 'تعيين اطار الإرسال الخاص بك.';
$rl_apcf_admin_mail = 'تعيين النظام لتلقي رسائل البريد الكتروني عن طريق هذا المساعد.';
$rl_apcf_admin_H2 = '(2) تعكس (1) في صفحتين علي موقعك وورد.';
$rl_apcf_admin_ShortCode = "انسخ هذه الشفرة أدناه ، وألصقها علي صفحتك الجديدة من الصفحات أو المشاركات ، من أجل عرض نافذه التاكيد ونافذه الإرسال وتشغيل نظام البريد الكتروني الذي تتلقاه. انظر/wp-content/plugin/allpost-contactform/assets/screenshot-2.png.";
$rl_apcf_admin_UsethisPlugin_Desc = "تعيين الرابط الخاص (1) الذي قمت بلصق المختصر علي. انظر/wp-content/plugin/allpost-contactform/assets/screenshot-3.png.";
$rl_apcf_admin_UsethisPlugin = "الرابط الخاص بالصفحة التي قمت بلصق الشفرة القصيرة";
$rl_apcf_admin_UsethisPlugin_js = 'name="rl_apcf",onsubmit="return checkForm()":يمكنك تعيين نظام التحقق من البيانات غير المبللة باستخدام اللبوستكونتاكتفورم.';

$rl_apcf_admin_m1 = 'عنوان البريد الكتروني لتلقي الرسائل الكترونيه عبر هذا المساعد (إذا كانت فارغه ، وهذا المساعد سوف تستخدم عنوان البريد الكتروني الخاص بك المشرف)';
$rl_apcf_admin_m2 = 'تلقي اسم نظام البريد الكتروني (يمكنك استخدام هذا النظام الخاص بك لتجميع الرسائل/فلتر.)';
$rl_apcf_admin_m3 = 'موضوع البريد الكتروني (يمكنك استخدام هذا النظام الخاص بك لتجميع الرسائل/فلتر.)';

$rl_apcf_admin_c1 = 'عنوان نافذه التاكيد';
$rl_apcf_admin_c2 = 'الرسالة تحت عنوان نافذه التاكيد';
$rl_apcf_admin_c3 = 'اسم الزر "إرسال".';

$rl_apcf_admin_s1 = 'عنوان نافذه التقديم';
$rl_apcf_admin_s2 = 'الرسالة تحت عنوان نافذه الإرسال';


$rl_apcf_admin_m1_eg = 'المشرف البريد الكتروني العنوان, او, أو اجراء اختيار تعسفي';
$rl_apcf_admin_m2_eg = 'وورد شكل نظام البريد';
$rl_apcf_admin_m3_eg = 'لديك بريد [عن طريق جميع البريد نموذج الاتصال]';

$rl_apcf_admin_c1_eg = 'تاكيد';
$rl_apcf_admin_c2_eg = 'تاكيد أدناه وإرسال ذلك.';
$rl_apcf_admin_c3_eg = 'إرسال';

$rl_apcf_admin_s1_eg = 'لقد تم إرسال رسالتك!';
$rl_apcf_admin_s2_eg = 'شكرا!';


/* since v1.5.0 */
$rl_apcf_plugin_list_settings = "إعدادات";
$rl_apcf_admin_sec1_name = 'إعدادات';
$rl_apcf_admin_sec2_name = 'خيارات';
$rl_apcf_admin_options_H2_1 = 'إعادة توجيه';
$rl_apcf_admin_options_H2_2 = ' إعدادات ملفات تعريف الارتباط والخطأ ';
$rl_apcf_admin_r1 = 'عنوان URL لصفحة إعادة التوجيه (إذا كان فارغًا ، فسيستخدم هذا المكون الإضافي عنوان URL لصفحة الصفحة)
';
$rl_apcf_admin_r2 = '
وقت إعادة التوجيه (بالثانية) (إذا كان فارغًا ، فسيتم تعيين هذا المكون الإضافي 3600 ثانية) ';
$rl_apcf_admin_r2_eg = '3600';
$rl_apcf_admin_g1 = 'هل تريد عرض زر "الرجاء الرجوع إلى الصفحة الأولى" بعد تلقي رسالة على "شاشة النشر"؟ (إذا كان فارغًا ، فلن يعرض هذا المكون الإضافي الزر) ';
$rl_apcf_admin_g1_eg = 'يرجى العودة إلى الصفحة الأولى ';

/* Cookie */
$rl_apcf_admin_options_H2_3 = 'لفات تعريف الارتباط والخطأ';
$rl_apcf_admin_co1 = ' ما إذا كان سيتم تمكين ملف تعريف الارتباط لتجنب "هجمات القنابل" (إذا تم تمكينه: 1 | إذا لم يتم تمكينه: 0)
';
$rl_apcf_admin_co1_eg = "0";
$rl_apcf_admin_e0 = ' 【سيتم تمكين هذا العنصر عند تمكين ملف تعريف الارتباط لتجنب "هجمات القنابل"】 ';
$rl_apcf_admin_e1 =  ' يمكنك عرض رسالة خطأ إذا حاول الزائر إعادة إرسال نفس الرسالة مرة أخرى على الفور ، أو إذا حاول إرسال رسالة أخرى متتالية (إذا كانت فارغة ، فإن هذا المكون الإضافي يقول "سينتظر متصفحك لمدة ساعة لديك ملفات تعريف ارتباط صالحة ، إذا كنت ترغب في إرسال رسالة أخرى ، يرجى الضغط على الزر أدناه لحذف ملفات تعريف الارتباط الصالحة لمدة ساعة من متصفحك ". '.$rl_apcf_admin_e0;
$rl_apcf_admin_e1_eg  = '
يحتوي متصفحك على ملف تعريف ارتباط صالح لمدة ساعة واحدة. إذا كنت ترغب في إرسال رسالة أخرى ، يرجى حذف ملف تعريف الارتباط لمدة ساعة واحدة من متصفحك عن طريق الضغط على الزر أدناه.
';
$rl_apcf_admin_e2 = '
زر "حذف ملف تعريف الارتباط لمدة ساعة"
'.$rl_apcf_admin_e0;
$rl_apcf_admin_e2_eg = '
احذف ملفات تعريف الارتباط لمدة ساعة ';

/* Items of Mail */
$rl_apcf_admin_options_H2_4 =  ' ضبط العناصر لتلقي رسائل البريد الإلكتروني ';
$rl_apcf_admin_sr1 = ' ما إذا كان سيتم تضمين العناصر المدرجة تلقائيًا بواسطة هذا المكون الإضافي في البريد الإلكتروني (قم بتضمين: 1 | لا تقم بتضمين: 0) ';
$rl_apcf_admin_sr1_eg = "0";

/* since v1.6.2 */
$rl_apcf_admin_options_H2_5 =  " الإعداد لحفظ الملفات المرفوعة (ملفات المرفقات) في خادم WordPress الخاص بك ";
$rl_apcf_admin_sa1 = ' هل تريد إرسال الملف الذي تم تحميله كملف مرفق وحذفه من خادم WordPress الخاص بك، أو إرسال الملف الذي تم تحميله كملف مرفق وحفظ الملف الذي تم تحميله في خادم WordPress الخاص بك؟ 
 (حفظ: 1 | عدم الحفظ: 0) 

';
$rl_apcf_admin_sa1_eg = "0";
$rl_apcf_admin_sa2_Nginx0 = "لجميع مستخدمي نجينكس
";
$rl_apcf_admin_sa2_Nginx1 = "
عند إجراء هذا الإعداد، نوصي بتكوين Nginx بشكل مناسب. على وجه التحديد، قم بإضافة الإعدادات التالية إلى ملف تكوين Nginx الخاص بك:
";
$rl_apcf_admin_sa2_Nginx2 = "# 
منع الوصول المباشر إلى ملفات PHP
";
$rl_apcf_admin_sa2_Nginx3 = "# تعطيل فهرسة الدليل
";
$rl_apcf_admin_sa2_Nginx4 = "# السماح بأنواع ملفات معينة فقط إذا لزم الأمر
";
$rl_apcf_admin_sa2_Nginx5 = "# تقييد أنواع الملفات الأخرى ";
$rl_apcf_admin_sa2_Nginx6 = "
أعد تحميل الخادم بعد تغيير ملف تكوين Nginx.
";
$rl_apcf_admin_sa3_MalwareScannerPlugins = ' إذا كنت تريد تشغيل هذه الميزة، فيرجى تثبيت أي "مكوّن إضافي لفحص البرامج الضارة" من https://WordPress.org/plugins/ . Eg)"<a href="https://wordpress.org/plugins/patchstack/" target="_blank">Patchstack</a>""<a href="https://wordpress.org/plugins/malcare-security/" target="_blank">MalCare</a>""<a href="https://wordpress.org/plugins/wordfence/" target="_blank">Wordfence</a>""<a href="https://wordpress.org/plugins/jetpack/" target="_blank">Jetpack Scan</a>""<a href="https://wordpress.org/plugins/sucuri-scanner/" target="_blank">Sucuri Security</a>""<a href="https://wordpress.org/plugins/miniorange-malware-protection/" target="_blank">miniOrange Malware Protection</a>".';

/* since v1.7.4 */
$rl_apcf_admin_options_H2_6 = ' إعدادات allpost-contactform.js".
';
$rl_apcf_admin_js1 = '
ما إذا كان سيتم تحميل "allpost-contactform.js" (في حالة التحميل: 1 | في حالة عدم التحميل: 0) ';
$rl_apcf_admin_js1_eg = '0';

