<template>
  <div class="home">
    <div class="row">
      <h1>Add new video</h1><br>
    </div>
    <input type="text" class="large-text" v-model="title"/>
    <div class="video-wrapper">
      <video-preview :video_url="video_url" :table_rows="table_rows"/>
      <div id="loading"><span id="loading__text">Uploading...</span><img src="@/../assets/img/loading.png" alt="loading" id="loading__img"></div>
      <input class="video-wrapper__input" type="file" @change="p123on_get_video($event)"/><br/>
      <div class="controls__container">
        <input type="checkbox" id="controls-checkbox" @change="controlsChange($event)">
        <label for="controls-checkbox"> Show controls</label>&ensp;
        <input type="checkbox" id="tooltip-checkbox" @change="tooltipsChange($event)">
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
    <input class="button-primary" type="submit" @click="p123on_add_post" value="Add Post"/><br>
    <span class="validation">{{error}}</span>
  </div>
</template>

<script>
import HotspotTable from './HotspotTable.vue'
import VideoPreview from './Video.vue'
import axios from 'axios'

export default{
  name: 'Add New',
  components: { HotspotTable, VideoPreview },
  
    data () {
    return {
      title: '',
      error: '',
      media_id: '',
      video_url: '',
      font: 'roboto',
      weight: 'bold',
      controls: false,
      tooltips_closed: false,
      data_to_upload: [],
      table_rows: [],
    }
  },
  methods:
  {
    p123on_add_post()
    {
      return this.p123on_upload_video().then(() => {
        let form_data = new FormData();
        let video = document.getElementById('video-preview');
        console.log(video, video.duration);

        if(this.title != '')
        {
          form_data.append('title', this.title);
          form_data.append('content', this.media_id);
          form_data.append('duration', this.p123on_format(video.duration));
          form_data.append('hotspot', JSON.stringify(this.table_rows));
          form_data.append('controls', this.controls);
          form_data.append('tooltips_closed', this.tooltips_closed);
          form_data.append('font', this.font);
          form_data.append('weight', this.weight);
          axios.post('/wp-json/v2/video_123on/add', form_data)
          .then(resp => {
          });
          this.$router.push({
            name: 'Home',
            params: { message: 'Video Added'}
          }); 
        }
        else
        {
          this.error = "Incorrect data";
        }
      })
    },
    p123on_get_video(event)
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
    },
    p123on_format(s) {
        let m = Math.floor(s / 60);
        m = (m >= 10) ? m : '0' + m;
        s = Math.floor(s % 60);
        s = (s >= 10) ? s : '0' + s;
        return m + ':' + s;
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
          this.media_id = response.data.id;
        }
      )
    },
    controlsChange(event) {
      this.controls = event.target.checked;
    },
    tooltipsChange(event) {
      this.tooltips_closed = event.target.checked;
    },
  },
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style lang="less">

.home {
  .large-text {
    font-family: 'Open Sans';
    font-style: normal;
    font-weight: 600;
    font-size: 20px;
    line-height: 27px;
    width: 80vw;
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

  #loading{
    display: none;
    align-items: center;

    &__text
    {
      color: green;
      font-weight: 700;
    }

    &__img
    {
      width: 100px;
      height: 100px;
    }
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
}
</style>
