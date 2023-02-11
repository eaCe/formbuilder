<?php

namespace FriendsOfREDAXO;

use rex_sql;
use rex_sql_exception;
use rex_yform_manager_field;
use rex_yform_manager_table;

use function assert;
use function in_array;

class Builder
{
    /**
     * @var mixed|string[]
     */
    private static $typeNameBlocklist = [
        'html',
        'generate_key',
        'be_manager_relation',
    ];

    /**
     * @throws rex_sql_exception
     */
    public static function getTablesArray(): array
    {
        $sql = rex_sql::factory();
        $sql->setTable(rex_yform_manager_table::table());
        $sql->select('id, table_name, name');

        if ($sql->getRows()) {
            return $sql->getArray();
        }

        return [];
    }

    public static function getFieldsByTableName(string $tableName): array
    {
        $table = rex_yform_manager_table::get($tableName);
        $fields = [];

        foreach ($table->getFields() as $field) {
            assert($field instanceof rex_yform_manager_field);

            if ('value' !== $field->getType() || in_array($field->getTypeName(), self::$typeNameBlocklist, true)) {
                continue;
            }

            $fields[] = [
                'name' => $field->getName(),
                'label' => $field->getLabel(),
                'type' => $field->getType(),
                'type_name' => $field->getTypeName(),
            ];
        }

        return $fields;
    }
}
