<?php

namespace App\Http\Controllers;

use App\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use Illuminate\Http\UploadedFile;
use InterventionImage;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request, $post)
    {
        // $path = $request->imageFile->store('public/images');
        // $image = new File($request->imageFile);

        $extension = $request->imageFile->getClientOriginalExtension();
        $filename = str_slug($request->altText,'-') . '_' . $post . '_' . time();
        $tempPath = Storage::putFileAs('public/images/temp', new File($request->imageFile), $filename . $extension);

        return $tempPath;

        // $images = [
        //     'sm_jpg' => '',
        //     'sm_wp' => '',
        //     'md_jpg' => '',
        //     'md_wp' => '',
        //     'lg_jpg' => '',
        //     'lg_wp' => '',
        // ];

        // foreach($images as $image) {
        //     $imgInstance = InterventionImage::make($path);
        //     $imgInstance->resize(null, 640, function ($constraint) {
        //         $constraint->aspectRatio();
        //         $constraint->upsize();
        //     });
        //     $imgInstance->save('public/images', 60);
        // }

        // $img = InterventionImage::make($path)
        
        // resize(null, 640, function ($constraint) {
        //         $constraint->aspectRatio();
        //         $constraint->upsize();
        //     });

        // $img = Image::make('public/foo.jpg')
        // $img->resize(null, 400, function ($constraint) {
        //     $constraint->aspectRatio();
        //     $constraint->upsize();
        // });
        // save file as jpg with medium quality
        // $img->save('public/bar.jpg', 60);

        // encode png image as jpg
        // $jpg = (string) Image::make('public/foo.png')->encode('jpg', 75);

        // encode image as data-url
        // $data = (string) Image::make('public/bar.png')->encode('data-url');

        return $path;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function show(Image $image)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function edit(Image $image)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Image $image)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy(Image $image)
    {
        //
    }
}
