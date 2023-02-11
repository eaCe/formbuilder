<?php

use FriendsOfREDAXO\Builder;

class rex_api_formbuilder extends rex_api_function
{
    protected $published = false;

    /**
     * @throws rex_exception
     * @return rex_api_result|void
     */
    public function execute()
    {
        if (!rex_csrf_token::factory('rex_api_formbuilder')->isValid()) {
            rex_response::setStatus(rex_response::HTTP_FORBIDDEN);
            rex_response::sendContent('Forbidden');
            exit;
        }

        $table = rex_get('table', 'string');

        if ($table) {
            $fields = Builder::getFieldsByTableName($table);
            $fragment = new rex_fragment();
            $fragment->setVar('fields', $fields);
            echo $fragment->parse('formbuilder/backend/field-select.php');
        }
        exit;
    }
}
