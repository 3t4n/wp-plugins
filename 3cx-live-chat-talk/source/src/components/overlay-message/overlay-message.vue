<template>
    <div :class="$style.message">
        <div :class="$style.content">
            <p>{{message}}</p>
            <button ref="submitButton" @click="submit">Try again</button>
        </div>
        <div :class="$style.background"></div>
    </div>
</template>
<script src="./overlay-message.ts"></script>
<style module src="./overlay-message.scss"></style>
