<?php

namespace App\Http\Controllers;

use App\Category;
use App\Fitness;
use App\FitnessUser;
use App\Http\Requests\AdminCategoryRequest;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class AdminCategoryController extends Controller
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
            $categories = Category::where('fitness_id', $fitness_id)->get();
            $fitness_relations = $user->fitnessUser->where('role_id', 1);
            $fitness_members = FitnessUser::where('fitness_id', $fitness_id)->where('role_id', 4);
            return view('admin.category.index', compact('user', 'fitness', 'fitness_relations', 'categories', 'fitness_members'));
        } else {
            return redirect(route('home'));
        }


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
    public function store(AdminCategoryRequest $request)
    {
        //
        $fitness_id = session()->get('fitness_id');
        $input = $request;
        $category['name'] = $input->name;
        $category['fitness_id'] = $fitness_id;
        Category::create($category);
        return redirect(route('admin.category.index'));

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
        $user = Auth::user();
        $fitness_id = session()->get('fitness_id');
        if ($user->fitnessUser->where('fitness_id', $fitness_id)->where('role_id', 1)) {
            $category = Category::find($id);
            $fitness = Fitness::find($fitness_id);
            $categories = Category::where('fitness_id', $fitness_id)->get();
            $fitness_relations = $user->fitnessUser->where('role_id', 1);
            $fitness_members = FitnessUser::where('fitness_id', $fitness_id)->where('role_id', 4);
            return view('admin.category.edit', compact('user', 'fitness', 'fitness_relations', 'categories','category', 'fitness_members'));
        } else {
            return redirect(route('home'));
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdminCategoryRequest $request, $id)
    {
        //
        $category = Category::find($id);
        $category->name = $request->name;
        $category->save();
        return redirect(route('admin.category.index'));

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
