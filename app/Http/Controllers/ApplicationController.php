<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Category;
use App\Models\Status;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;


class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('application');
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
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'path' => 'required|mimes:jpg,jpeg,png,bmp|max:10000',
        ]);


        $file = $request->file('path');
        $upload_folder = 'public/images';
        $filename = $file->getClientOriginalName();

        Storage::putFileAs($upload_folder, $file, $filename);

        Application::create([
                'user_id' => auth()->user()->id,
                'status_id' => Status::where('name', 'Новая')->first()->id,
                'path' => url('/public/storage/images/' . $filename ),
            ] + $request->all());


        if ($validator->fails()) {
            return redirect()->route('home')->with('message', 'Error: Необходимо выбрать файл изображения');
        } else {
            return view('home', ['data' => Category::all(), 'applications' => Application::all()]);
        }

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
        $application = Application::find($id);
        if (auth()->user()->id == $application->user_id){
            $application->delete();
        }

        return redirect()->route('home');
    }
}
