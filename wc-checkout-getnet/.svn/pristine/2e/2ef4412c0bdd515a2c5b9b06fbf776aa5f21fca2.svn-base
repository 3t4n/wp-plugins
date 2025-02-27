<?php
/**
 * @license MIT
 *
 * Modified by Atanas Angelov on 18-December-2024 using Strauss.
 * @see https://github.com/BrianHenryIE/strauss
 */

namespace CoffeeCode\League\Flysystem;

/**
 * @deprecated
 */
class Directory extends Handler
{
    /**
     * Delete the directory.
     *
     * @return bool
     */
    public function delete()
    {
        return $this->filesystem->deleteDir($this->path);
    }

    /**
     * List the directory contents.
     *
     * @param bool $recursive
     *
     * @return array|bool directory contents or false
     */
    public function getContents($recursive = false)
    {
        return $this->filesystem->listContents($this->path, $recursive);
    }
}
