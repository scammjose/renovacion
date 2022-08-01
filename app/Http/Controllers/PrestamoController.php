<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
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
        $matri=$matricula;
        $data=Borrow::select('borrow.MATRICULA','books.id','books.title','borrow.status','borrow.date_borrow','borrow.hora_entregar')
                        ->join('books','borrow.book_id','=','books.id')
                        ->where("borrow.MATRICULA",'=',$matricula)
                        ->where("borrow.status",'=',1)
                        ->get();
        $tiempo=DB::select('call tiempo(?)',array($matricula));
        $tiempo2=DB::select('call tiempo2(?)',array($matricula));
        return view('equipos',compact('data','matri','tiempo','tiempo2'));
    }
    
    public function renovar(Request $request){
        // $intervalo=$request['flexRadioDefault'];
        // $ma=$request['matricula'];
        // $statuscode=200;
        // DB::select('call update_register(?,?)',array($intervalo,$ma));
        // return redirect()->route('mostrar',$ma);

        $intervalo=$request->intervalo;
        $ma=$request->matricula;
        DB::select('call update_register(?,?)',array($intervalo,$ma));
    }
}
