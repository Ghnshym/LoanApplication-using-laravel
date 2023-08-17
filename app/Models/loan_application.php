<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\NotificationRecipient; 

class loan_application extends Model
{
    use HasFactory, NotificationRecipient; 
  
}

