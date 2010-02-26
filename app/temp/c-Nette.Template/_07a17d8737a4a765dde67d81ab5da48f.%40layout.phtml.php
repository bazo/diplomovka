<?php //netteCache[01]000227a:2:{s:4:"time";s:21:"0.69279100 1267142815";s:9:"callbacks";a:1:{i:0;a:3:{i:0;a:2:{i:0;s:5:"Cache";i:1;s:9:"checkFile";}i:1;s:72:"D:\www\skusky\document_root/../app/DefaultModule/templates/@layout.phtml";i:2;i:1267005784;}}}?><?php
// file …/DefaultModule/templates/@layout.phtml
//

$_cb = LatteMacros::initRuntime($template, true, '14bfc255bb'); unset($_extends);


//
// block menu
//
if (!function_exists($_cb->blocks['menu'][] = '_cbb6476e8d254_menu')) { function _cbb6476e8d254_menu() { extract(func_get_arg(0))
;
}}

//
// end of blocks
//

if ($_cb->extends) { ob_start(); }

if (SnippetHelper::$outputAllowed) {
$_cb->extends = "../../templates/@layout.phtml" ; 
}

if ($_cb->extends) { ob_end_clean(); LatteMacros::includeTemplate($_cb->extends, get_defined_vars(), $template)->render(); }
