<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactSetting extends Model
{
    protected $fillable = ['email', 'whatsapp', 'linkedin', 'instagram', 'github', 'cta_text'];
}
