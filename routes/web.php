<?php

// Download Route
Route::get('download/{filename}', function($filename)
{
    $file_path = storage_path('app/public' . '/file/') . $filename;

    if (file_exists($file_path))
    {
        return Response::download($file_path, $filename, [
            'Content-Length: '. filesize($file_path)
        ]);
    }
    else
    {
        exit('Requested file does not exist on our server!');
    }
})->where('filename', '[A-Za-z0-9\-\_\.]+');