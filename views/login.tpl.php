<?php require_once VIEWS. '/incs/header.php' ?>

    <main class="main">
        <div class="container">
            <form method="post" action="/login">
                <div class="mb-3 pt-3">
                    <label for="email" class="form-label">Email</label>
                    <input name="email" type="email" class="form-control" id="email" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Пароль</label>
                    <input name="password" type="password" class="form-control" id="password">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>

            </form>
            <?php if (!empty($message)): ?>
                <div class="text-danger bg-dark p-2 col-md-4 offset-md-4" style="text-align:center; font-size: 21px"><?= $message ?></div>
            <?php endif; ?>
        </div>
    </main>

<?php require_once VIEWS. '/incs/footer.php' ?>