<?php
/*
 *
 * LiveOptim - Optimize the content of your articles and automatically tickets to easily improve your position in the results of search engines: Google, Baidu, Yandex, Bing ... 
 * License: GPLv3
 * License URI: http://www.gnu.org/licenses/gpl.htm
 * Copyright (C) 2012 Erwan MILBEO — All rights reserved
 * For more information see the README
 * Any question will find answer on  
 * [support@liveoptim.com](mailto:support@liveoptim.com)
 * our Timelines : [US-EN](https://twitter.com/LiveOptim_US) | [FR](https://twitter.com/LiveOptim_FR) | [ES](https://twitter.com/LiveOptim_ES)
 *
 * langue : pt 
 */

$langue = array(

		//layout
		'parametrage' => 'Configuração',
		'contact' => 'Fale conosco',
		'facebook' => 'Junte-se a nós',
		'twitter' => 'Precisa de ajuda?',
		'twitter2' => '@liveoptim',
		'inscription_message' => 'Inscreva o seu site para ativar o LiveOptim',
		'accueil_erreur_pas_de_compte' => 'Conta inativa.',
		'accueil_inscrivez_vous_ici' => 'Inscrição',
		'accueil_copte_cbisoust_actif' => 'Conta ativada',
		'accueil_compte_cbisoust_inactif' => 'Conta inativa.', 
		'accueil_mots_cles' => 'Palavras-chave',
		'accueil_balise_ignores' => 'Exceções de tratamento',
		'accueil_pattern' => 'Esquema de marcação global',
		'accueil_pattern_cible' => 'Esquema de marcação na página de destino',
		'accueil_nouveau_mdp' => 'Nova senha',
		'modifier' => 'Modificar',

		
		
		// connexion.php
		'connexion_1' => 'Acesso à administração',
		'connexion_content' => 'Digite abaixo a sua senha de conexão à administração do LiveOptim<sup>&copy;</sup>',
		'connexion_titre' => 'Senha :',
		'connexion_connexion' => 'Conexão',
		'connexion_messageErreur_1' => 'Senha incorreta',
		
		
		
		// nouveauMdp.php
		'nouveauMdp_titre' => 'Bem-vindo ao LiveOptim<sup>&copy;</sup>',
		'nouveauMdp_content' => 'Defina a senha que servir para se conectar com a administração do módulo e guarde-a cuidadosamente.',
		'nouveauMdp_titre' => 'Escolha da senha :',
		'nouveauMdp_ancien_mdp' => 'Senha antiga :',
		'nouveauMdp_nouveau_mdp' => 'Senha :',
		'nouveauMdp_nouveau_mdp_2' => 'Confirmação :',
		'nouveauMdp_connexion' => 'Salvar',
		'nouveauMdp_messageErreur_1' => 'Senhas inválidas ',
		
		
		
		// script.php
		'accueil_accueil' => 'Página Inicial',
		'accueil_titre' => 'Bem-vindo ao seu painel de administração do LiveOptim',
		'accueil_contenu' => '
				<p>
					A partir desta interface, você poderá configurar a execução do LiveOptim no seu site:
				</p>
				<ul>
					<li>
						Expressões-chave
						<ul>
							<li>
								<a href="admin.php?page=liveoptim&#38;action=mot-cle-lister">Acréscimo de expressões-chave</a>
								<p>
									Adicione ou modifique a sua lista de expressões-chave estratégicas e
									as URLs das páginas de destino associadas
								</p>
							</li>
						</ul>
					</li>
					<li>
						Configuração:
						<ul>
							<li>
								<a href="admin.php?page=liveoptim&#38;action=pattern-lister">Esquema de marcação global</a>
								<p>
									Esquema de otimização aplicado por função default<span class="lo_ps">*</span> sobre o expressões-chave presentes nos seus conteúdos e sua ordem de de exibição
								</p>
							</li>
							<li>
								<a href="admin.php?page=liveoptim&#38;action=pattern-cible-lister">Esquema de marcação na página de destino</a><span class="txt_prenium">(versão premium)</span>
								<p>
									Modifique a configuração das marcações nas expressões-chave quando elas
									forem tratadas em sua(s) página(s) de destino
								</p>
							</li>
							<li>
								<a href="admin.php?page=liveoptim&#38;action=balise-ignore-lister">Exceções de tratamento</a>
								<p>
									Marcações nas quais os conteúdos não devem ser
									processados pela função<span class="lo_ps">*</span></p>.
								</p>
							</li>
							<li>
								<a href="admin.php?page=liveoptim&#38;action=restreintes-lister">Páginas sem otimizações</a><span class="txt_prenium">(versão premium)</span>
								<p>
									Modifique páginas em quais os conteúdos não devem ser processados pela função
								</p>
							</li>
						</ul>
					</li>
				</ul>
				<p class="txt_etoile"><i><span class="lo_ps">*</span> Modificação disponível na versão premium</i></p>',
		

		
		// tutoriel.php
		'tutoriel_titre' => 'Tutoriel', 
		'tutoriel_clique' => 'clicando aqui',
		
		'tutoriel_texte' => '<div>
		<img src="../wp-content/plugins/liveoptim/img/video.png" alt="" style="float:left; margin: 0px 20px 0px 20px;">
		<div style="padding-top:80px;">
			<p style="font-size:18px">Deixe-nos guiá-lo pelo vídeo tutorial  <u><a href="http://www.youtube.com/watch?v=6GgK2kVY4_I" target="_blank">clicando aqui</a></u>
			</p>
		</div>
	</div>
	<div>
		<img src="../wp-content/plugins/liveoptim/img/book.png" alt="" style="float:left; margin: 0px 20px 0px 20px;">
		<div style="padding-top:80px; margin-top:70px;">
			<p style="font-size:18px">Faça o download do tutorial completo do plugin do Liveoptim para Magneto <u><a href="http://www.liveoptim.com/docs/wp_tutoriel_bre.pdf" target="_blank">clicando aqui</a></u>
			</p>
		</div>
	</div>',
		
		'tutoriel_telecharge' => 'Faça o download do tutorial completo do plugin do Liveoptim para Wordpress clicando aqui',
		'tutoriel_video' => 'Deixe-nos guiá-lo pelo vídeo tutorial clicando aqui',
		'tutoriel_contenu' => '<p>Você pode baixar o tutorial clicando no link abaixo <u><a href="http://www.liveoptim.com/docs/wp_tutoriel_bre.pdf" target="_blank">Tutorial</a></u></p>', 
		
		
		
		// listerBaliseIgnore.php
		'hintlisterBaliseIgnore' => '<div class="hint2"><img  src="../wp-content/plugins/liveoptim/img/hint.png" alt="?"/><p>Insira aqui as marcações nas quais o conteúdo não deve ser processado pelo LiveOptim</p></div>',
		'listerBaliseIgnore_accueil' => 'Página Inicial',
		'listerBaliseIgnore_balises_ignores' => 'Exceções de tratamento',
		'listerBaliseIgnore_titre' => 'Exceções de tratamento',
		'listerBaliseIgnore_nom' => 'Nome',
		'listerBaliseIgnore_action' => 'Ação',
		'listerBaliseIgnore_confirmation_suppression' => 'Tem certeza que quer remover esta restrição?',
		'listerBaliseIgnore_supprimer' => 'Remover',
		'listerBaliseIgnore_modifier' => 'Modificar',
		'listerBaliseIgnore_ajouter' => 'Suplementar', 
		'listerBaliseIgnore_text' => '<div style="margin-top:20px">
<p><span style="font-size: 18px;font-weight:bold; color:#bf4122">Bem-vindo ao seu espaço de a sua otimização: 
Aqui você encontra os limites que a função não ultrapassar !
</span></p>
<span style="font-size :18px; font-weight:bold">
Esta é uma configuração avançada. Recomendamos que você deixe a configuração padrão<br/><br/>
</span>
</div>',
        'listerPattern_text' => '<div style="margin-top:20px">
<p><span style="font-size: 18px;font-weight:bold; color:#bf4122">Bem-vindo ao seu espaço de a sua otimização: 
Personalize aqui as otimizações aplicadas ao seu conteúdo !
</span></p><ol style="font-size:14px;"><li>
Solução: Deixe a configuração padrão</li>
<li>Solução: Personalize para adaptá-la às suas práticas !</li></ol>
<em>(NB: Para saber mais, clique em  <img class="hint" src="../wp-content/plugins/liveoptim/img/hint.png" alt="?"> que está ao lado de cada elemento)</em></div>',
		'listerPattern_cible_text' => '<div style="margin-top:20px">
<p><span style="font-size: 18px;font-weight:bold; color:#bf4122">Bem-vindo ao seu espaço de a sua otimização:
Personalize aqui as otimizações aplicadas especificamente às páginas de destino (ou seja, páginas associadas à palavra-chave)!
</span></p><ol style="font-size:14px;"><li>
Solução: Deixe a configuração padrão</li>
<li>Solução: Personalize para adaptá-la às suas práticas !</li></ol>
<em>(NB: Para saber mais, clique em  <img class="hint" src="../wp-content/plugins/liveoptim/img/hint.png" alt="?"> que está ao lado de cada elemento)</em></div>',		
		
		// layout.php, layoutConnexion.php, layoutNouveauMdp.php
		'layout_title' => 'Admin de Liveoptim',
		'layout_deconnexion' => 'Logoff',
		'layout_liveoptim' => 'Liveoptim',
		
		
		
		// listerMotCle.php
		'hintMotCle' => '<div class="hint2"><img  src="../wp-content/plugins/liveoptim/img/hint.png" alt="?"/><p>Insira as expressões-chave estratégicas para o seu posicionamento,a(s) página(s) de destino associada(s) e a ordem de tratamento (se você definir várias páginas de destino para uma mesma expressão-chave)</p><h2>Dicas de uso:</h2><ul><li>Varie as páginas de destino em função de suas expressões-chave.</li><li>Não modifique com muita frequência as páginas de destino de uma expressão-chave</li></ul></div>',
		'listerMotCle_accueil' => 'Página Inicial',
		'listerMotCle_mots_cles' => 'Palavras-chave',
		'listerMotCle_titre' => 'Gerenciamento de expressões-chave e páginas de destino',
		'listerMotCle_table_requete' => 'Consulta',
		'listerMotCle_table_destination' => 'Endereço da página de destino (<em>com prefixo HTTP://)',
		'listerMotCle_table_position' => 'Posição',
		'listerMotCle_table_action' => 'Ação',
		'listerMotCle_confirmation_suppression' => 'Tem certeza que quer remover esta palavra-chave?',
		'listerMotCle_supprimer' => 'Remover',
		'listerMotCle_modifier' => 'Modificar',
		'listerMotCle_monter' => 'Para Cima',
		'listerMotCle_descendre' => 'Para Baixo',
		'listerMotCle_ajouter' => 'Suplementar',
		'listerMotCle_msg_alert' => 'Por favor preencha a parte palavra-chave !',
		'listerMotCle_text' => '<div style="margin-top:20px">
<p><span style="font-size: 18px;font-weight:bold; color:#bf4122">Bem-vindo ao seu espaço de a sua otimização: Insira aqui as palavras-chave e impulsione o seu tráfego!
</span></p><ol style="font-size:14px;"><li>
Adicione uma palavra-chave em "Solicitar"</li>
<li>Associe-o a uma página do seu site</li>
  <li>Clique em "Adicionar " e assim por diante para cada palavra-chave. </li></ol>
<em>(NB: Para saber mais, clique em  <img class="hint" src="../wp-content/plugins/liveoptim/img/hint.png" alt="?"> que está ao lado de cada elemento)</em><br><br>

<span style="font-size :18px; font-weight:bold">Após ter inserido as palavras-chave você pode começar uma classificação para saber a sua posição atual no Google e Yahoo destas palavras!</span>
<p></p></div>',
      'hintRequete'=>'	<div class="hint2">		<img  src="../wp-content/plugins/liveoptim/img/hint.png" alt="?"/><p> Informe aqui as expressões-chave que deseja manter visíveis nos motores. 
</p>            
<h2>Recomendações de uso:</h2>           
 <ul>            
<span class="mc"><li >Multiplique as chaves de entrada no seu site : <br />
Misture palavras-chave genéricas e palavras-chave de comprimento mais longo. </li></span><br />
<li> Exemplo : <br />
palavra-chave genérica: "Modo"<br />
palavra-chave de comprimento mais longo "blog de moda feminina"<br />
<br />
palavra-chave genérica: "Viagem" <br />
palavra-chave de comprimento mais longo "viagem para Londres mais barato"<br /></li><br />
<li>
Essas palavras-chave, consideradas individualmente, geram algum tráfego mas, quando combinadas, podem representar até 80% do seu tráfego.</li>                
</ul>    	   			</div>	   			',		
	'hinturl'=>'	<div class="hint2">		<img  src="../wp-content/plugins/liveoptim/img/hint.png" alt="?"/>			<p>Informe aqui uma ou mais páginas associadas à palavra-chave. Esta é a página em que você deseja posicionar esta expressão-chave.
</p>            
<h2>Recomendações de uso :</h2>           
 <ul>            
<li>Informe mais URLs para a mesma palavra-chave para diversificar as páginas-alvo<br />
Basta adicionar a mesma palavra-chave com uma URL diferente
</li>                
</ul>    	   			</div>	   			',
	'hintposition'=>'	<div class="hint2">		<img  src="../wp-content/plugins/liveoptim/img/hint.png" alt="?"/>			<p>Você pode definir para a mesma palavra-chave  várias páginas associadas. A posição será única neste caso.  

</p>            
<h2>Recomendações de uso: </h2>           
 <ul>            
<li>Informe mais URLs para a mesma palavra-chave para diversificar as páginas-alvo<br />
</li>  
<li>As URLs dessas páginas serão, então, classificadas em ordem de prioridade que lhe são atribuídas e você pode definir (através de setas ou inserção de valor).
</li>             
<li>A função fará então um primeiro link para a primeira url e um segundo link para a segunda URL para o mesmo conteúdo
</li>      
<li>NB: não é a ordem das palavras-chave, mas sim as URLs.
</li>         
</ul>  	   			</div>	   			',
'hintLO'=>'	<div class="hint2">		<img  src="../wp-content/plugins/liveoptim/img/hint.png" alt="?"/>			<p>Ative / desative a função através deste botão
          </p>        	   			</div>	   			',
	 'hintLimite'=>'	<div class="hint2">		<img  src="../wp-content/plugins/liveoptim/img/hint.png" alt="?"/>			<p>Configure um limite alto de otimização
       </p>            
       <h2>Recomendações de uso :</h2>           
        <ul>            
       <li>Por padrão, limite em 5 otimizações da mesma palavra-chave em uma página<br />
       </li>
       <li>Aconselhamos a não ir além disso.</li>
       <li>
       Você pode reduzir este valor, se quiser ! /li>                
        </ul>             	   			</div>	   			',
	 'hintimport'=>'	<div class="hint2">		<img  src="../wp-content/plugins/liveoptim/img/hint.png" alt="?"/>	<p>Exporte sua base de palavras-chave/páginas-alvo e suas configurações antes de desabilitar ou atualizar o plugin! </p>		         	   			</div>	   			',
	  'hintconfigue'=>'	<div class="hint2">		<img  src="../wp-content/plugins/liveoptim/img/hint.png" alt="?"/>		<p> Você pode fazer a importação de suas configurações; basta selecionar a tabela que deseja importar ou importar todas as tabelas (ou seja, 6 tabelas) em zip.  
</p> 	         	   			</div>	   			',  
 'Message_lien'=>'Start ranking',
	  	'Message_attente'=>'Por favor, aguarde enquanto o ranking.
(Não feche esta janela)',
        'Message_resultat'=>'Por favor efectue login <a  id="lien_so" href="http://statoptim.veille-mkt.com/controleur.php?cible=identification&cible2=apercu-rapport&recherche=ranking&id_projet=" target="_blank" >Statoptim</a> para ver a posição do seu site.
Por favor, tenham o seu acesso (enviado para a sua inscrição). ',


		// listerPattern.php
		'hintPattern' => '<div class="hint2"><img  src="../wp-content/plugins/liveoptim/img/hint.png" alt="?"/><p>Configure as marcações adicionadas pelo LiveOptim em uma mesma palavra-chave toda vez que for encontrada em uma página (fora as páginas de destino), utilizando <span class="mc">{mc}</span> para indicar a expressão-chave e<span class="url">{url}</span> para indicar a URL de destino para os links. Você também pode optar por tratar o esquema em loop.</p><h2>Para operar o tratamento abaixo, por exemplo: </h2><ul><li>&lt;strong&gt;<span class="mc">Expressão- chave</span>&lt;/strong&gt;<em> (primeira ocorrência)</em></li><li>&lt;a href=”<span class="url">http://www.example.com/page-cible.html</span>”&gt;<span class="mc">Expressão-chave</span>&lt;/a&gt;<em>(segunda ocorrência)</em></li><li><span class="mc">Expressão-chave</span><em> (terceira ocorrência)</em></li></ul><h2>Digite a seguinte estrutura</h2><ul><li>&lt;strong&gt;<span class="mc">{mc}</span>&lt;/strong&gt;</li><li>&lt;a href=”<span class="url">{url}</span>”&gt;<span class="mc">{mc}</span>&lt;/a&gt;</li><li><span class="mc">{mc}</span></li></ul></div>',
		'listerPattern_pattern' => 'Esquema de marcação global',
		'listerPattern_titre' => 'Esquema de marcação global',
		'listerPattern_boucler' => 'Realizar o tratamento em loop : ',
		'listerPattern_oui' => 'Sim',
		'listerPattern_non' => 'Não',
		'listerPattern_table_structure' => 'Estrutura',
		'listerPattern_table_position' => 'Posição',
		'listerPattern_table_action' => 'Ação',
		'listerPattern_confirmation_suppression' => 'Tem certeza que quer remover este esquema?',
		'listerPattern_supprimer' => 'Remover',
		'listerPattern_modifier' => 'Modificar',
		'listerPattern_monter' => 'Para Cima',
		'listerPattern_descendre' => 'Para Baixo',
		'listerPattern_ajouter' => 'Suplementar', 
		
		
		
		// listerPatternCible.php
		'hintPatternCible' => '<div class="hint2"><img  src="../wp-content/plugins/liveoptim/img/hint.png" alt="?"/><p>Configure as marcações adicionadas pelo LiveOptim em uma mesma palavra-chave toda vez que que for encontrada em uma página de destino associada, usando <span class="mc">{mc}</span> para indicar a expressão-chave e 		<span class="url">{url}</span> para indicar a URL de destino para os links. Você também pode optar por tratar o esquema em loop.</p><h2>Operar o tratamento abaixo, por exemplo: </h2><ul><li>&lt;strong&gt;<span class="mc">Expressão-chave</span>&lt;/strong&gt;</li><li>&lt;a href=”<span class="url">http://www.example.com/page-cible.html</span>”&gt;<span class="mc">Expressão-chave</span>&lt;/a&gt;</li><li><span class="mc">Expressão-chave</span></li></ul><h2>Digite a seguinte estrutura</h2><ul><li>&lt;strong&gt;<span class="mc">{mc}</span>&lt;/strong&gt;</li><li>&lt;a href=”<span class="url">{url}</span>”&gt;<span class="mc">{mc}</span>&lt;/a&gt;</li><li><span class="mc">{mc}</span></li></ul></div>',		
		'listerPatternCible_accueil' => 'Página Inicial',
		'listerPatternCible_pattern' => 'Esquema de marcação em página de destino',
		'listerPatternCible_titre' => 'Esquema de marcação em página de destino',
		'listerPatternCible_boucler' => 'Em loop',
		'listerPatternCible_oui' => 'Sim',
		'listerPatternCible_non' => 'Não',
		'listerPatternCible_table_structure' => 'Estrutura',
		'listerPatternCible_table_position' => 'Posição',
		'listerPatternCible_table_action' => 'Ação',
		'listerPatternCible_confirmation_suppression' => 'Tem certeza que quer remover este esquema?',
		'listerPatternCible_supprimer' => 'Remover',
		'listerPatternCible_modifier' => 'Modificar',
		'listerPatternCible_monter' => 'Para Cima',
		'listerPatternCible_descendre' => 'Para Baixo',
		'listerPatternCible_ajouter' => 'Suplementar', 
		'listerPageRestreinte_text' => '<div style="margin-top:20px">
<p><span style="font-size: 18px;font-weight:bold; color:#bf4122">Bem-vindo ao seu espaço de a sua otimização:
Personalize as páginas processadas pelo LiveOptim!
</span></p>
<span style="font-size: 18px;font-weight:bold; ">
Adicione a página do seu site que você não quer otimizar com LiveOptim !
</span>
</div>',	
		// ajouts m.a.j 1.2
		'COM_LIVEOPTIM_MENU_CONFIGURATION' 	=> 'Configuração',
		'COM_LIVEOPTIM_MENU_PAGE_RESTREINTE' => 'Páginas restritas',
		'COM_LIVEOPTIM_LIMITE_CAPPING' => 'Limite',
		'COM_LIVEOPTIM_VALCAP_SUP' => 'Você vai utilizar um valor que a MKT não recomenda. Obtenha informações em www.liveoptim.com',
		'COM_LIVEOPTIM_VALCAP_NAN' => 'O limite deve ser um número inteiro',
		'COM_LIVEOPTIM_VALCAP_VIDE' => 'Informe um valor',
		'COM_LIVEOPTIM_EXPORT_CSV' => 'Fazer um backup da configuração de LiveOptim',
		'COM_LIVEOPTIM_TABLES_FILE' => 'Arquivo:',
		'COM_LIVEOPTIM_TABLES_ALL' => 'Todos (zip)',
		'COM_LIVEOPTIM_FICHIER_VIDE' => 'Faça upload de um arquivo',
		'COM_LIVEOPTIM_FICHIER_NCSV' => 'O arquivo não é um CSV',
		'COM_LIVEOPTIM_FICHIER_NZIP' => 'O arquivo não é um arquivo ZIP',
		'COM_LIVEOPTIM_EXPIRE' => 'Utilizando uma versão limitada da LiveOptim.<br />
Benefício efeitos da LiveOptim sem nenhum limite de palavras-chave e de personalização, compre a sua licença agora e encontre a sua configuração avançada! !',
		'COM_LIVEOPTIM_NON_INSCRIT' => 'Você não pode usar o módulo sem antes ter se registrado. Você pode se registrar no <a class="link_liveoptim" href="http://www.liveoptim.com" target="_blank">site LiveOptim</a>',
		'COM_LIVEOPTIM_TOUT_COCHER' => 'Marcar tudo',
		'COM_LIVEOPTIM_TOUT_DECOCHER' => 'Desmarcar tudo',
		'COM_LIVEOPTIM_BOUTON_EXPORT' => 'Exportar CSV',
		'COM_LIVEOPTIM_IMPORTATION' => 'Tabela a importar: ',
		'COM_LIVEOPTIM_IMPORT_VALIDATION' => 'Validar',
		'COM_LIVEOPTIM_PAGES_RESTREINTES' => 'Página',
		'listerPagesRestreintes_titre' => 'Páginas sem otimizações',
		'listerConfiguration_titre' => 'Opções',
		'COM_LIVEOPTIM_LICENCE_TEST' => 'Você está usando uma versão experimental.<br />
Benefício efeitos LiveOptim em seu site, sem nenhum limite de tempo, compre a sua licença agora!',
		'COM_LIVEOPTIM_BOUTON_BUY' => '<a class="btn_buy"  href="http://www.liveoptim.com/pt/paiement/choix-du-mode.html">COMPRE</a>',
		'COM_LIVEOPTIM_BOUTON_MAJ' => '<a class="btn_MaJ"  href="admin.php?page=liveoptim&#38;action=update&noheader=true">atualizações <br />disponíveis</a>',
		'COM_LIVEOPTIM_BOUTON_MAJ_FTP' => 'atualizações',
		'COM_LIVEOPTIM_MAJ_FTP_TITRE' => 'atualizações FTP',
		'COM_LIVEOPTIM_MAJ_FTP_PHRASE' => 'Para iniciar o aplicativo necessário, o WordPress precisa acessar o seu servidor web. Por favor, insira seu nome de usuário FTP para continuar. Se você não se lembra do seu nome de utilizador, deve contactar o seu host.',
		'COM_LIVEOPTIM_MAJ_FTP_USER' => 'FTP nome de usuário',
		'COM_LIVEOPTIM_MAJ_FTP_PASS' => 'FTP Password',
		'COM_LIVEOPTIM_CONFIG_EXPORT' => 'Exportar SQL',
		
		//Cache
		'COM_LIVEOPTIM_CACHE-TITRE' => 'Gestion du cache',
		'COM_LIVEOPTIM_CACHE-TEXT' => 'LiveOptim usa um cache para acelerar o processamento de suas páginas <br />
										Clique abaixo para suprimir esse cache',
		'COM_LIVEOPTIM_BTN-VIDE-CACHE' => 'ESVAZIAR CACHE',
		
		//version FREE
		'COM_LIVEOPTIM_LICENCE_FREE' =>'Você utiliza a versão gratuita de LivOptim, certas funcionalidades estão desativadas. <br />
										<b>Passe à versão premium para aproveitar todas as funcionalidades:<br />
										VERSÃO GRATUITA DURANTE 30 DIAS.</b>',
		'COM_LIVEOPTIM_BOUTON_PRENIUM' => '<a class="btn_Prenuim"  target="__blank" href="http://www.liveoptim.com/pt/contenu/plugin-wordpress-premium.html" ><b>ATUALIZAÇÃO PREMIUM</b> <br /><i>(30 dias de graça)</i></a>',
		'COM_LIVEOPTIM_BOUTON_PRENIUM_PLUS' => 'mais palavras-chave',
		'hintPrenium' =>'<div onclick="fenetreInfoPreniumFermer()" class="hint2">		<img alt="?" src="../wp-content/plugins/liveoptim/img/hint.png"><br>Esta funcionalidade nao está disponível na versão gratuita .<br/> Para obtê-la passe  à versão Premium.</div>',
		'COM_LIVEOPTIM_MSG_MOT_CLE' =>'Só pode acrescentar 10 associações palavra-chave/página de destino. Faça um Upgrade ao seu LiveOptim : sem limite de palavras-chave.',
		'COM_LIVEOPTIM_MSG_PAGES_RESTREINTE' =>'Só pode escolher 10 páginas no máximo . Passe à versão Premium sem limite.',

		//Inscription
		'inscription_titre' => 'inscrição',
		'inscription_texte' => 'Using the plugin requires creating an account with our services',
		'inscription_email' => 'Email : ',
		'inscription_url' => 'URL do seu site:',
		'inscription_pass' => 'Senha :',
		'inscription_btnInscrip' => 'OK! EU COMEÇO A OTIMIZAÇÃO',
	    'inscription_btnPasse' => '  >> Pule esta etapa ',
		'inscription_msgPasse' => '<em>(sua URL será enviada para o nosso servidor)<em> ',
		'inscription_email_info' => '<em>Receba GRÁTIS todo o nosso aconselhamento especializado para o seu SEO: Livro Branco, Melhores práticas, exemplos de configuração ... e obter aconselhamento personalizado de um projecto dedicado!</em>',
		
		'inscription_mail_vide' =>'É preciso inserir um e-mail',
		'inscription_mail_trop_long' => 'É preciso inserir um e-mail mais curto',
		'inscription_mail_invalid' => 'É preciso inserir um e-mail válido',
		'inscription_url_vide' => 'É preciso inserir o nome do domínio no qual o LiveOptim<sup>&copy;</sup> será ativado',
		'inscription_url_trop_long' => 'É preciso inserir um nome de domínio mais curto',
		'inscription_url_deja_util' => 'Este nome de domínio já foi utilizado',
		'inscription_compte_already_create_wrong_email' => 'The account already exists! Please indicate the address with which you registered.',
		'inscription_compte_already_create_wrong_password' => 'Existing account, please enter the password of your account LiveOptim.',
		
		//Fenetre Prenuim
		
		'COM_LIVEOPTIM_FNT_PRE_ALL_PRODUCT' => 'TODOS OS NOSSOS PRODUTOS',
		'COM_LIVEOPTIM_FNT_PRE_OTHER_PRODUCT' => 'Veja também os outros produtos da gama de LiveOptim',
		'COM_LIVEOPTIM_FNT_PRE_MORE_INFO' =>  'MORE INFO',
		'COM_LIVEOPTIM_FNT_PRE_TXT_MKT900' => '1-year SEO service for your website.<br />
												Free hotline, 7-day-a-week timeline, support team, etc...<br />',
		'COM_LIVEOPTIM_FNT_PRE_PRIX_MKT900' => '&euro;900 INC. TAXES',
		'COM_LIVEOPTIM_FNT_PRE_TXT_SO' => 'All your SEO analyses on 1 platform!<br />
										Site audit, ranking on demand, analytic monitoring of positions, etc...<br />',
		'COM_LIVEOPTIM_FNT_PRE_PRIX_SO' => '&euro;9.90 INC. TAXES / MONTH',
		'COM_LIVEOPTIM_FNT_PRE_COMING_SOON' => 'EM BREVE',
		
		'COM_LIVEOPTIM_FNT_PRE_UN_KEY' => 'Palavras-chaves ilimitadas',
		'COM_LIVEOPTIM_FNT_PRE_UN_TARGET' => 'Páginas de destino ilimitadas',
		'COM_LIVEOPTIM_FNT_PRE_CACHE' => 'Sistema de cache incluído<br /> (otimização do tempo de carregamento)',
		'COM_LIVEOPTIM_FNT_PRE_CUSTOM_TAG' => 'Personalisação dos esquemas de otimização',
		'COM_LIVEOPTIM_FNT_PRE_TARGET' => 'Esquema specífico de otimização das páginas de destino',
		'COM_LIVEOPTIM_FNT_PRE_LOOP' => 'Opção: esquema de marcação em laço',
		'COM_LIVEOPTIM_FNT_PRE_CAPPING' => 'Sistema de controlo com alerta em caso de otimização excessiva',
		'COM_LIVEOPTIM_FNT_PRE_EXCLUD_PAGES' => 'Opção: exclusão de páginas sem otimização',
		'COM_LIVEOPTIM_FNT_PRE_EXECEPTION' => 'Preconfigure exceptions tags',
		'COM_LIVEOPTIM_FNT_PRE_SUPPORT' => 'Apoio Premium',
		'COM_LIVEOPTIM_FNT_PRE_TWITER' => 'Timeline do Twitter Apoio 24/7',
		'COM_LIVEOPTIM_FNT_PRE_HOTLINE' => 'Hotline Gratuita',
		'COM_LIVEOPTIM_FNT_PRE_CHAT' => 'LiveChat',
		'COM_LIVEOPTIM_FNT_PRE_UPGRADE' => 'ATUALIZAÇÕES',
		
		
		// code401.php
		'code401_titre' => 'Código 401.',
		
		// code403.php
		'code403_titre' => 'Código 403.',
		
		// code404.php
		'code404_titre' => 'Código 404.',
		
);
?>