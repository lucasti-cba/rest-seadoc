<?php

class PostFactory
{
    public static function create(string $title, string $content): Post
    {
        $post = new Post();
        $post->setTitle($title);
        $post->setContent($content);
        return $post;
    }

    public function asArray(): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'content' => $this->content
        ];
    }
}