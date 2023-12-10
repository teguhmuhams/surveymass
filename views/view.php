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

<div class="container mt-5">
    <form method="POST" action="">
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
                            <input type="text" class="form-control" name="items[]" placeholder="Short answer text">
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <button class="btn btn-primary mt-4" type="submit">
            Submit
        </button>
    </form>


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

<script>
    document.querySelector('form').addEventListener('submit', function(e) {
        // Prevent the default form submission
        e.preventDefault();

        // Find all item inputs
        const items = document.getElementsByName('items[]');

        // Create an array to hold the responses
        var responses = [];

        // Iterate over the NodeList and push the value of each input into the array
        for (var i = 0; i < items.length; i++) {
            responses.push(items[i].value);
        }

        // Create a JSON object
        let formData = {
            form_id: <?= $data['id'] ?>,
            responses: responses
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