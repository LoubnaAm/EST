<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Historique extends Model
{
    use HasFactory;

    protected $fillable = ['admin_id', 'action', 'details'];

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
    public static function log($action, $details = null)
    {
        self::create([
            'admin_id' => auth()->guard('admin')->id(),
            'action' => $action,
            'details' => $details,
        ]);
    }
}
