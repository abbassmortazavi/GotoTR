<?php

namespace App\Models;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class ActivationCode extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeCreateCode($query , $user)
    {
        $code = $this->code();

        return $query->create([
            'user_id' =>$user->id,
            'code' => $code,
            'tell' => $user->tell,
            'expire' =>Carbon::now()->addHours(5)
        ]);
    }

    private function code()
    {
        do {
            $code = rand(1111,9999);
            $check_code = static::whereCode($code)->get();
        }
        while (! $check_code->isEmpty());
        return $code;
    }
}
