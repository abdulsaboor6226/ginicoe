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

    public static function FI_Type(){
        return self::dictionaryQuery('BANK','FI_TYPE');
    }

    public static function FI_performs(){
        return self::dictionaryQuery('BANK','FI_PERFORMS');
    }

    public static function dailyTrade(){
        return self::dictionaryQuery('BANK','DAILY_TRADE');
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

    public static function dashboard(){
        return self::dictionaryQuery('GENERAL','DASHBOARD');
    }
    public static function salutation(){
        return self::dictionaryQuery('GENERAL','SALUTATION');
    }

    public static function govtTitle(){
        return self::dictionaryQuery('GOVT','TITLE');
    }

    public static function govtAgencySector(){
        return self::dictionaryQuery('GOVT','AGENCY_SECTOR');
    }

    public static function govtBudgetAmount(){
        return self::dictionaryQuery('GOVT','BUDGET_AMOUNT');
    }

    public static function agencyType(){
        return self::dictionaryQuery('GOVT','AGENCY_TYPE');
    }

    public static function url(){
        return self::dictionaryQuery('GENERAL','URL');
    }
}
