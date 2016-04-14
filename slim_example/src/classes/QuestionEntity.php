<?php

class TicketEntity
{
    protected $id;
    protected $text;
    protected $title;
    protected $answer;

    public function __construct(array $data) {
       
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
