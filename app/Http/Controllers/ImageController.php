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

        $tempLocation = 'public/images/temp';
        $uploadedFile = new File($request->imageFile);
        $fileName = str_slug($request->altText,'-') . '_' . $post . '_' . time();
        $extension = strtolower($request->imageFile->getClientOriginalExtension());
        $tempFilePath = Storage::putFileAs($tempLocation, $uploadedFile, $fileName . '.' . $extension);

        // return $tempFilePath;
        
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

        $postImageFormats = [];
        $tempFilePath = storage_path('app/' . $tempFilePath);
        $finalLocation = storage_path('app/public/images/posts');
        $relativePath = '/images/posts/';

        foreach ($imagesConfig['sizes'] as $sizeName => $width) {
            unset($fileSize);
            $fileSize = InterventionImage::make($tempFilePath)->resize(null, $width, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            foreach ($imagesConfig['formats'] as $format) {
                if ($format == 'jpg') { 
                    $saveLocation = $finalLocation . '/' . $fileName .  '_' . $sizeName . '.' . $format;
                    $fileFormat = $fileSize->encode($format, 60)->save($saveLocation);
                    $postImageFormats[$sizeName .'_' . $format] = $relativePath . $fileFormat->basename;
                }
                if ($format == 'webp') { 
                    $saveLocation = $finalLocation . '/' . $fileName .  '_' . $sizeName . '.' . $format;
                    $fileFormat = $fileSize->encode($format, 60)->save($saveLocation);
                    $postImageFormats[$sizeName .'_' . $format] = $relativePath . $fileFormat->basename;
                }
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
