<?php //netteCache[01]000234a:2:{s:4:"time";s:21:"0.83094700 1267478985";s:9:"callbacks";a:1:{i:0;a:3:{i:0;a:2:{i:0;s:5:"Cache";i:1;s:9:"checkFile";}i:1;s:79:"D:\www\skusky\document_root/../app/DefaultModule/templates/Select/default.phtml";i:2;i:1267478982;}}}?><?php
// file …/DefaultModule/templates/Select/default.phtml
//

$_cb = LatteMacros::initRuntime($template, NULL, '37884897ab'); unset($_extends);


//
// block content
//
if (!function_exists($_cb->blocks['content'][] = '_cbb5201ff5ebf_content')) { function _cbb5201ff5ebf_content($_cb) { extract(func_get_arg(1))
?>
    <div id="main">
	<div id="module_choose">
  		<a href="<?php echo TemplateHelpers::escapeHtml($presenter->link(":Student:Login:default")) ?>"><div class="btn student"><?php echo TemplateHelpers::escapeHtml($template->translate('Student')) ?></div></a>
  		<a href="<?php echo TemplateHelpers::escapeHtml($presenter->link(":Teacher:Login:default")) ?>"><div class="btn teacher"><?php echo TemplateHelpers::escapeHtml($template->translate('Teacher')) ?></div></a>
	</div>
    </div>
<?php
}}

//
// end of blocks
//

if ($_cb->extends) { ob_start(); }
elseif (isset($presenter, $control) && $presenter->isAjax()) { LatteMacros::renderSnippets($control, $_cb, get_defined_vars()); }

if (SnippetHelper::$outputAllowed) {
if (!$_cb->extends) { call_user_func(reset($_cb->blocks['content']), $_cb, $template->getParams()); }  
}

if ($_cb->extends) { ob_end_clean(); LatteMacros::includeTemplate($_cb->extends, get_defined_vars(), $template)->render(); }
