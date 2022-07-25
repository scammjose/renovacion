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
        foreach ($Borrow as $prestado){
            if ($prestado['status'] == 1){
                $N=1;
            }
        }
        if($N==1){
            // return redirect()->route('mostrar',$request->matricula);
            return json_encode("True");
        }
        else{
            return json_encode("False");
        }
    }

    public function mostrar($matricula)
    {
        //
        // $matricula=$_GET['equipos'];
        $data=Borrow::select('borrow.MATRICULA','books.id','books.title','borrow.status','borrow.date_borrow','borrow.hora_entregar')
                        ->join('books','borrow.book_id','=','books.id')
                        ->where("borrow.MATRICULA",'=',$matricula)
                        ->where("borrow.status",'=',1)
                        ->get();
        return view('equipos',compact('data'));
    }
    
    public function renovar(Request $request){

        return redirect()->route('index');
    }
}
