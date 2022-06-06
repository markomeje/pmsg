<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supporter extends Model
{
    use HasFactory;

    /**
     * Supporter titles
     * 
     * @type array
     */
    public static $titles = ['Bar.', 'mr.', 'Engr.', 'mrs.', 'dr.', 'prof.', 'comrd.'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'firstname',
        'lastname',
        'lga',
        'title',
        'email',
        'phone',
    ];

    /**
     * Enugu state LGA
     * 
     * @type array
     */
    public static $lgas = [
        'Aninri',
        'Awgu',
        'Enugu East',
        'Enugu North',
        'Enugu South',
        'Ezeagu',
        'Igbo Etiti',
        'Igbo Eze North',
        'Igbo Eze South',
        'Isi Uzo',
        'Nkanu East',
        'Nkanu West',
        'Nsukka',
        'Oji River',
        'Udenu',
        'Udi',
        'Uzo-Uwani'
    ];
}
