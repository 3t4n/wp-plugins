// support NodeJS modules without type definitions
declare module '*';

declare module '*.vue' {
    import Vue from 'vue';
    export default Vue;
}
