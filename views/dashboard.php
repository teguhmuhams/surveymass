<?php

// get all survey data created by this user
$user = $_SESSION['user'];

$stmt = $conn->prepare("SELECT * FROM forms WHERE user_id = ?");
$stmt->bind_param("i", $user['id']);

if ($stmt->execute()) {
    $result = $stmt->get_result();
}

?>
<div class="container mt-5">
    <div class="card">
        <div class="card-body">
            <h3>Survey Lists</h3>
            <div class="my-3">
                <?php if (isset($_SESSION['message'])) : ?>
                    <?= $_SESSION['message'] ?>
                    <?php unset($_SESSION['message']); ?>
                <?php endif; ?>
            </div>
            <div class="mt-3 row">
                <?php if ($result->num_rows === 0) : ?>
                    <p class="lead">You have no forms.</p>
                <?php else : ?>
                    <?php while ($row = $result->fetch_assoc()) : ?>
                        <div class="col-4">
                            <div class="card">
                                <div class="card-header">
                                    <?= $row['title'] ?>
                                </div>
                                <div class="card-body">
                                    <p class="lead">Created at: <?= $row['created_at'] ?></p>
                                    <p><?= $row['description']  ?></p>
                                    <a class="btn btn-primary w-100" href="<?= BASE_URL . '/responses/' . $row['id'] ?>">View responses</a>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>