<?php

namespace App\Http\Controllers;

use App\Fitness;
use App\Http\Requests\AdminPackRequest;
use App\Pack;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class AdminPackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user = Auth::user();
        $fitness_id = session()->get('fitness_id');
        if ($user->fitnessUser->where('fitness_id', $fitness_id)->where('role_id', 1)) {
            $fitness = Fitness::find($fitness_id);
            $packs = $fitness->packs;
        }
        $fitness_relations = $user->fitnessUser->where('role_id', 1);
        return view('admin.pack.index', compact('user', 'fitness', 'fitness_relations', 'packs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminPackRequest $request)
    {
        //
        $fitness_id = session()->get('fitness_id');
        $name = $request->name;
        $price = $request->price;
        $days = $request->days;
        $input['fitness_id'] = $fitness_id;
        $input['name'] = $name;
        $input['price'] = $price;
        $input['days'] = $days;
        Pack::create($input);
        return redirect(route('admin.pack.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
