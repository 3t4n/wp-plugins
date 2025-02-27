<div class="ftb-segment" style="position: sticky; top: 0;">
    <div v-if="data.enable_button == 'disable'" class="ftb-alert ftb-note" v-cloak>Preview Only. Floating Button/TikCode is Disabled</div>
    <h3>Preview</h3>
    <div v-show="data.enable_button !== 'qrcode'" v-cloak>
        <?php 
?>
        <a :href="'https://tiktok.com/@'+data.tiktok_id" :style="{
            display: 'inline-block',
            'text-align': 'center',
            'text-decoration': 'none',
            'border-width': '1px',
            'border-style': 'solid',
            'border-color': '#DDD', 
            'background-color': '#FFFFFF00', 
            padding: '5px', 
            'border-radius': '5px',
            'line-height': '100%',
        }" target="_blank">
            <img :src="icon_url" :alt="button_text" :style="{
                width: '60px',
                height: '60px',
                'border-radius': '5px', 
                display: 'block', 
                margin: 'auto', 
            }" />
        </a>
        <?php 
?>
    </div>

    <?php 
?>
    <div v-show="data.enable_button !== 'button'" v-cloak>
        <a :href="'https://tiktok.com/@'+data.tiktok_id" :style="{
            display: 'inline-block',
            'margin-top': data.enable_button !== 'qrcode' ? '15px' : '',
            'text-align': 'center',
            'text-decoration': 'none',
            'border-width': '1px',
            'border-style': 'solid',
            'border-color': '#DDD', 
            'background-color': '#FFFFFF00', 
            padding: '5px', 
            'border-radius': '5px',
            'font-size': '10px',
            color: '#666',
            'text-decoration': 'none',
            'margin-bottom': '5px',
            'line-height': '100%',
        }">
            <div id="qrcode" :style="{
                width: '85px',
                height: '85px',
                margin: 'auto',
                'margin-bottom': '5px',
            }"></div>
            <span>{{ button_text }}</span>
        </a>
    </div>
    <?php 
?>
</div>