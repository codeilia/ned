<?php

namespace App\Nedsa;


Abstract class Transformer
{
    public static function transformCollection(array $items)
    {
        return array_map([new static, 'transform'], $items);
    }

    abstract public static function transform($item);
}
