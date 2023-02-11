<?php

namespace FriendsOfREDAXO;

use rex_yform_manager_table;

class Field
{
    private rex_yform_manager_table $table;
    private array $field;
    private string $template;

    public function __construct(array $field, rex_yform_manager_table $table, string $template)
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
