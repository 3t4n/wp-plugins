<template>
  <div class="home">
    <div class="notice notice-success inline" v-if="notification != ''">
        <p>{{notification}}</p>
    </div>
    <div class="row">
      <h1>Edit video</h1><br>
    </div>
    <input type="text" class="large-text" v-model="title"/>
    <div class="video-wrapper">
      <video-preview :video_url="video_url" :table_rows="table_rows"/>
      <div id="loading"><span id="loading__text">Uploading...</span><img src="@/../assets/img/loading.png" alt="loading" id="loading__img"></div>
      <input class="video-wrapper__input" type="file" @change="p123on_get_video_preview($event)"/><br/>
      <div class="controls__container">
        <input type="checkbox" ref="controls" id="controls-checkbox" @change="controlsChange($event)">
        <label for="controls-checkbox">Show controls</label>&ensp;
        <input type="checkbox" ref="tooltips" id="tooltip-checkbox" @change="tooltipsChange($event)">
        <label for="tooltip-checkbox">Tooltips closed</label>
      </div>
      <div class="customization__container">
        <div class="customization__column-left">
          <span class="customization__title">Tooltip font: </span><br/>
          <label>
            <input type="radio" v-model="font" name="font" value="roboto" />
            <span>Roboto</span>
          </label><br>
          <label>
            <input type="radio" v-model="font" name="font" value="times" />
            <span>Times New Roman</span>
          </label><br>
          <label>
            <input type="radio" v-model="font" name="font" value="arial" />
            <span>Arial</span>
          </label><br>
          <label>
            <input type="radio" v-model="font" name="font" value="tahoma" />
            <span>Tahoma</span>
          </label><br>
        </div>
        <div>
          <span class="customization__title">Tooltip title font weight: </span><br/>
          <label>
            <input type="radio" v-model="weight" name="weight" value="bold" />
            <span>Bold</span>
          </label><br>
          <label>
            <input type="radio" v-model="weight" name="weight" value="normal" />
            <span>Normal</span>
          </label><br>
        </div>
      </div>
    </div>
    <hotspot-table :table_rows="table_rows" :video_url="video_url"/>
    <input class="button-primary" type="submit" @click="p123on_edit_post" value="Save"/><br>
    <span class="validation">{{error}}</span>
  </div>
</template>

<script>
import HotspotTable from './HotspotTable.vue'
import VideoPreview from './Video.vue' 
import axios from 'axios'

export default{
  name: 'Edit',
  components: { HotspotTable, VideoPreview },
  
    data () {
    return {
      title: this.$route.params.post['title'],
      error: '',
      post_id: this.$route.params.post['id'],
      video_id: this.$route.params.post['content'],
      notification: '',
      controls: this.$route.params.post['controls'][0],
      tooltips_closed: this.$route.params.post['tooltips_closed'][0],
      font: this.$route.params.post['font'][0],
      weight: this.$route.params.post['weight'][0],
      video_url: '',
      new_media_id: '',
      video_changed: false,
      table_rows: []
    }
  },
  mounted() {
    if(this.controls === 'true') {
      this.$refs.controls.checked = true;
    }
    else {
      this.$refs.controls.checked = false;
    }

    if(this.tooltips_closed === 'true') {
      this.$refs.tooltips.checked = true;
    }
    else {
      this.$refs.tooltips.checked = false;
    }
  },
  methods: 
  {
    p123on_edit_post()
    {
      if(!this.video_changed)
      {
        let form_data = new FormData();
        let video = document.getElementById('video-preview');

        form_data.append('content', this.video_id);
        form_data.append('title', this.title);
        form_data.append('duration', this.p123on_format(video.duration));
        form_data.append('hotspot', JSON.stringify(this.table_rows));
        form_data.append('controls', this.controls);
        form_data.append('tooltips_closed', this.tooltips_closed);
        form_data.append('font', this.font);
        form_data.append('weight', this.weight);

        axios.post('/wp-json/v2/video_123on/edit/' + this.post_id, form_data)
          .then(resp => {
          });
          this.$router.push({
            name: 'Home',
            params: { message: 'Video Updated'}
          }); 
      }
      else
      {
        return this.p123on_upload_video().then(() => {
        let form_data = new FormData();
        let video = document.getElementById('video-preview');

        form_data.append('content', this.new_media_id);
        form_data.append('title', this.title);
        form_data.append('duration', this.p123on_format(video.duration));
        form_data.append('hotspot', JSON.stringify(this.table_rows));
        form_data.append('controls', this.controls);
        form_data.append('tooltips_closed', this.tooltips_closed);
        form_data.append('font', this.font);
        form_data.append('weight', this.weight);

        axios.post('/wp-json/v2/video_123on/edit/' + this.post_id, form_data)
          .then(resp => {
          });
          this.$router.push({
            name: 'Home',
            params: { message: 'Video Updated'}
          }); 
        })
      }
    },

    p123on_get_video()
    {
      axios.get('/wp-json/wp/v2/media/' + this.video_id)
      .then(response => {
        this.video_url = response.data.guid.rendered;
      })
    },

    p123on_get_video_meta()
    {
      axios.get('/wp-json/v2/video_123on/video_meta/' + this.post_id)
      .then(response => {
        this.table_rows = JSON.parse(JSON.parse(response.data));
      })
    },
    p123on_get_video_preview(event)
    {
      const file = event.target.files[0];
      const data_to_upload = [];

      this.video_url = URL.createObjectURL(file);

      let form_data = new FormData();
      form_data.append('file', file);

      let config = {
          headers: {
            'X-WP-Nonce': wpApiSettings.nonce
          }
      }
      data_to_upload[0] = form_data;
      data_to_upload[1] = config;
      this.data_to_upload = data_to_upload;
      this.video_changed = true;
    },
    p123on_upload_video()
    {
      let loading = document.getElementById("loading");
      loading.style.display = 'flex';
      const API_URL = '/wp-json/wp/v2/media';

      return axios.post(
        API_URL,
        this.data_to_upload[0],
        this.data_to_upload[1]
      ).then(
        response => {
          this.new_media_id = response.data.id;
        }
      )
    },
    p123on_format(s) {
        let m = Math.floor(s / 60);
        m = (m >= 10) ? m : '0' + m;
        s = Math.floor(s % 60);
        s = (s >= 10) ? s : '0' + s;
        return m + ':' + s;
    },
    controlsChange(event) {
      this.controls = event.target.checked;
    },
    tooltipsChange(event) {
      this.tooltips_closed = event.target.checked;
    }
  },
  beforeMount()
  {
    this.p123on_get_video();
    this.p123on_get_video_meta();
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped lang="less">
.large-text
{
  font-family: 'Open Sans';
  font-style: normal;
  font-weight: 600;
  font-size: 20px;
  line-height: 27px;
}

.video-wrapper {
    display: flex;
    flex-direction: column;
    margin-top: 30px;

    video{
      margin-bottom: 20px;
    }

    &__input {
      margin-top: 10px;
    }
  }

.validation
{
  font-size: 18px;
  color: red;
  margin-top: 20px;
  font-weight: 600;
}

.controls__container {
  display: flex;
  align-items: center;
}

.customization {
  &__container {
    display: flex;
    margin-top: 20px;
  }

  &__column-left {
    margin-right: 30px;
  }

  &__title {
    font-weight: 700;
    margin-bottom: 10px;
  }
}
</style>