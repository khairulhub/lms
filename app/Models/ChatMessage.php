<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ChatMessage extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function sender(){
        return $this->belongsTo(User::class, 'sender_id','id');
    }
    public function receiver(){
        return $this->belongsTo(User::class, 'receiver_id','id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'sender_id' ,'id');
    }

}
