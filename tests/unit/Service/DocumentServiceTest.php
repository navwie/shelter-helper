<?php
namespace Service;

use App\Http\Requests\CreateDocumentRequest;
use App\Models\Document;
use App\Services\DocumentService;
use Illuminate\Http\Request;

class DocumentServiceTest extends \Codeception\Test\Unit
{

    private Document $document;
    /**
     * @var \UnitTester
     */
    protected $tester;

    protected function _before()
    {
        session()->put("userId", 7);
        session()->put('activeProject', 3);
        $this->document = Document::all()->first();
    }

    protected function _after()
    {
    }


    public function testCreateDocument()
    {
        $request = CreateDocumentRequest::create(
            '/createDocumentService',
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
        $request = Request::create(
            "/deleteDocument",
            'DELETE',
            [
                'id' => $this->document->id
            ]
        );
        $this->assertTrue(DocumentService::deleteDocument($request));
    }

    public function testOpenDocument()
    {
        $this->assertTrue(DocumentService::openDocument($this->document->id));
    }

    public function testEditDocument()
    {
        $document = Document::factory()->make();

        $request = Request::create(
            "/editDocumentService" . $document->id,
            'PUT',
            [
                'id' => $document->id,
                'name' => $document->name,
                'description' => $document->description,
                'url' => $document->url
            ]
        );
        $this->assertTrue(DocumentService::editDocument($request));

        $request = Request::create(
            "/editDocumentService" . $document->id,
            'PUT',
            [
                'id' => '',
                'name' => '',
                'description' => '',
                'url' => ''
            ]
        );
        $this->assertTrue(DocumentService::editDocument($request));
    }
}
