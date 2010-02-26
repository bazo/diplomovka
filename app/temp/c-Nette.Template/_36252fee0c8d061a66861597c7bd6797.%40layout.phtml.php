<?php //netteCache[01]000227a:2:{s:4:"time";s:21:"0.01443600 1267143663";s:9:"callbacks";a:1:{i:0;a:3:{i:0;a:2:{i:0;s:5:"Cache";i:1;s:9:"checkFile";}i:1;s:72:"D:\www\skusky\document_root/../app/StudentModule/templates/@layout.phtml";i:2;i:1267143650;}}}?><?php
// file …/StudentModule/templates/@layout.phtml
//

$_cb = LatteMacros::initRuntime($template, true, '1693b7fb19'); unset($_extends);

if ($_cb->extends) { ob_start(); }

if (SnippetHelper::$outputAllowed) {
$_cb->extends = "../../templates/@layout.phtml" ;
}

if ($_cb->extends) { ob_end_clean(); LatteMacros::includeTemplate($_cb->extends, get_defined_vars(), $template)->render(); }
