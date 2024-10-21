<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;


class CommunityLink extends Model
{
    use HasFactory;
    protected $fillable = [
        'channel_id',
        'title',
        'link'
    ];



    public function creator()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function channel()
    {
        return $this->belongsTo(Channel::class);
    }

    public function hasAlreadyBeenSubmitted()
    {
        $existing = static::where('link', $this->link)->first();//comprueba si un link ya existe
        if ($existing) { //Si es repetido va a devolver verdadero
            if (Auth::user()->isTrusted()) {  //pregunta si el usuario es confiable para subir links
                $existing->touch();             //actualiza la fecha y hora a la actual
                if ($existing->approved == 0) //Si no esta aprobado, lo aprueba para mostralo
                    $existing->approved = 1;
                $existing->save();          //Lo guarda
                session()->flash('success', 'The link already exists and its timestamp has been updated.');
                return true;  //Manda el mensaje de confirmación.
            } else { //Si no es confiable, no actualiza y manda un mensaje. En función de que si esta o no aprobado el link, lo indicará en el mensaje
                if ($existing->approved)
                    session()->flash('failure', 'The link already exists and it is already approved but you are not a trusted user, so it will not be updated in the list.');
                else
                    session()->flash('failure', 'The link already exists and it is pending for approval but you are not a trusted user, so it will not be updated in the list.');
            }
            return true;
        }
        return false;
    }
}
