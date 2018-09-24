<?php

namespace App\Http\Controllers;

use App\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use Illuminate\Http\UploadedFile;
use InterventionImage;
use Buglinjo\LaravelWebp\Facades\LaravelWebp;

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

        $storageDirectory = 'public/images/posts/' . $post;
        $relativeStorageDirectory = storage_path('app/' . $storageDirectory);
        $relativePublicPath = '/images/posts/' . $post;
        $uploadedFile = new File($request->imageFile);
        $fileName = str_slug($request->altText,'-') . '_' . $post . '_' . time();
        $extension = strtolower($request->imageFile->getClientOriginalExtension());
        $originalFileName = $fileName . '.' . $extension;
        Storage::putFileAs($storageDirectory, $uploadedFile, $originalFileName);

        $imagesConfig = [
            'sizes' => [
                'sm' => 380,
                'md' => 480,
                'lg' => 640
            ],
            'formats' => [
                'jpg',
                'webp'
            ]
        ];

        foreach ($imagesConfig['sizes'] as $sizeName => $width) {
            unset($resizedFile);
            $resizedFile = InterventionImage::make($relativeStorageDirectory . '/' . $originalFileName)->resize(null, $width, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            foreach ($imagesConfig['formats'] as $format) {
                $fileVersionName = $fileName .  '_' . $sizeName . '.' . $format;
                $reformattedFile = $resizedFile->encode($format, 60)->save($relativeStorageDirectory . '/' . $fileVersionName);
            }
        }

        $image = Image::create([
            'alt_text' => $request->altText,
            'file_basename' => $fileName,
            'post_id' => $post
        ]);

        return $image;
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
