<?php

namespace Bits\CodePenList\Contracts;

interface ModuleContract
{
    /**
     * Register the hooks.
     * 
     * @return void
     */
    public function registerHooks();
}