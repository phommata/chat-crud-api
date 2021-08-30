<?php

namespace App\Models;

//use App\ModelFilters\CustomFilters\CustomAddressFilter;
//use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
//    use Filterable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user', 'message', 'timestamp',
    ];

//    /**
//     * The attributes excluded from the model's JSON form.
//     *
//     * @var array
//     */
//    protected $hidden = [
//
//    ];
//
//    public function modelFilter()
//    {
//        return $this->provideFilter(CustomAddressFilter::class);
//    }
}
