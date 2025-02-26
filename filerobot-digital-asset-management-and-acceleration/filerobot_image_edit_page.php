<?php
    //var_dump($attachment_url);die;
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <style>
            #adminmenumain,
            #wpadminbar,
            .notice 
            { 
              display:none !important;
            }
            #wpbody 
            { 
              position: absolute !important;
              left: 0;
              width: 100%;
            }

            #spinner_wrap 
            {
              position: absolute;
              z-index: 10;
              left: 0;
              top: 0;
              width: 100%;
              height: 100%;
              background-color: rgba(255,255,255,0.8);
            }
            #spinner
            {
              margin: 50% 50%;
            }
        </style>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    </head>
    <body>
        <div id="spinner_wrap">
          <div class="spinner-border text-primary" id="spinner" role="status">
              <span class="sr-only">Processing...</span>
          </div>
        </div>

        <div id="editor_container"></div>

        <!-- https://github.com/scaleflex/filerobot-image-editor#vanillajs-example -->
        <script src="https://scaleflex.cloudimg.io/v7/plugins/filerobot-image-editor/latest/filerobot-image-editor.min.js"></script>
        <?php
        $versionRandom = rand(0, 10000);
        ?>
        <script>
          document.querySelector('#spinner_wrap').style.display = 'none';

          const { TABS, TOOLS } = window.FilerobotImageEditor;
          const config = {
            source: "<?php echo $attachment_url . "?ver={$versionRandom}"; ?>",
            annotationsCommon: {
              fill: '#ff0000',
            },
            Text: { text: 'Filerobot...' },
            defaultTabId: TABS.ANNOTATE, // or 'Annotate'
            defaultToolId: TOOLS.TEXT, // or 'Text'
          };

          const filerobotImageEditor = new window.FilerobotImageEditor(
            document.querySelector('#editor_container'),
            config
          );

          filerobotImageEditor.render({
            onClose: (closingReason) => {
              filerobotImageEditor.terminate();
              window.location.reload();
            },
            onSave: async (savedImageData, imageDesignState) => {
              // https://docs.filerobot.com/go/filerobot-documentation/en/dam-api/file-api/upload-files 
              // Method 3 - base64-encoded content

              document.querySelector('#spinner_wrap').style.display = 'block';

              var myHeaders = new Headers();
              myHeaders.append("Content-Type", "application/json");
              myHeaders.append("X-Filerobot-Key", "<?php echo $sass; ?>");

              console.dir(savedImageData);

              var raw = JSON.stringify({
                "name"        : savedImageData.fullName,
                "data"        : savedImageData.imageBase64,
                "postactions" : "decode_base64"
              });

              var uploadOptions = {
                method  : 'POST',
                headers : myHeaders,
                body    : raw,
              };

              var response1 = await fetch("<?php echo $upload_url; ?>", uploadOptions);
              var res_json1 = await response1.json();

              if (res_json1.status !== 'success')
              {
                return;
              }

              var formData = new FormData();
              formData.append('status'      , res_json1.status);
              formData.append('remote_name' , res_json1.file.name);
              formData.append('uuid'        , res_json1.file.uuid);
              formData.append('sha'         , res_json1.file.hash.sha1);
              formData.append('container'   , res_json1.file.folder.name);
              formData.append('post_id'     , "<?php echo $post_id; ?>");
              formData.append('action'      , 'filerobot_update_log');

              // Update logs table
              var updateOptions = {
                method : 'POST',
                body   : formData,
              };

              var response2 = await fetch(ajaxurl, updateOptions);

              document.querySelector('#spinner_wrap').style.display = 'none';
              filerobotImageEditor.terminate();
              window.location.reload();
            }
          });
        </script>
    </body>
</html>
