<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Dictionary extends Model
{
    protected $fillable = ['entity','value','key','sort','meta'];

    protected $casts = ['meta' => 'array'];
    public static $DictionaryCacheKey = "dictionary";

    public static function userStatus(){
        return self::dictionaryQuery('GENERAL','STATUS');
    }

    public static function fontFamily(){
        return self::dictionaryQuery('GENERAL','FONT_FAMILY');
    }

    public static function jobTitle(){
        return self::dictionaryQuery('BANK','JOB_TITLE');
    }

    public static function FI_represent(){
        return self::dictionaryQuery('BANK','FI_REPRESENT');
    }

    public static function assetSize(){
        return self::dictionaryQuery('BANK','ASSET_SIZE');
    }

    public static function FI_charterType(){
        return self::dictionaryQuery('BANK','FI_CHARTER_TYPE');
    }

    public static function FI_performs(){
        return self::dictionaryQuery('BANK','FI_PERFORMS');
    }

    public static function pendingUserStatus(){
        return self::userStatus()->where('sort',0)->first();
    }

    public static function activeUserStatus(){
        return self::userStatus()->where('sort',1)->first();
    }

    public static function dictionaryQuery($entity,$key){
        return self::where('entity',$entity)->where('key',$key);
    }
}
