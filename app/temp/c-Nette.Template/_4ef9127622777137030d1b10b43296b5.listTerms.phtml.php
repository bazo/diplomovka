<?php //netteCache[01]000239a:2:{s:4:"time";s:21:"0.15808100 1267718493";s:9:"callbacks";a:1:{i:0;a:3:{i:0;a:2:{i:0;s:5:"Cache";i:1;s:9:"checkFile";}i:1;s:84:"D:\www\skusky\document_root/../app/StudentModule/templates/MyCourses/listTerms.phtml";i:2;i:1267718490;}}}?><?php
// file …/StudentModule/templates/MyCourses/listTerms.phtml
//

$_cb = LatteMacros::initRuntime($template, NULL, '8af77d8fb6'); unset($_extends);


//
// block css
//
if (!function_exists($_cb->blocks['css'][] = '_cbba844f1215f_css')) { function _cbba844f1215f_css($_cb) { extract(func_get_arg(1))
;LatteMacros::callBlockParent($_cb, 'css', $template->getParams()) ?>
    <link type="text/css" href="<?php echo TemplateHelpers::escapeHtml($basePath) ?>/css/widgets/datagrid/datagrid.css" rel="stylesheet" />
<?php
}}


//
// block js
//
if (!function_exists($_cb->blocks['js'][] = '_cbb7181770a47_js')) { function _cbb7181770a47_js($_cb) { extract(func_get_arg(1))
;LatteMacros::callBlockParent($_cb, 'js', $template->getParams()) ?>
    <script type="text/javascript" src="<?php echo TemplateHelpers::escapeHtml($basePath) ?>/js/widgets/datagrid/datagrid.js"></script>
<?php
}}


//
// block sidebar
//
if (!function_exists($_cb->blocks['sidebar'][] = '_cbb841fe00dca_sidebar')) { function _cbb841fe00dca_sidebar($_cb) { extract(func_get_arg(1))
;if (SnippetHelper::$outputAllowed) { ?>
<div id="sidebar">
    <div class="course_list">
        <ul>
        <?php } foreach ($iterator = $_cb->its[] = new SmartCachingIterator($courses) as $course_row): if (SnippetHelper::$outputAllowed) { ?>
        <li>
            <a href="<?php echo TemplateHelpers::escapeHtml($presenter->link("listTerms", array('course_id' => $course_row->id,'course' => $course_row->name))) ?>" title="<?php echo TemplateHelpers::escapeHtml($course_row->name) ?>"><?php echo TemplateHelpers::escapeHtml($course_row->name) ?>, <?php echo TemplateHelpers::escapeHtml($course_row->year) ?>, <?php echo TemplateHelpers::escapeHtml($course_row->semester) ?></a>
        </li>
        <?php } endforeach; array_pop($_cb->its); $iterator = end($_cb->its) ;if (SnippetHelper::$outputAllowed) { ?>
        </ul>
    </div>
</div>
<?php } 
}}


//
// block content
//
if (!function_exists($_cb->blocks['content'][] = '_cbbc088336200_content')) { function _cbbc088336200_content($_cb) { extract(func_get_arg(1))
;if (SnippetHelper::$outputAllowed) { ?>
<div id="content">
    <div id="terms_list">
    <ol>
<?php } if ($_cb->foo = SnippetHelper::create($control, "terms")) { $_cb->snippets[] = $_cb->foo ?>
    <?php } foreach ($iterator = $_cb->its[] = new SmartCachingIterator($terms) as $exam): if (SnippetHelper::$outputAllowed) { ?>
        <li>
            
                <div class="term">
                    <p class="header">
                        <span class="date"><strong><?php echo TemplateHelpers::escapeHtml($template->translate('start')) ?>:</strong><?php echo TemplateHelpers::escapeHtml($template->date($exam->start_datetime, '%d.%m.%Y %H:%M')) ?></span>
                    </p>
                    <div class="left">
                    <p><strong><?php echo TemplateHelpers::escapeHtml($template->translate('deadline')) ?>:</strong> <?php echo TemplateHelpers::escapeHtml($template->date($exam->application_deadline, '%d.%m.%Y %H:%M')) ?><strong><?php echo TemplateHelpers::escapeHtml($template->translate('free places')) ?>:</strong> <?php echo TemplateHelpers::escapeHtml($exam->max_students - $exam->students_applied) ?></p>
                    <p>
                                            </p>
                    </div>
                    <div class="right">
                        <?php if (($exam->my_id !== null)): ?><div class="icon icon-success"></div><br /><br /><br /><br /><br />
                        <a href="<?php echo TemplateHelpers::escapeHtml($control->link("cancelApplication!", array('exam_id' => $exam->id,'popup' => false))) ?>" class="ajax add_new" title="<?php echo TemplateHelpers::escapeHtml($template->translate('Cancel application for exam from %d', $course)) ?>"><div class="icon_remove"></div><span><?php echo TemplateHelpers::escapeHtml($template->translate('Cancel application')) ?></span></a>
<?php endif ;if (($exam->my_id == null and $exam->max_students - $exam->students_applied != 0)): ?>
                        <a href="<?php echo TemplateHelpers::escapeHtml($control->link("applyForExam!", array('exam_id' => $exam->id,'popup' => false))) ?>" class="ajax add_new" title="<?php echo TemplateHelpers::escapeHtml($template->translate('Apply for exam from %d', $course)) ?>"><div class="icon_add"></div><span><?php echo TemplateHelpers::escapeHtml($template->translate('Apply')) ?></span></a>
<?php endif ;if ($exam->max_students - $exam->students_applied == 0): ?>
                        <p><strong><?php echo TemplateHelpers::escapeHtml($template->translate('Term full')) ?></strong></p>
<?php endif ?>
                    </div>
                    <p class="bottom"><a class="ajax" href="<?php echo TemplateHelpers::escapeHtml($control->link("showDetail!", array('exam_id' => $exam->id))) ?>"><?php echo TemplateHelpers::escapeHtml($template->translate('List of applied students')) ?></a></p>
                </div>
            
        </li>
    <?php } endforeach; array_pop($_cb->its); $iterator = end($_cb->its) ;if (SnippetHelper::$outputAllowed) { array_pop($_cb->snippets)->finish(); } if (SnippetHelper::$outputAllowed) { ?>
    </ol>
    </div>
</div>
<?php } 
}}


//
// block popup
//
if (!function_exists($_cb->blocks['popup'][] = '_cbb01c0dfa78d_popup')) { function _cbb01c0dfa78d_popup($_cb) { extract(func_get_arg(1))
;if (SnippetHelper::$outputAllowed) { ?>
    <h2></h2>
<?php if ($isStudentOnList == true): ?>
        <a href="<?php echo TemplateHelpers::escapeHtml($control->link("cancelApplication!", array('exam_id' => $exam_id))) ?>" class="ajax add_new" title="<?php echo TemplateHelpers::escapeHtml($template->translate('Cancel application for exam from %d', $course)) ?>"><div class="icon_remove"></div><span><?php echo TemplateHelpers::escapeHtml($template->translate('Cancel application')) ?></span></a>
<?php else: ?>
        <a href="<?php echo TemplateHelpers::escapeHtml($control->link("applyForExam!", array('exam_id' => $exam_id))) ?>" class="ajax add_new" title="<?php echo TemplateHelpers::escapeHtml($template->translate('Apply for exam from %d', $course)) ?>"><div class="icon_add"></div><span><?php echo TemplateHelpers::escapeHtml($template->translate('Apply')) ?></span></a>
<?php endif ;$control->getWidget("studentsGrid")->render() ;} 
}}

//
// end of blocks
//

if ($_cb->extends) { ob_start(); }
elseif (isset($presenter, $control) && $presenter->isAjax()) { LatteMacros::renderSnippets($control, $_cb, get_defined_vars()); }

if (SnippetHelper::$outputAllowed) {
if (!$_cb->extends) { call_user_func(reset($_cb->blocks['css']), $_cb, $template->getParams()); }  if (!$_cb->extends) { call_user_func(reset($_cb->blocks['js']), $_cb, $template->getParams()); }  } if (!$_cb->extends) { call_user_func(reset($_cb->blocks['sidebar']), $_cb, $template->getParams()); }  if (SnippetHelper::$outputAllowed) { $heading = $course ;} if (!$_cb->extends) { call_user_func(reset($_cb->blocks['content']), $_cb, $template->getParams()); }  if (SnippetHelper::$outputAllowed) { } if (!$_cb->extends) { call_user_func(reset($_cb->blocks['popup']), $_cb, $template->getParams()); }  if (SnippetHelper::$outputAllowed) { 
}

if ($_cb->extends) { ob_end_clean(); LatteMacros::includeTemplate($_cb->extends, get_defined_vars(), $template)->render(); }
