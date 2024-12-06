<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <div class="container-fluid">
        <img src="/images/airconnect-logo.jpg" alt="AirConnect Logo" class="rounded-circle me-2" style="width: 4rem;">
        <a class="navbar-brand" href="/">AirConnect</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mb-2 mb-md-0">
                <li class="nav-item">
                    <a class="nav-link
                        <?= urlIs('/') ? "active" : "" ?>
                    " href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link
                        <?= urlIs('/products') ? "active" : "" ?>
                    " href="/about">Products</a>
                </li>
                <?php if ($_SESSION["user"] ?? false) : ?>
                    <li class="nav-item">
                        <a class="nav-link
                        <?= urlIs('/notes') ? "active" : "" ?>
                    " href="/notes">Notes</a>
                    </li>
                <?php endif; ?>
            </ul>

            <div class="ms-auto d-flex align-items-center gap-2">
                <?php if ($_SESSION['user'] ?? false) : ?>
                    <p class="text-light p-0 m-0"><?= $_SESSION['user']['email']; ?></p>
                    <form action="/session" method="POST">
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn btn-danger">Logout</button>
                    </form>
                <?php else : ?>
                    <a href="/login" class="btn btn-primary">Login</a>
                    <a href="/register" class="btn btn-secondary">Register</a>
                <?php endif ?>
            </div>
        </div>
    </div>
</nav>