<?php

namespace MatrixAddons\EasyInvoice;

use MatrixAddons\EasyInvoice\Hooks\InvoiceTemplate;

class PDF
{
	public function generate_pdf($content, $html_header, $html_footer)
	{

		$file_name = get_the_title() . '.pdf';

		$tmp_dir = easy_invoice()->get_tmp_pdf_dir(true, true);

		$mpdf_config = apply_filters('easy_invoice_mpdf_config_for_invoice', [
			'tempDir' => $tmp_dir,
			'format' => 'A4',
			'orientation' => 'P',
			'margin_header' => 0,     // 30mm not pixel
			'margin_footer' => 0,
			'margin_left' => 0,
			'margin_right' => 0,
			/*'margin_top' => 0,
			'margin_bottom' => 0,*/


		]);

		/* @var $mpdf \Mpdf\Mpdf */
		$mpdf = apply_filters('easy_invoice_pdf_mpdf_instance', new \Mpdf\Mpdf($mpdf_config));

		$mpdf->showImageErrors = true;

		$mpdf->SetHTMLHeader(
			$html_header,
			'ALL', true
		);

		$mpdf->SetHTMLFooter($html_footer);

		$stylesheet = apply_filters('easy_invoice_pdf_stylesheet_for_invoice', file_get_contents(EASY_INVOICE_PLUGIN_DIR . 'assets/css/easy-invoice-mpdf.css'));

		$stylesheet = str_replace('/*# sourceMappingURL=easy-invoice-mpdf.css.map */', '', $stylesheet);

		$mpdf->WriteHTML($stylesheet, \Mpdf\HTMLParserMode::HEADER_CSS);

		$mpdf->WriteHTML($content);

		$download_or_preview = apply_filters('easy_invoice_pdf_download_or_preview', 'download');

		$dest = 'D';
		if ($download_or_preview === 'preview') {

			$dest = 'I';
		}
		$mpdf->Output($file_name, $dest);
	}
}
