<div class="ei-flex ei-component-wrap">
	<div class="ei-invoice-description">
		<?php easy_invoice_print_html_text(wpautop($description), array(
				'p' => array(
						'style' => array()
				),
				'a' => array('href' => array(), 'target' => array(), 'rel' => array()),
				'br' => array(),
				'b' => array(),
				'strong' => array(),
				'em' => array(),
				'i' => array(),
				'u' => array(),
				'blockquote' => array(),
				'del' => array(),
				'ins' => array(),
				'img' => array(
						'src' => array(),
						'height' => array(),
						'width' => array()
				),
				'ul' => array(),
				'ol' => array(),
				'li' => array(),
				'code' => array(),
				'span' => array('style' => array()
				)
		)); ?>
	</div>

</div>
