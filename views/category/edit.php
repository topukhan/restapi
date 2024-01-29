<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>category</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .card {
            margin-bottom: 1.25rem;
            box-shadow: 0 1px 3px rgba(0, 0, 0, .12), 0 1px 2px rgba(0, 0, 0, .24);
            border-width: 0;

            margin-top: 15px;
        }

        .btn {
            display: inline-block;
            font-weight: 400;
            line-height: 1.5;
            color: #212529;
            text-align: center;
            text-decoration: none;
            vertical-align: middle;
            cursor: pointer;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
            border: 1px solid transparent;
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
            border-radius: 0.25rem;
            transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out, box-shadow .15s ease-in-out;
        }

        a {
            color: white;
            text-decoration: none;
        }

        .form-control {
            display: block;
            width: 100%;
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: #212529;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #ced4da;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            border-radius: 0.25rem;
            transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
        }

        .card-header {
            padding: 0.5rem 1rem;
            margin-bottom: 0;
            background-color: rgba(0, 0, 0, .03);
            border-bottom: 1px solid rgba(0, 0, 0, .125);
            background-color: #198754;
            color: white;
        }

        .card-body {
            flex: 1 1 auto;
            padding: 1rem 1rem;
        }
    </style>

</head>

<body>
    <div>
        <h1 class="text-center bg-success text-white p-2">Edit Category</h1>
    </div>
    <div class="main-div">
        <div class="card mt-4">
            <div class="card-body">
                <h2>Edit Category</h2>
                <div class="card p-3" style="width: 500px;">
                    <span id="successMessage" class="text-success fs-6"></span>
                    <div class="card-body">
                        <div style="display: flex;">
                            <label style="margin-right: 10px; align-self: center; font-weight: bold;" for="Name">Name:</label>
                            <input id="categoryName" class="form-control" type="text">

                            <button id="updateCategoryBtn" class="btn" style="background-color:#198754; color: white; margin-left: 10px;">
                                Update
                            </button>
                            <button class="btn btn-dark" style="margin-left: 10px;">
                                <a href="./index.php">Back</a>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const categoryNameInput = document.getElementById('categoryName');
        const updateCategoryBtn = document.getElementById('updateCategoryBtn');

        // Function to extract the category ID from the URL
        function getCategoryIdFromUrl() {
            const searchParams = new URLSearchParams(window.location.search); //.search retrieves the query string portion
            return searchParams.get('id'); // it parses the query string into a manageable format
        }

        const categoryId = getCategoryIdFromUrl();
        if (categoryId) {
            // Fetch existing category data based on the category ID from your API
            const currentPath = window.location.pathname;
            const pathSegments = currentPath.split('/');
            const projectFolderName = pathSegments[1];

            const showApiUrl = `http://localhost/${projectFolderName}/api/category/show.php?id=${categoryId}`
            fetch(showApiUrl)
                .then(response => response.json()) //It converts the JSON-formatted response body into a JavaScript object
                .then(categoryData => {
                    if (categoryData.id) {
                        categoryNameInput.value = categoryData.name;
                    } else {
                        categoryNameInput.value = "Category not found";
                        categoryNameInput.disabled = true; // Disable input field if category is not found
                        updateCategoryBtn.disabled = true; // Disable the update button
                    }
                })
                .catch(error => {
                    console.error("Error:", error);
                    categoryNameInput.value = "Category not found.";
                    categoryNameInput.disabled = true; // Disable input field in case of an error
                    updateCategoryBtn.disabled = true; // Disable the update button
                });
        } else {
            categoryNameInput.value = "Please provide id in the URL";
            categoryNameInput.disabled = true; // Disable input field if category ID is missing
            updateCategoryBtn.disabled = true; // Disable the update button
        }

        // Event listener for updating the category
        updateCategoryBtn.addEventListener('click', () => {
            const updatedName = categoryNameInput.value;
            if (updatedName) {
                // Send a PUT request to update the category data using your API
                const currentPath = window.location.pathname;
                const pathSegments = currentPath.split('/');
                const projectFolderName = pathSegments[1];

                const updateApiUrl = `http://localhost/${projectFolderName}/api/category/update.php?id=${categoryId}`
                fetch(updateApiUrl, {
                        method: 'PUT',
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({
                            id: categoryId,
                            name: updatedName
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.message) {
                            const successMessage = data.message;
                            document.getElementById('successMessage').textContent = successMessage;
                        } else {
                            alert("Category update failed. Please try again.");
                        }
                    })
                    .catch(error => console.error("Error:", error, "  'Check API URL'"));
            } else {
                alert("Please enter a valid category name.");
            }
        });
    </script>

</body>

</html>