<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File; 

class ServeStorageFiles {
    public function handle($request, Closure $next) {
        if ($request->is('storage/*')) {
            $filePath = str_replace('storage/', '', $request->path());
            $file = Storage::disk('public')->get($filePath);

            // Obtener el tipo MIME
            $mimeType = File::mimeType(storage_path('app/public/' . $filePath));

            return response($file, 200)->header('Content-Type', $mimeType);
        }

        return $next($request);
    }
}