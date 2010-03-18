<?php //netteCache[01]000203a:2:{s:4:"time";s:21:"0.69509300 1267235076";s:9:"callbacks";a:1:{i:0;a:3:{i:0;a:2:{i:0;s:5:"Cache";i:1;s:9:"checkFile";}i:1;s:48:"D:\www\skusky\app\components\Datagrid/grid.phtml";i:2;i:1263349006;}}}?><?php
// file D:\www\skusky\app\components\Datagrid/grid.phtml
//

$_cb = LatteMacros::initRuntime($template, NULL, 'fc280d5fed'); unset($_extends);

if (isset($presenter, $control) && $presenter->isAjax()) { LatteMacros::renderSnippets($control, $_cb, get_defined_vars()); }

if (SnippetHelper::$outputAllowed) {
} if ($_cb->foo = SnippetHelper::create($control, "grid")) { $_cb->snippets[] = $_cb->foo ?>

<?php foreach ($iterator = $_cb->its[] = new SmartCachingIterator($flashes) as $flash): ?>
<div class="flash <?php echo TemplateHelpers::escapeHtml($flash->type) ?>"><?php echo TemplateHelpers::escapeHtml($flash->message) ?></div>
<?php endforeach; array_pop($_cb->its); $iterator = end($_cb->its) ?>

<?php if (is_object($control)) $control->render('begin'); else $control->getWidget($control)->render('begin') ;if (is_object($control)) $control->render('errors'); else $control->getWidget($control)->render('errors') ;if (is_object($control)) $control->render('body'); else $control->getWidget($control)->render('body') ;if (is_object($control)) $control->render('end'); else $control->getWidget($control)->render('end') ?>

<?php array_pop($_cb->snippets)->finish(); } if (SnippetHelper::$outputAllowed) { 
}
