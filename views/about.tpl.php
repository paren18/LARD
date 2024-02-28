<?php
global $post, $comments, $id;
require_once VIEWS . '/incs/header.php';


function displayCommentForm($comment)
{
    return <<<HTML
        <form method="post" action="/about?id={$comment['id_article']}" id="comment-form-{$comment['id']}">
            <div class="mt-2">
                <div class="w-100">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex flex-row align-items-center mx-2">
                            <span class="mr-2" name="user_name">{$comment['user_name']}</span>
                        </div>
                    </div>
                    <textarea name="text_edit" class="text-justify comment-text mb-3 mx-2" style="width: 98%;resize: none;">{$comment['text']}</textarea>
                </div>
                <input type="hidden" name="comment_id" value="{$comment['id']}">
                <input type="hidden" name="user_name" value="{$comment['user_name']}">
                <button type="submit" name="edit" class="btn btn-primary mx-2 mb-4">Редактировать</button>
                <button type="submit" name="delete" class="btn btn-primary mx-2 mb-4">Удалить</button>
                <button type="button" class="btn btn-primary mx-2 mb-4 reply-btn" data-comment-id="{$comment['id']}">Ответить</button>
            </div>
        </form>
        <div class="reply-form" id="reply-form-{$comment['id']}" style="display: none;">
            <form method="post" action="/about?id={$comment['id_article']}">
                <textarea name="text" class="text-justify comment-text mb-3 mx-2" style="width: 98%;resize: none;"></textarea>
                <input type="hidden" name="parent_id" value="{$comment['id']}">
                <button type="submit" name="reply" class="btn btn-primary mx-2 mb-4">Ответить</button>
            </form>
        </div>
    HTML;
}

function displayComments($comments, $id, $post)
{
    foreach ($comments as $comment) {
        if (isset($comment['id_article']) && $post['id'] == $comment['id_article']) {
            echo displayCommentForm($comment);

            if (!empty($comment['replies'])) {
                echo '<ul class="nested">';
                displayComments($comment['replies'], $id, $post);
                echo '</ul>';
            }
        }
    }
}

?>
    <main class="main">
        <div class="container">
            <div class="col-md-12 mt-2">
                <h1>Статья</h1>
                <div class="card mb-2">
                    <div class="card-body">
                        <h5 class="card-title"><?= $post['title'] ?></h5>
                        <h6 class="card-subtitle mb-2 text-muted"><?= $post['author'] ?></h6>
                        <p class="card-text"><?= $post['text'] ?></p>
                    </div>
                </div>
            </div>

            <div class="container mt-5">
                <div class="row height d-flex justify-content-center align-items-center">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="p-3">
                                <h6>Комментари</h6>
                            </div>
                            <form method="post" action="/about?id=<?= $id ?>">
                                <div class="mt-3 d-flex flex-row align-items-center p-3 form-color">
                                    <input type="text" name="text" class="form-control"
                                           placeholder="Enter your comment...">
                                    <input type="hidden" name="parent_id" value="<?= 1 ?>">
                                </div>
                                <button type="submit" name="comment" class="btn btn-primary mx-3 mb-4">
                                    Комментировать
                                </button>
                                <?php if (!empty($error_message)): ?>
                                    <div class="text-danger bg-light p-2 col-md-4 offset-md-4"
                                         style="text-align:center; font-size: 21px"><?= $error_message ?></div>
                                <?php endif; ?>
                            </form>

                            <?php foreach ($comments as $comment): ?>
                                <form method="post" action="/about?id=<?= $id ?>"
                                      id="comment-form-<?= $comment['id'] ?>">
                                    <div class="mt-2">
                                        <div class="w-100">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="d-flex flex-row align-items-center mx-2">
                                                    <span class="mr-2"
                                                          name="user_name"><?= $comment['user_name'] ?></span>
                                                </div>
                                            </div>
                                            <textarea name="text_edit" class="text-justify comment-text mb-3 mx-2"
                                                      style="width: 98%;resize: none;"><?= $comment['text'] ?></textarea>
                                        </div>
                                        <input type="hidden" name="comment_id" value="<?= $comment['id'] ?>">
                                        <input type="hidden" name="user_name" value="<?= $comment['user_name'] ?>">
                                        <button type="submit" name="edit" class="btn btn-primary mx-2 mb-4">
                                            Редактировать
                                        </button>
                                        <button type="submit" name="delete" class="btn btn-primary mx-2 mb-4">Удалить
                                        </button>
                                        <button type="button" class="btn btn-primary mx-2 mb-4 reply-btn"
                                                data-comment-id="<?= $comment['id'] ?>">Ответить
                                        </button>
                                    </div>
                                </form>
                                <div class="reply-form" id="reply-form-<?= $comment['id'] ?>"
                                     style="display: none;">
                                    <form method="post" action="/about?id=<?= $id ?>">
                                            <textarea name="text" class="text-justify comment-text mb-3 mx-2"
                                                      style="width: 98%;resize: none;"></textarea>
                                        <input type="hidden" name="parent_id" value="<?= $comment['id'] ?>">
                                        <button type="submit" name="reply" class="btn btn-primary mx-2 mb-4">
                                            Ответить
                                        </button>
                                    </form>
                                </div>

                                <?php if (!empty($comment['replies'])): ?>
                                    <ul class="nested">
                                        <?php displayComments($comment['replies'], $id, $post); ?>
                                    </ul>
                                <?php endif; ?>
                            <?php endforeach; ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var replyButtons = document.querySelectorAll('.reply-btn');

            replyButtons.forEach(function (button) {
                button.addEventListener('click', function () {
                    var commentId = this.getAttribute('data-comment-id');
                    var replyForm = document.getElementById('reply-form-' + commentId);

                    // Переключаем видимость формы ответа
                    if (replyForm.style.display === 'none' || replyForm.style.display === '') {
                        replyForm.style.display = 'block';
                    } else {
                        replyForm.style.display = 'none';
                    }
                });
            });
        });
    </script>

<?php require_once VIEWS . '/incs/footer.php' ?>