<?php
namespace Service;

use App\Http\Requests\CreateDocumentRequest;
use App\Models\Document;
use App\Services\DocumentService;

class DocumentServiceTest extends \Codeception\Test\Unit
{

    private Document $document;
    /**
     * @var \UnitTester
     */
    protected $tester;

    protected function _before()
    {
        session()->put("userId", 1);
        session()->put('activeProject', 1);
        $this->document = Document::all()->first();
    }

    protected function _after()
    {
    }


    public function testCreateDocument()
    {
        $request = CreateDocumentRequest::create(
            'createCardService/',
            'GET',
            [
                'name' => 'First document',
                'description' => 'It`t our first document',
                'url' => 'https://github.com/ardad14/scrum-dashboard'
            ]
        );

        $this->assertTrue(DocumentService::createDocument($request));
    }

    public function testGetDocumentsByProject()
    {
        $this->assertIsString(DocumentService::getDocumentsByProject());
    }

    public function testDeleteDocument()
    {
        $this->assertTrue(DocumentService::deleteDocument($this->document->id));
    }

    public function testOpenDocument()
    {
        $this->assertTrue(DocumentService::openDocument($this->document->id));
    }
}
