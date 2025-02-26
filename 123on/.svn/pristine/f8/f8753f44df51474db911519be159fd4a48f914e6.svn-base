<template>
  <div id="vue-frontend-app">
    There, you will see a video rendered.<br>
    ID: {{ video.ID }}<br>
    Title: {{ video.post_title }}
  </div>
</template>

<script>
import axios from 'axios'

export default {
  name: 'p123on',

  data: () => ({
    video: null
  }),

  props: {
    id: {
      type: Number,
      default: 1
    }
  },

  mounted () {
    axios.get('/wp-json/v2/video_123on/posts/' + this.id)
        .then(response => {
          this.video = response.data
        }).
    catch(error => {
      console.log(error);
    })
  }
}
</script>

<style>

</style>
