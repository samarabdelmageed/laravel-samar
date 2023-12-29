<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Car;
use App\Traits\Common;

class CarController extends Controller
{
    use Common;
    private $columns = ['title','description','published'];
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars=Car::get();
        return view('cars',compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('addcar');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $cars = new Car();
        // $cars->title = $request->title;
        // $cars->description = $request->description;
        // if(isset($request->published)){
        //     $cars->published = 1;
        // }else{
        //     $cars->published = 0;
        // }
        // $cars->save();
        // $data = $request->only($this->columns);
        $messages = $this->messages();
        $data = $request->validate([
            'title'=>'required|string|max:50',
            'description'=>'required|string',
            'image' => 'required|mimes:png,jpg,jpeg|max:2048',
        ], $messages);

        $fileName = $this->uploadFile($request->image, 'assets/images');    
        $data['image'] = $fileName;

        $data['published'] = isset($request->published);
        Car::create($data);
        return redirect ('Cars');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $car = Car::findOrFail($id);
        return view('showCar',compact('car'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $car = Car::findOrFail($id);
        return view('updateCar',compact('car'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $messages = $this->messages();
        $data = $request->validate([
             'title'=>'required|string|max:50',
             'description'=> 'required|string',
             'image' => 'sometimes|mimes:png,jpg,jpeg|max:2048',
            ], $messages);

            if($request->hasFile('image')){
                $fileName = $this->uploadFile($request->image, 'assets/images');    
                $data['image'] = $fileName;
                unlink("assets/images/" . $request->oldImage);
            }
            
            $data['published'] = isset($request->published);
            Car::where('id', $id)->update($data);
            return redirect('Cars');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Car::where('id',$id)->delete();
        return redirect ('Cars');
    }

    /**
     * Trashed List
     */
    public function trashed()
    {
        $cars = Car::onlyTrashed()->get();
        return view('trashed',compact('cars'));
    }

    /**
     * Force Delete
     */
    public function forceDelete(string $id)
    {
        Car::where('id',$id)->forceDelete();
        return redirect ('Cars');
    }

    /**
     * Restore
     */
    public function restore(string $id)
    {
        Car::where('id',$id)->restore();
        return redirect ('Cars');
    }
    public function messages(){
        return[
                'title.required'=>'عنوان السيارة مطلوب',
                'title.string'=>'Should be string',
                'description.required'=> 'should be text',
                'image.required'=> 'Please be sure to select an image',
                'image.mimes'=> 'Incorrect image type',
                'image.max'=> 'Max file size is exceeded',                
                ];
    }
}
