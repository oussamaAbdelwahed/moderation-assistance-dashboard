<?php
namespace App\Helpers;

class AppHelper {
     private static $ins = null;

     public static function startQueryLog(){
        \DB::enableQueryLog();
     }

     public static function showQueries(){
        dd(\DB::getQueryLog());
     }

     public static function cleanUpSqlQuery($sqlQuery){
        $sqlQuery = str_replace("\n", "", $sqlQuery);
        $sqlQuery = str_replace("\r", "", $sqlQuery);
        $sqlQuery = str_replace("\t", "", $sqlQuery);
        $sqlQuery = trim($sqlQuery);

        return $sqlQuery;
     }

     public static function instance(){
       if(self::$ins == null)
         self::$ins =  new AppHelper();
      
       return self::$ins;
     }
}