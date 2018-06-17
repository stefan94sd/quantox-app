<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class HumanModel extends Model
{
    protected $gender;
    protected $age;
    protected $bodyType;
    protected $nationality;
    protected $skinColor;
    protected $faith;
    protected $god_id;
    protected $last_name;
    protected $first_name;
    protected $fillable = ['age', 'gender', 'faith', 'body_type','nationality','skin_color', 'god_id', 'first_name', 'last_name'];

    public function __construct(array $attributes = array())
    {
        parent::__construct($attributes);
        $this->gender = $attributes["gender"];
        $this->age = $attributes["age"];
        $this->bodyType = $attributes["body_type"];
        $this->nationality = $attributes["nationality"];
        $this->skinColor = $attributes["skin_color"];
        $this->god_id = $attributes["god_id"];
        $this->first_name = $attributes["first_name"];
        $this->last_name = $attributes["last_name"];
        $this->faith = $attributes["faith"];
    }
    public function born(){
        try{
            DB::table('humans')->insert(
                [
                    'gender' => $this->gender,
                    'age' => $this->age,
                    'body_type' => $this->bodyType,
                    'nationality' => $this->nationality,
                    'skin_color' => $this->skinColor,
                    'faith' => $this->faith,
                    'gods_id' => $this->god_id,
                    'first_name' => $this->first_name,
                    'last_name' => $this->last_name,
                ]
            );
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
            $result = DB::table('humans')->where('id', $id)->delete();

            return [
                "status" => config("constants.OK"),
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
