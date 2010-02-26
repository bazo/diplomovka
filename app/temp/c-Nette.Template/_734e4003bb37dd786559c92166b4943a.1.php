<?php //netteCache[01]000215a:2:{s:4:"time";s:21:"0.28674300 1267144324";s:9:"callbacks";a:1:{i:0;a:3:{i:0;a:2:{i:0;s:5:"Cache";i:1;s:9:"checkFile";}i:1;s:60:"D:\www\skusky\document_root/../app/StudentModule/templates/1";i:2;i:1267144319;}}}?><?php
// file …/StudentModule/templates/1
//

$_cb = LatteMacros::initRuntime($template, true, '2442bc2970'); unset($_extends);

if ($_cb->extends) { ob_start(); }

if (SnippetHelper::$outputAllowed) {
$_cb->extends = $layout ;
}

if ($_cb->extends) { ob_end_clean(); LatteMacros::includeTemplate($_cb->extends, get_defined_vars(), $template)->render(); }
