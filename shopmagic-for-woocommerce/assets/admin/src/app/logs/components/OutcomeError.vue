<script lang="ts" setup>
import { NButton, NP, NText } from "naive-ui";
import { ref } from "vue";

defineProps<{
  note: string;
  context: {
    [key: string]: string;
  };
}>();

const showStack = ref(false);
</script>
<template>
  <NP class="text-md" strong>{{ note }}</NP>
  <NButton quaternary type="info" @click="showStack = !showStack">
    {{ __("Show details", "shopmagic-for-woocommerce") }}
  </NButton>
  <div class="block">
    <NText class="w-full" v-show="showStack" code>
        <ul v-for="(value, key) in context" :key="key">
          <li>
            <pre class="whitespace-pre-line">
              <b>{{ key }}</b>:<br/>{{ value }}
            </pre>
          </li>
        </ul>
    </NText>
  </div>
</template>
