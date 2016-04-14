<?php

class TicketEntity
{
    protected $id;
    protected $text;
    protected $title;
    protected $answer;

    /**
     * Accept an array of data matching properties of this class
     * and create the class
     *
     * @param array $data The data to use to create
     */
    public function __construct(array $data) {
        // no id if we're creating
        /*if(isset($data['id'])) {
            $this->id = $data['id'];
        }*/

        $this->id = $data['id'];
        $this->title = $data['title'];
        $this->text = $data['text'];
        $this->answer = $data['answer'];
    }

    public function getId() {
        return $this->id;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getText() {
        return $this->description;
    }

    public function getAnswer() {
        return substr($this->description, 0, 20);
    }

}
