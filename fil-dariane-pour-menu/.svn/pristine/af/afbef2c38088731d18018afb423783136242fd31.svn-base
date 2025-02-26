=== Plugin Name ===
Contributors: Thomas Faur&eacute;
Donate link: http://blog.whibe.com/
Tags: breadcrumb, fil d'ariane, menu
Requires at least: 0.0.1
Tested up to: 3.0.1
Stable tag: 0.0.1

Ce plugin permet d'afficher un fil d'ariane correspondant &agrave; la navigation sur un site utilisant un "Menu".

== Description ==

"Fil d'Ariane pour Menu" permet d'afficher un fil d'ariane correspondant &agrave; la navigation en cours sur un site utilisant un "Menu" personnalis&eacute; ("menu" au sens WorPress, pouvant contenir liens, cat&eacute;gories, pages).

Ce plugin fonctionne avec un site contenant jusqu'&agrave; 3 menus diff&eacute;rents (pour un site en trois grandes parties par exemple). 

Le principe est de d&eacute;finir une cat&eacute;gorie du m&ecirc;me nom que le menu, pour chaque menu. Puis de rattacher les cat&eacute;gories affich&eacute;es dans un menu &agrave; cette cat&eacute;gorie m&egrave;re. 

L'interface du plugin permet de faire le lien explicite entre les menus et les "cat&eacute;gories m&egrave;res" cr&eacute;&eacute;es.

Chaque menu doit &eacute;galement &ecirc;tre rattach&eacute; &agrave; une page m&egrave;re, qui est en quelque sorte, la page portail du menu.

***Principe***

Le plugin affiche en fait le menu lui-m&ecirc;me, en le transformant : en rempla&ccedil;ant les balises ul et li (listes) en span, et en d&eacute;terminant pour chaque &eacute;l&eacute;ment s'il est un parent de la page ou de l'article en cours (ajout de la classe "unparent").

L'affichage ou non se g&egrave;re ensuite dans votre fichier CSS.

***D&eacute;pendances***

Vous pouvez installer le plugin "yoast_fil_ariane" pour une meilleure couverture de votre site, puisque par d&eacute;faut, lorsque le plugin ne parvient pas &agrave; d&eacute;terminer le fil d'ariane, il affiche celui de yoast_fil_ariane.

== Installation ==
1. T&eacute;l&eacute;chargez `fil_ariane_menu.php` vers le r&eacute;pertoire `/wp-content/plugins/fil_ariane_menu/`
1. Activez l'extension &agrave; travers le menu "Extensions" dans WordPress
1. Configurez les correspondances entre menus, cat&eacute;gories et pages dans le menu d'administration du plugin ("Fil d'Ariane Menu" : dans le cadre "R&eacute;glages" de la colonne de gauche)
1. Ins&eacute;rez les lignes suivantes dans votre template : 

<pre>if ( function_exists('fil_ariane_menu') ) {
	fil_ariane_menu($menu_correspondance_config); 
}</pre>

1. Configurez votre fichier style.css pour afficher uniquement les &eacute;l&eacute;ments de classe "unparent" :

<pre>.menubreadcrumb span{
	display:none;	
}
.menubreadcrumb span.current-menu-ancestor, 
.menubreadcrumb span.current-menu-item, 
.menubreadcrumb span.current-page-item, 
.menubreadcrumb span.current-category-ancestor, 
.menubreadcrumb span.current-post-ancestor, 
.menubreadcrumb span.current-menu-parent, 
.menubreadcrumb span.current-post-parent, 
.menubreadcrumb span.current-item{
	display:inline;
	font-weight:bold;
	}
.menubreadcrumb span.current-menu-item a, 
.menubreadcrumb span.current-page-item a, 
.menubreadcrumb span.current-item a{
	text-decoration: none;
	color:black;
}

li.unparent{
	display:list-item!important;
}
li.unparent > a{
	/* color:orange!important; */
}
li.unparent > ul > li{
	display:list-item!important;
}
span.unparent {
	display:inline!important;
}
span.unparent > a{
	/* color:orange!important; */
}</pre>