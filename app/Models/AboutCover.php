<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutCover extends Model
{
    /**
    * ABOUTCOVER ATTRIBUTES
        * $this->attributes['id'] - int - contains the memeber primary key (id)
        * $this->attributes['title'] - string - contains the memeber title
        * $this->attributes['quote'] - string - contains the member quote
        * $this->attributes['image'] - string - contains the member image profile
        * $this->attributes['created_at'] - timestamp - contains the event creation date
        * $this->attributes['updated_at'] - timestamp - contains the event update date
    */
    public static function validate($request)
    {
        $request->validate([
            "title" => "required|max:255",
            "quote" => "required|max:255",
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

    // Title
    public function getTitle()
    {
        return $this->attributes['title'];
    }

    public function setTitle($title)
    {
        $this->attributes['title'] = $title;
    }

    // Quote
    public function getQuote()
    {
        return $this->attributes['quote'];
    }

    public function setQuote($quote)
    {
        $this->attributes['quote'] = $quote;
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
