<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Mail\OtpMail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Mail;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function role()
    {
        return $this->belongsTo(role::class);
    }

    public static function GenerateOtp(Request $request)
    {

        $otp = random_int(11111,99999);

        $emailExists =  self::query()->where('email',$request->get('email'));

       if ($emailExists->exists())
       {
           $user = $emailExists->first();

           $user->update([
               'password' => bcrypt($otp)
           ]);
       }
       else
       {
           $user = User::query()->create([
               'email' => $request->get('email'),
               'role_id' =>role::FindByTitle('user')->id,
               'password' => bcrypt($otp)
           ]);
       }



        Mail::to($user->email)->send( new OtpMail($otp));

        return $user;
    }

    public function likes()
    {
        return $this->belongsToMany(product::class , 'likes')
            ->withTimestamps();
    }

    public function like($product)
    {
        $likedBefore = $this->likes()->where('id', $product)->exists();

        if ($likedBefore)
        {
            $this->likes()->detach($product);
        }
        else
        {
            $this->likes()->attach($product);
        }
    }

    public function GetUserLikes(product $product)
    {
      $like = $this->likes()->where('id' ,$product->id)->exists();
        if ($like)
        {
            return true;
        }

    }
}
