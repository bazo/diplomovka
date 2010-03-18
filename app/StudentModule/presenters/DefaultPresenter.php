<?php
class Student_DefaultPresenter extends Student_BasePresenter
{
    public function actionDefault()
    {
        $this->template->event_url = $this->link('getEvents!');
    }

    public function handleGetEvents()
    {
        $student = $this->getUser()->getIdentity()->student;
        $events = EventManager::getEvents($student);
        fd($events);
        $this->terminate( new JsonResponse($events) );
    }
}
?>