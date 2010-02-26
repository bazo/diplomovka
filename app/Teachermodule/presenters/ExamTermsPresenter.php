<?php
/* 
 * 
 * 
 */

/**
 * Description of ExamTermsPresenter
 *
 * @author Martin
 */
class Teacher_ExamTermsPresenter extends Teacher_BasePresenter
{
    /**
     * @persistent
     * @var integer 
     */
    public $course_id;
    public $course;

    public function actionDefault()
    {
        $teacher = $this->getUser()->getIdentity();
        $this->template->courses = (array)$teacher->courses;
    }

    public function actionListTerms($course_id, $course)
    {
       $teacher = $this->getUser()->getIdentity();
       $course_terms = ExamTerms::getTermsListOfTeacher($course_id, $teacher->id);
       $this->template->course_id = $course_id;
       $this->template->course = $course;
       $this->template->courses = $teacher->courses;
       $this->template->course_terms = $course_terms;
    }

    public function handleAddTerm($course_id, $course)
    {
        $this->course = $course;
        $this->template->show_popup = true;
        $this->invalidateControl('popup');
    }

    public function renderListTerms()
    {
    }

    public function Form_addDatePicker(Form $_this, $name, $label, $cols = NULL, $maxLength = NULL)
    {
        return $_this[$name] = new DatePicker($label, $cols, $maxLength);
    }

    public function Form_addTimePicker(Form $_this, $name, $label, $cols = NULL, $maxLength = NULL)
    {
        return $_this[$name] = new TimePicker($label, $cols, $maxLength);
    }

    public function Form_addNumericUpDown(Form $_this, $name, $label)
    {
        return $_this[$name] = new NumericUpDown($name);
    }

    public function createComponentFormAddTerm($name)
    {
        Form::extensionMethod('addDatePicker', array($this, 'Form_addDatePicker') );
        Form::extensionMethod('addTimePicker', array($this, 'Form_addTimePicker') );
        Form::extensionMethod('addNumericUpDown', array($this, 'Form_addNumericUpDown') );
        $form = new LiveForm($this, $name);
        $form->addGroup('Exam date and time');
            $form->addDatePicker('start_date', 'Date:', 10)->addRule(Form::FILLED, 'Please select a starting date');
            $form->addTimePicker('start_date_time', 'Start time:', 10)->addRule(Form::FILLED, 'Please select a starting time');
        $form->addGroup('Application deadline');
            $form->addDatePicker('deadline_date', 'Date:', 10)->addRule(Form::FILLED, 'Please select an application deadline date');
            $form->addTimePicker('deadline_date_time', 'Time:', 10)->addRule(Form::FILLED, 'Please select an application deadline time');
        $form->addGroup('Conditions');
            $form->addText('max_students', 'Student limit:')
                    ->addRule(Form::FILLED, 'Please enter a student limit.')
                    ->addRule(Form::NUMERIC, 'Limit must be numeric');
            $form->addText('min_seminar_points', 'Minimum points:')
                    ->addCondition(Form::FILLED)
                    ->addRule(Form::NUMERIC, 'Limit must be numeric');
        $form->addGroup('Note');
            $form->addTextArea('note');
        $form->addHidden('course_id')->setValue($this->course_id);
        $form->addSubmit('btnSubmit', 'Save')->onClick[] = callback($this, 'FormAddTermSubmitted');
        if($this->isSignalReceiver($this[$name])) $this->template->show_popup = true;
        return $form;
    }

    public function FormAddTermSubmitted(Button $button)
    {
        $values = $button->getForm()->getValues();
        $start_datetime = $values['start_date'].' '.$values['start_date_time'];
        unset($values['start_date']);
        unset($values['start_date_time']);
        $values['start_datetime'] = $start_datetime;
        $application_deadline = $values['deadline_date'].' '.$values['deadline_date_time'];
        unset($values['deadline_date']);
        unset($values['deadline_date_time']);
        $values['application_deadline'] = $application_deadline;
        $teacher_id = $this->getUser()->getId();
        $values['teacher_id'] = (int)$teacher_id;
        $values['min_seminar_points'] = (int)$values['min_seminar_points'];
        ExamTerms::add($values);
        $this->template->show_popup = false;
        $this->invalidateControl('popup');
        $this->redirect('this');
    }

    public function actionTermDetail($term_id)
    {
        $term_id = (int)$term_id;
        $list = ExamStudentListManager::getExamList($term_id);
    }
}
?>