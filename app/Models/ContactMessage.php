<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactMessage extends Model
{
    protected $table = 'contact_messages';

 protected $fillable = [
        'h_name',
        'h_email',
        'h_phone',
        'h_subject',
        'form_message',
    ];
}
