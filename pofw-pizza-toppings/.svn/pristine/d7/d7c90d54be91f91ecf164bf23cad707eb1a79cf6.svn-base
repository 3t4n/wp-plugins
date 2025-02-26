<?php
if (!defined('ABSPATH')) exit;
?>
<?php if ($this->getOptionId() > 0): ?>   
  <script type="text/javascript">
      jQuery("#pofw_product_options").pizzaToppings({         
        optionId : <?php echo (int) $this->getOptionId(); ?>,
        minSelection : <?php echo (int) $this->getMinSelection(); ?>,        
        maxSelection : <?php echo (int) $this->getMaxSelection(); ?>,
        minMessage : "<?php echo $this->getMinMessage(); ?>",         
        maxMessage : "<?php echo $this->getMaxMessage(); ?>",
        vIdsByCol : <?php echo $this->getVIdsByColJson(); ?>                                                                                                                                               
      });
  </script>        
<?php endif; ?>
