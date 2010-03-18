<?php //netteCache[01]000227a:2:{s:4:"time";s:21:"0.74217700 1267241985";s:9:"callbacks";a:1:{i:0;a:3:{i:0;a:2:{i:0;s:5:"Cache";i:1;s:9:"checkFile";}i:1;s:72:"D:\www\skusky\document_root/../app/DefaultModule/templates/@layout.phtml";i:2;i:1267148204;}}}?><?php
// file …/DefaultModule/templates/@layout.phtml
//

$_cb = LatteMacros::initRuntime($template, true, 'd1e53a8804'); unset($_extends);

if ($_cb->extends) { ob_start(); }
elseif (isset($presenter, $control) && $presenter->isAjax()) { LatteMacros::renderSnippets($control, $_cb, get_defined_vars()); }

if (SnippetHelper::$outputAllowed) {
$_cb->extends = "../../templates/@layout.phtml" ;
}

if ($_cb->extends) { ob_end_clean(); LatteMacros::includeTemplate($_cb->extends, get_defined_vars(), $template)->render(); }
