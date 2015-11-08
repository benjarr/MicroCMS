<?php

namespace MicroCMS\DAO;

use MicroCMS\Domain\Article;

class ArticleDAO extends DAO
{
	/**
	 * Return a list of all articles, sorted by date (most recent first).
	 * @return array A list of all articles.
	 */
	public function findAll() {
		$sql = "SELECT * FROM t_article ORDER BY art_id DESC";
		$result = $this->getDb()->fetchAll($sql);

		// Convert query result to an array of domain objects
		$articles = array();
		foreach ($result as $row) {
			$articleId = $row['art_id'];
			$articles[$articleId] = $this->buildDomainObject($row);
		}
		return $articles;
	}

	/**
	 * Returns an article matching the supplied id.
	 * @param integer $id
	 * @return \MicroCMS\Domain\Article
	 * @throws \Exception If no matching article is found
	 */
	public function find($id) {
		$sql = "SELECT * FROM t_article WHERE art_id=?";
		$row = $this->getDb()->fetchAssoc($sql, array($id));

		if ($row) {
			return $this->buildDomainObject($row);
		} else {
			throw new \Exception("No article matching id " . $id);
		}
	}

	/**
	 * Creates an Article object based on a DB row.
	 * @param array $row The DB row containing Article data.
	 * @return \MicroCMS\Domain\Article
	 */
	protected function buildDomainObject($row) {
		$article = new Article();
		$article->setId($row['art_id']);
		$article->setTitle($row['art_title']);
		$article->setContent($row['art_content']);
		return $article;
	}
}