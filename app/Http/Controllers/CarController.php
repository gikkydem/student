<?php

namespace App\Http\Controllers;

use App\Models\car;
use App\Models\mechanic;
use Illuminate\Http\Request;

class CarController extends Controller
{
    //
    public function add_car($id)
    {
        $mac = mechanic::find($id);
        $car = new  car();
        $car->model = 'i10';
        $mac->car()->save($car);
    }
}
