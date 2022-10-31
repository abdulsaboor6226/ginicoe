<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Bank extends Model
{
    use \Staudenmeir\EloquentJsonRelations\HasJsonRelationships;

    use HasFactory,SoftDeletes;

    protected $fillable = ['financial_institution_title','f_name','m_name','l_name','phone_no','email','job_title','secondary_f_name','secondary_l_name','secondary_phone_no','secondary_fax_no','secondary_email','financial_institution_represent','FI_type','FI_operate_across_state','asset_size','FI_performs','BIN','daily_trade','portfolio_size','user_id_fk'];

    protected $hidden = ['created_by', 'updated_by', 'deleted_by', 'created_at', 'updated_at', 'deleted_at'];

    protected $casts = [
        'FI_operate_across_state' => 'boolean',
        'FI_performs' => 'json',
        'financial_institution_represent' => 'json',
        ];

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
    public function FI_performses(){
        return $this->belongsToJson(Dictionary::class,'FI_performs');
    }
    public function asset_sizes(){
        return $this->belongsTo(Dictionary::class,'asset_size');
    }
    public function financial_institution_represents(){
        return $this->belongsToJson(Dictionary::class,'financial_institution_represent');
    }
    public function daily_trades(){
        return $this->belongsTo(Dictionary::class,'daily_trade');
    }
    public function job_titles(){
        return $this->belongsTo(Dictionary::class,'job_title');
    }
    public function FI_charterTypes(){
        return $this->belongsTo(Dictionary::class,'FI_type');
    }
    public function setFIPerformsAttribute($value)
    {
        $this->attributes['FI_performs'] = json_encode($value);
    }
//    public function getFIPerformsAttribute($value)
//    {
//        return $this->attributes['FI_performs'] = json_decode($value);
//    }
    public function setFinancialInstitutionRepresentAttribute($value)
    {
        $this->attributes['financial_institution_represent'] = json_encode($value);
    }
//    public function getFinancialInstitutionRepresentAttribute($value)
//    {
//        return $this->attributes['financial_institution_represent'] = json_decode($value);
//    }
}
