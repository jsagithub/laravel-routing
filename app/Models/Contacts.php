<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contacts
{
    private $id;
    private $name;
    public $email;

    public function __construct($id =1, $name='John Doe', $email='email@email.com') {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
    }

}
