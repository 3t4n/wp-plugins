/*! ia-designer 17-01-2025 
Copyright © 2024 Information Aesthetics. All rights reserved.
This work is licensed under the GPL2, V2/ license.*/

!function(){let e=Date.now();setTimeout((function(){window.wp&&wp.data&&wp.data.subscribe&&wp.data.subscribe((function(){if(!window.eve_ia)return;const t=wp.data.select("core/editor").isSavingPost(),i=wp.data.select("core/editor").isAutosavingPost();t&&!i&&Date.now()-e>2e3&&(e=Date.now(),eve_ia(["global","editor","save"]))}))}),200),window.addEventListener("beforeunload",(function(e){window.eve_ia&&(eve_ia(["global","editor","save"]),eve_ia(["global","editor","exiting"]))}))}();