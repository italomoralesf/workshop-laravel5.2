<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Keep;

use App\Http\Requests;

class KeepController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function update(Keep $keep){
        $this->authorize('update', $keep);
        
        $keep->status = $keep->status === 'full' ? 'incomplete' : 'full';
        $keep->save();
        
        return back();
    }
    
    public function store(Request $request){
        $this->validate($request, [
            'keep' => 'required|max:60'
        ]);
        
        $request->user()->keeps()->create([
            'keep' => $request->get('keep'), 
        ]);
        
        return back();
    }
    
    public function destroy(Keep $keep){
        $this->authorize('destroy', $keep);
        
        $keep->delete();
        return back();
    }
    
}
