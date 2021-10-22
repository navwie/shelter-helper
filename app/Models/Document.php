<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Document extends Model
{
    use HasFactory, Notifiable;

    private $name;
    private $description;
    private $url;
    private $author_id;
    private $last_user_opened;
    private $last_opend_time;

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description): void
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param mixed $url
     */
    public function setUrl($url): void
    {
        $this->url = $url;
    }

    /**
     * @return mixed
     */
    public function getAuthorId()
    {
        return $this->author_id;
    }

    /**
     * @param mixed $author_id
     */
    public function setAuthorId($author_id): void
    {
        $this->author_id = $author_id;
    }

    /**
     * @return mixed
     */
    public function getLastUserOpened()
    {
        return $this->last_user_opened;
    }

    /**
     * @param mixed $last_user_opened
     */
    public function setLastUserOpened($last_user_opened): void
    {
        $this->last_user_opened = $last_user_opened;
    }

    /**
     * @return mixed
     */
    public function getLastOpendTime()
    {
        return $this->last_opend_time;
    }

    /**
     * @param mixed $last_opend_time
     */
    public function setLastOpendTime($last_opend_time): void
    {
        $this->last_opend_time = $last_opend_time;
    }


}
