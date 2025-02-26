<template>
  <div class="note-tags-container">
    <div
    class="tags-edit"
    v-if="tagView"
    >
      <div
      v-if="editing"
      class="tags-edit-panel anoteabove-edit-panel">
        <span class="subtext">{{labels.addTag}}</span>
        <form  v-on:submit.prevent="addTag">
          <input
          type="text"
          name="note-tag"
          class="note-tag"
          placeholder="new tag"
          v-model="tempValue"
          >
          <input type="submit" name="" value="Add Tag" class="edit-control setting button">
        </form>
      </div>
      <div
      v-if="editing"
      class="edit-tags-container anoteabove-edit-panel"
      >
      <span class="subtext">current tags</span>
        <ul
        v-if="tempTags"
        >
          <li
          class="note-tag"
          v-for="(tag, index) in tempTags"
          :key="index"
          >
            <div class="tag-container">
              <div class="remove-tag tag">
                <button
                class="remove"
                @mouseover="destroy"
                @mouseout="noDestroy"
                @click="removeTag(index)"
                >X</button>
              </div>
              <div class="tag-label tag">{{tag}}</div>
            </div>
          </li>
        </ul>
      </div>
      <div
      v-if="editing == false">
      <span
      class="subtext"
      v-if="tempTags.length"
      >{{labels.tag}}</span>
        <ul
        v-if="tempTags.length" class="note-tags">
          <li
          class="notes-tags"
          :class="hasTag(tag)"
          v-for="tag in note.tags"
          @click="tagClick(tag)"
          >{{tag}}</li>
        </ul>
      </div>
    </div>
  </div>

</template>

<script>
import { mapState } from 'vuex'

  export default {
    name: 'noteTag',
    props: [
      'labels',
      'tempTags',
      'note',
      'editing',
      'tagView',
      'tagQuery'
    ],
    data: function () {
      return {
        isActive: false,
        tempValue: ''
      }
    },
    methods: {
      addTag(tag) {
        this.$emit('addTag', this.tempValue);
        this.tempValue = ''
      },
      destroy(e) {
        jQuery(e.target).parents('li.note-tag').css('border', '1px solid maroon');
      },
      noDestroy(e) {
        jQuery(e.target).parents('li.note-tag').css('border', '1px solid #bbbbbb');

      },
      removeTag(index){
        this.$emit('removeTag', index);

      },
      tagClick(tag) {
        this.$emit('tagSearch', tag)
      },
      hasTag(tag)  {
        return {
          active: tag == this.tagQuery
        }
      }
    }
  }
</script>

<style scoped>
.tags-edit {
    display: flex;
}

.tags-edit-panel.anoteabove-edit-panel {
    margin-right: 1em;
}

.anoteabove-edit-panel ul li {
    display: inline-flex;
    flex-wrap: wrap;
    gap: 12px;
}

.note-tags {
  display: inline-flex;
  flex-wrap: wrap;
  gap: 5px;
  cursor: pointer;
}
.edit-tags-container li {
    background: #d3d3d361;
    display: inline-block;
    padding: 6px;
    border-radius: 11px;
    margin: 1px;
    border: 1px solid #d3d3d361;
}

.edit-tags-container .remove {
  background: none;
  padding: 3px 7px 2px 7px;
  border-radius: 9px;
  text-alighn: center;
  line-height: 1.2em;
  font-weight: bold;
  margin-right: .2em;
  cursor: pointer;
  border: 1px solid darkgrey;
  color: darkgrey;

}

.edit-tags-container button.remove:hover {
    color: maroon;
    border: 1px solid maroon;
}

.tag {
  display: inline-flex;
  flex-wrap: wrap;
  gap: 12px;
}
li.notes-tags {
  border: 1px solid #bbbbbb;
  padding: 4px 7px;
  border-radius: 9px;
  line-height: 1em;
  margin-bottom: 0;
}

.delete {
  border: 1px solid maroon;
}

.notes-tags.active {
    border-color: #2671b1;
    color: #1671b1;
}
</style>
