<?php

namespace App\Services;

use App\Http\Requests\CreateDocumentRequest;
use Illuminate\Support\Facades\DB;

class DocumentService
{
    public static function createDocument(CreateDocumentRequest $request): void
    {
        DB::table('documents')->insert([
            'name' => $request['name'],
            'description' => $request['description'],
            'url' => $request['url']
        ]);
        header("Location: /");
    }
}
