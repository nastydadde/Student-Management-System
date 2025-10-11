<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class AdminPermission extends Model
{
    protected $table = 'admin_permissions'; // ✅ Explicit table name
    protected $fillable = ['user_id', 'department', 'semester', 'division'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
