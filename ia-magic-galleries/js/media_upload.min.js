/*! ia-designer 17-01-2025 
Copyright © 2024 Information Aesthetics. All rights reserved.
This work is licensed under the GPL2, V2/ license.*/

window.eve_ia&&window.wp.media&&eve_ia.on(["global","media","upload_interface"],(function(e,l,t,n){l=l||"Upload Media",t=t||"Use this media";let i=wp.media({title:l,multiple:!n,library:{uploadedTo:null}}),o=document.fullscreenElement;o&&document.exitFullscreen(),i.on({select:function(){let l=i.state().get("selection").toJSON();e(l)},close:function(){o&&o.requestFullscreen()}}),i.open()}));