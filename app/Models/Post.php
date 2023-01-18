<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
    * POST ATTRIBUTES
        * $this->attributes['id'] - int - contains the post primary key (id)
        * $this->attributes['title'] - string - contains the post title
        * $this->attributes['description'] - string - contains the post description
        * $this->attributes['image'] - string - contains the post image
        * $this->attributes['created_at'] - timestamp - contains the post creation date
        * $this->attributes['updated_at'] - timestamp - contains the post update date
    */
    public static function validate($request)
    {
        $request->validate([
           "title" => "required|max:255",
           "description" => "required",
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
    public function getSlug()
    {
        return $this->attributes['slug'];
    }

    public function setSlug($slug)
    {
        $this->attributes['slug'] = $slug;
    }
    public function getDescription()
    {
        return $this->attributes['description'];
    }

    public function setDescription($description)
    {
        $this->attributes['description'] = $description;
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
