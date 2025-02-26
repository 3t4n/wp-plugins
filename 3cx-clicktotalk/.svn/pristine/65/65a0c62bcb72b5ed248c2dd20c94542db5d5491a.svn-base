<template>
    <button @mousedown.prevent="" @click.prevent.stop="$emit('click')" :title="title" :class="$style.button" :disabled="disabled">
        <span :class="$style.overlay"></span>
        <slot></slot>
    </button>
</template>

<script>
    export default {
        name: "toolbar-button",
        props: ['title', 'disabled']
    }
</script>

<style module src="./toolbar-button.scss"></style>
