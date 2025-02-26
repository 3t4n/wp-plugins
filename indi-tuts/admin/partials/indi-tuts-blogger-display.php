<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://www.indigorise.de
 * @since      1.0.0
 *
 * @package    Indi_Tuts
 * @subpackage Indi_Tuts/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<div id="indi-head">
	<img src="../wp-content/themes/indigo-rise/includes/images/feather.png" alt="" width="50" height="52" /> <span class="indi-title">INDI-Tutorials</span>
</div>
<div id="wrapper">
  <div class="textbereich">
	          <h2 class="f-right">Ihr Benutzer-Profil: <span class="orange">INDI-Blogger</span></h2>
  </div>
	
 <div class="videobereich">
	 <h3>Video-Tutorials</h3>
<main>
  
  <input id="tab1" type="radio" name="tabs" checked>
  <label for="tab1">User-Berechtigungen</label>
    
  <input id="tab2" type="radio" name="tabs">
  <label for="tab2">Text bearbeiten</label>
	
  <input id="tab3" type="radio" name="tabs">
  <label for="tab3">Keywordpflege</label>
    
  <input id="tab4" type="radio" name="tabs">
  <label for="tab4">Medien hochladen</label>
    
  <input id="tab5" type="radio" name="tabs">
  <label for="tab5">Bilder einfügen</label>
	
  <input id="tab6" type="radio" name="tabs">
  <label for="tab6">Design- und Seitenstruktur ändern</label>
    
  <input id="tab7" type="radio" name="tabs">
  <label for="tab7">INDI-Module einfügen</label>
	
  <input id="tab8" type="radio" name="tabs">
  <label for="tab8">Seite / Vorlage erstellen</label>
	
  <input id="tab9" type="radio" name="tabs">
  <label for="tab9">Blogbericht erstellen</label>
	
  <input id="tab10" type="radio" name="tabs">
  <label for="tab10">Blogbericht veröffentlichen</label>
	
  <input id="tab11" type="radio" name="tabs">
  <label for="tab11">Blog in Socialmediaportalen posten</label>
	
<div class="top-border"></div>   
    
  <section id="content1">
	  <h3>INDI-Webseitensystem - Übersicht Benutzerfunktionen und Berechtigungen</h3>
	<div class="table">
	   <div class="table-row-start">
		<div class="spalte1">Benutzerberechtigung</div>
		<div class="spalte2">INDI-User</div>
		<div class="spalte3">INDI-Blogger</div>
		<div class="spalte4">INDI-Editor</div>
		<div class="spalte5">INDI-Manager</div>
		<div class="spalte6">INDI-Admin</div>
	   </div>
		 <div class="table-row">
		<div class="spalte-innen-1">Text bearbeiten</div>
		<div class="spalte-innen-2 x-green">X</div>
		<div class="spalte-innen-3 x-green">X</div>
		<div class="spalte-innen-4 x-green">X</div>
		<div class="spalte-innen-5 x-green">X</div>
		<div class="spalte-innen-6 x-green">X</div>
	   </div>
		<div class="table-row">
		<div class="spalte-innen-1">Keywordpflege</div>
		<div class="spalte-innen-2 x-green">X</div>
		<div class="spalte-innen-3 x-green">X</div>
		<div class="spalte-innen-4 x-green">X</div>
		<div class="spalte-innen-5 x-green">X</div>
		<div class="spalte-innen-6 x-green">X</div>
	   </div>
		 <div class="table-row grey">
		<div class="spalte-innen-1">Medien hochladen</div>
		<div class="spalte-innen-2 x-green">X</div>
		<div class="spalte-innen-3 x-green">X</div>
		<div class="spalte-innen-4 x-green">X</div>
		<div class="spalte-innen-5 x-green">X</div>
		<div class="spalte-innen-6 x-green">X</div>
	   </div>
		<div class="table-row">
		<div class="spalte-innen-1">Bilder einfügen</div>
		<div class="spalte-innen-2 x-green">X</div>
		<div class="spalte-innen-3 x-green">X</div>
		<div class="spalte-innen-4 x-green">X</div>
		<div class="spalte-innen-5 x-green">X</div>
		<div class="spalte-innen-6 x-green">X</div>
	   </div>
		<div class="table-row">
		<div class="spalte-innen-1">Design- und Seitenstruktur ändern</div>
		<div class="spalte-innen-2 x-green">X</div>
		<div class="spalte-innen-3 x-green">X</div>
		<div class="spalte-innen-4 x-green">X</div>
		<div class="spalte-innen-5 x-green">X</div>
		<div class="spalte-innen-6 x-green">X</div>
	   </div>
		<div class="table-row">
		<div class="spalte-innen-1">INDI-Module nutzen</div>
		<div class="spalte-innen-2 x-green">X</div>
		<div class="spalte-innen-3 x-green">X</div>
		<div class="spalte-innen-4 x-green">X</div>
		<div class="spalte-innen-5 x-green">X</div>
		<div class="spalte-innen-6 x-green">X</div>
	   </div>
		<div class="table-row">
		<div class="spalte-innen-1">Neue Seite / Vorlage erstellen</div>
		<div class="spalte-innen-2 x-green">X</div>
		<div class="spalte-innen-3 x-green">X</div>
		<div class="spalte-innen-4 x-green">X</div>
		<div class="spalte-innen-5 x-green">X</div>
		<div class="spalte-innen-6 x-green">X</div>
	   </div>
		<div class="table-row">
		<div class="spalte-innen-1">Blogbericht erstellen</div>
		<div class="spalte-innen-2 x-red">X</div>
		<div class="spalte-innen-3 x-green">X</div>
		<div class="spalte-innen-4 x-green">X</div>
		<div class="spalte-innen-5 x-green">X</div>
		<div class="spalte-innen-6 x-green">X</div>
	   </div>
		<div class="table-row">
		<div class="spalte-innen-1">Blogbericht veröffentlichen</div>
		<div class="spalte-innen-2 x-red">X</div>
		<div class="spalte-innen-3 x-green">X</div>
		<div class="spalte-innen-4 x-green">X</div>
		<div class="spalte-innen-5 x-green">X</div>
		<div class="spalte-innen-6 x-green">X</div>
	   </div>
		<div class="table-row">
		<div class="spalte-innen-1">Blog in Socialmediaportalen posten</div>
		<div class="spalte-innen-2 x-red">X</div>
		<div class="spalte-innen-3 x-green">X</div>
		<div class="spalte-innen-4 x-green">X</div>
		<div class="spalte-innen-5 x-green">X</div>
		<div class="spalte-innen-6 x-green">X</div>
	   </div>
		<div class="table-row">
		<div class="spalte-innen-1">Landing-Page erstellen</div>
		<div class="spalte-innen-2 x-red">X</div>
		<div class="spalte-innen-3 x-red">X</div>
		<div class="spalte-innen-4 x-green">X</div>
		<div class="spalte-innen-5 x-green">X</div>
		<div class="spalte-innen-6 x-green">X</div>
	   </div>
		<div class="table-row">
		<div class="spalte-innen-1">Landing-Page veröffentlichen</div>
		<div class="spalte-innen-2 x-red">X</div>
		<div class="spalte-innen-3 x-red">X</div>
		<div class="spalte-innen-4 x-green">X</div>
		<div class="spalte-innen-5 x-green">X</div>
		<div class="spalte-innen-6 x-green">X</div>
	   </div>
		<div class="table-row">
		<div class="spalte-innen-1">Neue Seite erstellen und veröffentlichen</div>
		<div class="spalte-innen-2 x-red">X</div>
		<div class="spalte-innen-3 x-red">X</div>
		<div class="spalte-innen-4 x-red">X</div>
		<div class="spalte-innen-5 x-green">X</div>
		<div class="spalte-innen-6 x-green">X</div>
	   </div>
		<div class="table-row">
		<div class="spalte-innen-1">Seiten und Blogbeiträge löschen</div>
		<div class="spalte-innen-2 x-red">X</div>
		<div class="spalte-innen-3 x-red">X</div>
		<div class="spalte-innen-4 x-red">X</div>
		<div class="spalte-innen-5 x-green">X</div>
		<div class="spalte-innen-6 x-green">X</div>
	   </div>
		<div class="table-row">
		<div class="spalte-innen-1">Seitennavigation administrieren</div>
		<div class="spalte-innen-2 x-red">X</div>
		<div class="spalte-innen-3 x-red">X</div>
		<div class="spalte-innen-4 x-red">X</div>
		<div class="spalte-innen-5 x-green">X</div>
		<div class="spalte-innen-6 x-green">X</div>
	   </div>
		<div class="table-row">
		<div class="spalte-innen-1">Daten Import/Export</div>
		<div class="spalte-innen-2 x-red">X</div>
		<div class="spalte-innen-3 x-red">X</div>
		<div class="spalte-innen-4 x-red">X</div>
		<div class="spalte-innen-5 x-green">X</div>
		<div class="spalte-innen-6 x-green">X</div>
	   </div>
		<div class="table-row">
		<div class="spalte-innen-1">Widgets administrieren</div>
		<div class="spalte-innen-2 x-red">X</div>
		<div class="spalte-innen-3 x-red">X</div>
		<div class="spalte-innen-4 x-red">X</div>
		<div class="spalte-innen-5 x-green">X</div>
		<div class="spalte-innen-6 x-green">X</div>
	   </div>
		<div class="table-row">
		<div class="spalte-innen-1">Benutzer einrichten / ändern</div>
		<div class="spalte-innen-2 x-red">X</div>
		<div class="spalte-innen-3 x-red">X</div>
		<div class="spalte-innen-4 x-red">X</div>
		<div class="spalte-innen-5 x-green">X</div>
		<div class="spalte-innen-6 x-green">X</div>
	   </div>
		<div class="table-row">
		<div class="spalte-innen-1">Designmodifikator</div>
		<div class="spalte-innen-2 x-red">X</div>
		<div class="spalte-innen-3 x-red">X</div>
		<div class="spalte-innen-4 x-red">X</div>
		<div class="spalte-innen-5 x-green">X</div>
		<div class="spalte-innen-6 x-green">X</div>
	   </div>
		<div class="table-row">
		<div class="spalte-innen-1">INDI-Bibliothek verwalten</div>
		<div class="spalte-innen-2 x-red">X</div>
		<div class="spalte-innen-3 x-red">X</div>
		<div class="spalte-innen-4 x-red">X</div>
		<div class="spalte-innen-5 x-green">X</div>
		<div class="spalte-innen-6 x-green">X</div>
	   </div>
		<div class="table-row">
		<div class="spalte-innen-1">Zusatzmodule installieren und administrieren</div>
		<div class="spalte-innen-2 x-red">X</div>
		<div class="spalte-innen-3 x-red">X</div>
		<div class="spalte-innen-4 x-red">X</div>
		<div class="spalte-innen-5 x-red">X</div>
		<div class="spalte-innen-6 x-green">X</div>
	   </div>
	</div>
  </section>
    
  <section id="content2">
   <style>.embed-container { position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; max-width: 100%; } .embed-container iframe, .embed-container object, .embed-container embed { position: absolute; top: 0; left: 0; width: 100%; height: 100%; }</style><div class='embed-container'><iframe src='https://player.vimeo.com/video/244188881' frameborder='0' webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe></div>
  </section>
    
  <section id="content3">
     <style>.embed-container { position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; max-width: 100%; } .embed-container iframe, .embed-container object, .embed-container embed { position: absolute; top: 0; left: 0; width: 100%; height: 100%; }</style><div class='embed-container'><iframe src='https://player.vimeo.com/video/246303647' frameborder='0' webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe></div>
  </section>
     
  <section id="content4">
    <style>.embed-container { position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; max-width: 100%; } .embed-container iframe, .embed-container object, .embed-container embed { position: absolute; top: 0; left: 0; width: 100%; height: 100%; }</style><div class='embed-container'><iframe src='https://player.vimeo.com/video/245966067' frameborder='0' webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe></div>
	  <div class="space"></div>
	  <style>.embed-container { position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; max-width: 100%; } .embed-container iframe, .embed-container object, .embed-container embed { position: absolute; top: 0; left: 0; width: 100%; height: 100%; }</style><div class='embed-container'><iframe src='https://player.vimeo.com/video/245973515' frameborder='0' webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe></div>
  </section>
	
  <section id="content5">
    <style>.embed-container { position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; max-width: 100%; } .embed-container iframe, .embed-container object, .embed-container embed { position: absolute; top: 0; left: 0; width: 100%; height: 100%; }</style><div class='embed-container'><iframe src='https://player.vimeo.com/video/244202587' frameborder='0' webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe></div>
	  <div class="space"></div>
	  <style>.embed-container { position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; max-width: 100%; } .embed-container iframe, .embed-container object, .embed-container embed { position: absolute; top: 0; left: 0; width: 100%; height: 100%; }</style><div class='embed-container'><iframe src='https://player.vimeo.com/video/245958042' frameborder='0' webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe></div>
  </section>
	
  <section id="content6">
	  <style>.embed-container { position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; max-width: 100%; } .embed-container iframe, .embed-container object, .embed-container embed { position: absolute; top: 0; left: 0; width: 100%; height: 100%; }</style><div class='embed-container'><iframe src='https://player.vimeo.com/video/246112402' frameborder='0' webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe></div>
	  <div class="space"></div>
   <style>.embed-container { position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; max-width: 100%; } .embed-container iframe, .embed-container object, .embed-container embed { position: absolute; top: 0; left: 0; width: 100%; height: 100%; }</style><div class='embed-container'><iframe src='https://player.vimeo.com/video/246110418' frameborder='0' webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe></div>
  </section>
	
  <section id="content7">
    <style>.embed-container { position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; max-width: 100%; } .embed-container iframe, .embed-container object, .embed-container embed { position: absolute; top: 0; left: 0; width: 100%; height: 100%; }</style><div class='embed-container'><iframe src='https://player.vimeo.com/video/246138986' frameborder='0' webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe></div>
  </section>
	
  <section id="content8">
   <style>.embed-container { position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; max-width: 100%; } .embed-container iframe, .embed-container object, .embed-container embed { position: absolute; top: 0; left: 0; width: 100%; height: 100%; }</style><div class='embed-container'><iframe src='https://player.vimeo.com/video/246152628' frameborder='0' webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe></div>
  </section>
	
  <section id="content9">
   <style>.embed-container { position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; max-width: 100%; } .embed-container iframe, .embed-container object, .embed-container embed { position: absolute; top: 0; left: 0; width: 100%; height: 100%; }</style><div class='embed-container'><iframe src='https://player.vimeo.com/video/246659258' frameborder='0' webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe></div>
  </section>
	
  <section id="content10">
   <style>.embed-container { position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; max-width: 100%; } .embed-container iframe, .embed-container object, .embed-container embed { position: absolute; top: 0; left: 0; width: 100%; height: 100%; }</style><div class='embed-container'><iframe src='https://player.vimeo.com/video/246660302' frameborder='0' webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe></div>
  </section>
	
  <section id="content11">
   <style>.embed-container { position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; max-width: 100%; } .embed-container iframe, .embed-container object, .embed-container embed { position: absolute; top: 0; left: 0; width: 100%; height: 100%; }</style><div class='embed-container'><iframe src='https://player.vimeo.com/video/246662400' frameborder='0' webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe></div>
  </section>
	
  <section id="content12">
    <p>
      Bacon ipsum dolor sit amet landjaeger sausage brisket, jerky drumstick fatback boudin ball tip turducken. Pork belly meatball t-bone bresaola tail filet mignon kevin turkey ribeye shank flank doner cow kielbasa shankle. Pig swine chicken hamburger, tenderloin turkey rump ball tip sirloin frankfurter meatloaf boudin brisket ham hock. Hamburger venison brisket tri-tip andouille pork belly ball tip short ribs biltong meatball chuck. Pork chop ribeye tail short ribs, beef hamburger meatball kielbasa rump corned beef porchetta landjaeger flank. Doner rump frankfurter meatball meatloaf, cow kevin pork pork loin venison fatback spare ribs salami beef ribs.
    </p>
    <p>
      Jerky jowl pork chop tongue, kielbasa shank venison. Capicola shank pig ribeye leberkas filet mignon brisket beef kevin tenderloin porchetta. Capicola fatback venison shank kielbasa, drumstick ribeye landjaeger beef kevin tail meatball pastrami prosciutto pancetta. Tail kevin spare ribs ground round ham ham hock brisket shoulder. Corned beef tri-tip leberkas flank sausage ham hock filet mignon beef ribs pancetta turkey.
    </p>
  </section>
	
  <section id="content13">
    <p>
      Bacon ipsum dolor sit amet landjaeger sausage brisket, jerky drumstick fatback boudin ball tip turducken. Pork belly meatball t-bone bresaola tail filet mignon kevin turkey ribeye shank flank doner cow kielbasa shankle. Pig swine chicken hamburger, tenderloin turkey rump ball tip sirloin frankfurter meatloaf boudin brisket ham hock. Hamburger venison brisket tri-tip andouille pork belly ball tip short ribs biltong meatball chuck. Pork chop ribeye tail short ribs, beef hamburger meatball kielbasa rump corned beef porchetta landjaeger flank. Doner rump frankfurter meatball meatloaf, cow kevin pork pork loin venison fatback spare ribs salami beef ribs.
    </p>
    <p>
      Jerky jowl pork chop tongue, kielbasa shank venison. Capicola shank pig ribeye leberkas filet mignon brisket beef kevin tenderloin porchetta. Capicola fatback venison shank kielbasa, drumstick ribeye landjaeger beef kevin tail meatball pastrami prosciutto pancetta. Tail kevin spare ribs ground round ham ham hock brisket shoulder. Corned beef tri-tip leberkas flank sausage ham hock filet mignon beef ribs pancetta turkey.
    </p>
  </section>
	
  <section id="content14">
    <p>
      Bacon ipsum dolor sit amet landjaeger sausage brisket, jerky drumstick fatback boudin ball tip turducken. Pork belly meatball t-bone bresaola tail filet mignon kevin turkey ribeye shank flank doner cow kielbasa shankle. Pig swine chicken hamburger, tenderloin turkey rump ball tip sirloin frankfurter meatloaf boudin brisket ham hock. Hamburger venison brisket tri-tip andouille pork belly ball tip short ribs biltong meatball chuck. Pork chop ribeye tail short ribs, beef hamburger meatball kielbasa rump corned beef porchetta landjaeger flank. Doner rump frankfurter meatball meatloaf, cow kevin pork pork loin venison fatback spare ribs salami beef ribs.
    </p>
    <p>
      Jerky jowl pork chop tongue, kielbasa shank venison. Capicola shank pig ribeye leberkas filet mignon brisket beef kevin tenderloin porchetta. Capicola fatback venison shank kielbasa, drumstick ribeye landjaeger beef kevin tail meatball pastrami prosciutto pancetta. Tail kevin spare ribs ground round ham ham hock brisket shoulder. Corned beef tri-tip leberkas flank sausage ham hock filet mignon beef ribs pancetta turkey.
    </p>
  </section>
	
  <section id="content15">
    <p>
      Bacon ipsum dolor sit amet landjaeger sausage brisket, jerky drumstick fatback boudin ball tip turducken. Pork belly meatball t-bone bresaola tail filet mignon kevin turkey ribeye shank flank doner cow kielbasa shankle. Pig swine chicken hamburger, tenderloin turkey rump ball tip sirloin frankfurter meatloaf boudin brisket ham hock. Hamburger venison brisket tri-tip andouille pork belly ball tip short ribs biltong meatball chuck. Pork chop ribeye tail short ribs, beef hamburger meatball kielbasa rump corned beef porchetta landjaeger flank. Doner rump frankfurter meatball meatloaf, cow kevin pork pork loin venison fatback spare ribs salami beef ribs.
    </p>
    <p>
      Jerky jowl pork chop tongue, kielbasa shank venison. Capicola shank pig ribeye leberkas filet mignon brisket beef kevin tenderloin porchetta. Capicola fatback venison shank kielbasa, drumstick ribeye landjaeger beef kevin tail meatball pastrami prosciutto pancetta. Tail kevin spare ribs ground round ham ham hock brisket shoulder. Corned beef tri-tip leberkas flank sausage ham hock filet mignon beef ribs pancetta turkey.
    </p>
  </section>
	
  <section id="content16">
    <p>
      Bacon ipsum dolor sit amet landjaeger sausage brisket, jerky drumstick fatback boudin ball tip turducken. Pork belly meatball t-bone bresaola tail filet mignon kevin turkey ribeye shank flank doner cow kielbasa shankle. Pig swine chicken hamburger, tenderloin turkey rump ball tip sirloin frankfurter meatloaf boudin brisket ham hock. Hamburger venison brisket tri-tip andouille pork belly ball tip short ribs biltong meatball chuck. Pork chop ribeye tail short ribs, beef hamburger meatball kielbasa rump corned beef porchetta landjaeger flank. Doner rump frankfurter meatball meatloaf, cow kevin pork pork loin venison fatback spare ribs salami beef ribs.
    </p>
    <p>
      Jerky jowl pork chop tongue, kielbasa shank venison. Capicola shank pig ribeye leberkas filet mignon brisket beef kevin tenderloin porchetta. Capicola fatback venison shank kielbasa, drumstick ribeye landjaeger beef kevin tail meatball pastrami prosciutto pancetta. Tail kevin spare ribs ground round ham ham hock brisket shoulder. Corned beef tri-tip leberkas flank sausage ham hock filet mignon beef ribs pancetta turkey.
    </p>
  </section>
	
  <section id="content17">
    <p>
      Bacon ipsum dolor sit amet landjaeger sausage brisket, jerky drumstick fatback boudin ball tip turducken. Pork belly meatball t-bone bresaola tail filet mignon kevin turkey ribeye shank flank doner cow kielbasa shankle. Pig swine chicken hamburger, tenderloin turkey rump ball tip sirloin frankfurter meatloaf boudin brisket ham hock. Hamburger venison brisket tri-tip andouille pork belly ball tip short ribs biltong meatball chuck. Pork chop ribeye tail short ribs, beef hamburger meatball kielbasa rump corned beef porchetta landjaeger flank. Doner rump frankfurter meatball meatloaf, cow kevin pork pork loin venison fatback spare ribs salami beef ribs.
    </p>
    <p>
      Jerky jowl pork chop tongue, kielbasa shank venison. Capicola shank pig ribeye leberkas filet mignon brisket beef kevin tenderloin porchetta. Capicola fatback venison shank kielbasa, drumstick ribeye landjaeger beef kevin tail meatball pastrami prosciutto pancetta. Tail kevin spare ribs ground round ham ham hock brisket shoulder. Corned beef tri-tip leberkas flank sausage ham hock filet mignon beef ribs pancetta turkey.
    </p>
  </section>
	
  <section id="content18">
    <p>
      Bacon ipsum dolor sit amet landjaeger sausage brisket, jerky drumstick fatback boudin ball tip turducken. Pork belly meatball t-bone bresaola tail filet mignon kevin turkey ribeye shank flank doner cow kielbasa shankle. Pig swine chicken hamburger, tenderloin turkey rump ball tip sirloin frankfurter meatloaf boudin brisket ham hock. Hamburger venison brisket tri-tip andouille pork belly ball tip short ribs biltong meatball chuck. Pork chop ribeye tail short ribs, beef hamburger meatball kielbasa rump corned beef porchetta landjaeger flank. Doner rump frankfurter meatball meatloaf, cow kevin pork pork loin venison fatback spare ribs salami beef ribs.
    </p>
    <p>
      Jerky jowl pork chop tongue, kielbasa shank venison. Capicola shank pig ribeye leberkas filet mignon brisket beef kevin tenderloin porchetta. Capicola fatback venison shank kielbasa, drumstick ribeye landjaeger beef kevin tail meatball pastrami prosciutto pancetta. Tail kevin spare ribs ground round ham ham hock brisket shoulder. Corned beef tri-tip leberkas flank sausage ham hock filet mignon beef ribs pancetta turkey.
    </p>
  </section>
	
  <section id="content19">
    <p>
      Bacon ipsum dolor sit amet landjaeger sausage brisket, jerky drumstick fatback boudin ball tip turducken. Pork belly meatball t-bone bresaola tail filet mignon kevin turkey ribeye shank flank doner cow kielbasa shankle. Pig swine chicken hamburger, tenderloin turkey rump ball tip sirloin frankfurter meatloaf boudin brisket ham hock. Hamburger venison brisket tri-tip andouille pork belly ball tip short ribs biltong meatball chuck. Pork chop ribeye tail short ribs, beef hamburger meatball kielbasa rump corned beef porchetta landjaeger flank. Doner rump frankfurter meatball meatloaf, cow kevin pork pork loin venison fatback spare ribs salami beef ribs.
    </p>
    <p>
      Jerky jowl pork chop tongue, kielbasa shank venison. Capicola shank pig ribeye leberkas filet mignon brisket beef kevin tenderloin porchetta. Capicola fatback venison shank kielbasa, drumstick ribeye landjaeger beef kevin tail meatball pastrami prosciutto pancetta. Tail kevin spare ribs ground round ham ham hock brisket shoulder. Corned beef tri-tip leberkas flank sausage ham hock filet mignon beef ribs pancetta turkey.
    </p>
  </section>
	
  <section id="content20">
    <p>
      Bacon ipsum dolor sit amet landjaeger sausage brisket, jerky drumstick fatback boudin ball tip turducken. Pork belly meatball t-bone bresaola tail filet mignon kevin turkey ribeye shank flank doner cow kielbasa shankle. Pig swine chicken hamburger, tenderloin turkey rump ball tip sirloin frankfurter meatloaf boudin brisket ham hock. Hamburger venison brisket tri-tip andouille pork belly ball tip short ribs biltong meatball chuck. Pork chop ribeye tail short ribs, beef hamburger meatball kielbasa rump corned beef porchetta landjaeger flank. Doner rump frankfurter meatball meatloaf, cow kevin pork pork loin venison fatback spare ribs salami beef ribs.
    </p>
    <p>
      Jerky jowl pork chop tongue, kielbasa shank venison. Capicola shank pig ribeye leberkas filet mignon brisket beef kevin tenderloin porchetta. Capicola fatback venison shank kielbasa, drumstick ribeye landjaeger beef kevin tail meatball pastrami prosciutto pancetta. Tail kevin spare ribs ground round ham ham hock brisket shoulder. Corned beef tri-tip leberkas flank sausage ham hock filet mignon beef ribs pancetta turkey.
    </p>
  </section>
	
  <section id="content21">
    <p>
      Bacon ipsum dolor sit amet landjaeger sausage brisket, jerky drumstick fatback boudin ball tip turducken. Pork belly meatball t-bone bresaola tail filet mignon kevin turkey ribeye shank flank doner cow kielbasa shankle. Pig swine chicken hamburger, tenderloin turkey rump ball tip sirloin frankfurter meatloaf boudin brisket ham hock. Hamburger venison brisket tri-tip andouille pork belly ball tip short ribs biltong meatball chuck. Pork chop ribeye tail short ribs, beef hamburger meatball kielbasa rump corned beef porchetta landjaeger flank. Doner rump frankfurter meatball meatloaf, cow kevin pork pork loin venison fatback spare ribs salami beef ribs.
    </p>
    <p>
      Jerky jowl pork chop tongue, kielbasa shank venison. Capicola shank pig ribeye leberkas filet mignon brisket beef kevin tenderloin porchetta. Capicola fatback venison shank kielbasa, drumstick ribeye landjaeger beef kevin tail meatball pastrami prosciutto pancetta. Tail kevin spare ribs ground round ham ham hock brisket shoulder. Corned beef tri-tip leberkas flank sausage ham hock filet mignon beef ribs pancetta turkey.
    </p>
  </section>
	
  <section id="content22">
    <p>
      Bacon ipsum dolor sit amet landjaeger sausage brisket, jerky drumstick fatback boudin ball tip turducken. Pork belly meatball t-bone bresaola tail filet mignon kevin turkey ribeye shank flank doner cow kielbasa shankle. Pig swine chicken hamburger, tenderloin turkey rump ball tip sirloin frankfurter meatloaf boudin brisket ham hock. Hamburger venison brisket tri-tip andouille pork belly ball tip short ribs biltong meatball chuck. Pork chop ribeye tail short ribs, beef hamburger meatball kielbasa rump corned beef porchetta landjaeger flank. Doner rump frankfurter meatball meatloaf, cow kevin pork pork loin venison fatback spare ribs salami beef ribs.
    </p>
    <p>
      Jerky jowl pork chop tongue, kielbasa shank venison. Capicola shank pig ribeye leberkas filet mignon brisket beef kevin tenderloin porchetta. Capicola fatback venison shank kielbasa, drumstick ribeye landjaeger beef kevin tail meatball pastrami prosciutto pancetta. Tail kevin spare ribs ground round ham ham hock brisket shoulder. Corned beef tri-tip leberkas flank sausage ham hock filet mignon beef ribs pancetta turkey.
    </p>
  </section>
	
  <section id="content23">
    <p>
      Bacon ipsum dolor sit amet landjaeger sausage brisket, jerky drumstick fatback boudin ball tip turducken. Pork belly meatball t-bone bresaola tail filet mignon kevin turkey ribeye shank flank doner cow kielbasa shankle. Pig swine chicken hamburger, tenderloin turkey rump ball tip sirloin frankfurter meatloaf boudin brisket ham hock. Hamburger venison brisket tri-tip andouille pork belly ball tip short ribs biltong meatball chuck. Pork chop ribeye tail short ribs, beef hamburger meatball kielbasa rump corned beef porchetta landjaeger flank. Doner rump frankfurter meatball meatloaf, cow kevin pork pork loin venison fatback spare ribs salami beef ribs.
    </p>
    <p>
      Jerky jowl pork chop tongue, kielbasa shank venison. Capicola shank pig ribeye leberkas filet mignon brisket beef kevin tenderloin porchetta. Capicola fatback venison shank kielbasa, drumstick ribeye landjaeger beef kevin tail meatball pastrami prosciutto pancetta. Tail kevin spare ribs ground round ham ham hock brisket shoulder. Corned beef tri-tip leberkas flank sausage ham hock filet mignon beef ribs pancetta turkey.
    </p>
  </section>
</main>
	</div>
	</div>