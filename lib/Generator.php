<?php

namespace FriendsOfREDAXO;

use Exception;
use rex_exception;
use rex_fragment;
use rex_yform_manager_table;

class Generator
{
    private array $fields;
    private rex_yform_manager_table $table;
    private string $template;

    /**
     * @throws rex_exception
     */
    public function __construct(string $tableName, string $templateType, array $fields)
    {
        $this->table = $this->getTable($tableName);
        $this->template = $templateType;
        $this->fields = $fields;
    }

    public function generateTemplate(): string
    {
        $content = $this->getContent();
        return str_replace(['@php', '@endphp'], ['<?php', '?>'], trim($this->getTemplate($content)));
    }

    private function getContent(): string
    {
        $content = '';
        $charactersToTrim = " \t\n\r\0\x0B";
        $i = 0;

        foreach ($this->fields as $field) {
            try {
                $fragment = new rex_fragment();
                $fragment->setVar('field', new Field($field, $this->table, $this->template));
                $content .= trim($fragment->parse("formbuilder/$field->field_type.php"), $charactersToTrim);
                $content .= PHP_EOL;

                if (0 === $i) {
                    $charactersToTrim = "\t\n\r\0\x0B";
                }

                ++$i;
            } catch (Exception $e) {
                continue;
            }
        }

        return $content;
    }

    private function getTemplate(string $content): string
    {
        $template = '';

        try {
            $fragment = new rex_fragment();
            $fragment->setVar('content', $content);
            $template = trim($fragment->parse("formbuilder/$this->template.php"));
        } catch (Exception $e) {
        }

        return $template;
    }

    /**
     * @throws rex_exception
     */
    private function getTable(string $tableName): rex_yform_manager_table
    {
        $table = rex_yform_manager_table::get($tableName);

        if (!$table) {
            throw new rex_exception(sprintf('The table "%s" does not exist!', $tableName));
        }

        return $table;
    }
}
