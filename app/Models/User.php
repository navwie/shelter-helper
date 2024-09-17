<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class User extends Model
{
    use HasFactory;

    private $Name;
    private $Surname;
    private $Email;
    private $Phone;
    private $Password;
    private $Role;


    protected $table = 'User';
}
