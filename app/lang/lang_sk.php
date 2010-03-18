<?php
class Inflexion_sk
{
    public function inflex($count)
    {
        switch ($count) {
            case 1:
                $int = 1;
            break;
            case 2:
            case 3:
                $int = 2;
            break;
            default:
                $int = 5;
            break;
        }
        return $int;
    }
}

class Dictionary_sk
{
    public $dictionary = array(
        'student' => 'študent',
        'teacher' => 'pedagóg',
        'calendar' => 'kalendár',
        'my courses' => 'moje predmety',
        'logout' => 'odhlásiť',
        'courses' => 'predmety',
        'exam terms' => 'termíny skúšok',
        'courses list' => 'zoznam predmetov',
        'add term' => 'pridať termín',
        'start' => 'začiatok',
        'deadline' => 'deadline',
        'max students' => 'počet miest',
        'min seminar points' => 'min. počet bodov zo seminára',
        'edit' => 'upraviť',
        'delete' => 'zmazať',
        'list of students' => 'zoznam študentov',
        'new term' => 'nový termín',
        'edit term' => 'upraviť termín',
        'term added' => 'termín pridaný',
        'term updated' => 'termín upravený',
        'exam room and time' => 'miestnosť a čas',
        'room' => 'miestnosť',
        'date' => 'dátum',
        'start time' => 'začiatok',
        'application deadline' => 'deadline na prihlásenie',
        'time' => 'čas',
        'conditions' => 'podmienky',
        'student limit' => 'počet miest',
        'minimum points' => 'min. počet bodov',
        'note' => 'poznámka',
        'please select' => 'prosím vyberte',
        'list of applied students' => 'zoznam prihlásených študentov',
        'free places' => 'voľné miesta',
        'apply' => 'prihlásiť',
        'cancel application' => 'odhlásiť',
        'you have canceled your application.' => 'odhlásili ste sa',
        'you have applied for this exam.' => 'prihlásili ste sa',
        'exam is already full' => 'termín je už plný',
        'term full' => 'termín je už plný',

    ); 
    
    public function getDictionary()
    {
        return $this->dictionary;
    }
}
?>
