<?php
 function fcpgz_menu_on_admin(){

//The icon in Base64 format
$icon_base64 = 'PD94bWwgdmVyc2lvbj0iMS4wIiBzdGFuZGFsb25lPSJubyI/Pgo8IURPQ1RZUEUgc3ZnIFBVQkxJQyAiLS8vVzNDLy9EVEQgU1ZHIDIwMDEwOTA0Ly9FTiIKICJodHRwOi8vd3d3LnczLm9yZy9UUi8yMDAxL1JFQy1TVkctMjAwMTA5MDQvRFREL3N2ZzEwLmR0ZCI+CjxzdmcgdmVyc2lvbj0iMS4wIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciCiB3aWR0aD0iMjYxLjAwMDAwMHB0IiBoZWlnaHQ9IjI1MC4wMDAwMDBwdCIgdmlld0JveD0iMCAwIDI2MS4wMDAwMDAgMjUwLjAwMDAwMCIKIHByZXNlcnZlQXNwZWN0UmF0aW89InhNaWRZTWlkIG1lZXQiPgoKPGcgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoMC4wMDAwMDAsMjUwLjAwMDAwMCkgc2NhbGUoMC4xMDAwMDAsLTAuMTAwMDAwKSIKZmlsbD0iIzAwMDAwMCIgc3Ryb2tlPSJub25lIj4KPHBhdGggZD0iTTE4MjUgMTg4MSBjLTExIC05IC05NSAtNTIgLTIxMCAtMTA4IC00NCAtMjEgLTgxIC00MSAtODMgLTQ1IC0yIC01Ci05IC04IC0xNiAtOCAtNyAwIC02MCAtMjQgLTExNyAtNTMgLTU3IC0yOSAtMTIwIC01OSAtMTM5IC02NyAtMTkgLTggLTM3IC0xNwotNDAgLTIwIC04IC0xMCAtMTc3IC05MCAtMTg5IC05MCAtNiAwIC0xMSAtNCAtMTEgLTkgMCAtNCAtMjEgLTE2IC00NyAtMjYKLTI3IC0xMCAtNTAgLTIxIC01MyAtMjQgLTMgLTQgLTI1IC0xNSAtNTAgLTI2IC0yNSAtMTEgLTQ3IC0yMiAtNTAgLTI1IC0zIC0zCi0yNSAtMTQgLTUwIC0yNSAtMjUgLTExIC00NyAtMjIgLTUwIC0yNiAtMyAtMyAtMjYgLTE0IC01MiAtMjQgLTI3IC0xMCAtNDgKLTIxIC00OCAtMjQgMCAtNCAtMTcgLTEzIC0zNyAtMjAgLTIxIC04IC01NSAtMjQgLTc2IC0zNiBsLTM4IC0yMiA5MyAtMjIgYzUxCi0xMiAxMDAgLTI2IDEwOSAtMzEgOCAtNCA1MyAtMTYgMTAwIC0yNSA0NiAtOSA4OSAtMjEgOTQgLTI1IDYgLTQgNDQgLTE1IDg1Ci0yNCA0MSAtMTAgODIgLTIxIDkxIC0yNiA5IC01IDQ0IC0xNCA3OSAtMjEgNTMgLTEwIDY1IC0xNyA4MSAtNDMgMTAgLTE3IDIzCi0zOCAyOSAtNDYgMjEgLTMxIDc3IC0xMjcgODMgLTE0MyA0IC0xMCAxMSAtMTcgMTYgLTE3IDUgMCAxMiAtMTEgMTUgLTI1IDQKLTE0IDExIC0yMyAxNiAtMjAgNSAzIDcgMCA0IC04IC0zIC04IDEgLTIxIDggLTI4IDE2IC0xNyA4MyAtMTI4IDkxIC0xNTEgNAotMTAgMTEgLTE4IDE3IC0xOCA1IDAgMTAgLTQgMTAgLTkgMCAtNSAxOCAtMzkgMzkgLTc2IDQ0IC03NSA0MyAtNzYgNjEgNTAgNgo0NCAxNSA4OSAyMCAxMDAgNSAxMSAxNCA1MSAyMCA4OSBsMTEgNjggLTU3IDk0IGMtNjAgMTAwIC03NSAxNDUgLTQ0IDEzNyA5Ci0yIDIzIDIgMzEgOSA4IDggMzQgMjIgNTkgMzIgNjAgMjQgNzAgMzMgNzAgNjcgMCAxNiA0IDM3IDEwIDQ3IDkgMTYgNDEgMjE0CjM1IDIyMCAtNCA1IC0xNjAgLTcxIC0xNjMgLTgwIC0yIC00IC05IC04IC0xNSAtOCAtNyAwIC00OCAtMTggLTkyIC00MCAtODYKLTQzIC0xMDAgLTQ3IC0xMDkgLTI3IC0zIDYgLTE3IDMwIC0zMCA1MiAtMTQgMjIgLTMwIDQ4IC0zNiA1NyAtOSAxNSAtMSAyMgo1NyA1MCAzOCAxNyA3MCAzNSA3MyAzOCAzIDQgMjMgMTQgNDUgMjMgMjIgOSAxMDEgNDcgMTc1IDg1IDEzMiA2NyAxMzUgNjkKMTQ0IDEwOCA0IDIxIDEyIDQ4IDE3IDU5IDExIDI3IDM3IDIxNSAyOSAyMTUgLTMgMCAtMTAgLTQgLTE1IC05eiIvPgo8L2c+Cjwvc3ZnPgo=';
//The icon in the data URI scheme
$icon_data_uri = 'data:image/svg+xml;base64,' . $icon_base64;

$page_title = 'FC PG Support';
$menu_title = 'FC PG Support';
$icon_data_uri;
$position   = '6';
$capability = 'manage_options';
$menu_slug  = 'fc-pg-support'; //parent slug
$function   = 'fcpgz_callback_function';
//for add_submenu_page
// $parent_slug = $menu_slug;
// $sub_page_title = 'FC PG Support';
// $sub_menu_title = 'Menu Title 1';
// $sub_menu_slug = 'sub-menu-slug';
// $sub_menu_function = 'fcpgz_pg_sub_menu_callback_function';
// add menu to admin dashboard
   add_menu_page(
//      	__( 'My Custom Menu', 'textdomain' ),
     	 $page_title,
         $menu_title,
         $capability,
         $menu_slug,
         $function,
         $icon_data_uri,
         $position
   );
   // add sub menu to admin dashboard
   // add_submenu_page(
   //      $parent_slug,
   //      $sub_page_title,
   //      $sub_menu_title,
   //      $capability,
   //      $sub_menu_slug,
   //      $sub_menu_function
   // );
   }