<?php

namespace App\Services;

use App\Http\Requests\CreateDocumentRequest;
use Illuminate\Support\Facades\DB;

class DocumentService
{
    public static function createDocument(CreateDocumentRequest $request): void
    {
        $documentId = DB::table('documents')->insertGetId([
            'name' => $request['name'],
            'description' => $request['description'],
            'url' => $request['url'],
            'author_id' => session()->get('userId')
        ]);

        DB::table("projects_documents")
            ->insert([
                "project_id" => session()->get('project'),
                "document_id" => $documentId
            ]);


        header("Location: /documents");
    }

    public static function getDocumentsByProject(): string|bool
    {
        return json_encode(
            DB::select('select * from documents where id =
                              (select document_id from projects_documents where project_id = ?)',
                [session()->get("project")]
            )
        );
    }


}
