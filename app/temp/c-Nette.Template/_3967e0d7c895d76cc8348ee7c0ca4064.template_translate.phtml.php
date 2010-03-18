<?php //netteCache[01]000226a:2:{s:4:"time";s:21:"0.44083200 1267309886";s:9:"callbacks";a:1:{i:0;a:3:{i:0;a:2:{i:0;s:5:"Cache";i:1;s:9:"checkFile";}i:1;s:71:"D:\www\skusky\app\components\NavigationBuilder/template_translate.phtml";i:2;i:1267279641;}}}?><?php
// file D:\www\skusky\app\components\NavigationBuilder/template_translate.phtml
//

$_cb = LatteMacros::initRuntime($template, NULL, '92fb8c0f19'); unset($_extends);

if (isset($presenter, $control) && $presenter->isAjax()) { LatteMacros::renderSnippets($control, $_cb, get_defined_vars()); }

if (SnippetHelper::$outputAllowed) {
foreach ($iterator = $_cb->its[] = new SmartCachingIterator($items) as $item): if ($iterator->isFirst()): ?>
                <ul>
<?php endif ?>
        <li><a href="<?php echo TemplateHelpers::escapeHtml($item->url) ?>"><?php echo TemplateHelpers::escapeHtml($template->translate($item->label)) ?></a>
<?php if (count($item->items)): LatteMacros::includeTemplate($template->getFile(), array('items' => $item->items) + $template->getParams(), $_cb->templates['92fb8c0f19'])->render() ;endif ?>
        </li>
<?php if ($iterator->isLast()): ?>
                </ul>
<?php endif ;endforeach; array_pop($_cb->its); $iterator = end($_cb->its) ;
}
