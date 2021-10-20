<?php

// namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Foundation\Auth\User as Authenticatable;
// use Illuminate\Notifications\Notifiable;
// use Laravel\Sanctum\HasApiTokens;

// class User extends Authenticatable
// {
//     use HasApiTokens, HasFactory, Notifiable;

//     protected $table = "santri";
//     protected $primaryKey = 'uid';
//     public $incrementing = false;
//     public $timestamps = false;

//     /**
//      * The attributes that are mass assignable.
//      *
//      * @var string[]
//      */
//     // protected $fillable = [
//     //     'name',
//     //     'email',
//     //     'password',
//     // ];
//     protected $guarded = [
//         'uid'
//     ];

//     /**
//      * The attributes that should be hidden for serialization.
//      *
//      * @var array
//      */
//     protected $hidden = [
//         'passwd', 'remember_token',
//     ];

//     /**
//      * The attributes that should be cast.
//      *
//      * @var array
//      */
//     protected $casts = [
//         'email_verified_at' => 'datetime',
//     ];

//     public function getAuthPassword()
//     {
//         return $this->passwd;
//     }
// }

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = "santri";
    protected $primaryKey = 'uid';
    public $incrementing = false;
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        'uid'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'passwd', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getAuthPassword()
    {
        return $this->passwd;
    }

    /**
     * Method untuk menambahkan waktu tinggal diqodr
     */
    public function timeInQodr() {
        $datetime1 = new \DateTime($this->tgl_join);
        $datetime2 = new \DateTime(date("Y-m-d"));
        $interval = $datetime1->diff($datetime2);
        $diff=$interval->format('%a');
        $total_hari=$diff;
        $thn=floor($total_hari/365);
        $bln=floor(($total_hari%365)/30.5);
        $hari=floor(($total_hari%365)%30.5);
        if ($thn==0) {$thn='';}else{$thn=$thn."thn ";}
        if ($bln==0) {$bln='';}else{$bln=$bln."bln ";}
        if ($hari==0) {$hari='';}else{$hari=$hari."hari";}
        $lama_belajar=3; 
        $persen=floor($total_hari/(3*365)*100);
        $dataSantri = (array)$this;
        $dataSantri['berapa_lama'] = $thn.$bln.$hari." (dari ".$lama_belajar." tahun)";
        $dataSantri['persen_lama'] = $persen;
        
        return $dataSantri;
    }

    public function rekapPersen($table) {

        $tableRekap = DB::table($table)->whereSantriId($this->uid)->first();
        return $tableRekap;

    }

    public function izin() {
        return $this->hasMany(\App\Models\Izin::class, 'santri_uid');
    }
    public function pengurus() {
        return $this->hasOne(\App\Models\Pengurus::class, 'pejabat');
    }
}

