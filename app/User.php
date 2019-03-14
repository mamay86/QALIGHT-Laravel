<?php
namespace App;
use Illuminate\Notifications\Notifiable;
//use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Hash;
use App\Traits\HasRoles;
class User extends Authenticatable// implements MustVerifyEmail
{
    use Notifiable;
    use SoftDeletes;
    use HasRoles;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function isOnline()
    {
        return \Cache::has('user-is-online-' . $this->id);
    }
    /**
     * Атрибуты, которые должны быть преобразованы в даты.
     * @var array
     */
    protected $dates = [
        'deleted_at',
    ];
    /**
     * Scope a query to only include posts of a given type.
     *
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @param  mixed $type
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public static function scopeTrash($query, $id)
    {
        return $query->withTrashed()->where('id', $id)->first();
    }
    public function setPasswordAttribute($input)
    {
        if ($input)
            $this->attributes['password'] = app('hash')->needsRehash($input) ? Hash::make($input) : $input;
    }
    public function profile()
    {
        return $this->hasOne('App\Profile');
    }
    public function social()
    {
        return $this->hasMany('App\Social');
    }
//    public function roles()
//    {
//        return $this->belongsToMany(Role::class, 'role_user');
//    }

    /**
     * Checks a Permission
     */
    public function isSuperVisor()
    {
        if ($this->roles->contains('slug', 'super-visor')) {
            return true;
        }
        return false;
    }

}