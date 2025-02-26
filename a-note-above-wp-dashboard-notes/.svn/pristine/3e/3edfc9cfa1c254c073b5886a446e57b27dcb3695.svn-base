<template>
  <div class="note-visibility-container">
    <div
    class="visibility everyone"
    >
      <input
      type="checkbox"
      name="everyone-visibility"
      :id="'everyone-visibility-'+note.id"
      value=""
      v-model="allVisibility"
      >
      <label :for="'everyone-visibility-'+note.id">Visibitle to Every User</label>
    </div>
    <div
    class="visibility everyone"
    >
      <input
      type="checkbox"
      name="single-visibility"
      :id="'single-visibility-'+note.id"
      value=""
      v-model="singularVisibility"
      >
      <label :for="'single-visibility-'+note.id">Only Visibile to You</label>
    </div>
    <div
    class="visibility everyone"
    >
      <input
      type="checkbox"
      name="role-based-visibility"
      :id="'role-based-visibility-'+note.id"
      value=""
      v-model="roleVisibility"
      >
      <label :for="'role-based-visibility-'+note.id">Note Displayed to Select Roles</label>
    </div>
    <div
    class="visibility everyone"
    >
    <select v-model="role">
      <option v-for="option in options" v-bind:value="option.value">
        {{ option.text }}
      </option>
      </select>
    </div>
  </div>
</template>

<script>
  export default {
    name: 'noteVisibility',
    props: [
      'open',
      'note',
      'tempAllVisibility',
      'tempSingularVisibility',
      'tempRoleVisibility',
      'tempRole',
      'labels'
    ],
    data: function () {
      return {
        options: [
          { text: 'Select Role:', value: ''},
          { text: 'Admin', value: 'Admin' },
          { text: 'Editor', value: 'Editor' },
          { text: 'Author', value: 'Author' },
          { text: 'Contributor', value: 'Contributor' },
          { text: 'Subscribers', value: 'Subscribers' }
        ]
      }
    },
    computed: {
      allVisibility: {
        get() {
          return this.tempAllVisibility;
        },
        set(val) {
          this.$emit('allVisUpdate', val);
        }
      },
      singularVisibility: {
        get() {
          return this.tempSingularVisibility;
        },
        set(val) {
          this.$emit('singularVisUpdate', val);
        }
      },
      roleVisibility: {
        get() {
          return this.tempRoleVisibility;
        },
        set(val) {
          this.$emit('roleVisUpdate', val);
        }
      },
      role: {
        get() {
          return this.tempRole;
        },
        set(val) {
          this.$emit('roleUpdate', val);
        }
      }
    }
  }
</script>

<style scoped>

</style>
