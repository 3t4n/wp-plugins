<template>
  <div>
    <span class="info">TIP:Drag the red dot to set position of hot spot</span>

    <div class="video-container">
      <video width='100%' ref="video" height='100%' controls autoplay loop :key="video_url">
        <source :src="video_url">
      </video>

      <div 
        class="draggable-element" 
        ref="draggableElement" 
        @mousedown="startDragging"
        :style="positions"
      >
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'Draggable Hotspot',
  props: {
    video_url: {
      type: String,
    },
    position_x: {
      type: String,
      default: "50",
    },
    position_y: {
      type: String,
      default: "50",
    }
  },
  data: () => ({
    isDragging: false,
    initialX: 0,
    initialY: 0,
    leftPercentage: 0,
    topPercentage: 0,
    container: '',
    draggableElement: ''
  }),
  computed: {
    positions() {
      return {
        "left": this.position_x + '%',
        "top": this.position_y + '%',
      }
    },
  },
  mounted() {
    document.addEventListener('mousemove', this.dragElement);
    document.addEventListener('mouseup', this.stopDragging);
    this.container = this.$refs.video.parentElement;
    this.draggableElement = this.$refs.draggableElement;
  },
  methods: {
    startDragging() {
      this.isDragging = true;
      this.initialX = event.clientX;
      this.initialY = event.clientY;
    },

    dragElement() {
      
      if (this.isDragging) {
        let newX = event.clientX;
        let newY = event.clientY;
        let left = this.draggableElement.offsetLeft - (this.initialX - newX);
        let top = this.draggableElement.offsetTop - (this.initialY - newY);

        //Keep draggable element from being moved outside of container boundaries
        if (left >= 0 && left + this.draggableElement.clientWidth <= this.container.clientWidth) {
          this.draggableElement.style.left = `${left}px`;
        }
        if (top >= 0 && top + this.draggableElement.clientHeight <= this.container.clientHeight) {
          this.draggableElement.style.top = `${top}px`;
        }

        this.initialX = newX;
        this.initialY = newY;

        this.leftPercentage = (left * 100 / this.container.clientWidth).toFixed(2);
        this.topPercentage = (top * 100 / this.container.clientHeight).toFixed(2);
      }
    },

    stopDragging() {
      if (this.isDragging) {
        this.$emit('updatePositionX', this.leftPercentage);
        this.$emit('updatePositionY', this.topPercentage);
      }
      this.isDragging = false;
    }
  },
}
</script>

<style lang="less">
  .video-container {
    position: relative;
    width: 356px;
    height: 222px;
  }

  .draggable-element {
    position: absolute;
    width: 16px;
    height: 16px;
    border-radius: 50%;
    background-color: red;
    cursor: grab;
  }

  .info {
    font-weight: 700;
  }
</style>