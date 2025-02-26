
<html>
<head>
<title></title>
</head>
<body>
<form method="post" action="http://www.aweber.com/scripts/addlead.pl" name="awebersub" id="awebersub">
<input type="hidden" name="meta_web_form_id" value="<?php echo $this->formid ?>" />
<input type="hidden" name="meta_split_id" value="" />
<input type="hidden" name="unit" value="<?php echo $this->unit ?>" />
<input type="hidden" name="redirect" value="<?php echo htmlspecialchars($location) ?>" />
<input type="hidden" name="meta_redirect_onlist" value="<?php echo htmlspecialchars($alreadysubscribed) ?>" />
<input type="hidden" name="meta_adtracking" value="<?php echo $this->adtracking ?>" />
<input type="hidden" name="meta_message" value="1" />
<input type="hidden" name="meta_required" value="from" />
<input type="hidden" name="meta_forward_vars" value="0" />
<input type="hidden" name="from" value="<?php echo htmlspecialchars($email) ?>" />
<input type="hidden" name="name" value="<?php echo htmlspecialchars($name) ?>" />
<input type="submit" name="submitform" value="Continue" id="continue" />
</form>
<span style="display: none;" id="redir">Redirecting...</span>
<script type="text/javascript" defer="defer">
document.forms['awebersub'].submit();
document.getElementById('continue').enabled = false;
document.getElementById('continue').style.display = 'none';
document.getElementById('redir').style.display = '';
</script>
</body>
</html>

