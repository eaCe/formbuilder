<?php

$addon = rex_addon::get('formbuilder');
// rex_url::backendController(['rex-api-call' => 'formbuilder'])
if (rex::isBackend() && 'index.php?page=formbuilder/builder' === rex_url::currentBackendPage()) {
    rex_view::addJsFile($addon->getAssetsUrl('formbuilder.js'));
    rex_view::addCssFile($addon->getAssetsUrl('formbuilder.css'));
    rex_view::setJsProperty('fb_url',
        rex_url::backendController([
            'rex-api-call' => 'formbuilder',
            '_csrf_token' => rex_csrf_token::factory('rex_api_formbuilder')->getValue(),
        ], false));
}
