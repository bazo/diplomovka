<?php
/* 
 * 
 * 
 */

/**
 * Description of ExamManagerPresenter
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
    private $exam_id;

    public function actionDefault()
    {
        $teacher = $this->getUser()->getIdentity();
        $this->template->courses = (array)$teacher->courses;
    }

    public function actionListTerms($course_id, $course)
    {
       $teacher = $this->getUser()->getIdentity();
       $course_terms = ExamManager::getExamsListOfTeacher($course_id, $teacher->id);
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

    public function handleEditTerm($exam_id)
    {
        $this->exam_id = $exam_id;
        $this->template->edit = true;
        $this->template->show_popup = true;
        $this->invalidateControl('popup');
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
        $form->getElementPrototype()->class('ajax');
        $form->addGroup('Exam room and time');
            $rooms = SchoolManager::getRooms();
            $rooms = array('0' => 'Please select') + $rooms;
            $form->addSelect('room', 'Room', $rooms)->addRule(Form::FILLED, 'Please select a room')->skipFirst();
            $form->addDatePicker('start_date', 'Date', 10)->addRule(Form::FILLED, 'Please select a starting date');
            $form->addTimePicker('start_date_time', 'Start time', 10)->addRule(Form::FILLED, 'Please select a starting time');
        $form->addGroup('Application deadline');
            $form->addDatePicker('deadline_date', 'Date', 10)->addRule(Form::FILLED, 'Please select an application deadline date');
            $form->addTimePicker('deadline_date_time', 'Time', 10)->addRule(Form::FILLED, 'Please select an application deadline time');
        $form->addGroup('Conditions');
            $form->addText('max_students', 'Student limit')
                    ->addRule(Form::FILLED, 'Please enter a student limit.')
                    ->addRule(Form::NUMERIC, 'Limit must be numeric');
            $form->addText('min_seminar_points', 'Minimum points')
                    ->addCondition(Form::FILLED)
                    ->addRule(Form::NUMERIC, 'Limit must be numeric');
        $form->addGroup('Note')->setOption('container', Html::el('fieldset')->class('no-label'));
            $form->addTextArea('note');
        $form->addHidden('course_id')->setValue($this->course_id);
        $form->addHidden('id');
        $form->addSubmit('btnSubmit', 'Save')->onClick[] = callback($this, 'FormAddTermSubmitted');
        if($this->isSignalReceiver($this[$name])) $this->template->show_popup = true;
        if(isset($this->exam_id))
        {
            $session = Environment::getSession('exam_terms_edit_form_'.$this->exam_id);
            if(isset($session['form_data'])) $form_data = $session->form_data;
            else
            {
               $form_data = ExamManager::getExam($this->exam_id);
               $form_data->start_date = $form_data->start_datetime;
               $form_data->deadline_date = $form_data->application_deadline;
               $form_data->start_date_time = $form_data->start_datetime;
               $form_data->deadline_date_time = $form_data->application_deadline;
               $session->form_data = $form_data;
            }
            $form->setDefaults($form_data);
            $form['id']->setValue($this->exam_id);
            
        }
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
        try{
            $session = Environment::getSession('exam_terms_edit_form_'.$values['id']);
            if(isset($session['form_data']))
            {
                ExamManager::update($values);
                $this->flashMessage('Term updated', 'success');
            }
            else
            {
                ExamManager::add($values);
                unset($session['form_data']);
                $this->flashMessage('Term added', 'success');
            }
            
            $this->template->show_popup = false;
            $this->invalidateControl('popup');
            $this->invalidateControl('flash');
            /*if(!$this->isAjax())*/$this->redirect('this');
        }
        catch(DibiException $e)
        {
            $this->flashMessage($e->getMessage(), 'error');
            $this->invalidateControl('popup_flash');
        }
        
        
    }

    public function actionTermDetail($term_id)
    {
        $this->exam_id = (int)$term_id;
        $exam = ExamManager::getExam($term_id);
        $this->template->exam = $exam;
    }

    public function createComponentStudentsGrid($name)
    {
        $grid = new DataGrid($this, $name);
        $examStudentList = ExamStudentListManager::getList($this->exam_id);
        $grid->bindDataTable($examStudentList->dataSource);
        $grid->addNumericColumn('id', 'Num');
        $pos = 0;
        $grid['id']->formatCallback[] = function($value, DibiRow $data) use(&$pos){
          return $pos = $pos + 1;
        };
        $grid->addColumn('name', 'Name');
        $grid['name']->formatCallback[] = function($value, DibiRow $data){
            return $data->surname.' '.$data->name;
        };
        return $grid;
    }
}
?>