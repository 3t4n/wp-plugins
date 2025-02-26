<template>
    <div :class="$style['chat-message']" >
        <img :src="message.icon" alt="" :class="$style.avatar">
        <h5>{{message.senderName}}</h5>
        <span :class="$style['chat-time']" >{{message.dateTime}}</span>
        <div :class="$style['chat-message-content']" >
            <p v-for="text in message.text" v-html="text"></p>
        </div>
    </div>
</template>

<script>
    export default {
        name: "chat-message2",
        props: ['message']
    }
</script>

<style module src="./chat-message.scss"></style>
