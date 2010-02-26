<?php //netteCache[01]000235a:2:{s:4:"time";s:21:"0.26915800 1267149306";s:9:"callbacks";a:1:{i:0;a:3:{i:0;a:2:{i:0;s:5:"Cache";i:1;s:9:"checkFile";}i:1;s:80:"D:\www\skusky\document_root/../app/StudentModule/templates/Default/default.phtml";i:2;i:1267149299;}}}?><?php
// file …/StudentModule/templates/Default/default.phtml
//

$_cb = LatteMacros::initRuntime($template, NULL, '4aaaee44fa'); unset($_extends);


//
// block content
//
if (!function_exists($_cb->blocks['content'][] = '_cbbde97e94e17_content')) { function _cbbde97e94e17_content() { extract(func_get_arg(0))
;
}}

//
// end of blocks
//

if ($_cb->extends) { ob_start(); }

if (SnippetHelper::$outputAllowed) {
?>
/**
 * @version default.phtml 26.2.2010
 */

<?php if (!$_cb->extends) { call_user_func(reset($_cb->blocks['content']), get_defined_vars()); }  
}

if ($_cb->extends) { ob_end_clean(); LatteMacros::includeTemplate($_cb->extends, get_defined_vars(), $template)->render(); }
