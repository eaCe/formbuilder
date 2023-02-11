<?php
$form = new rex_fragment();

$fragment = new rex_fragment();
$fragment->setVar('body', $form->parse('formbuilder/backend/form.php'), false);
echo $fragment->parse('core/page/section.php');
?>
