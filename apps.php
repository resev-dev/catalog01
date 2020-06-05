<?php

function getCatalog($filename): array
{
    $filepath = __DIR__ . "/repository/$filename.txt";
    $fileItems = file ($filepath);

    $headersString = array_shift ($fileItems);

    $prepareHeaders = explode ('|', $headersString);

    $prepareHeaders = array_map ('trim', $prepareHeaders);

    $prepareItems = array_map (function ($item) {
        return explode ('|', $item);
    }, $fileItems);

    $prepareItems = array_map (function ($item) use ($prepareHeaders) {
        return array_combine ($prepareHeaders, $item);
    }, $prepareItems);

    return $prepareItems;
}