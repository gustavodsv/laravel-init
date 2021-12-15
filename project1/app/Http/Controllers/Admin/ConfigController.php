<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ConfigController extends Controller
{
    public function index(Request $request) {

        $name = $request->input('name', 'NULL');
        $age = $request->input('age', 'NULL');
        $city = $request->input('city', 'NULL');


        $data = [
            'name'=>$name,
            'age'=>$age,
            'city'=>$city
        ];



        return view('admin.config', $data);
    }

    public function perm() {
        return "Página de permissões do usuário";
    }

    public function info() {
        return "Página de informações do usuário";
    }


}
