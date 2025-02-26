const { registerBlockType } = wp.blocks;

import { VueInReact } from 'vuera'
import EditComponent from './edit.vue';
const Edit = VueInReact(EditComponent);

registerBlockType('clearmedia/video', {
  title: 'video_123on',
  category: 'widgets',
  icon: 'format-video',
  attributes: {
    video: {
      type: 'number',
      default: null,
    },
  },
  edit: Edit,
  save: ( { attributes }) => {
    return `[video_123on id="${attributes.video}"]`
  }
});
