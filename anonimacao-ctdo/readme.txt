=== Anonima&ccedil;&atilde;o CTDO ===
Contributors: Dilneiss
Donate link: 
Tags: anonimacao, anonym, anonimo, footer, auto, post, comments, post, plugin, google, admin
Requires at least: 2.0
Tested up to: 2.3.3
Stable tag: 1.2

Adiciona o c&oacute;digo de auto anonima&ccedil;&atilde;o no blog protegendo os links de serem detectados.

== Description ==

Como todos devem saber, &eacute; poss&iacute;vel detectar de onde um usu&aacute;rio vem apenas clicando em um link de uma p&aacute;gina.
Pois bem, com nosso sistema instalado em seu blog o sistema pucha um javascript diretamente de nosso site, e protege todos os links, subistituindo de: http://wordpress.com para http://anonimacao.ctdo.com.br/?http://wordpress.com
Com esse novo link, &eacute; contado as visitas sempre que passado por nosso sistema, e ainda exclui a ref&ecirc;rencia, Imposs&iacute;bilitando a p&aacute;gina destino detectar a p&aacute;gina de origem do clique.
Muito &uacute;til para links do tipo rapidshare.. Geralmente muitos links s&atilde;o excluidos autom&aacute;ticamente do servidor apenas por conter a palavra "warez" como endere&ccedil;o. Como &eacute; warez, eles podem possuir filtros para auto excluir todos os uploads..
Ent&atilde;o sem ref&ecirc;rencia, o servidor destino ser&aacute; imcapaz de detectar de onde o clique vem e n&atilde;o excluir&aacute; o upload.
Com isso grande porcentagem das esclus&otilde;es de arquivos no servidor &eacute; eliminada :)
Para maiores detalhes visite a p&aacute;gina do autor ou plugin.


== Installation ==

1. Envie a pasta `anonimacao_ctdo` para a pasta `/wp-content/plugins/`
2. Ative o plugin no menu do WordPress em 'Plugins'
3. Localize 'Anonima&ccedil;&atilde;o CTDO' no menu op&ccedil;&otilde;es.
4. Localize o texto: links_protegidos = "";
5. 
	1. Entre "" coloque o dominio do seu site, por exemplo: ctdo.com.br (ficando assim [links_protegidos = "ctdo.com.br";])
	2. Voc&ecirc; pode colocar quantas palavras chaves quizer, entre cada palavra que voc&ecirc; colocar, utilize v&iacute;rgulas sem espa&ccedil;o.. por exemplo: ctdo.com.br,google.com.br,wordpress.com (Essas palavras que voc&ecirc; colocar s&atilde;o para n&atilde;o proteger, ou seja, se num link de seu blog conter uma palavra definida nessa configura&ccedil;&atilde;o, o sistema n&atilde;o proteger&aacute;.. Por qu&ecirc; n&atilde;o h&aacute; necessidade de prote&ccedil;&atilde;o de links dentro de seu pr&oacute;prio site para seu pr&oacute;prio site :)
	3. Se preferir, e ainda aparecer em nossa lista de utilizadores, localizada em http://anonimacao.ctdo.com.br voc&ecirc; pode fazer um cadastro gratu&iacute;to em: http://anonimacao.ctdo.com.br/utilizador_admincp.php?pagina=cadastro
	4. Ap&oacute;s estar cadastrado, voc&ecirc; pode logar com sua conta em: http://anonimacao.ctdo.com.br/utilizador_admincp.php  
	5. Logado, voc&ecirc; pode clicar em Gerar C&oacute;digo, no centro da p&aacute;gina, voc&ecirc; ganhar&aacute; um c&oacute;digo mais limpo e customizado com o nome de seu site. Copie esse c&oacute;digo e volte ao seu blog > Op&ccedil;&otilde;es > Anonima&ccedil;&atilde;o CTDO, subistitua todo o c&oacute;digo por seu novo c&oacute;digo customizado e clique em salvar.
6. Pronto, sistema totalmente funcional em seu blog!

!NOTA: O seu site dever&aacute; ser aprovado pelo administrador do site para aparecer na lista de utilizadores.. Voc&ecirc; pode usar o seu c&oacute;digo personalizado j&aacute; logo ap&oacute;s o cadastro em nosso site sem ser necess&aacute;rio nenhuma aprova&ccedil;&atilde;o!
!NOTA2: Agora suas palavras chaves s&atilde;o gerenciadas por voc&ecirc; em nosso site. Logado no sistema v&aacute; para: Palavras Protegidas, e l&aacute; voc&ecirc; coloca uma palavra ou dom&iacute;nio por linha e clique em Editar. O nosso site far&aacute; automaticamente a mudan&ccedil;a em seu c&oacute;digo personalizado (Aten&ccedil;&atilde;o, n&atilde;o &eacute; necess&aacute;rio nenhuma das vezes editar o c&oacute;digo novamente no plugin, nosso site faz isso automaticamente!)


== Frequently Asked Questions ==

= &eacute; necess&aacute;rio cadastro para utilizar o sistema? =
N&atilde;o.
N&atilde;o &eacute; necess&aacute;rio de forma alg&uacute;m se cadastrar em nosso site para utilizar nosso sistema.
Voc&ecirc; pode continuar utilizando o sistema de auto anonima&ccedil;&atilde;o, que agora se encontra na p&aacute;gina Gerar Link/C&oacute;digo gerar o seu c&oacute;digo e instalar em qualquer sistema.

Agora claro, com nossa nova &aacute;rea de utilizadores, &eacute; poss&iacute;vel voc&ecirc; editar online as palavras que voc&ecirc; quer que nosso sistema n&atilde;o subistitua e ap&oacute;s salvo seu c&oacute;digo continuar&aacute; funcionando normalmente, n&atilde;o tendo de atualizar nunca o c&oacute;digo gerado pelo sistema.


= Eu instalei o c&oacute;digo de auto anonima&ccedil;&atilde;o em meu site e ele n&atilde;o funciona, por qu&ecirc;? =
Voc&ecirc; deve ao menos incluir uma palavra para que o sistema n&atilde;o subistitua.
Recomendado colocar o dominio do seu site, por exemplo: ctdo.com.br

agora se nos links que voc&ecirc; quer proteger podem conter o nome do seu dom&iacute;nio, recomendamos colocar o endere&ccedil;o do seu site de duas formas, (1 por linha) exemplo:
http://www.ctdo.com.br
http://ctdo.com.br


feito isso o sistema funcionar&aacute; normalmente e n&atilde;o subistituir&aacute; nenhum link que contenham o endere&ccedil;o do seu site nele!

= Esse servi&ccedil;o alg&uacute;m dia ser&aacute; pago? =
N&atilde;O
Nosso servi&ccedil;o sempre ser&aacute; gratu&iacute;to e nunca passar&aacute; a ser pago!
N&oacute;s mantemos nosso site com os an&uacute;ncios pelo site e j&aacute; t&aacute; de bom tamanho!
Por isso nunca ser&aacute; pago!!


== Screenshots ==
Nenhuma dispon&iacute;vel