<main id="extensions" class="daio-settings-content active-content">
  <div class="daio-settings-block">
    <div class="daio-settings-block-title">
      <?php echo __('Extensions', 'daio'); ?>
    </div>

    <div class="daio-settings-block-content">

      <!-- <div class="daio-checkbox">
        <label class="switch" for="header-sections">
          <input type="checkbox" id="header-sections" name="header-sections" <?php //checked(1, $this->daio_get_settings['header-sections'], true) ?>>
          <div class="slider round"></div>
        </label>
        <span class="daio-checkbox-label"><?php //echo __( 'Header Sections', 'daio' ); ?></span>
      </div> -->

      <!--  <div class="daio-checkbox">
        <label class="switch" for="blog-pro">
          <input type="checkbox" id="blog-pro" name="blog-pro" <?php //checked(1, $this->daio_get_settings['blog-pro'], true) ?>>
          <div class="slider round"></div>
        </label>
        <span class="daio-checkbox-label"><?php //echo __( 'Blog Pro', 'daio' ); ?></span>
      </div> -->

      <div class="daio-checkbox">
        <label class="switch" for="advanced-headers">
          <input type="checkbox" id="advanced-headers" name="advanced-headers" <?php checked(1, $this->daio_get_settings['advanced-headers'], true) ?>>
          <div class="slider round"></div>
        </label>
        <span class="daio-checkbox-label"><?php echo __( 'Advanced Headers', 'daio' ); ?></span>
      </div>

      <div class="daio-checkbox">
        <label class="switch" for="advanced-footer">
          <input type="checkbox" id="advanced-footer" name="advanced-footer" <?php checked(1, $this->daio_get_settings['advanced-footer'], true) ?>>
          <div class="slider round"></div>
        </label>
        <span class="daio-checkbox-label"><?php echo __( 'Advanced Footer', 'daio' ); ?></span>
      </div>

      <div class="daio-checkbox">
        <label class="switch" for="svg-support">
          <input type="checkbox" id="svg-support" name="svg-support" <?php checked(1, $this->daio_get_settings['svg-support'], true) ?>>
          <div class="slider round"></div>
        </label>
        <span class="daio-checkbox-label"><?php echo __( 'Enabled SVG Uploads', 'daio' ); ?></span>
      </div>

  </div>
</main>