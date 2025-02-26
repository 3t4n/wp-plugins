<template>
    <div :class="{[$style.collapsed]: collapsed, [$style.panel]: true}">
        <div :class="[$style.header]">
            <div :class="$style.line1" @click="collapsed = !collapsed">
                <img src="../../images/logo.png" alt="3CX" :class="$style['logo-icon']"/>
                <h4 style="width: 100%">{{title}}</h4>
                <div class="call-us-toolbar" style="margin: 7px;">
                    <toolbar-button :class="$style['button-minimize']" @click="collapsed = !collapsed">
                        <glyphicon-chevron :class="$style['minimize-image']"></glyphicon-chevron>
                    </toolbar-button>
                    <toolbar-button :class="$style['button-minimize']" @click="onClose()" v-if="showCloseButton">
                        <glyphicon-times></glyphicon-times>
                    </toolbar-button>
                </div>
            </div>
            <slot name="panel-top"></slot>
        </div>
        <div :class="$style.content" ref="panelContent">
            <slot name="panel-content"></slot>
        </div>
    </div>
</template>
<script src="./panel.ts"></script>
<style module src="./panel.scss"></style>
