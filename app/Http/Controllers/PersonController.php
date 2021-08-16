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
            $this->array['result'] [] = [
                'id'        => $persons->id,
                'firstname' => $persons->firstname,
                'lastname'  => $persons->lastname,
            ];
        }

        return $this->array;
    }

    public function one($id)
    {
        // $person = person::find($id);
        $person = person::where('id', $id)->first();

        if(!$person){
            $this->array['error'] = 'ID nao localizado';
        }

        $this->array['result'] = $person;

        return $this->array;
    }

    public function new(Request $request)
    {
        try{
            $firstname = $request->input('firstname');
            $lastname = $request->input('lastname');
            $firstparent_id = $request->input('firstparent_id');
            $secondparent_id = $request->input('secondparent_id');
            
            if(!$firstname && $lastname && $firstparent_id && $secondparent_id){
                throw new exception();
            }

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

        return $this->array;
        }catch(Exception $e){
            $this->array['error'] = 'campos nao adicionados';
            $e->getmessage();
        }
    }

    public function edit(Request $request,$id){
        $firstname = $request->input('firstname');
        $lastname = $request->input('lastname');


        if(!$firstname && $lastname){
            $this->array['error'] = 'Campos nao atualizados';
        }
        
        $person = person::find($id);
        $person->update([
                    'firstname' => $firstname,
                    'lastname'  => $lastname
        ]);

        return $this->array['result'] = 'Atualizado com sucesso';
    }

    public function delete($id){
        $person = person::find($id);

        if(!$person){
            $this->array['error'] = 'ID nao existe'; 
        }

        $person->delete();

        return $this->array;
    }
}
