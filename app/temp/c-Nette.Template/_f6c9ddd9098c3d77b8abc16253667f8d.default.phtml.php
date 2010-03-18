<?php //netteCache[01]000235a:2:{s:4:"time";s:21:"0.22628900 1267478743";s:9:"callbacks";a:1:{i:0;a:3:{i:0;a:2:{i:0;s:5:"Cache";i:1;s:9:"checkFile";}i:1;s:80:"D:\www\skusky\document_root/../app/StudentModule/templates/Default/default.phtml";i:2;i:1267478739;}}}?><?php
// file …/StudentModule/templates/Default/default.phtml
//

$_cb = LatteMacros::initRuntime($template, NULL, '3cd8e9d048'); unset($_extends);


//
// block css
//
if (!function_exists($_cb->blocks['css'][] = '_cbb0b3f126fe0_css')) { function _cbb0b3f126fe0_css($_cb) { extract(func_get_arg(1))
;LatteMacros::callBlockParent($_cb, 'css', $template->getParams()) ?>
    <link type="text/css" href="<?php echo TemplateHelpers::escapeHtml($basePath) ?>/css/widgets/calendar/fullcalendar.css" rel="stylesheet" />
    <link type="text/css" href="<?php echo TemplateHelpers::escapeHtml($basePath) ?>/css/widgets/datagrid/datagrid.css" rel="stylesheet" />
<?php
}}


//
// block js
//
if (!function_exists($_cb->blocks['js'][] = '_cbb36832b03d3_js')) { function _cbb36832b03d3_js($_cb) { extract(func_get_arg(1))
;LatteMacros::callBlockParent($_cb, 'js', $template->getParams()) ?>
    <script type="text/javascript" src="<?php echo TemplateHelpers::escapeHtml($basePath) ?>/js/widgets/calendar/fullcalendar.min.js"></script>
    <script type="text/javascript" src="<?php echo TemplateHelpers::escapeHtml($basePath) ?>/js/widgets/calendar/calendar.js"></script>
    <script type="text/javascript" src="<?php echo TemplateHelpers::escapeHtml($basePath) ?>/js/widgets/datagrid/datagrid.js"></script>
<?php
}}


//
// block content
//
if (!function_exists($_cb->blocks['content'][] = '_cbb2f3a2a9eba_content')) { function _cbb2f3a2a9eba_content($_cb) { extract(func_get_arg(1))
?>
<div id="calendar" data-event_url="<?php echo TemplateHelpers::escapeHtml($event_url) ?>"><noscript><?php echo TemplateHelpers::escapeHtml($template->translate('To show the calendar you need to enable javascript')) ?></noscript></div>
<?php
}}

//
// end of blocks
//

if ($_cb->extends) { ob_start(); }
elseif (isset($presenter, $control) && $presenter->isAjax()) { LatteMacros::renderSnippets($control, $_cb, get_defined_vars()); }

if (SnippetHelper::$outputAllowed) {
?>
/**
 * @version default.phtml 26.2.2010
 */
<?php $heading = 'Calendar' ;if (!$_cb->extends) { call_user_func(reset($_cb->blocks['css']), $_cb, $template->getParams()); }  if (!$_cb->extends) { call_user_func(reset($_cb->blocks['js']), $_cb, $template->getParams()); }  if (!$_cb->extends) { call_user_func(reset($_cb->blocks['content']), $_cb, $template->getParams()); }  
}

if ($_cb->extends) { ob_end_clean(); LatteMacros::includeTemplate($_cb->extends, get_defined_vars(), $template)->render(); }
