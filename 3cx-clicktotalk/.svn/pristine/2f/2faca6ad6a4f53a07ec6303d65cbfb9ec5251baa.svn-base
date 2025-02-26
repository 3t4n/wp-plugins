<template>
    <div :class="$style.root">
        <div :class="$style['chat-history']" ref="chatHistory">
            <template v-for="message in chatMessages">
                <chat-message2 :message="message"></chat-message2>
                <hr>
            </template>
        </div>
        <!--
        <p class="chat-feedback">Your partner is typing...</p>
        -->
        <form @submit.prevent="sendMessage">
            <fieldset>
                <input :disabled="myPhoneService.isLoading" ref="chatInput" type="text" v-model="myMessage" autocomplete="off"
                       placeholder="Type your message..." autofocus>
                <input type="hidden">
            </fieldset>
        </form>
    </div>
</template>

<script src="./chat.ts"></script>
<style module src="./chat.scss"></style>
