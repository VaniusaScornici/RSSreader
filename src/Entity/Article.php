<?php

namespace RSSReader\Entity;

use JetBrains\PhpStorm\Pure;

class Article
{
    public function __construct(
        protected int $id,
        protected string $resourceName,
        protected string $url,
        protected string $title,
        protected string $content,
        protected ?string $createdAt){

}
    #[Pure] public static function fromArray(array $data):Article
    {
        return new Article(
            $data["id"],
            $data["resource_name"],
            $data["url"],
            $data["title"],
            $data["content"],
            $data["created_at"]
        );
    }

    public function getID(): int
    {return $this->id;}
    public function getResourceName(): string
    {return $this->resourceName;}

    public function getUrl(): string
    {return $this->url;}

    public function getTitle(): string
    {return $this->title;}

    public function getContent(): string
    {return $this->content;}

    public function getCreatedAt(): ?string
    {return $this->createdAt;}

}