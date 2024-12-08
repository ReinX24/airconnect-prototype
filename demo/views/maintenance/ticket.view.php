<?php require basePath('views/partials/head.php'); ?>

<?php require basePath('views/partials/nav.php'); ?>

<?php require basePath('views/partials/banner.php'); ?>

<div class="container">
    <p class="text-center my-4">
        Welcome to the AirConnect Maintenance Support page. Here, you'll find real-time updates, troubleshooting guides, and resources to ensure uninterrupted connectivity. Whether you're addressing system maintenance or resolving technical issues, we’re here to help keep your AirConnect experience seamless and efficient.
    </p>
    <div class="card mb-3">
        <div class="card-body">
            <h2 class="card-title">AirConnect Contact Information</h2>
            <p class="card-text lead">
                Contact Number: 0912 3456 789
                <br>
                Email: airconnectofficial@gmail.com
            </p>
        </div>
    </div>

    <form action="/maintenance/ticket" method="POST">
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
            <label for="category-select">Category</label>
            <select name="category-select" class="form-select">
                <option value="cleaning">Cleaning</option>
                <option value="parts-replacement">Parts Replacement</option>
                <option value="other">Other</option>
            </select>
        </div>

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

        <?php if (isset($errors['contact_info'])) : ?>
            <p class="text-danger"><?= $errors['contact_info']; ?></p>
        <?php endif ?>

        <div class="mb-3">
            <label for="location" class="form-label">Location</label>
            <input type="text" name="location" class="form-control" value="<?= old("location"); ?>">
        </div>

        <?php if (isset($errors['location'])) : ?>
            <p class="text-danger"><?= $errors['location']; ?></p>
        <?php endif ?>

        <button type="submit" class="btn btn-primary w-100">Submit</button>
    </form>

</div>

<?php require basePath('views/partials/footer.php'); ?>