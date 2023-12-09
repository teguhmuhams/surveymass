<?php

// get all survey data created by this user

$form_id = isset($slug) ? $slug : null;

$stmt = $conn->prepare("SELECT * FROM form_answers WHERE form_id = ?");
$stmt->bind_param("i", $form_id);

if ($stmt->execute()) {
    $result = $stmt->get_result();
}

?>
<div class="container mt-5">
    <div class="card">
        <div class="card-body">
            <h3>Form responses</h3>
            <div class="mt-3 row">
                <?php if ($result->num_rows === 0) : ?>
                    <span class="lead">This form has no response. <a href="<?= BASE_URL . '/dashboard' ?>">Back to dashboard</a></span>
                <?php else : ?>
                    <div class="container">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Submitted at</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $count = 0; ?>
                                <?php while ($row = $result->fetch_assoc()) : ?>
                                    <tr>
                                        <th scope="row"><?= ++$count ?></th>
                                        <td><?= $row['created_at'] ?></td>
                                        <td><a href="<?= BASE_URL . '/response/' . $row['id'] ?>" class="btn btn-sm btn-primary">View</a></td>
                                    </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>