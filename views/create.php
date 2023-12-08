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
        <div class="card-body">
          <h1 class="mb-4">Create Your Form</h1>
          <div class="mb-3">
            <input type="text" class="form-control mb-3" name="form_title" required placeholder="Form Title" autofocus>
            <input type="text" class="form-control mb-3" name="form_desc" required placeholder="Form description">
            <input type="text" class="form-control" name="slug" required placeholder="Form slug (eg: my-form)">
          </div>
          <p class="required" style="font-size: 13px; color: red;">*Required</p>
        </div>
      </div>

      <div id="form-content"></div>

      <div class="row mt-3">
        <div class="col-4">
          <button type="button" class="btn btn-primary w-100" id="add-text">
            <img src="/img/more.png">
            Input Text
          </button>
        </div>
        <div class="col-4">
          <button type="button" class="btn btn-primary w-100" id="add-option">
            <img src="/img/more.png">
            Input Option
          </button>
        </div>
        <div class="col-4">
          <button type="button" class="btn btn-primary w-100" id="add-file">
            <img src="/img/more.png">
            Input File
          </button>
        </div>
      </div>
      <button class="btn btn-success w-100 mt-4" type="submit">
        Submit
      </button>
    </form>


    <div id="error-message" class="text-danger my-3">
    </div>

  </div>

  <footer class="mt-5">
    <h2 class="text-center opacity-50">Survey Mass</h2>
  </footer>

  <!-- JavaScript to handle the click event -->
  <script>
    document.getElementById('add-text').addEventListener('click', function() {
      var formContent = document.getElementById('form-content');
      var newHtml = `
      <div class="card mt-4">
        <div class="card-body">
          <div class="mb-3">
          <input type="text" class="form-control mb-3" name="items[][title]" placeholder="Put your question" required>
          <input type="hidden" name="items[][type]" value="text">
            <input type="text" class="form-control" disabled placeholder="Short answer text">
          </div>
          <div class="d-flex justify-content-end">
            <button class="btn btn-outline-danger" onclick="this.parentElement.parentElement.parentElement.remove();">
              <i class="fas fa-trash"></i>
            </button>
          </div>
        </div>
      </div>          
      `;
      formContent.insertAdjacentHTML('beforeend', newHtml);
    });

    document.getElementById('add-file').addEventListener('click', function() {
      var formContent = document.getElementById('form-content');
      var newHtml = `
      <div class="card mt-4">
          <div class="card-body">
            <div class="mb-3">
            <input type="text" class="form-control mb-3" name="items[][title]" placeholder="Put your question" required>
            <input type="hidden" name="items[][type]" value="file">
            <input type="file" class="form-control" disabled>
            </div>
            <div class="d-flex justify-content-end">
              <button class="btn btn-outline-danger" onclick="this.parentElement.parentElement.parentElement.remove();">
                <i class="fas fa-trash"></i>
              </button>
            </div>
          </div>
      </div>          
      `;
      formContent.insertAdjacentHTML('beforeend', newHtml);
    });

    // <div class="card">
    //     <div class="card-body">
    //       <div class="mb-3">
    //         <input type="text" class="form-control" id="question" placeholder="Put your question">
    //         <div class="form-check">
    //           <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
    //           <label class="form-check-label" for="flexRadioDefault1">
    //             Hayo
    //           </label>
    //         </div>
    //         <div class="form-check">
    //           <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
    //           <label class="form-check-label" for="flexRadioDefault2">
    //             Hayoo
    //           </label>
    //         </div>
    //       </div>
    //     </div>
    //   </div>

    document.querySelector('form').addEventListener('submit', function(e) {
      // Prevent the default form submission
      e.preventDefault();

      // Initialize an array to hold the items
      let items = [];

      // Find all item inputs
      const itemInputs = document.querySelectorAll('input[name^="items["]');

      // Loop through inputs and add them to the items array
      for (let i = 0; i < itemInputs.length; i += 2) {
        items.push({
          title: itemInputs[i].value,
          type: itemInputs[i + 1].value
        });
      }

      // Create a JSON object
      let formData = {
        form_title: document.querySelector('input[name="form_title"]').value,
        form_desc: document.querySelector('input[name="form_desc"]').value,
        items: items
      };

      // Send a POST request with JSON data
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

  <style>
    .border-top {
      border-top: 8px solid #536DFE !important;
    }
  </style>