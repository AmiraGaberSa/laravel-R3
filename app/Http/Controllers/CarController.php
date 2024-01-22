<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\car;
use App\Models\Category;
use App\Traits\Common;
use Illuminate\Support\Facades\File;



class CarController extends Controller
{
    use Common;
  //  private $columns = ['title','description','published'];
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars = car::get();
        return view('cars', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    { 
        $categories =Category::get();
        return view('addCar',compact('categories'));
    }

    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
        // $cars = new Car();
        // $cars->title = $request->title;
        // $cars->description=  $request-> description;
        // if(isset( $request->published)){
        //     $cars->published=1;
        // }else{
        //     $cars->published=0;
        // }
       

        // $cars->save();
        // return 'data added successfully';

        //best method for insert and update
        $messages = $this->messages();
        $data = $request->validate([
            'title'=>'required|string|max:50',
            'description'=> 'required|string',
            'image' => 'required|mimes:png,jpg,jpeg|max:2048',
            'category_id' => 'required',
           ],$messages);
        $fileName = $this->uploadFile($request->image, 'assets/images');    //html name,path
        $data['image'] = $fileName;
        $data['published'] = isset($request->published);
        Car::create($data);
        return redirect('cars');

    //   
   
    
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $car = Car::findOrFail($id);                     
        return view('showCar', compact('car')); 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $car = Car::findOrFail($id);                     
        $categories = Category::select('id', 'cat_name')->get();
        return view('updateCar',compact('car', 'categories'));   //show car and categories detailes by compact
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
   
    //    $car = Car::findOrFail($id);   
    // //    //best method for insert and update
    //    $messages = $this->messages();
    //    $data = $request->validate([
    //        'title'=>'required|string|max:50',
    //        'description'=> 'required|string',
    //     //    'image' => 'mimes:png,jpg,jpeg|max:2048',
    //       ]);
    //       if($request->hasFile('image') && request('image') !='' ){
    //         $destination = 'assets/images/'.$car->image;
    //            if(file::exists($destination)){
    //                file::delete($destination);
    //            }
    //         $fileName = $this->uploadFile($request->image,'assets/images');    //html name,path
    //         $data['image'] = $fileName; 
    //       }
    //      $data['published'] = isset($request->published);
    //      Car::where('id',$id)->update($data); 

    //     return back()->With('success','car data updated successfully');   
        $data = $request->only($this->columns);
        $messages = $this->messages();
        $data = $request->validate([
             'title'=>'required|string|max:50',
             'description'=> 'required|string',
             'image' => 'sometimes|mimes:png,jpg,jpeg|max:2048',
             'category_id' => 'required',
            ], $messages);

        if($request->hasFile('image')){
            $fileName = $this->uploadFile($request->image, 'assets/images');  
            $data['image'] = $fileName;
            unlink("assets/images/" . $request->oldImage); //delete old image
        }

        $data['published'] = isset($request->published);
        Car::where('id', $id)->update($data);
        return redirect('cars');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Car::where('id',$id)->delete();
        return redirect('cars');
    }

    public function trashed()
    {
        $cars= Car::onlyTrashed()->get();
        return view('trashed', compact('cars'));
    }

    public function forceDelete(string $id)
    {
        Car::where('id',$id)->forceDelete();
        return redirect('cars');
    }

    public function restore(string $id)
    {
        Car::where('id',$id)->restore();
        return redirect('cars');
    }

    public function messages(){
        return [
            'title.required'=>'عنوان السيارة مطلوب',
            'title.string'=>'Should be string',
            'description.required'=> 'should be text',
            'image.required'=> 'Please be sure to select an image',
            'image.mimes'=> 'Incorrect image type',
            'image.max'=> 'Max file size exceeded',
            ];
    }

   
}
