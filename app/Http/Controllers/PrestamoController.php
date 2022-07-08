<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Borrow;
use App\Models\Books;

class PrestamoController extends Controller
{

    public function index(Request $request){
        //
        return view('index');
    }

    public function busqueda(Request $request){
        $Borrow = Borrow::select("MATRICULA",'status')->where("MATRICULA", "=", $request->matricula)->get();
        $N = 0;
        $prestados = [];
        foreach ($Borrow as $prestado){
            if ($prestado['status'] == 1){
                $prestados [] = [
                    'id' => $prestado['MATRICULA'],
                ];
                $N=1;
            }
        }
        if($N==1){
            return json_encode($prestados);
        }
        else{
            return json_encode("False");
        }
    }

    public function show($matricula){
        $data=Borrow::select('books.id','books.title','borrow.status')
                        ->join('books','borrow.book_id','=','books.id')
                        ->where("borrow.MATRICULA",'=',$matricula)
                        ->where("borrow.status",'=',1)
                        ->get();
        return view('equipos',compact('data'));
    }
}
