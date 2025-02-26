<template>
  <div class="video-preview__container">
    <video width='100%' ref="video" id="video-preview" height='100%' controls :key="video_url">
      <source :src="video_url">
    </video>
    <div
      v-for="item in table_rows" 
      :key="item.id"
      id='overlay' 
      class='overlay'
      :style="{ top: item.position_y + '%',left: item.position_x + '%'}"
    >
      <div
        v-if="item.btn_option == 1"
        class="hotspot-option-1" 
      />

      <img
        v-if="item.btn_option == 3"
        class="hotspot-option-3"
        src="../../../assets/img/hotspot-white.png"
      />
    </div>
  </div>
</template>

<script>
export default {
  name: 'Video',
  props:['video_url', 'table_rows'],
  
}
</script>

<style lang="less">
.video-preview__container {
  position: relative;
  width: 712px;
  height: 444px;
}

.overlay {
  position: absolute;
  z-index: 1;
}

.hotspot-option-1 {
  width: 12px;
  height: 12px;
  border-radius: 50%;
  background-color: #FFFFFF;
  animation: pulse-animation 3s infinite;
  margin-left: 6px;
  margin-top: 6px;
}

.hotspot-option-3 {
  width: 24px;
  height: 24px;
}

@keyframes pulse-animation {
  0% {
    box-shadow: 0 0 0 8px rgba(255, 255, 255, 0.3);
  }
  50% {
    box-shadow: 0 0 0 11px rgba(255, 255, 255, 0.3);
  }
  100% {
    box-shadow: 0 0 0 8px rgba(255, 255, 255, 0.3);
  }
}

</style>