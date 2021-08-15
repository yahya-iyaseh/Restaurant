<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Food;
use App\Models\Category;
class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $foods = Food::orderByRaw('category_id')->paginate(10);
        return view('food.index', compact('foods'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('food.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $this->validate($request, [
        //     'name' => 'required',
        //     'description' => 'required',
        //     'price' => 'required|integer|min:0',
        //     'category' => 'required',
        //     'image' => 'required|mimes:png, jpeg, jpg'
        // ]);

        if($request->hasfile('image')){
        $image = $request->file('image');
        $name = time().'.'.$image->getClientOriginalExtension();
        $dest = public_path('images');
        $image->move($dest, $name);
        }else {
            $name = "null";
        }
        // $all  = [ 'name' => $request->get('name'),
        //     'description' => $request->get('description'),
        //     'price' => $request->get('price'),
        //     'category_id' => $request->get('category'),
        //     'image' => $name,
        // 'path' => $dest];
        //     return $all;

        Food::create([
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'price' => $request->get('price'),
            'category_id' => $request->get('category'),
            'image' => $name
        ]);
        return redirect()->back()->with('message', 'Food Created');
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
        $food = Food::find($id);
        return view('food.edit', compact('food'));
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
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|integer',
            'category' => 'required',
            'image' => 'mimes:jpg, jpeg, png'
        ]);
        $food = Food::find($id);
        $name = $food->image;
        if($request->hasfile('image')){
            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $dest = public_path('images');
            $image->move($dest, $name);
        }
        $food->name = $request->get('name');
        $food->description = $request->get('description');
        $food->price = $request->get('price');
        $food->category_id = $request->get('category');
        $food->image = $name;
        $food->save();
        return redirect()->route('food.index')->with('message-update', 'update');
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
         Food::find($id)->delete();
        return redirect()->back()->with('message-delete', 'delete');
    }
    public function list(){
        $categories = Category::with('food')->get();
        return view('list', compact('categories'));
    }
    public function showItem($id){

        $food = Food::find($id);
        return view('food.show', compact('food'));
    }
}
