<?php //netteCache[01]000239a:2:{s:4:"time";s:21:"0.55520200 1267149450";s:9:"callbacks";a:1:{i:0;a:3:{i:0;a:2:{i:0;s:5:"Cache";i:1;s:9:"checkFile";}i:1;s:84:"D:\www\skusky\document_root/../app/StudentModule/templates/MyCourses/listTerms.phtml";i:2;i:1267148900;}}}?><?php
// file …/StudentModule/templates/MyCourses/listTerms.phtml
//

$_cb = LatteMacros::initRuntime($template, NULL, '8adad586a0'); unset($_extends);


//
// block css
//
if (!function_exists($_cb->blocks['css'][] = '_cbbd0498e86d4_css')) { function _cbbd0498e86d4_css() { extract(func_get_arg(0))
;LatteMacros::callBlockParent($_cb->blocks, 'css', get_defined_vars()) ?>
    <link type="text/css" href="<?php echo TemplateHelpers::escapeHtml($basePath) ?>/css/widgets/datagrid/datagrid.css" rel="stylesheet" />
<?php
}}


//
// block js
//
if (!function_exists($_cb->blocks['js'][] = '_cbb4a66c26f52_js')) { function _cbb4a66c26f52_js() { extract(func_get_arg(0))
;LatteMacros::callBlockParent($_cb->blocks, 'js', get_defined_vars()) ?>
    <script type="text/javascript" src="<?php echo TemplateHelpers::escapeHtml($basePath) ?>/js/widgets/datagrid/datagrid.js"></script>
<?php
}}


//
// block content
//
if (!function_exists($_cb->blocks['content'][] = '_cbbee436bd87b_content')) { function _cbbee436bd87b_content() { extract(func_get_arg(0))
;if (SnippetHelper::$outputAllowed) { ?>
    <div id="sidebar_course_list">
        <?php } foreach ($iterator = $_cb->its[] = new SmartCachingIterator($courses) as $course_row): if (SnippetHelper::$outputAllowed) { ?>
        <a href="<?php echo TemplateHelpers::escapeHtml($presenter->link("listTerms", array('course_id' => $course_row->id,'course' => $course_row->name))) ?>" title="<?php echo TemplateHelpers::escapeHtml($course_row->name) ?>"><?php echo TemplateHelpers::escapeHtml($course_row->name) ?>, <?php echo TemplateHelpers::escapeHtml($course_row->year) ?>, <?php echo TemplateHelpers::escapeHtml($course_row->semester) ?></a>
        <?php } endforeach; array_pop($_cb->its); $iterator = end($_cb->its) ;if (SnippetHelper::$outputAllowed) { ?>
    </div>
    <h1><?php echo TemplateHelpers::escapeHtml($course) ?></h1>
    <ol>
    <?php } foreach ($iterator = $_cb->its[] = new SmartCachingIterator($terms) as $exam): if (SnippetHelper::$outputAllowed) { ?>
        <li><a href="<?php echo TemplateHelpers::escapeHtml($control->link("showDetail!", array('exam_id' => $exam->id))) ?>"><?php echo TemplateHelpers::escapeHtml($template->translate('start')) ?>: <?php echo TemplateHelpers::escapeHtml($exam->start_datetime) ?>, <?php echo TemplateHelpers::escapeHtml($template->translate('deadline')) ?>: <?php echo TemplateHelpers::escapeHtml($exam->application_deadline) ?>, <?php echo TemplateHelpers::escapeHtml($template->translate('max_students')) ?>: <?php echo TemplateHelpers::escapeHtml($exam->max_students) ?>, <?php echo TemplateHelpers::escapeHtml($template->translate('min seminar points')) ?>: <?php echo TemplateHelpers::escapeHtml($exam->min_seminar_points) ?></a></li>
    <?php } endforeach; array_pop($_cb->its); $iterator = end($_cb->its) ;if (SnippetHelper::$outputAllowed) { ?>
    </ol>
<?php } 
}}


//
// block popupcontent
//
if (!function_exists($_cb->blocks['popupcontent'][] = '_cbb847719660d_popupcontent')) { function _cbb847719660d_popupcontent() { extract(func_get_arg(0))
;if (SnippetHelper::$outputAllowed) { ?>
    <h2></h2>
    <a href="<?php echo TemplateHelpers::escapeHtml($control->link("applyForExam!", array('exam_id' => $exam_id))) ?>" class="ajax add_new" title="<?php echo TemplateHelpers::escapeHtml($template->translate('Apply for exam from %d', $course)) ?>"><div class="icon_add"></div><span><?php echo TemplateHelpers::escapeHtml($template->translate('Apply')) ?></span></a>
    <?php } $control->getWidget("studentsGrid")->render() ;if (SnippetHelper::$outputAllowed) { } 
}}

//
// end of blocks
//

if ($_cb->extends) { ob_start(); }

if (SnippetHelper::$outputAllowed) {
if (!$_cb->extends) { call_user_func(reset($_cb->blocks['css']), get_defined_vars()); }  if (!$_cb->extends) { call_user_func(reset($_cb->blocks['js']), get_defined_vars()); }  } if (!$_cb->extends) { call_user_func(reset($_cb->blocks['content']), get_defined_vars()); }  if (SnippetHelper::$outputAllowed) { } if (!$_cb->extends) { call_user_func(reset($_cb->blocks['popupcontent']), get_defined_vars()); }  if (SnippetHelper::$outputAllowed) { 
}

if ($_cb->extends) { ob_end_clean(); LatteMacros::includeTemplate($_cb->extends, get_defined_vars(), $template)->render(); }
