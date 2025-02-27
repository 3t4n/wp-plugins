import { type Recipe } from "@/stores/recipes";

export const canUseRecipe = (recipe: Recipe) => {
  if (recipe?.meta?.requires === undefined || recipe.meta.requires.length === 0) {
    return true
  }

  return Object
    .keys(recipe.meta.requires)
    .every(req => window.ShopMagic.modules.includes(req))
}
