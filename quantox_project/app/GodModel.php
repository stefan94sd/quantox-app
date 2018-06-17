<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class GodModel extends Model
{
    function checkCredentials($name, $faith){
        try{
            $name = DB::table("gods")->where("name", $name)->exists();
            $faith = DB::table("gods")->where("faith", $faith)->exists();

            return [
                "status" => config("constants.OK"),
                "name" => $name,
                "faith" => $faith
            ];
        }catch (\Exception $ex){
            DB::rollback();
            return [
                "status" => config("constants.NOK"),
                "message" => $ex->getMessage()
            ];
        }catch (\mysqli_sql_exception $ex1){
            DB::rollback();
            return [
                "status" => config("constants.NOK"),
                "message" => $ex1->getMessage()
            ];
        }
    }
    public function getDetails($name, $faith){
        try{
            $details = DB::table("gods")->where("name", $name)->where("faith", $faith)->first();

            return [
                "status" => config("constants.OK"),
                "details" => $details,
            ];
        }catch (\Exception $ex){
            DB::rollback();
            return [
                "status" => config("constants.NOK"),
                "message" => $ex->getMessage()
            ];
        }catch (\mysqli_sql_exception $ex1){
            DB::rollback();
            return [
                "status" => config("constants.NOK"),
                "message" => $ex1->getMessage()
            ];
        }
    }
    public function getFollowers(){
        try{
            $god_id = session("id");

            if($god_id == config("constants.ONE_ABOVE_ALL")){
                $followers = DB::table("humans")->get();
            }else{
                $followers = DB::table("humans")->get()->where("gods_id", $god_id);
            }
            return [
                "status" => config("constants.OK"),
                "followers" => $followers
            ];
        }catch (\Exception $ex){
            DB::rollback();
            return [
                "status" => config("constants.NOK"),
                "message" => $ex->getMessage()
            ];
        }catch (\mysqli_sql_exception $ex1){
            DB::rollback();
            return [
                "status" => config("constants.NOK"),
                "message" => $ex1->getMessage()
            ];
        }
    }
}
