<?php
require_once CLASSES . '/Comments.php';
global $db;
session_start();
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(E_ALL);

$commentsData = new Comments($db);

$title = 'Статья';
$id = $_GET['id'] ?? null;
$login_user = $_SESSION['user'];
$post = $db->query("SELECT * FROM article WHERE id = {$id}")->fetch();

try {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (!empty($_POST['text']) && isset($_POST['comment'])) {
            $commentsData->addComment($id, $login_user['email'], $_POST['text'], $_POST['parent_id']);
            header("Location: about?id=" . $id);
            exit;
        } elseif (isset($_POST['edit']) && $login_user['email']) {
            $comment = $commentsData->getCommentById($commentsData->getCommentsByArticleId($id), $_POST['comment_id']);
            if ($comment !== null && $login_user['email'] == $comment['user_name']) {
                $commentsData->editComment($_POST['comment_id'], $_POST['text_edit']);
                print_r($_POST);
                die();
                header("Location: about?id=" . $id);
                exit;
            }
        } elseif (isset($_POST['delete']) && $login_user['email']) {
            $comment = $commentsData->getCommentById($commentsData->getCommentsByArticleId($id), $_POST['comment_id']);
            if ($comment !== null && $login_user['email'] == $comment['user_name']) {
                $commentsData->deleteComment($_POST['comment_id']);
                header("Location: about?id=" . $id);
                exit;
            }
        } elseif (isset($_POST['reply']) && $login_user['email'])  {
            $commentsData->addComment($id, $login_user['email'], $_POST['text'], $_POST['parent_id']);
            header("Location: about?id=" . $id);
            exit;
        } else {
            $error_message = 'Ошибка';
        }
    }
} catch (PDOException $e) {
    $error_message = 'Авторизируйтесь';
}

if (!$post) {
    abort();
}

$comments = $commentsData->getCommentsByArticleId($id);

require_once '../views/about.tpl.php';
