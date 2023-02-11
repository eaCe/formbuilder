<?php

namespace FriendsOfREDAXO;

use rex_yform_manager_table;

class Field
{
    private rex_yform_manager_table $table;
    private object $field;
    private string $template;

    public function __construct(object $field, rex_yform_manager_table $table, string $template)
    {
        $this->table = $table;
        $this->template = $template;
        $this->field = $field;
    }

    public function getTemplate(): string
    {
        return $this->template;
    }
}
