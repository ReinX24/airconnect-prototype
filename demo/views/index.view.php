<?php require 'partials/head.php'; ?>

<?php require 'partials/nav.php'; ?>

<!-- <?php require 'partials/banner.php'; ?> -->

<div class="container col-8 p-4">
    <!-- <p>Hello, <?= $_SESSION['user']['email'] ?? 'Guest' ?>. Welcome to the home page.</p> -->

    <div class="px-4 py-5 my-5 text-center">
        <div class="d-flex justify-content-center">
            <img src="/images/airconnect-logo.jpg" alt="AirConnect Logo" class="rounded-circle border border-light-subtle" style="width: 16rem;">
        </div>
        <h1 class="display-5 fw-bold text-body-emphasis">AirConnect</h1>
        <div class="col-lg-6 mx-auto">
            <p class="lead mb-4">An Online E-Commerce System for Air Conditioners</p>
            <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                <button type="button" class="btn btn-primary btn-lg px-4 gap-3">Login</button>
                <button type="button" class="btn btn-outline-secondary btn-lg px-4">Sign Up</button>
            </div>
        </div>
    </div>
</div>

<?php require 'partials/footer.php'; ?>