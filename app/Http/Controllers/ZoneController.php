<?php
namespace App\Http\Controllers;
use App\Models\Zone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\UploadedFile;

class ZoneController extends Controller
{
  public function addZone(Request $request){
    if ($request->input('name') !== null) {
        $zone = new Zone;

        $zone->name = $request->input('name');
        $zone->location = $request->input('location');
        $zone->longitude = $request->input('longitude');
        $zone->latitude = $request->input('latitude');
        $zone->mineral_type = $request->input('mineral_type');
        $zone->dangerous_level = $request->input('dangerous_level');
        $zone->date = now();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image->store('public/images');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/images', $imageName);
            $zone->image = 'storage/images/' . $imageName;
        }

        $zone->save();
        return redirect('/show');
        // ->with('Success','Votre zone a bien été prise en compte')
    }   
    return view('home');
}


public function show()
{
    $zone = DB::table('zone')->get();
    return view('show',['zones'=>$zone]);
}

public function delete($id)
{
    $zone = Zone::find($id);
    $zone->delete();
    return redirect('/show');   
}
public function destroy()
{
    return redirect('/show');
}
function addToSelect($selectId, $value, $text) {
    $script = "<script>";
    $script .= "var select = document.getElementById('$selectId');";
    $script .= "var option = document.createElement('option');";
    $script .= "option.value = '$value';";
    $script .= "option.text = '$text';";
    $script .= "select.add(option);";
    $script .= "</script>";
    return view('home');
}

}