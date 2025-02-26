<template>
  <div>
    <select v-model="getCurrentVideo" @change="setAttributes( { video } )">
      <option v-for="vid in videos" :value="vid.id">
        {{ vid.title }}
      </option>
    </select>
  </div>
</template>

<script>
import axios from 'axios'

export default {
  name: "edit",

  data () {
    return {
      videos: [],
      video: null
    }
  },

  props: ['attributes', 'setAttributes'],

  computed: {
    getCurrentVideo: {
      get () {
        if (this.attributes.video)
          return this.attributes.video

        if (this.videos && this.videos[0] && !this.video)
          return this.videos[0].id

        return this.video
      },
      set (val) {
        this.video = val
      }
    }
  },

  mounted () {
    axios.get('/wp-json/v2/video_123on/posts')
        .then(response => {
          this.videos = response.data;
          console.log(this.videos)
        }).
    catch(error => {
      console.log(error);
    })
  }
}
</script>

<style scoped>

</style>
