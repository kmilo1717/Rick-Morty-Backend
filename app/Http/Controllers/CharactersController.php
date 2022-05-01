<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

use App\Character;

class CharactersController extends Controller
{
    public function status_validate(){
        try {
            return response()->json(['status'=>1, 'message'=> "OK"]);
        } catch (\Exception $e){
            return response()->json(['error'=>true, 'msg'=>'Error en la peticion']);
        }
    }

    public function getCharacters(Request $request, $id = false){
        try {
            if($request->get('id')){
                try {
                    $characters = Character::find($request->get('id'));
                    return response()->json($characters);
                } catch (\Exception $e){
                    Log::error('Error: '.$e->getFile().' - '.$e->getMessage().' - '.$e->getLine());
                    return response()->json(['error'=>true, 'msg'=>'Error en la peticion']);
                }
            }else{
                $page = $request->query('page')??1;
                $characters = Character::all();
                $max_pages = ceil(count($characters)/20);
                if ($page>0 && $page<=$max_pages){
                    $route = route('get_characters');
                    $return['info'] = [
                        'count'=> count($characters),
                        'pages'=> ceil(count($characters)/20),
                        'next'=> ($page+1>0 && $page+1<=$max_pages)?$route.'?page='.($page+1):null,
                        'prev'=> ($page-1>0 && $page-1<=$max_pages)?$route.'?page='.($page-1):null
                    ];
                    $return['results'] = Character::skip(20*($page-1))->take(20)->get();
                    return response()->json($return);
                }else{
                    return response()->json(["error"=>"There is nothing here"]);
                }
            }
        } catch (\Exception $e){
            Log::error('Error: '.$e->getFile().' - '.$e->getMessage().' - '.$e->getLine());
            return response()->json(['error'=>true, 'msg'=>'Error en la peticion']);
        }
    }

    public function doCreate(Request $request){
        try {
            $data = $request->only(["name","status","species","type","gender","origin","location","image","episode","url","created"]);
            $character = new Character();
            $character->name = $data['name']??'';
            $character->status = $data['status']??'';
            $character->species = $data['species']??'';
            $character->type = $data['type']??'';
            $character->gender = $data['gender']??'';
            $character->origin = $data['origin']??'';
            $character->location = $data['location']??'';
            $character->image = $data['image']??'';
            $character->episode = $data['episode']??'';
            $character->url = $data['url']??'';
            $character->created = $data['created']??'';
            $character->save();
            return response()->json(['error'=>false, 'msg'=>'Registro Creado']);
        } catch (\Exception $e){
            Log::error('Error: '.$e->getFile().' - '.$e->getMessage().' - '.$e->getLine());
            return response()->json(['error'=>true, 'msg'=>'Error en la peticion']);
        }
    }

    public function updateData(Request $request){
        try {
            $data = $request->only(["id","name","status","species","type","gender","origin","location","image","episode","url","created"]);
            $character = Character::find($data['id']);
            if(!$character){
                return response()->json(['error'=>true, 'msg'=>'Registro no existe']);
            }
            $character->name = $data['name']??$character->name;
            $character->status = $data['status']??$character->status;;
            $character->species = $data['species']??$character->species;
            $character->type = $data['type']??$character->type;
            $character->gender = $data['gender']??$character->gender;
            $character->origin = $data['origin']??$character->origin;
            $character->location = $data['location']??$character->location;
            $character->image = $data['image']??$character->image;
            $character->episode = $data['episode']??$character->episode;
            $character->url = $data['url']??$character->url;
            $character->created = $data['created']??$character->created;
            $character->save();
            return response()->json(['error'=>false, 'msg'=>'Registro Creado']);
        } catch (\Exception $e){
            Log::error('Error: '.$e->getFile().' - '.$e->getMessage().' - '.$e->getLine());
            return response()->json(['error'=>true, 'msg'=>'Error en la peticion']);
        }
    }

    public function deleteData($id){
        try {
            $character = Character::find($id);
            $character->delete();
            return response()->json(['error'=>false, 'msg'=>'Registro eliminado']);
        } catch (\Exception $e){
            Log::error('Error: '.$e->getFile().' - '.$e->getMessage().' - '.$e->getLine());
            return response()->json(['error'=>true, 'msg'=>'Error en la peticion']);
        }
    }
    
}
