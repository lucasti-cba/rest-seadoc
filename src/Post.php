<?php

class Post
{
    private int $id = null;

    private string $title;

    private string $content;


    /*
    Getter and setter for Post
    */
	public function setId( int $idSet) 
    {
		$this->id = $idSet;
	}
    public function getId() 
    {
		return $this->id;
	}


	public function getTitle() 
    {
		return $this->title;
	}
    public function setTitle( string $titleSet) 
    {
		$this->title = $titleSet;
	}


    
	public function getContent() 
    {
		return $this->content;
	}
    public function setContent( string $contentSet) 
    {
		$this->content = $contentSet;
	}

}