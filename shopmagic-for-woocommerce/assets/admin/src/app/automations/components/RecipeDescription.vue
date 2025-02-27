<script lang="ts" setup>
import { NButton, NH1, NP, NA, NText } from "naive-ui";
import { __, _n } from "@/plugins/i18n";
import { canUseRecipe } from "../utils/recipe";

defineProps<{
  recipe: Recipe;
}>();

const getExtensionUrl = (extension: string) => {
  switch (extension) {
    case "shopmagic-reviews":
      extension = "shopmagic-review-requests";
      break;
    case "shopmagic-woocommerce-subscriptions":
      extension = "woocommerce-subscriptions";
      break;
  }
  return `https://shopmagic.app/products/${extension}/?utm_campaign=shopmagic-upgrade&utm_source=plugin&utm_medium=recipe`;
}
</script>
<template>
  <NText strong>
    {{ recipe.name }}
  </NText>
  <NP>
    {{ recipe.description }}
  </NP>
  <NP v-if="canUseRecipe(recipe) === false">
    {{
    _n(
      "This recipe requires extension",
      "This recipe requires extensions",
      recipe.meta.requires?.length || 0,
      "shopmagic-for-woocommerce"
    )
    }}:
    <template v-for="(extension, key, index) in recipe.meta.requires" :key="extension">
      <NA :href="getExtensionUrl(key)">{{ extension }}</NA>
      <template v-if="index !== Object.keys(recipe.meta.requires).length - 1">, </template>
    </template>
  </NP>
</template>
