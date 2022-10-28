<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Bank extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['financial_institution_title','f_name','m_name','l_name','phone_no','email','job_title','secondary_f_name','secondary_l_name','secondary_phone_no','secondary_fax_no','secondary_email','financial_institution_represent','FI_type','FI_operate_across_state','asset_size','FI_performs','BIN','daily_trade','portfolio_size','user_id_fk'];

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
                static::addGlobalScope('bank', function (Builder $builder) {
                    $builder->where('created_by',Auth::user()->id)->whereRelation('user','permissions_id',6);
                });
            }
        }
    }

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class,'created_by');
    }
    public function FI_performs(){
        return $this->belongsTo(Dictionary::class,'FI_performs');
    }
    public function asset_size(){
        return $this->belongsTo(Dictionary::class,'asset_size');
    }
    public function financial_institution_represent(){
        return $this->belongsTo(Dictionary::class,'financial_institution_represent');
    }
}
