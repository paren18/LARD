<?php
require_once CLASSES . '/Comments.php';
global $db;
session_start();

$commentsData = new Comments($db);

$title = 'Статья';
$id = $_GET['id'] ?? null;
$login_user = $_SESSION['user'];
$post = $db->query("SELECT * FROM article WHERE id = {$id}")->fetch();
$comments = $commentsData->getCommentsByArticleId($id);
try {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        if (!empty($_POST['text']) && isset($_POST['comment'])) {
            $commentsData->addComment($id, $login_user['email'], $_POST['text'], $_POST['parent_id']);
            header("Location: about?id=" . $id);
            exit;
        } elseif (isset($_POST['edit']) && $login_user['email'] == $_POST['user_name']) {
            $commentsData->editComment($_POST['comment_id'], $_POST['text_edit']);
            header("Location: about?id=" . $id);
            exit;
        } elseif (isset($_POST['delete']) && $login_user['email'] == $_POST['user_name']) {
            $commentsData->deleteComment($_POST['comment_id']);
            header("Location: about?id=" . $id);
            exit;
        } elseif (isset($_POST['reply']) && $login_user['email']) {
            $commentsData->addComment($id, $login_user['email'], $_POST['text'], $_POST['parent_id']);
            header("Location: about?id=" . $id);
            exit;
        } else {
            $error_message = 'Не ваш комментарий';
        }

    }
}
catch
    (PDOException $e) {
        $error_message = 'Авторизуйтесь';
    }

if (!$post) {
    abort();
}


require_once '../views/about.tpl.php';
