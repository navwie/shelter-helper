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

    public function deleteDocument(Request $request): void
    {
        DocumentService::deleteDocument($request);
    }

    public function openDocument(): void
    {
        $id = request("id");
        DocumentService::openDocument($id);
    }

    public function editDocument(Request $request): void
    {
        DocumentService::editDocument($request);
    }
}
