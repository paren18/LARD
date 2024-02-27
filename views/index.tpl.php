<?php require_once VIEWS. '/incs/header.php' ?>

    <main class="main">
        <div class="container">
            <h1>Статьи</h1>
            <?php foreach ($posts as $post): ?>
                <div class="card mb-2">
                    <div class="card-body">
                        <h5 class="card-title"><?=  $post['title'] ?></h5>
                        <h6 class="card-subtitle mb-2 text-muted"><?=  $post['author'] ?></h6>
                        <p class="card-text"><?= $post['text'] ?></p>
                        <a href="about?id=<?= $post['id'] ?>" class="card-link">Обсуждение</a>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
    </main>

<?php require_once VIEWS. '/incs/footer.php' ?>