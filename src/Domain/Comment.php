<?php
/**
 * Created by PhpStorm.
 * User: benja
 * Date: 08/11/15
 * Time: 20:10
 */

namespace MicroCMS\Domain;

class Comment
{
    /**
     * Comment id.
     * @var integer
     */
    private $id;

    /**
     * Comment author.
     * @var string
     */
    private $author;

    /**
     * Comment content.
     * @var integer
     */
    private $content;

    /**
     * Associated article.
     * @var \MicroCMS\Domain\Article
     */
    private $article;

    // GETTERS & SETTERS //
    public function getId() { return $this->id; }
    public function setId($id) { $this->id = $id; }

    public function getAuthor() { return $this->author; }
    public function setAuthor($author) { $this->author = $author; }

    public function getContent() { return $this->content; }
    public function setContent($content) { $this->content = $content; }

    public function getArticle() { return $this->article; }
    public function setArticle(Article $article) { $this->article = $article; }
}