<?php

namespace Application\Model;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class TaskItem {

    /**
     * @ORM\Id
     * @ORM\GeneratedValue("AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $title;
    
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;    

    /**
     * @ORM\Column(type="integer")
     */
    private $completed = 0;
    
    /**
     * @ORM\Column(type="integer")
     */
    private $priority = 0;    

    /**
     * @ORM\Column(type="datetime")
     */
    private $created;

    public function __construct() {
        $this->created = date('Y-m-d H:i:s');
    }

    public function getId() {
        return $this->id;
    }

    public function setId($Value) {
        $this->id = $Value;
    }

    public function getTitle() {
        return $this->title;
    }

    public function setTitle($Value) {
        $this->title = $Value;
    }
    
    public function getDescription() {
        return $this->description;
    }

    public function setDescription($Value) {
        $this->description = $Value;
    }    

    public function getCompleted() {
        return $this->completed;
    }

    public function setPriority($Value) {
        $this->priority = $Value;
    }

        public function getPriority() {
        return $this->priority;
    }

    public function setCompleted($Value) {
        $this->completed = $Value;
    }
    public function getCreated() {
        return $this->created;
    }

    public function setCreated($Value) {
        $this->created = $Value;
    }
    public function modifiedDate() {
        $this->setCreated(new \DateTime("now"));
    }    

}
