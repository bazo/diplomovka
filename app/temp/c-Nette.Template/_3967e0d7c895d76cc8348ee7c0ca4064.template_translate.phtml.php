<?php //netteCache[01]000226a:2:{s:4:"time";s:21:"0.35705200 1267142823";s:9:"callbacks";a:1:{i:0;a:3:{i:0;a:2:{i:0;s:5:"Cache";i:1;s:9:"checkFile";}i:1;s:71:"D:\www\skusky\app\components\NavigationBuilder/template_translate.phtml";i:2;i:1256407135;}}}?><?php
// file D:\www\skusky\app\components\NavigationBuilder/template_translate.phtml
//

$_cb = LatteMacros::initRuntime($template, NULL, '82b77bd416'); unset($_extends);

if (SnippetHelper::$outputAllowed) {
foreach ($iterator = $_cb->its[] = new SmartCachingIterator($items) as $item): if ($iterator->isFirst()): ?>
				<ul>
<?php endif ?>
			<li><a href="<?php echo TemplateHelpers::escapeHtml($item->url) ?>"><?php echo TemplateHelpers::escapeHtml($template->translate($item->label)) ?></a>
<?php if (count($item->items)): LatteMacros::includeTemplate($template->getFile(), array('items' => $item->items) + $template->getParams(), $_cb->templates['82b77bd416'])->render() ;endif ?>
			</li>
<?php if ($iterator->isLast()): ?>
				</ul>
<?php endif ?>
		<?php endforeach; array_pop($_cb->its); $iterator = end($_cb->its) ;
}
