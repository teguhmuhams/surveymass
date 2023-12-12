<?php

// get all survey data created by this user
if (isset($_SESSION['user']))
    $user = $_SESSION['user'];

$stmt = $conn->prepare("
    SELECT f.*, COUNT(fr.form_id) as total_responses
    FROM forms f
    LEFT JOIN form_responses fr ON f.id  = fr.form_id
    GROUP BY f.id;
");

if ($stmt->execute()) {
    $result = $stmt->get_result();
}

?>
<div class="container mt-5">
    <div class="card">
        <div class="card-title bg-primary py-3">
            <h1 class="text-center text-white">All Survey</h1>
        </div>
        <div class="card-body">
            <h3>Survey Lists</h3>
            <div class="mt-3 row">
                <?php if ($result->num_rows === 0) : ?>
                    <span class="lead">There are no survey yet!<a href="<?= BASE_URL . '/create' ?>">Create one!</a></span>
                <?php else : ?>
                    <?php while ($row = $result->fetch_assoc()) : ?>
                        <div class="col-3">
                            <div class="card survey-list">
                                <?php
                                $imagesDir = 'img/thumbnails/light-purple/';
                                $images = glob($imagesDir . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);
                                $thumbnail = $images[array_rand($images)];
                                ?>
                                <img src="<?= $thumbnail ?>" class="card-img-top" alt="Thumbnail">
                                <div class="card-body">
                                    <h4 class="card-title fw-bold"><?= $row['title'] ?></h4>
                                    <p class="fs-6"><?= $row['description'] ?></p>
                                    <div class="row justify-content-between">
                                        <div class="col-2">
                                            <span class="badge bg-info" data-bs-toggle="tooltip" data-bs-placement="right" title="Total responses">
                                                <?= $row['total_responses'] ?>
                                            </span>
                                        </div>
                                        <div class="col-10">
                                            <p class="fs-6 text-muted text-end">Created <?= date('M j, Y', strtotime($row['created_at'])); ?></p>
                                        </div>
                                    </div>
                                    <a class="btn btn-outline-primary w-100" href="<?= BASE_URL . '/view/' . $row['slug'] ?>">View Survey</a>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>