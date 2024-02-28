<?php

class Comments
{
    private $db;

    public function __construct(Db $db)
    {
        $this->db = $db;
    }

    public function addComment($articleId, $userEmail, $text, $parent_id = 1)
    {
        $this->db->query("INSERT INTO comments (`id_article`, `user_name`, `text`, `parent_id`) VALUES (?, ?, ?, ?)", [$articleId, $userEmail, $text, $parent_id]);

    }

    public function editComment($commentId, $text)
    {
        $this->db->query("UPDATE comments SET `text` = ? WHERE id = ?", [$text, $commentId]);
    }

    public function deleteComment($commentId)
    {
        $this->db->query("DELETE FROM comments WHERE id = ?", [$commentId]);
    }

    public function getCommentsByArticleId($articleId)
    {

        $result = $this->db->query("SELECT * FROM comments WHERE id_article = ?", [$articleId])->fetchAll();

        $commentsTree = $this->buildCommentsTree($result);
        return $commentsTree;
    }


    private function buildCommentsTree($comments, $parent_id = 1, $nestingLevel = 0)
    {
        $tree = [];

        if ($nestingLevel >= 10) {
            return $tree;
        }

        foreach ($comments as $comment) {
            if ($comment['parent_id'] == $parent_id) {
                $comment['replies'] = $this->buildCommentsTree($comments, $comment['id'], $nestingLevel + 1);
                $comment['nestingLevel'] = $nestingLevel;
                $tree[$comment['id']] = $comment;
            }
        }

        return $tree;
    }


}
