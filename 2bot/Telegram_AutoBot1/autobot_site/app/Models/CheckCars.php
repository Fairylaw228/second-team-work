<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CheckCars extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'mark1',
        'id_telegramm',
        'number',
        'id',
        'approved'
    ];

    public static function make(
        $mark1,
        $id_telegramm,
        $number,
        $id,
        $approved
    )
    {
        return CheckCars::query()->make([
            'mark1' => $mark1,
            'id_telegramm' => $id_telegramm,
            'number' => $number,
            'id' => $id,
            'approved' => $approved
        ]);
    }

    public static function getCheckCarsById($id): CheckCars
    {
        return CheckCars::query()->where('id', $id)->firstOrNew();
    }

    public function setMark1IfNotEmpty($mark1)
    {
        if($mark1 != '')
        {
            $this->attributes['mark1'] = $mark1;
        }
    }

    public function setIdTelegrammIfNotEmpty($id_telegramm)
    {
        if($id_telegramm != '')
        {
            $this->attributes['id_telegramm'] = $id_telegramm;
        }
    }

    public function setNumberIfNotEmpty($number)
    {
        if($number != '')
        {
            $this->attributes['number'] = $number;
        }
    }

    

    public function setApprovedIfNotEmpty($approved)
    {
        if($approved != '')
        {
            $this->attributes['approved'] = $approved;
        }
    }

    public function getMark1()
    {
        return $this->attributes['mark1'];
    }

    public function getIdTelegramm()
    {
        return $this->attributes['id_telegramm'];
    }

    public function getNumber()
    {
        return $this->attributes['number'];
    }


    public function getApproved()
    {
        return $this->attributes['approved'];
    }

    public function getId()
    {
        return $this->attributes['id'];
    }
}
