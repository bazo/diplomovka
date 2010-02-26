<?php //netteCache[01]000250a:2:{s:4:"time";s:21:"0.43827400 1267142819";s:9:"callbacks";a:1:{i:0;a:3:{i:0;a:2:{i:0;s:5:"Cache";i:1;s:9:"checkFile";}i:1;s:95:"D:\www\skusky\document_root/../app/StudentModule/templates/Login/../../../templates/login.phtml";i:2;i:1266969208;}}}?><?php
// file …/StudentModule/templates/Login/../../../templates/login.phtml
//

$_cb = LatteMacros::initRuntime($template, NULL, '2be4887064'); unset($_extends);


//
// block css
//
if (!function_exists($_cb->blocks['css'][] = '_cbb9f76d86569_css')) { function _cbb9f76d86569_css() { extract(func_get_arg(0))
?>
	        <link type="text/css" href="<?php echo TemplateHelpers::escapeHtml($basePath) ?>/css/login.css" rel="stylesheet" />
                <link type="text/css" href="<?php echo TemplateHelpers::escapeHtml($basePath) ?>/css/<?php echo TemplateHelpers::escapeHtml($module) ?>/login.css" rel="stylesheet" />
<?php
}}


//
// block menu
//
if (!function_exists($_cb->blocks['menu'][] = '_cbbe1ff89df7e_menu')) { function _cbbe1ff89df7e_menu() { extract(func_get_arg(0))
;
}}


//
// block content
//
if (!function_exists($_cb->blocks['content'][] = '_cbb1840fe141d_content')) { function _cbb1840fe141d_content() { extract(func_get_arg(0))
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

if (SnippetHelper::$outputAllowed) {
if (!$_cb->extends) { call_user_func(reset($_cb->blocks['css']), get_defined_vars()); }  if (!$_cb->extends) { call_user_func(reset($_cb->blocks['menu']), get_defined_vars()); }  if (!$_cb->extends) { call_user_func(reset($_cb->blocks['content']), get_defined_vars()); }  
}

if ($_cb->extends) { ob_end_clean(); LatteMacros::includeTemplate($_cb->extends, get_defined_vars(), $template)->render(); }
