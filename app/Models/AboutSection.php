<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutSection extends Model
{
    /**
    * ABOUT SECTION ATTRIBUTES
        * $this->attributes['id'] - int - contains the about primary key (id)
        * $this->attributes['description'] - string - contains the about description
        * $this->attributes['details'] - string - contains the about section details
        * $this->attributes['image'] - string - contains the about section image profile
        * $this->attributes['created_at'] - timestamp - contains the event creation date
        * $this->attributes['updated_at'] - timestamp - contains the event update date
    */
    public static function validate($request)
    {
        $request->validate([
            "description" => "required",
            "details" => "required",
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

    // Description
    public function getDescription()
    {
        return $this->attributes['description'];
    }

    public function setDescription($description)
    {
        $this->attributes['description'] = $description;
    }

    // Details
    public function getDetails()
    {
        return $this->attributes['details'];
    }

    public function setDetails($details)
    {
        $this->attributes['details'] = $details;
    }

    // Image
    public function getImage()
    {
        return $this->attributes['image'];
    }

    public function setImage($image)
    {
        $this->attributes['image'] = $image;
    }

    // CreatedAt
    public function getCreatedAt()
    {
        return $this->attributes['created_at'];
    }

    public function setCreatedAt($createdAt)
    {
        $this->attributes['created_at'] = $createdAt;
    }

    // UpdatedAt
    public function getUpdatedAt()
    {
        return $this->attributes['updated_at'];
    }

    public function setUpdatedAt($updatedAt)
    {
        $this->attributes['updated_at'] = $updatedAt;
    }
}
