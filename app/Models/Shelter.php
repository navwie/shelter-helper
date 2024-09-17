<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shelter extends Model
{
    use HasFactory;


    private $ID_user;
    private $Name;
    private $Address;
    private $Phone;
    private $Email;


    protected $table = 'Shelter';
}
