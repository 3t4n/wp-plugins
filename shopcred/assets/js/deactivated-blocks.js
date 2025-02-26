
// If we are recieving an object, let's convert it into an array.
wp.domReady(() => {
    let spc_deactivated_blocks = spc_deactivate_blocks.deactivated_blocks

    if (spc_deactivated_blocks.length) {
        if (typeof wp.blocks.unregisterBlockType !== "undefined") {
            for (block_index in spc_deactivated_blocks) {
                wp.blocks.unregisterBlockType(spc_deactivated_blocks[block_index]);
            }
        }
    }
});
