<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\person;
use Exception;

class PersonController extends Controller
{

    protected $array = [
        'error' => '',
        'result' => []
    ];

    public function all(){
        $person = person::all();

        foreach($person as $persons){
            $this->array['result'] []= [
                'id' => $persons->id,
                'firstname' => $persons->firstname,
                'lastname' => $persons->lastname,
            ];
        }

        return $this->array;
    }

    public function one($id){
        // $person = person::find($id);
        $person = person::where('id', $id)->first();

        if($person){
            $this->array['result'] = $person;
        }else {
            $this->array['error'] = 'ID nao localizado';
        }

        return $this->array;
    }

    public function new(Request $request){
        $firstname = $request->input('firstname');
        $lastname = $request->input('lastname');
        $firstparent_id = $request->input('firstparent_id');
        $secondparent_id = $request->input('secondparent_id');

        if($firstname && $lastname && $firstparent_id && $secondparent_id){
            $person = new person();
            $person->firstname = $firstname;
            $person->lastname = $lastname;
            $person->firstparent_id = $firstparent_id;
            $person->secondparent_id = $secondparent_id;
            $person->save();

            $this->array['result'] = [
                'id' => $person->id,
                'firstname' => $firstname,
                'lastname' => $lastname
            ];
        
            $this->array['result'] = 'Adicionado com successo';
        } else {
            $this->array['error'] = 'Campos nao adicionados';
        }

        return $this->array;
    }

    public function edit(Request $request,$id){
        $firstname = $request->input('firstname');
        $lastname = $request->input('lastname');


        if($firstname && $lastname){
            
            $person = person::find($id);

            if($person){
                $person = new person();
                $person->firstname = $firstname;
                $person->lastname = $lastname;
                $person->save();

            }
            
            $this->array['result'] = [
                'id' => $person->id,
                'firstname' => $firstname,
                'lastname' => $lastname
            ];

        }else {
            $this->array['error'] = 'Campos nao atualizados';
        }

        return $this->array;
    }

    public function delete($id){
        $person = person::find($id);

        if($person){
            $person->delete();
        }else{
            $this->array['error'] = 'ID nao existe';
        }

        return $this->array;
    }
}
