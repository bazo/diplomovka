<?php //netteCache[01]000234a:2:{s:4:"time";s:21:"0.68841700 1267142815";s:9:"callbacks";a:1:{i:0;a:3:{i:0;a:2:{i:0;s:5:"Cache";i:1;s:9:"checkFile";}i:1;s:79:"D:\www\skusky\document_root/../app/DefaultModule/templates/Select/default.phtml";i:2;i:1267005792;}}}?><?php
// file …/DefaultModule/templates/Select/default.phtml
//

$_cb = LatteMacros::initRuntime($template, NULL, '6f26273e57'); unset($_extends);


//
// block menu
//
if (!function_exists($_cb->blocks['menu'][] = '_cbbc80b0cc504_menu')) { function _cbbc80b0cc504_menu() { extract(func_get_arg(0))
;
}}


//
// block content
//
if (!function_exists($_cb->blocks['content'][] = '_cbb42fce19077_content')) { function _cbb42fce19077_content() { extract(func_get_arg(0))
?>
	<div id="module_choose">
  		<a href="<?php echo TemplateHelpers::escapeHtml($presenter->link(":Student:Login:default")) ?>"><div class="btn student"><?php echo TemplateHelpers::escapeHtml($template->translate('Student')) ?></div></a>
  		<a href="<?php echo TemplateHelpers::escapeHtml($presenter->link(":Teacher:Login:default")) ?>"><div class="btn teacher"><?php echo TemplateHelpers::escapeHtml($template->translate('Teacher')) ?></div></a>
	</div>
<?php
}}

//
// end of blocks
//

if ($_cb->extends) { ob_start(); }

if (SnippetHelper::$outputAllowed) {
if (!$_cb->extends) { call_user_func(reset($_cb->blocks['menu']), get_defined_vars()); }  if (!$_cb->extends) { call_user_func(reset($_cb->blocks['content']), get_defined_vars()); }  
}

if ($_cb->extends) { ob_end_clean(); LatteMacros::includeTemplate($_cb->extends, get_defined_vars(), $template)->render(); }
