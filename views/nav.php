<?php
$homeUrl = BASE_URL;
if (isset($_SESSION['user'])) {
    $homeUrl = BASE_URL . '/dashboard';
}
?>

<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container">
        <a class="navbar-brand" href="<?= $homeUrl ?>">
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
                        <li><a class="dropdown-item" href="<?= BASE_URL . '/create' ?>">Create New Survey</a></li>
                        <li><a class="dropdown-item" href="<?= BASE_URL . '/list' ?>">View list of Surveys</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <?php if (isset($_SESSION['user'])) : ?>
                        <a id="logout" class="nav-link" href="<?= BASE_URL . '/logout' ?>">Logout</a>
                    <?php else : ?>
                        <a class="nav-link" href="<?= BASE_URL . '/login' ?>">Sign in</a>
                    <?php endif; ?>
                </li>
            </ul>
        </div>
    </div>
</nav>

<script>
    const logoutElement = document.getElementById('logout');
    if (logoutElement) {
        logoutElement.addEventListener('click', function(event) {
            event.preventDefault(); // Prevent the default link behavior
            var linkURL = this.getAttribute('href'); // Get the href attribute

            Swal.fire({
                title: 'Success',
                text: 'You have successfully logged out!',
                icon: 'success',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = linkURL; // Redirect after clicking 'OK'
                }
            })
        });
    }
</script>