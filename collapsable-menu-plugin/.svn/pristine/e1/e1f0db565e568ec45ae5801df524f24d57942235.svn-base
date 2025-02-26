<script language="JavaScript">

var Selected="Ss";
var prevSelected="-1";
var AdTime = new Date();
// Ensures the expanded message appears reasonably close to where 
// it should appear: on screen, and if possible, under the mouse cursor.
function SwitchMessage(e, id)
{
	if(prevSelected=="-1")
	{
		Selected=id;
	}
	prevSelected=id;
	
   if ( !e ) e = window.event;
   var target = e.target ? e.target : e.srcElement;
   // is it a post?
   while ( target && target.id != 'DLink' )
      target = target.parentNode;
   if ( !target || target.id != 'DLink' )
      return;

   if (Selected)
   {
      var body = document.getElementById(Selected + "_h1");
      if (body)
         body.style.display = 'none';
      var head = document.getElementById(Selected + "_h0");

   }

   if (Selected == target.name) // just collapse
      Selected="";
   else
   {
      Selected = target.name;
      var body = document.getElementById(Selected + "_h1");
      if (body)
      {
         if (body.style.display=='none')
            body.style.display='';
         else
            body.style.display = 'none';
      }
      var head = document.getElementById(Selected + "_h0");

      if ( body && head && body.style.display != 'none' )
      {
         // the bit that keeps the post on-screen and under the cursor
         //var dif = (getRealPos(head, "Top") + head.offsetHeight/2) - (document.body.scrollTop+e.clientY);
         //document.body.scrollTop += dif;
        // document.body.scrollTop = getRealPos(head, "Top") - document.body.clientHeight/10;
         EnsureMessageVisible(target.name, true);
      }
   }

   if ( e.preventDefault )
      e.preventDefault();
   else
      e.returnValue = false;
   return false;
}

// does its best to make a message visible on-screen (vs. scrolled off somewhere).
function EnsureMessageVisible(msgID, bShowTop) {
   var msgHeader = document.getElementById(msgID + "_h0");
   var msgBody = document.getElementById(msgID + "_h1");

   // determine scroll position of top and bottom
   var scrollContainer = document.body;
   var top = getRealPos(msgHeader, 'Top');
   var bottom = getRealPos(msgBody, 'Top') + msgBody.offsetHeight;

   // if not already visible, scroll to make it so
   if ( scrollContainer.scrollTop > top && !bShowTop)
      scrollContainer.scrollTop = top - document.body.clientHeight/10;
   if ( scrollContainer.scrollTop+scrollContainer.clientHeight < bottom )
      scrollContainer.scrollTop = bottom-scrollContainer.clientHeight;
   if ( scrollContainer.scrollTop > top && bShowTop)
      scrollContainer.scrollTop = top - document.body.clientHeight/10;
}

// utility
function getRealPos(i,which)
{
   iPos = 0
   while (i!=null)
   {
      iPos += i["offset" + which];
      i = i.offsetParent;
   }
   return iPos
}
</script>