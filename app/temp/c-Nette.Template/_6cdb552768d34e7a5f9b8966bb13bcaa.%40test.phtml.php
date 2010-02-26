<?php //netteCache[01]000233a:2:{s:4:"time";s:21:"0.05915800 1267149258";s:9:"callbacks";a:1:{i:0;a:3:{i:0;a:2:{i:0;s:5:"Cache";i:1;s:9:"checkFile";}i:1;s:78:"D:\www\skusky\document_root/../app/StudentModule/templates/Default/@test.phtml";i:2;i:1267149159;}}}?><?php
// file …/StudentModule/templates/Default/@test.phtml
//

$_cb = LatteMacros::initRuntime($template, NULL, '025b8545e7'); unset($_extends);


//
// block css
//
if (!function_exists($_cb->blocks['css'][] = '_cbb57312b18f6_css')) { function _cbb57312b18f6_css() { extract(func_get_arg(0))
?>
    <link type="text/css" href="<?php echo TemplateHelpers::escapeHtml($basePath) ?>/css/widgets/datagrid/datagrid.css" rel="stylesheet" />
<?php
}}


//
// block js
//
if (!function_exists($_cb->blocks['js'][] = '_cbb5ae0418eaa_js')) { function _cbb5ae0418eaa_js() { extract(func_get_arg(0))
?>
    <script type="text/javascript" src="<?php echo TemplateHelpers::escapeHtml($basePath) ?>/js/jquery-1.4.2.min.js"></script>
          <script type="text/javascript" src="<?php echo TemplateHelpers::escapeHtml($basePath) ?>/js/jquery-ui-1.7.2.custom.min.js"></script>
          <script type="text/javascript" src="<?php echo TemplateHelpers::escapeHtml($basePath) ?>/js/jquery.ajaxform.js"></script>
          <script type="text/javascript" src="<?php echo TemplateHelpers::escapeHtml($basePath) ?>/js/jquery.livequery.js"></script>
          <script type="text/javascript" src="<?php echo TemplateHelpers::escapeHtml($basePath) ?>/js/jquery.nette.js"></script>
          <script type="text/javascript" src="<?php echo TemplateHelpers::escapeHtml($basePath) ?>/js/effects.js"></script>
          <script type="text/javascript" src="<?php echo TemplateHelpers::escapeHtml($basePath) ?>/js/LiveFormValidation.js"></script>
    <script type="text/javascript" src="<?php echo TemplateHelpers::escapeHtml($basePath) ?>/js/widgets/datagrid/datagrid.js"></script>
<?php
}}

//
// end of blocks
//

if ($_cb->extends) { ob_start(); }

if (SnippetHelper::$outputAllowed) {
if (!$_cb->extends) { call_user_func(reset($_cb->blocks['css']), get_defined_vars()); }  if (!$_cb->extends) { call_user_func(reset($_cb->blocks['js']), get_defined_vars()); }  LatteMacros::callBlock($_cb->blocks, 'content', get_defined_vars()) ;
}

if ($_cb->extends) { ob_end_clean(); LatteMacros::includeTemplate($_cb->extends, get_defined_vars(), $template)->render(); }
