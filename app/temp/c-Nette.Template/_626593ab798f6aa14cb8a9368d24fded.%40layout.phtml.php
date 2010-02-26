<?php //netteCache[01]000243a:2:{s:4:"time";s:21:"0.41479600 1267149410";s:9:"callbacks";a:1:{i:0;a:3:{i:0;a:2:{i:0;s:5:"Cache";i:1;s:9:"checkFile";}i:1;s:88:"D:\www\skusky\document_root/../app/StudentModule/templates/../../templates/@layout.phtml";i:2;i:1267149404;}}}?><?php
// file …/StudentModule/templates/../../templates/@layout.phtml
//

$_cb = LatteMacros::initRuntime($template, NULL, '653eef7a43'); unset($_extends);


//
// block css
//
if (!function_exists($_cb->blocks['css'][] = '_cbb9026ace65c_css')) { function _cbb9026ace65c_css() { extract(func_get_arg(0))
?>
        <link type="text/css" href="<?php echo TemplateHelpers::escapeHtml($basePath) ?>/css/layout.css" rel="stylesheet" />
        <link type="text/css" href="<?php echo TemplateHelpers::escapeHtml($basePath) ?>/css/menu_style.css" rel="stylesheet" />
        <link type="text/css" href="<?php echo TemplateHelpers::escapeHtml($basePath) ?>/css/<?php echo TemplateHelpers::escapeHtml($template->lower($module)) ?>/menu_style_<?php echo TemplateHelpers::escapeHtml($template->lower($module)) ?>" rel="stylesheet" />
        <link type="text/css" href="<?php echo TemplateHelpers::escapeHtml($basePath) ?>/css/jqueryui/jquery-ui-1.7.2.custom.css" rel="stylesheet" />
<?php
}}


//
// block js
//
if (!function_exists($_cb->blocks['js'][] = '_cbb3eead7b03e_js')) { function _cbb3eead7b03e_js() { extract(func_get_arg(0))
?>
          <script type="text/javascript" src="<?php echo TemplateHelpers::escapeHtml($basePath) ?>/js/jquery-1.4.2.min.js"></script>
          <script type="text/javascript" src="<?php echo TemplateHelpers::escapeHtml($basePath) ?>/js/jquery-ui-1.7.2.custom.min.js"></script>
          <script type="text/javascript" src="<?php echo TemplateHelpers::escapeHtml($basePath) ?>/js/jquery.ajaxform.js"></script>
          <script type="text/javascript" src="<?php echo TemplateHelpers::escapeHtml($basePath) ?>/js/jquery.livequery.js"></script>
          <script type="text/javascript" src="<?php echo TemplateHelpers::escapeHtml($basePath) ?>/js/jquery.nette.js"></script>
          <script type="text/javascript" src="<?php echo TemplateHelpers::escapeHtml($basePath) ?>/js/effects.js"></script>
          <script type="text/javascript" src="<?php echo TemplateHelpers::escapeHtml($basePath) ?>/js/LiveFormValidation.js"></script>
<?php
}}


//
// block menu
//
if (!function_exists($_cb->blocks['menu'][] = '_cbb8d3373550c_menu')) { function _cbb8d3373550c_menu() { extract(func_get_arg(0))
;if (SnippetHelper::$outputAllowed) { ?>
            <div id="navigation">
                <?php } $control->getWidget("menu")->render() ;if (SnippetHelper::$outputAllowed) { ?>
            </div>
            <div id="lang_menu">
                <ul>
                    <li><a href="<?php echo TemplateHelpers::escapeHtml($presenter->link("this", array('lang' => 'sk'))) ?>">SK</a></li>
                    <li><a href="<?php echo TemplateHelpers::escapeHtml($presenter->link("this", array('lang' => 'en'))) ?>">EN</a></li>
                </ul>
            </div>
            <div id="user_menu">
                <ul>
                    <li><span>semester: <?php echo TemplateHelpers::escapeHtml($semester) ?></span></li>
                    <li><span><?php echo TemplateHelpers::escapeHtml($user->name) ?> <?php echo TemplateHelpers::escapeHtml($user->surname) ?></span></li>
                    <li><a href="<?php echo TemplateHelpers::escapeHtml($control->link("logout!")) ?>"><?php echo TemplateHelpers::escapeHtml($template->translate('logout')) ?></a></li>
                </ul>
            </div>
            <?php } 
}}


//
// block popupcontent
//
if (!function_exists($_cb->blocks['popupcontent'][] = '_cbb29f5c09bc5_popupcontent')) { function _cbb29f5c09bc5_popupcontent() { extract(func_get_arg(0))
;if (SnippetHelper::$outputAllowed) { ?>
                <?php } 
}}

//
// end of blocks
//

if ($_cb->extends) { ob_start(); }

if (SnippetHelper::$outputAllowed) {
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="description" content="Diplomovy projekt" />
	<meta name="robots" content="NOINDEX, NOFOLLOW">

	<title><?php echo TemplateHelpers::escapeHtml($template->translate($module)) ;if (isset($title)): ?> - <?php echo TemplateHelpers::escapeHtml($template->translate($title)) ;endif ?></title>
<?php if (!$_cb->extends) { call_user_func(reset($_cb->blocks['css']), get_defined_vars()); }  if (!$_cb->extends) { call_user_func(reset($_cb->blocks['js']), get_defined_vars()); } ?>
</head>
<body>
    <div id="container">
        <div class="menu">
            <?php } if (!$_cb->extends) { call_user_func(reset($_cb->blocks['menu']), get_defined_vars()); }  if (SnippetHelper::$outputAllowed) { ?>
	</div>
	<div id="content">
<?php } if ($_cb->foo = SnippetHelper::create($control, "flash")) { $_cb->snippets[] = $_cb->foo ?>
            <?php } foreach ($iterator = $_cb->its[] = new SmartCachingIterator($flashes) as $flash): if (SnippetHelper::$outputAllowed) { ?>
                <div class="flash <?php echo TemplateHelpers::escapeHtml($flash->type) ?>"><?php echo TemplateHelpers::escapeHtml($flash->message) ?></div>
            <?php } endforeach; array_pop($_cb->its); $iterator = end($_cb->its) ;if (SnippetHelper::$outputAllowed) { array_pop($_cb->snippets)->finish(); } if (SnippetHelper::$outputAllowed) { ?>
        <?php } LatteMacros::callBlock($_cb->blocks, 'content', get_defined_vars()) ;if (SnippetHelper::$outputAllowed) { ?>
	</div>
    </div>
<?php } if ($_cb->foo = SnippetHelper::create($control, "popup")) { $_cb->snippets[] = $_cb->foo ?>
        <?php } if (isset($show_popup) and $show_popup == true): if (SnippetHelper::$outputAllowed) { ?>
            <div id="overlay"></div>
            <div class="popup">
            <a href="<?php echo TemplateHelpers::escapeHtml($control->link("closePopup!")) ?>" class="ajax"><div class="close_popup"></div></a>
                <?php } if (!$_cb->extends) { call_user_func(reset($_cb->blocks['popupcontent']), get_defined_vars()); }  if (SnippetHelper::$outputAllowed) { ?>
             </div>
        <?php } endif ;if (SnippetHelper::$outputAllowed) { array_pop($_cb->snippets)->finish(); } if (SnippetHelper::$outputAllowed) { ?>
</body>
</html>
</body>
</html>
<?php
}

if ($_cb->extends) { ob_end_clean(); LatteMacros::includeTemplate($_cb->extends, get_defined_vars(), $template)->render(); }
