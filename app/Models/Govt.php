<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Govt extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['f_name','l_name','phone_no','s_phone_no','title','building_number','street_name','urbanization_number','country_id_fk','state_id_fk','city_id_fk','type','zip_code','agency_sector_id_fk','agency_represent','budgeting_authority','amount_of_budgeting','how_ginicoe_help_you','user_id_fk',];

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
            if (Auth::user()->permissions_id ===6) {
                static::addGlobalScope('govt', function (Builder $builder) {
                    $builder->where('created_by',Auth::user()->id)->whereRelation('user','permissions_id',7);
                });
            }
        }
    }

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class,'created_by');
    }
}
