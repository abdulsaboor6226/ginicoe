<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Merchant extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['user_id_fk','business_legal_name','business_DBA_name','business_structure','business_legal_address','business_city_id_fk','business_state_id_fk','business_zip','business_country_id_fk','federal_tax_id','DUNS_number','ownership','first_name','middle_name','last_name','phone_no','telephone_number','DOB','home_address','city_id_fk','state_id_fk','country_id_fk','ownership_percentage'];

    protected $hidden = ['created_by', 'updated_by', 'deleted_by', 'created_at', 'updated_at', 'deleted_at'];

    protected static function boot()
    {
        parent::boot();

        // updating created_by and updated_by when model is created
        static::creating(function ($model) {
            if (!$model->isDirty('created_by')) {
                $model->created_by = auth()->user()->id;
            }
            if (!$model->isDirty('updated_by')) {
                $model->updated_by = auth()->user()->id;
            }
        });

        // updating updated_by when model is updated
        static::updating(function ($model) {
            if (!$model->isDirty('updated_by')) {
                $model->updated_by = auth()->user()->id;
            }
        });

        // deleting deleting_by when model is updated
        static::deleted(function ($model) {
            if (!$model->isDirty('deleted_by')) {
                $model->deleted_by = auth()->user()->id;
                $model->save();
            }
        });

        if (Auth::check()){
            if (Auth::user()->permissions_id ===5) {
                static::addGlobalScope('merchant', function (Builder $builder) {
                    $builder->where('created_by',Auth::user()->id)->whereRelation('user','permissions_id',5);
                });
            }
        }
    }

    public function country(){
        return $this->belongsTo(AllCountry::class,'business_country_id_fk');
    }
    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class,'created_by');
    }
}
