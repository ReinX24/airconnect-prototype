<?php require basePath('views/partials/head.php'); ?>

<?php require basePath('views/partials/nav.php'); ?>

<?php require basePath('views/partials/banner.php'); ?>

<div class="container col-8 p-4">
    <h1 class="text-center">Customer Support</h1>
    <p class="text-center">
        AirConnect, we prioritize your comfort and satisfaction. Our dedicated customer service team is here to assist you with all your air conditioning needs. Whether you're seeking technical support, product information, or guidance on choosing the right system, we’ve got you covered.
    </p>

    <form action="/support" method="POST">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" class="form-control" value="<?= $_SESSION["user"]["name"]; ?>" readonly>
        </div>

        <?php if (isset($errors['name'])) : ?>
            <p class="text-danger"><?= $errors['name']; ?></p>
        <?php endif ?>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" value="<?= $_SESSION["user"]["email"] ?>" readonly>
        </div>

        <?php if (isset($errors['email'])) : ?>
            <p class="text-danger"><?= $errors['email']; ?></p>
        <?php endif ?>

        <div class="mb-3">
            <label for="message" class="form-label">Message</label>
            <textarea name="message" id="message" class="form-control" style="height:200px;"><?= old("message") ?></textarea>
        </div>

        <?php if (isset($errors['message'])) : ?>
            <p class="text-danger"><?= $errors['message']; ?></p>
        <?php endif ?>

        <div class="mb-3">
            <label for="contact_info" class="form-label">Contact Information</label>
            <input type="text" name="contact_info" class="form-control" value="<?= old("contact_info"); ?>">
        </div>

        <?php if (isset($errors['email'])) : ?>
            <p class="text-danger"><?= $errors['contact_info']; ?></p>
        <?php endif ?>

        <div class="mb-3">
            <label for="location" class="form-label">Location</label>
            <input type="text" name="location" class="form-control" value="<?= old("location"); ?>">
        </div>

        <button type="submit" class="btn btn-primary w-100">Submit</button>
    </form>

</div>

<?php require basePath('views/partials/footer.php'); ?>