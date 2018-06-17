<?php

namespace App\Http\Controllers;

use App\ChristianModel;
use App\MuslimModel;
use Illuminate\Http\Request;
use App\GodModel;
use App\HumanModel;
use Validator;
use Session;

class GodController extends Controller
{
    public function loginGod(Request $request){
        try{
            $name = $request->input("name");
            $faith = $request->input("faith");

            $model_god = new GodModel();

            $rules = [
                "name"=>"required",
                "faith"=>"required",
            ];

            $validator = Validator::make($request->all(), $rules);

            if($validator->fails()){
                return [
                    "message"=>$validator->errors(),
                    "status"=>config("constants.NOK")
                ];
            }else{
                $result = $model_god->checkCredentials($name, $faith);
                $name2 = $result["name"];
                $faith2 = $result["faith"];

                if($result["status"] == config("constants.OK")){
                    if($name2 && $faith2){
                        $details = $model_god->getDetails($name, $faith);

                        $details = $details["details"];
                        $this->startCookieSession($details->id, $details->name,$details->faith);

                        if(Session::has("id")){
                            return[
                                "status" => config("constants.OK"),
                            ];
                        }else{
                            return[
                                "status" => config("constants.NOK"),
                                "message" => "Something went wrong."
                            ];
                        }
                    }else{
                        return [
                            "status" => config("constants.NOK"),
                            "message" => array("There is no such God. Blasphemy !")
                        ];
                    }
                }else{
                    return [
                        "status" => $result["status"],
                        "message" => $result["message"]
                    ];
                }
            }
        }catch (\Exception $ex){
            return [
                "status" => config("constants.NOK"),
                "message" => $ex->getMessage()
            ];
        }
    }
    public function startCookieSession($id, $name, $faith){
        Session::put(["id" => $id]);
        Session::put(["name" => $name]);
        Session::put(["faith" => $faith]);
    }
    public function logOut(){
        Session::flush();
    }

    public function createHuman(Request $request){
        try{
            $age = $request->input("age");
            $gender = $request->input("gender");
            $body_type = $request->input("body_type");
            $skin_color = $request->input("skin_color");
            $nationality = $request->input("nationality");
            $first_name =$request->input("first_name");
            $last_name =$request->input("last_name");
            $faith =$request->input("faith");

            $god_id = session("id");

            $rules = [
                "age"=>"required|min:0|max:110",
                "gender"=>"required",
                "body_type"=>"required",
                "skin_color"=>"required",
                "nationality"=>"required|max:30",
                "first_name"=>"required|max:30",
                "last_name"=>"required|max:30",
                "faith"=>"required",
            ];

            $validator = Validator::make($request->all(), $rules);

            if($validator->fails()){
                return [
                    "message"=>$validator->errors(),
                    "status"=>config("constants.NOK")
                ];
            }else{
                $attributes = array(
                    "age" =>  $age,
                    "gender" =>  $gender,
                    "body_type" =>  $body_type,
                    "nationality" =>  $nationality,
                    "skin_color" => $skin_color,
                    "first_name" => $first_name,
                    "last_name" => $last_name,
                    "god_id" => $god_id,
                    "faith" => $faith,
                );

                $model_human = "";

                if($god_id == config("constants.ONE_ABOVE_ALL")){
                    $model_human = new HumanModel($attributes);
                }elseif ($god_id == config("constants.CHRIST")){
                    $model_human = new ChristianModel($attributes);
                }elseif ($god_id == config("constants.ALAH")){
                    $model_human = new MuslimModel($attributes);
                }

                $result = $model_human->born();

                if($result["status"] == config("constants.OK")){
                    return [
                        "status" => $result["status"],
                        "message" => "Follower created successful."
                    ];
                }else{
                    return [
                        "status" => $result["status"],
                        "message" => $result["message"]
                    ];
                }
            }

        }catch (\Exception $ex){
            return [
                "status" => config("constants.NOK"),
                "message" => $ex->getMessage()
            ];
        }
    }
    public function killHuman(Request $request){
        try{
            $id = $request->input("id");

            $result = HumanModel::die($id);

            return [
                "status" => config("constants.OK"),
                "result" => $result
            ];

        }catch (\Exception $ex){
            return [
                "status" => config("constants.NOK"),
                "message" => $ex->getMessage()
            ];
        }
    }

    public function listFollowers(){
        try{
            $model_god = new GodModel();
            $followers = $model_god->getFollowers();

            $resultProccessed = array();
            $i = 0;

            foreach ($followers["followers"] as $f){
                $resultProccessed[$i]["id"] = $f->id;
                $resultProccessed[$i]["gender"] = $f->gender;
                $resultProccessed[$i]["body_type"] = $f->body_type;
                $resultProccessed[$i]["nationality"] = $f->nationality;
                $resultProccessed[$i]["skin_color"] = $f->skin_color;
                $resultProccessed[$i]["faith"] = $f->faith;
                $resultProccessed[$i]["age"] = $f->age;
                $resultProccessed[$i]["first_name"] = $f->first_name;
                $resultProccessed[$i]["last_name"] = $f->last_name;
                $resultProccessed[$i]["gods_id"] = $f->gods_id;

                $i++;
            }
            return [
                "result" => $resultProccessed
            ];

        }catch (\Exception $ex){
            return [
                "status" => config("constants.NOK"),
                "message" => $ex->getMessage()
            ];
        }
    }

}
