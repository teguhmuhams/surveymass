<?php

// GET forms data
$stmt = $conn->prepare('SELECT * FROM forms WHERE slug = ?');
$stmt->bind_param("s", $slug);

if ($stmt->execute()) {
    $result = $stmt->get_result();
    $data = $result->fetch_assoc();

    $items = json_decode($data['items']);
}

?>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="/img/surveymass_logo.png" alt="Logo" width="200" height="45" class="d-inline-block align-text-top">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Survey
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Create New Survey</a></li>
                        <li><a class="dropdown-item" href="#">Survey History</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login.html">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-5">
    <form method="POST" action="">
        <div class="card border-top">
            <div class="card-body m-3">
                <h1 class="mb-4"><?= $data['title'] ?></h1>
                <h5><?= $data['description'] ?></h5>
            </div>
        </div>

        <div id="form-content">
            <?php foreach ($items as $item) : ?>
                <div class="card mt-4">
                    <div class="card-body m-3">
                        <div class="mb-3">
                            <h3 class="mb-3"><?= $item->title ?></h3>
                            <input type="text" class="form-control" name="items[]" placeholder="Short answer text">
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <button class="btn btn-success w-100 mt-4" type="submit">
            Submit
        </button>
    </form>


    <div id="error-message" class="text-danger my-3">

    </div>

    <div class="mt-5">
        <p class="opacity-75">Never submit passwords through Survey Mass.</p>
        <p class="opacity-75">This content is neither created nor endorsed by Survey Mass, Report Abuse - Term of Service - Private Policy</p>
    </div>

</div>

<footer class="mt-5">
    <h2 class="text-center opacity-50">Survey Mass</h2>
</footer>

<style>
    .form-control {
        border: none;
        border-bottom: 1px solid #ced4da;
        border-radius: 0;
    }
</style>

<script>
    document.querySelector('form').addEventListener('submit', function(e) {
        // Prevent the default form submission
        e.preventDefault();

        // Find all item inputs
        const items = document.getElementsByName('items[]');

        // Create an array to hold the answers
        var answers = [];

        // Iterate over the NodeList and push the value of each input into the array
        for (var i = 0; i < items.length; i++) {
            answers.push(items[i].value);
        }

        // Create a JSON object
        let formData = {
            form_id: <?= $data['id'] ?>,
            answers: answers
        };

        console.log(formData);

        fetch('', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(formData)
            })
            .catch((error) => {
                document.getElementById('error-message').textContent = error;
            });
    });
</script>