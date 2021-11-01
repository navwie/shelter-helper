<?php
namespace Service;

use App\Models\User;
use App\Services\NotificationService;
use App\Models\Notification;

class NotificationServiceTest extends \Codeception\Test\Unit
{
     /**
     * @var \UnitTester
     */
    protected $tester;

    protected function _before()
    {
        $user = User::all()->first();
        session()->put("userId", $user->id);
        session()->put('activeProject', 1);
    }

    protected function _after()
    {
    }


    public function testGetUnreadNotifications()
    {
        $this->assertIsString(NotificationService::getUnreadNotifications());
        $this->assertIsString(NotificationService::getUnreadNotifications('CreateProjectNotification'));
        $this->assertIsString(NotificationService::getUnreadNotifications('DeleteProjectNotification'));
        $this->assertIsString(NotificationService::getUnreadNotifications('CreateDocumentNotification'));
        $this->assertIsString(NotificationService::getUnreadNotifications('DeleteDocumentNotification'));
        $this->assertIsString(NotificationService::getUnreadNotifications('SomeText'));
    }
}
