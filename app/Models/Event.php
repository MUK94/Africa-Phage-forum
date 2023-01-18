<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    /**
    * EVENT ATTRIBUTES
        * $this->attributes['id'] - int - contains the event primary key (id)
        * $this->attributes['title'] - string - contains the event title
        * $this->attributes['speakerName'] - string - contains the event speak
        * $this->attributes['speakerBio'] - string - contains the event speaker Bio
        * $this->attributes['eventLink'] - string - contains the event event Link
        * $this->attributes['image'] - string - contains the event image
        * $this->attributes['created_at'] - timestamp - contains the event creation date
        * $this->attributes['updated_at'] - timestamp - contains the event update date
    */
    public static function validate($request)
    {
        $request->validate([
           "title" => "required",
           "speakerName" => "required",
           "speakerBio" => "required",
           "eventLink" => "required",
           "image" => "image"
        ]);
    }
    
    public function getId()
    {
        return $this->attributes['id'];
    }

    public function setId($id)
    {
        $this->attributes['id'] = $id;
    }

    public function getTitle()
    {
        return $this->attributes['title'];
    }

    public function setTitle($title)
    {
        $this->attributes['title'] = $title;
    }

    public function getSpeakerName()
    {
        return $this->attributes['speakerName'];
    }

    public function setSpeakerName($speakerName)
    {
        $this->attributes['speakerName'] = $speakerName;
    }
    public function getSpeakerBio()
    {
        return $this->attributes['speakerBio'];
    }

    public function setSpeakerBio($speakerBio)
    {
        $this->attributes['speakerBio'] = $speakerBio;
    }
    public function getEventLink()
    {
        return $this->attributes['eventLink'];
    }

    public function setEventLink($eventLink)
    {
        $this->attributes['eventLink'] = $eventLink;
    }
    public function getImage()
    {
        return $this->attributes['image'];
    }

    public function setImage($image)
    {
        $this->attributes['image'] = $image;
    }

    public function getCreatedAt()
    {
        return $this->attributes['created_at'];
    }

    public function setCreatedAt($createdAt)
    {
        $this->attributes['created_at'] = $createdAt;
    }

    public function getUpdatedAt()
    {
        return $this->attributes['updated_at'];
    }

    public function setUpdatedAt($updatedAt)
    {
        $this->attributes['updated_at'] = $updatedAt;
    }
}
