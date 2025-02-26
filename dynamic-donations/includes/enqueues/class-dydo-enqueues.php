<?php

class DyDo_Enqueues
{
    /**
     * Enqueue Script
     *
     * @param string $hanlde
     * @param string $src
     *
     * @return DyDo_Enqueues_Script
     */
    public static function script( string $hanlde, string $src )
    {
        return new DyDo_Enqueues_Script( $hanlde, $src );
    }

    /**
     * Enqueue Script
     *
     * @param string $hanlde
     * @param string $src
     *
     * @return DyDo_Enqueues_Style
     */
    public static function style( string $hanlde, string $src )
    {
        return new DyDo_Enqueues_Style( $hanlde, $src );
    }
}
