<div class="relative mt-4" categories-wrapper>
    <input type="hidden" name="category" value="<?php echo esc_attr($this->website['category']['id']); ?>" category-input />
    <div class="grid grid-cols-7" categories>
        <?php
        foreach ($this->categories as $index => $category) {
        ?>
            <div class="flex items-center justify-center px-2 py-2 cursor-pointer hover:text-green-500 <?php echo $this->website['category']['id'] === $category["id"] || in_array($this->website['category']['id'], array_column($category["children"], "id"))  ? "text-green-500" : ""; ?> <?php echo ($index > 0 ? "border-l" : ""); ?>" category category-id="<?php echo esc_html($category['id']); ?>">
                <?php echo Ad_Ink_Config::get("categories", $category['id'], $category['name']) ?>
            </div>
        <?php
        }
        ?>
    </div>
    <div sub-categories>
        <?php
        foreach ($this->categories as $category) {
            if (count($category["children"]) > 0) {
        ?>
                <div class="flex flex-wrap mt-3 -mx-1 <?php echo $this->website['category']['id'] !== $category["id"] && !in_array($this->website['category']['id'], array_column($category["children"], "id"))  ? "hidden" : ""; ?>" category="<?php echo esc_attr($category['id']); ?>">
                    <?php
                    foreach ($category['children'] as $child) {
                    ?>
                        <div class="px-2 py-1 mx-1 mt-1 text-xs text-white uppercase bg-gray-300 rounded cursor-pointer <?php echo $this->website['category']['id'] === $child["id"] || $this->website['category']['id'] === $category["id"] ? "bg-green-500" : ""; ?>" sub-category category-id="<?php echo esc_attr($child['id']); ?>"><?php echo esc_html($child['name']); ?></div>
                    <?php
                    }
                    ?>
                </div>
        <?php
            }
        }
        ?>
    </div>
</div>