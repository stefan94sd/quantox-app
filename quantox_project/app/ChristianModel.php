<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\HumanModel;

class ChristianModel extends HumanModel
{
    protected $gender;
    protected $age;
    protected $bodyType;
    protected $nationality;
    protected $skinColor;
    protected $faith = "christianity";
    protected $god_id;
    protected $last_name;
    protected $first_name;
    protected $fillable = ['age', 'gender', 'body_type','nationality','skin_color', 'god_id', 'first_name', 'last_name'];

    public function __construct(array $attributes = array())
    {
        parent::__construct($attributes);
    }
    public function born(){
        try{
            parent::born();
            return ["status" => config("constants.OK")];
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
    public static function die($id){
        try{
            parent::die($id);
            return ["status" => config("constants.OK")];
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
