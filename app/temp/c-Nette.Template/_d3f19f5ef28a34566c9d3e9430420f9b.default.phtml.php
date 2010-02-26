<?php //netteCache[01]000237a:2:{s:4:"time";s:21:"0.72477100 1267142827";s:9:"callbacks";a:1:{i:0;a:3:{i:0;a:2:{i:0;s:5:"Cache";i:1;s:9:"checkFile";}i:1;s:82:"D:\www\skusky\document_root/../app/StudentModule/templates/MyCourses/default.phtml";i:2;i:1267137104;}}}?><?php
// file …/StudentModule/templates/MyCourses/default.phtml
//

$_cb = LatteMacros::initRuntime($template, NULL, 'c2655fa76c'); unset($_extends);


//
// block content
//
if (!function_exists($_cb->blocks['content'][] = '_cbb4caf2bfe5a_content')) { function _cbb4caf2bfe5a_content() { extract(func_get_arg(0))
;foreach ($iterator = $_cb->its[] = new SmartCachingIterator($courses) as $course): ?>
    <a href="<?php echo TemplateHelpers::escapeHtml($presenter->link("listTerms", array('course_id' => $course->id,'course' => $course->name))) ?>" title="$course"><?php echo TemplateHelpers::escapeHtml($course->name) ?>, <?php echo TemplateHelpers::escapeHtml($course->year) ?>, <?php echo TemplateHelpers::escapeHtml($course->semester) ?></a>
<?php endforeach; array_pop($_cb->its); $iterator = end($_cb->its) ;
}}

//
// end of blocks
//

if ($_cb->extends) { ob_start(); }

if (SnippetHelper::$outputAllowed) {
?>
/**
 * @version default.phtml 25.2.2010
 */

<?php if (!$_cb->extends) { call_user_func(reset($_cb->blocks['content']), get_defined_vars()); }  
}

if ($_cb->extends) { ob_end_clean(); LatteMacros::includeTemplate($_cb->extends, get_defined_vars(), $template)->render(); }
