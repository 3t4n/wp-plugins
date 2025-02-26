
<?php
  createDOMStructure();

$widgetId;
  function createDOMStructure() {
    if(array_key_exists('onSendWidgetId',$_POST)) {
      update_option('setWidgetId',$_POST['widget_field']);
    }

    $_widgetID = get_option('setWidgetId', '');
    ?>
    <div class="anymind-widget-form">
      <h2>Twój widget id: <span>(przycisk zawsze widoczny)</span></h2>
        <form method="post", action="">

            <div class="anymind-widget-form-widget__input">
               <input type="text" id="anymind-widget-id" for="widget_script" value="<?php echo $_widgetID ?>" name="widget_field">
               <input type="submit" value="Zapisz" name="onSendWidgetId">
            </div>
        </form>
    </div>
    <?php
    if(array_key_exists('onSendWidgetId',$_POST)) {
      ?>
          <div class="anymind-widget__alert anymind-widget__alert--success">
            <p>Twoj WidgetID został dodany</p>
          </div>
      <?php
    }
  }
?>
