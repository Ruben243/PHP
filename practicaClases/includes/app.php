<?php

function mi_autoload($clases) {
    $clase = explode('\\', $clases);
    require __DIR__.'/clases/' . $clase[1] . '.php';
}

spl_autoload_register('mi_autoload');

function echoDir() {
    echo __DIR__.'/clases';
}
