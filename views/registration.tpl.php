<?php require_once VIEWS. '/incs/header.php' ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script src="assets/captca.js"></script>

<main class="main">
    <div class="container">
        <form method="post" action="/registration">
            <div class="mb-3 pt-3">
                <label for="email" class="form-label">Email</label>
                <input name="email" type="email" class="form-control" id="email" aria-describedby="emailHelp" >
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Пароль</label>
                <input name="password" type="password" class="form-control" id="password">
            </div>
            <div class="mb-3">
                <label for="password_again" class="form-label">Повторите пароль</label>
                <input name="password2" type="password" class="form-control" id="password2">
            </div>
            <div class="g-recaptcha" data-sitekey="6LfycYIpAAAAALXpH8Ki6gTg07p4lCR3G5xzVBdz" data-callback="onRecaptchaSuccess"></div>
            <button type="submit" class="btn btn-primary" id="submitBtn" disabled>Регестрация</button>
        </form>
        <?php if (!empty($message)): ?>
            <div class="text-danger bg-dark p-2 col-md-4 offset-md-4" style="text-align:center; font-size: 21px"><?= $message ?></div>
        <?php endif; ?>
    </div>
</main>
<?php require_once VIEWS. '/incs/footer.php' ?>
