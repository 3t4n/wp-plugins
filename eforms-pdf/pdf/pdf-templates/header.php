<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
?>
<style type="text/css" >
    body,.wap {
        width:100%;
    }
    a {
        text-decoration:  none;
    }
    .wap {
        background-position: top left !important;
        background-size: 100% !important;
    }
    p {
        font-size: 13px;
        line-height: 1.1;
        margin: 0;
    }
    .links a {
        display: inline-block;
        width: 100%;
    }
    .pdfbuilder_button {
        display: block
    }
    .pdfbuilder_button a {
        width:100%;
        display:block;
    }
    table {
        width: 100%;
        border-collapse: collapse;
    }
    table td{
        vertical-align: top;
    }
    .order-detail-data {
        padding-left: 15px;
        margin-bottom: 5px;
    }
    div {
        display: block !important;
    }
.page_break { page-break-before: always; }
    .order-detail tr td{
      padding-bottom: 20px;
    }
    .builder-elements table td {
      padding: 10px;
      border-collapse: collapse;
    }
    .builder-elements table th {
      padding: 10px;
      border-collapse: collapse;
    }
    .builder-elements table th:last-child,
    .builder-elements table td:last-child {
      text-align: right !important;
       width: 150px;
    }
    .builder-elements table th.quantity,
    .builder-elements table td.quantity {
       width: 150px;
       text-align: center !important;
    }
    .builder-elements table th.thumbnail,
    .builder-elements table td.thumbnail {
       width: 32px;
    }
    .builder-elements table td.thumbnail img {
        width:  100% !important;
    }
    img.barcode {
        max-width: 200px;
    }
    .woocommerce-pdf-default table,
    .woocommerce-pdf-default th,
    .woocommerce-pdf-default td
     {
      border: 1px solid black;
      border-collapse: collapse;
    }
    .woocommerce-pdf-template-1 th
    {
      border-bottom: 2px solid #000;
      border-collapse: collapse;
    }
    .woocommerce-pdf-template-1 td
    {
      border-bottom: 1px solid #e7e7e7;
      border-collapse: collapse;
    }
    .woocommerce-pdf-template-2 th
    {
      background-color: #5d6f79;
      color: #fff;
      border-collapse: collapse;
    }
    .woocommerce-pdf-template-2 td
    {
      background-color: #f1f5f6;
      color: #666;
      border-top: 1px solid #fff;
      border-collapse: collapse;
    }
    .col {
        float: left;
        min-height: 1px;
    }
    .row::after {
        content: "";
        display: block;
        clear: both;
    }
    htmlpagefooter {
        text-align: center;
      }
       htmlpagefooter .page-number {
        width: 100px;
        float: right;
        right: 15px;
      }
    img {
        max-width: 100%;
    }
    .woocommerce-Price-currencySymbol, .icon {
        font-family: DejaVu Sans, sans-serif !important;
    }
    .dotab_content {
        border-bottom: 2px dotted;
    }
    .clear {
        clear: both;
    }
    input[type=checkbox]:before { font-family: DejaVu Sans; }
    input[type=checkbox] { display: inline; }
    @page {
      header: page-header;
      footer: page-footer;
    }
</style>
<?php  do_action("pdf_template_header"); ?>