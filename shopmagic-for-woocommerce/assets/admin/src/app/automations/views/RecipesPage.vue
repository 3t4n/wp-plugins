<script lang="ts" setup>
import type { DataTableColumns } from "naive-ui";
import { NButton, NH1, NP, NA, NText, useMessage } from "naive-ui";
import { type Recipe, useRecipesStore } from "@/stores/recipes";
import { h } from "vue";
import RecipeDescription from "../components/RecipeDescription.vue";
import DataTable from "@/components/Table/DataTable.vue";
import { __, _n } from "@/plugins/i18n";
import { canUseRecipe } from "../utils/recipe";
import { storeToRefs } from "pinia";
import { useRouter } from "vue-router";

const { recipes, loading } = storeToRefs(useRecipesStore());
const { createAutomation } = useRecipesStore();
const message = useMessage();
const router = useRouter();

function createRecipe(name: string) {
  createAutomation(name)
    .then((id) => {
      router.push({
        name: "automation",
        params: {
          id: id?.value,
        },
      });
    })
    .catch(() => {
      message.error(__("Failed to use recipe", "shopmagic-for-woocommerce"));
    });
}

const RecipeButton = ( recipe: Recipe ) => {
  if (canUseRecipe(recipe) === false) {
    return h(
      NButton,
      {
        tertiary: true,
        type: "error",
        disabled: true
      },
      { default: () => __("Missing plugins", "shopmagic-for-woocommerce") },
    )
  }
  return h(
    NButton,
    {
      tertiary: true,
      type: "info",
      onClick: () => createRecipe(recipe.name),
    },
    { default: () => __("Use recipe", "shopmagic-for-woocommerce") },
  )

}

const columns: DataTableColumns<Recipe> = [
  {
    key: "recipe",
    title: () => __("Recipe", "shopmagic-for-woocommerce"),
    render: (recipe) => h(RecipeDescription, {recipe}),
  },
  {
    key: "action",
    title: () => __("Action", "shopmagic-for-woocommerce"),
    render: RecipeButton,
    width: 180,
  },
];

</script>
<template>
  <NH1>{{ __("Recipes", "shopmagic-for-woocommerce") }}</NH1>
  <DataTable
    :columns="columns"
    :data="recipes"
    :error="null"
    :loading="loading"
    :show-pagination="false"
  />
</template>
