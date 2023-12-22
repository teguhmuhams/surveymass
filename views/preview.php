<?php

// GET forms data
$stmt = $conn->prepare('SELECT * FROM forms WHERE slug = ?');
$stmt->bind_param("s", $slug);

if ($stmt->execute()) {
    $result = $stmt->get_result();
    $data = $result->fetch_assoc();
    if ($data)
        $items = json_decode($data['items']);
}

?>
<div class="container mt-5">
    <div class="my-3">
        <a href="<?= BASE_URL ?>" style="text-decoration:none">
            <i class="fa-solid fa-arrow-left"></i> Kembali
        </a>
    </div>
    <?php if ($data) : ?>
        <div class="card border-top">
            <div class="card-body m-3">
                <h1 class="mb-4"><?= $data['title'] ?></h1>
                <p><?= $data['description'] ?></p>
            </div>
        </div>

        <div id="form-content">
            <?php foreach ($items as $item) : ?>
                <div class="card mt-4">
                    <div class="card-body m-3">
                        <div class="mb-3">
                            <h3 class="mb-3"><?= $item->title ?></h3>
                            <input type="text" class="form-control" name="items[]" required placeholder="Short answer text" disabled>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <?php if (!$data) : ?>
        <div class="card border-top">
            <div class="card-body m-3 text-center">
                <p class="lead">Survey is not found!</p>
            </div>
        </div>
    <?php endif; ?>

    <div id="error-message" class="text-danger my-3">

    </div>

    <div class="mt-3">
        <p class="opacity-75">Never submit passwords through Survey Mass.</p>
        <p class="opacity-75">This content is neither created nor endorsed by Survey Mass, Report Abuse - Term of Service - Private Policy</p>
    </div>

</div>

<footer class="my-3">
    <h2 class="text-center opacity-50">Survey Mass</h2>
</footer>

<style>
    .form-control {
        border: none;
        border-bottom: 1px solid #ced4da;
        border-radius: 0;
    }
</style>