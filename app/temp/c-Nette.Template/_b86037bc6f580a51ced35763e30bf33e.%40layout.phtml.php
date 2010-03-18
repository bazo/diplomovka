<?php //netteCache[01]000243a:2:{s:4:"time";s:21:"0.05448600 1267478896";s:9:"callbacks";a:1:{i:0;a:3:{i:0;a:2:{i:0;s:5:"Cache";i:1;s:9:"checkFile";}i:1;s:88:"D:\www\skusky\document_root/../app/DefaultModule/templates/../../templates/@layout.phtml";i:2;i:1267476017;}}}?><?php
// file …/DefaultModule/templates/../../templates/@layout.phtml
//

$_cb = LatteMacros::initRuntime($template, NULL, '4a7f2a62ec'); unset($_extends);


//
// block css
//
if (!function_exists($_cb->blocks['css'][] = '_cbb0fc9cd34cd_css')) { function _cbb0fc9cd34cd_css($_cb) { extract(func_get_arg(1))
?>
        <link type="text/css" href="<?php echo TemplateHelpers::escapeHtml($basePath) ?>/css/layout.css" rel="stylesheet" />
        <link type="text/css" href="<?php echo TemplateHelpers::escapeHtml($basePath) ?>/css/menu_style.css" rel="stylesheet" />
        <link type="text/css" href="<?php echo TemplateHelpers::escapeHtml($basePath) ?>/css/<?php echo TemplateHelpers::escapeHtml($template->lower($module)) ?>/menu_style_<?php echo TemplateHelpers::escapeHtml($template->lower($module)) ?>" rel="stylesheet" />
<?php
}}


//
// block js
//
if (!function_exists($_cb->blocks['js'][] = '_cbb31f2e26330_js')) { function _cbb31f2e26330_js($_cb) { extract(func_get_arg(1))
?>
          <script type="text/javascript" src="<?php echo TemplateHelpers::escapeHtml($basePath) ?>/js/LiveFormValidation.js"></script>
<?php
}}

//
// end of blocks
//

if ($_cb->extends) { ob_start(); }
elseif (isset($presenter, $control) && $presenter->isAjax()) { LatteMacros::renderSnippets($control, $_cb, get_defined_vars()); }

if (SnippetHelper::$outputAllowed) {
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="description" content="Diplomovy projekt" />
	<meta name="robots" content="NOINDEX, NOFOLLOW">

	<title><?php echo TemplateHelpers::escapeHtml($template->translate($module)) ;if (isset($title)): ?> - <?php echo TemplateHelpers::escapeHtml($template->translate($title)) ;endif ?></title>
<?php if (!$_cb->extends) { call_user_func(reset($_cb->blocks['css']), $_cb, $template->getParams()); }  if (!$_cb->extends) { call_user_func(reset($_cb->blocks['js']), $_cb, $template->getParams()); } ?>
</head>
<body>
    <div id="container">
	<div id="content">
<?php } if ($_cb->foo = SnippetHelper::create($control, "flash")) { $_cb->snippets[] = $_cb->foo ?>
            <?php } foreach ($iterator = $_cb->its[] = new SmartCachingIterator($flashes) as $flash): if (SnippetHelper::$outputAllowed) { ?>
                <div class="flash <?php echo TemplateHelpers::escapeHtml($flash->type) ?>"><?php echo TemplateHelpers::escapeHtml($flash->message) ?></div>
            <?php } endforeach; array_pop($_cb->its); $iterator = end($_cb->its) ;if (SnippetHelper::$outputAllowed) { array_pop($_cb->snippets)->finish(); } if (SnippetHelper::$outputAllowed) { ?>
        <?php } LatteMacros::callBlock($_cb, 'content', $template->getParams()) ;if (SnippetHelper::$outputAllowed) { ?>
	</div>
    </div>
</body>
</html>
</body>
</html><?php
}

if ($_cb->extends) { ob_end_clean(); LatteMacros::includeTemplate($_cb->extends, get_defined_vars(), $template)->render(); }
