<?php //netteCache[01]000237a:2:{s:4:"time";s:21:"0.83068800 1267478777";s:9:"callbacks";a:1:{i:0;a:3:{i:0;a:2:{i:0;s:5:"Cache";i:1;s:9:"checkFile";}i:1;s:82:"D:\www\skusky\document_root/../app/StudentModule/templates/MyCourses/default.phtml";i:2;i:1267478719;}}}?><?php
// file …/StudentModule/templates/MyCourses/default.phtml
//

$_cb = LatteMacros::initRuntime($template, NULL, '9479903aa6'); unset($_extends);


//
// block content
//
if (!function_exists($_cb->blocks['content'][] = '_cbb51a585095f_content')) { function _cbb51a585095f_content($_cb) { extract(func_get_arg(1))
;foreach ($iterator = $_cb->its[] = new SmartCachingIterator($courses) as $course): ?>
    <a href="<?php echo TemplateHelpers::escapeHtml($presenter->link("listTerms", array('course_id' => $course->id,'course' => $course->name))) ?>" title="$course"><?php echo TemplateHelpers::escapeHtml($course->name) ?>, <?php echo TemplateHelpers::escapeHtml($course->year) ?>, <?php echo TemplateHelpers::escapeHtml($course->semester) ?></a>
<?php endforeach; array_pop($_cb->its); $iterator = end($_cb->its) ;
}}

//
// end of blocks
//

if ($_cb->extends) { ob_start(); }
elseif (isset($presenter, $control) && $presenter->isAjax()) { LatteMacros::renderSnippets($control, $_cb, get_defined_vars()); }

if (SnippetHelper::$outputAllowed) {
?>
/**
 * @version default.phtml 25.2.2010
 */
<?php $heading = 'My courses' ;if (!$_cb->extends) { call_user_func(reset($_cb->blocks['content']), $_cb, $template->getParams()); }  
}

if ($_cb->extends) { ob_end_clean(); LatteMacros::includeTemplate($_cb->extends, get_defined_vars(), $template)->render(); }
