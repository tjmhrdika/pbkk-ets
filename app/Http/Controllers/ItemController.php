<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ItemController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user_id = Auth::user()->id;
        $items = DB::table('items')->join('types', 'types.id', '=', 'items.type_id')->join('conditions', 'conditions.id', '=', 'items.condition_id')->where('user_id', $user_id)->get();
        return view('home', compact('items'));
    }

    public function add()
    {
        $types = DB::table('types')->get();
        $conditions = DB::table('conditions')->get();
        return view('add', compact('types', 'conditions'));
    }

    public function addProcess(Request $request)
    {
        $user_id = Auth::user()->id;
        DB::table('items')->insert([
            'type_id' => $request->type_id,
            'condition_id' => $request->condition_id,
            'description' => $request->description,
            'damage' => $request->damage,
            'amount' => $request->amount,
            'image' => $request->image->getClientOriginalName(),
            'user_id' => $user_id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        $request->image->storeAs('public/images', $request->image->getClientOriginalName());

        return redirect('home')->with('status', 'Item added');
    }

    public function edit($id)
    {
        $item = DB::table('items')->where('id', $id)->first();
        $types = DB::table('types')->get();
        $conditions = DB::table('conditions')->get();
        return view('edit', compact('types', 'conditions', 'item'));
    }

    public function editProcess(Request $request, $id)
    {
        DB::table('items')->where('id', $id)
            ->update([
                'type_id' => $request->type_id,
                'condition_id' => $request->condition_id,
                'description' => $request->description,
                'damage' => $request->damage,
                'amount' => $request->amount,
                'image' => $request->image->getClientOriginalName(),
                'user_id' => $user_id,
                'updated_at' => Carbon::now()
            ]);
        
        $request->image->storeAs('public/images', $request->image->getClientOriginalName());

        return redirect('home')->with('status', 'Item updated');
    }

    public function delete($id)
    {
        DB::table('items')->where('id', $id)->delete();
        return redirect('home')->with('status', 'Item deleted');
    }
}
