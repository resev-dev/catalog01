<?php

function getCatalog()
{
    $filename = __DIR__ . '/repository/catalog.txt';
    $fileItems = file($filename);

    $headersString = array_shift($fileItems);

    $prepareHeaders = explode('|', $headersString);

    $prepareHeaders = array_map('trim', $prepareHeaders);

    $prepareItems = array_map(function ($item) {
        return explode('|', $item);
    }, $fileItems);

    $prepareItems = array_map(function ($item) use ($prepareHeaders) {
        return array_combine($prepareHeaders, $item);
    }, $prepareItems);

    return $prepareItems;
}
