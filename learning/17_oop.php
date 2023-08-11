<?php
class User{
    // Properties are attributes that belong to a class
    //Access Modifiers; public. private,protected
    // public can be accessed from anywhere
    //private - can only be accessed from inside the class
    // protected- can only be accessed from in side the class and by inheriting classes

    public $name;
    public $email;
    public $password;

    // A c onstuctor is a method that runs when an object is created
    public function __construct($name, $email,$password){
        $this->name =$name;
        $this->email= $email;
        $this->password = $password;
    }

    // A method is a function that belongs to a class.
    function set_name($name){
        $this -> name = $name;
    }
    function get_name(){
        return $this->name;
    }
}
//Instiate a user object
$user1 = new User('Brad',"brad@gmail.com",'34344');
$user1 ->set_name('Brad');
echo $user1-> email ;

class Employee extends User {
    public function __construct($name, $email, $password, 
    $title)
    {
        parent::__construct($name,$email,$password);
        $this->title = $title;
    }
    public function get_title() {
        return $this->title;
    }
}

$employee1 = new Employee('Sara', 'sara@gmail.com', '43434','Manager');
echo $employee1->get_title();