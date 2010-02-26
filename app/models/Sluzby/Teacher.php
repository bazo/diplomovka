<?php
/**
 * Description of Teacher
 *
 * @author Martin
 */
class Teacher extends Object
{
    /** @var integer */
    public $id;
    /** @var string */
    public $name;
    /** @var string */
    public $surname;
    /** @var string */
    public $email;
    /** @var string */
    public $password;
    /** @var integer
     *  Contains id of department the teacher belongs to
     */
    public $department;
    /** @var ArrayList
     *  Array of assigned courses to teacher
     */
    public $courses;

    public function __construct()
    {
        $this->courses = new ArrayList();
    }
}
?>
