<?php
  
namespace App\Http\Controllers;

use Log;

use App\Dog;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
  
  
class DogController extends Controller{

    private $dogNameValidationRules = [
        'name' => 'required|unique:dogs|min:4',
    ];
 
    public function index(){
  
        $Dogs  = Dog::orderBy('name', 'asc')->get();
  
        return response()->json($Dogs);
  
    }
  
    public function getDog($id){
  
        $Dog  = Dog::find($id);
  
        return response()->json($Dog);
    }
  
    public function createDog(Request $request){        
        $this->validate($request, $this->dogNameValidationRules);

        $Dog = Dog::create($request->all());
  
        return response()->json($Dog);
  
    }
  
    public function deleteDog($id){
        $Dog = Dog::find($id);
        $Dog->delete();
 
        return response()->json('deleted');
    }
  
    public function updateDog(Request $request, $id){
        $Dog = Dog::findOrFail($id);

        $this->validate($request, $this->dogNameValidationRules);

        $Dog->name = $request->input('name');
        $Dog->save();
  
        return response()->json($Dog);
    }
}
?>