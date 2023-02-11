<?php

use FriendsOfREDAXO\Builder;

class rex_api_formbuilder extends rex_api_function
{
    protected $published = false;

    /**
     * @throws rex_exception
     * @return void
     */
    public function execute()
    {
        if (!rex_csrf_token::factory('rex_api_formbuilder')->isValid()) {
            rex_response::setStatus(rex_response::HTTP_FORBIDDEN);
            rex_response::sendContent('Forbidden');
            exit;
        }

        $table = rex_get('table', 'string');
        $generateTemplate = rex_post('generate', 'bool');

        if ($table && !$generateTemplate) {
            $fields = Builder::getFieldsByTableName($table);
            $fragment = new rex_fragment();
            $fragment->setVar('fields', $fields);
            echo $fragment->parse('formbuilder/backend/field-select.php');
        }

        if ($generateTemplate) {
            $table = rex_post('table', 'string');
            $template = rex_post('template', 'string');
            $fields = json_decode(rex_post('fields'), false);
            // TODO: generate templates...
            echo 'generate template...';
        }

        exit;
    }
}
