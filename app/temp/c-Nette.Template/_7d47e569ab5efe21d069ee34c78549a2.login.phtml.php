<?php //netteCache[01]000250a:2:{s:4:"time";s:21:"0.30752300 1267476020";s:9:"callbacks";a:1:{i:0;a:3:{i:0;a:2:{i:0;s:5:"Cache";i:1;s:9:"checkFile";}i:1;s:95:"D:\www\skusky\document_root/../app/StudentModule/templates/Login/../../../templates/login.phtml";i:2;i:1267475932;}}}?><?php
// file …/StudentModule/templates/Login/../../../templates/login.phtml
//

$_cb = LatteMacros::initRuntime($template, true, '55fbd969c0'); unset($_extends);


//
// block css
//
if (!function_exists($_cb->blocks['css'][] = '_cbbc541638742_css')) { function _cbbc541638742_css($_cb) { extract(func_get_arg(1))
?>
    <link type="text/css" href="<?php echo TemplateHelpers::escapeHtml($basePath) ?>/css/layout.css" rel="stylesheet" />
    <link type="text/css" href="<?php echo TemplateHelpers::escapeHtml($basePath) ?>/css/login.css" rel="stylesheet" />
               <link type="text/css" href="<?php echo TemplateHelpers::escapeHtml($basePath) ?>/css/<?php echo TemplateHelpers::escapeHtml($module) ?>/login.css" rel="stylesheet" />
<?php
}}


//
// block content
//
if (!function_exists($_cb->blocks['content'][] = '_cbb5e0c0e3a42_content')) { function _cbb5e0c0e3a42_content($_cb) { extract(func_get_arg(1))
?>
	<div id="small_module_chooser">
		<ul>
			<li>
				<a href="<?php echo TemplateHelpers::escapeHtml($presenter->link(":Student:Login:default")) ?>"><div class="btn student"><?php echo TemplateHelpers::escapeHtml($template->translate('Student')) ?></div></a>
			</li>
			<li>
				<a href="<?php echo TemplateHelpers::escapeHtml($presenter->link(":Teacher:Login:default")) ?>"><div class="btn teacher"><?php echo TemplateHelpers::escapeHtml($template->translate('Teacher')) ?></div></a>
			</li>
			<li>
				<a href="<?php echo TemplateHelpers::escapeHtml($presenter->link(":Admin:Login:default")) ?>"><div class="btn teacher"><?php echo TemplateHelpers::escapeHtml($template->translate('Admin')) ?></div></a>
			</li>
		</ul>
	</div>
<?php $control->getWidget("formLogin")->render() ;
}}

//
// end of blocks
//

if ($_cb->extends) { ob_start(); }
elseif (isset($presenter, $control) && $presenter->isAjax()) { LatteMacros::renderSnippets($control, $_cb, get_defined_vars()); }

if (SnippetHelper::$outputAllowed) {
} $_cb->extends = "@layout.phtml" ;if (SnippetHelper::$outputAllowed) {   
}

if ($_cb->extends) { ob_end_clean(); LatteMacros::includeTemplate($_cb->extends, get_defined_vars(), $template)->render(); }
