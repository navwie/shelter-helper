<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\DocumentService;
use App\Http\Requests\CreateDocumentRequest;

class DocumentController extends Controller
{
    public function createDocument(CreateDocumentRequest $request): void
    {
        DocumentService::createDocument($request);
    }

    public function deleteDocument($id): void
    {
        DocumentService::deleteDocument($id);
    }

    public function openDocument(): void
    {
        $id = request("id");
        DocumentService::openDocument($id);
    }
}
