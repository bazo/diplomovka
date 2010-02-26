<?php
/**
 * Description of Student
 *
 * @author Martin
 */
class Student extends Object
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
     *  Contains id of year the user belongs to
     */
    public $year;

    /** @var ArrayList
     *  Array of assigned courses to teacher
     */
    public $courses;
    public $allowed_courses;
    public function __construct()
    {
        $this->courses = new ArrayList();
        $this->allowed_courses = new ArrayList();
    }

}
?>
