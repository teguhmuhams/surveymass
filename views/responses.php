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
            <div class="d-flex justify-content-between">
                <div>
                    <h3>Form responses</h3>
                </div>
                <div>
                    <button class="btn btn-danger">Delete this form</button>
                </div>
            </div>

            <div class="mt-3 row">
                <?php if ($result->num_rows === 0) : ?>
                    <span class="lead">This form has no response. <a href="<?= BASE_URL . '/dashboard' ?>">Back to dashboard</a></span>
                <?php else : ?>
                    <div class="container">
                        <p class="lead">Total responses: <?= $result->num_rows ?></p>
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
                                        <td>
                                            <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#response<?= $row['id'] ?>" data-id="<?= $row['id'] ?>">
                                                View Response
                                            </button>
                                        </td>
                                    </tr>

                                    <!-- Get each response data -->
                                    <script>
                                        console.log(<?= $row['answers'] ?>);
                                    </script>
                                    <!-- Bootstrap Modal -->
                                    <div class="modal fade" id="response<?= $row['id'] ?>" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Response</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <?php
                                                    $answers = json_decode($row['answers']);

                                                    if ($answers) {
                                                        foreach ($answers as $answer) {
                                                            echo '<input type="text" class="form-control mt-3 custom-disabled" disabled value="' . htmlspecialchars($answer) . '">';
                                                        }
                                                    }
                                                    ?>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary">Save changes</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<style>
    .custom-disabled {
        /* Override the default disabled field styling here */
        opacity: 1;
        /* Reset the opacity */
        background-color: white;
        /* Set your desired background color */
        color: black;
        /* Set your desired text color */
    }

    .custom-disabled::placeholder {
        color: black;
        /* Set your desired placeholder text color, if needed */
    }
</style>
<script src="https://code.jquery.com/jquery-3.7.1.slim.js" integrity="sha256-UgvvN8vBkgO0luPSUl2s8TIlOSYRoGFAX4jlCIm9Adc=" crossorigin="anonymous"></script>