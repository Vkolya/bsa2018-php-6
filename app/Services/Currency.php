<?php

namespace App\Services;

class Currency implements \JsonSerializable
{
    private $id;
    private $name;
    private $shortName;
    private $actualCourse;
    private $actualCourseDate;
    private $isActive;


    public function __construct($id,$name,$shortName,$actualCourse,$actualCourseDate,$isActive) 
    {
        $this->id = $id;
        $this->name = $name;
        $this->shortName = $shortName;
        $this->actualCourse = $actualCourse;
        $this->actualCourseDate= $actualCourseDate;
        $this->isActive = $isActive;
    }
    public function getId() 
    {
        return $this->id;
    }
    public function getName() 
    {
        return $this->name;
    }
    public function getShortName() 
    {
        return $this->shortName;
    }
    public function getActualCourse() 
    {
        return $this->actualCourse;
    }
    public function getActualCourseDate() 
    {
        return $this->actualCourseDate;
    }
    public function isActive() 
    {
        return $this->isActive;
    }
    public function setName($name) 
    {
        $this->name = $name;
    }
    public function setShortName($shortName) 
    {
        $this->shortName = $shortName;
    }
    public function setActualCourse($actualCourse) 
    {
        $this->actualCourse = $actualCourse;
    }
    public function setActualCourseDate($actualCourseDate) 
    {
        $this->actualCourseDate = $actualCourseDate;
    }
    public function setActive($active) 
    {
        $this->active = $active;
    }
    /**
     * Specify data which should be serialized to JSON
    */
    public function jsonSerialize() : array
    {
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'short_name'  => $this->getShortName(),
            'actual_course' => $this->getActualCourse(),
            'actual_course_date' => $this->getActualCourseDate(),
            'active' => $this->isActive()
        ];
    }
}