<?php global  $login_user;
require_once VIEWS. '/incs/header.php' ?>

    <main class="main">
        <div class="container">
            <form method="post" action="/lk">
                <div class="mb-3 pt-3">
                    <?php echo $login_user['email']; ?>
                </div>
                <button type="submit" class="btn btn-primary">Выход</button>
            </form>
        </div>
    </main>

<?php require_once VIEWS. '/incs/footer.php'; ?>