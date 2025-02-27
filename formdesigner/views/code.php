<div id="<?php echo $attributes['el']; ?>"></div>
<script type="text/javascript">
(function (d, w, c) {
    (w[c] = w[c] || []).push(<?php echo json_encode($attributes); ?>);
    var s = d.createElement("script"), g = "getElementsByTagName";
	s.type = "text/javascript"; s.charset="UTF-8"; s.async = true;
	s.src = (d.location.protocol == "https:" ? "https:" : "http:")+"//formdesigner.ru/js/iform.js?v=0.0.2";
	var h=d[g]("head")[0] || d[g]("body")[0];
	h.appendChild(s);
})(document, window, "fdforms");
</script>