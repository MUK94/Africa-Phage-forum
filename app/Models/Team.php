<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    /**
    * TEAM ATTRIBUTES
        * $this->attributes['id'] - int - contains the team primary key (id)
        * $this->attributes['country'] - string - contains the team country
        * $this->attributes['headerManager'] - string - contains the team headerManager
        * $this->attributes['managerTitle'] - number - contains the team managerTitle
        * $this->attributes['managerName'] - string - contains the team managerName
        * $this->attributes['managerInstitution'] - string - contains the team managerInstitution
        * $this->attributes['headerStakeholder'] - string - contains the team headerStakeholder
        * $this->attributes['stakeholderTitle'] - number - contains the team stakeholderTitle
        * $this->attributes['stakeholderName'] - string - contains the team stakeholderName
        * $this->attributes['stakeholderInstitution'] - string - contains the team stakeholderInstitution
        * $this->attributes['image'] - string - contains the team country flag
        * $this->attributes['created_at'] - timestamp - contains the event creation date
        * $this->attributes['updated_at'] - timestamp - contains the event update date
    */
    public static function validate($request)
    {
        $request->validate([
            "country" => "required|max:255",
            "managerTitle" => "required|max:255",
            "managerName" => "required|max:255",
            "managerInstitution" => "required|max:255",
            "stakeholderTitle" => "required|max:255",
            "stakeholderName" => "required|max:255",
            "stakeholderInstitution" => "required|max:255",
            "image" => "image"
        ]);
    }

    // @MANAGER
    public function getId()
    {
        return $this->attributes['id'];
    }

    public function setId($id)
    {
        $this->attributes['id'] = $id;
    }
    public function getCountry()
    {
        return $this->attributes['country'];
    }

    public function setCountry($country)
    {
        $this->attributes['country'] = $country;
    }

    public function getManagerTitle()
    {
        return $this->attributes['managerTitle'];
    }

    public function setManagerTitle($managerTitle)
    {
        $this->attributes['managerTitle'] = $managerTitle;
    }
    public function getManagerName()
    {
        return $this->attributes['managerName'];
    }

    public function setManagerName($managerName)
    {
        $this->attributes['managerName'] = $managerName;
    }
    public function getManagerInstitution()
    {
        return $this->attributes['managerInstitution'];
    }

    public function setManagerInstitution($managerInstitution)
    {
        $this->attributes['managerInstitution'] = $managerInstitution;
    }

    // @STAKEHOLDER
    public function getStakeholderTitle()
    {
        return $this->attributes['stakeholderTitle'];
    }

    public function setStakeholderTitle($stakeholderTitle)
    {
        $this->attributes['stakeholderTitle'] = $stakeholderTitle;
    }
    public function getStakeholderName()
    {
        return $this->attributes['stakeholderName'];
    }

    public function setStakeholderName($stakeholderName)
    {
        $this->attributes['stakeholderName'] = $stakeholderName;
    }
    public function getStakeholderInstitution()
    {
        return $this->attributes['stakeholderInstitution'];
    }

    public function setStakeholderInstitution($stakeholderInstitution)
    {
        $this->attributes['stakeholderInstitution'] = $stakeholderInstitution;
    }
    // @COUNTRY FLAG
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
