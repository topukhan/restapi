<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <div>
        <h1 class="text-center bg-success text-white p-2">Category List</h1>
    </div>
    <div class="main-div">
        <div class="card mt-4">
            <!-- Create button -->
            <div style="display: flex; justify-content: center;">
                <a href="./create.php">
                    <button class="create" style="background-color: black ; color: white;">
                        <i class="fa-solid fa-plus"></i>
                    </button>
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive mt-3">
                    <table class="table table-bordered text-center">
                        <thead style="background-color: #198754;">
                            <tr>
                                <th style="width: 0%;">SL</th>
                                <th>
                                    Name
                                </th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="categoryTableBody">
                        </tbody>
                    </table>
                    <div id="errorContainer" style="color: red; text-align:center"></div>
                </div>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const errorContainer = document.getElementById('errorContainer');
        const currentPath = window.location.pathname;
        const pathSegments = currentPath.split('/');
        const projectFolderName = pathSegments[1];

        const listApiUrl = `http://localhost/${projectFolderName}/api/category/index.php`
        // Fetch data from API and dynamically populate the table
        fetch(listApiUrl)
            .then(response => response.json())
            .then(data => {
                const categoryTableBody = document.getElementById('categoryTableBody');
                let index = 1

                if (data.data && Array.isArray(data.data)) {
                    data.data.forEach(category => {
                        const row = document.createElement('tr');
                        row.innerHTML = `
                            <td>${index++}</td>
                            <td>${category.name}</td>
                            <td>
                                <button class="btn rounded-circle" style="background-color: #198754;"><a href="show.php?id=${category.id}"><i class="fa-solid fa-eye"></i></a></button>
                                <button class="btn rounded-circle" style="background-color: orange;"><a href="edit.php?id=${category.id}"><i class="fa-solid fa-pen-to-square"></i></a></button>
                                <button class="btn rounded-circle delete-category" data-category-id="${category.id}" style="background-color: red; color: white;"><i class="fa-solid fa-trash"></i></button>
                            </td>
                        `;

                        categoryTableBody.appendChild(row);
                    });
                } else {
                    // Handle the case where no categories are found
                    categoryTableBody.innerHTML = '<tr><td colspan="3">No categories found</td></tr>';
                }
            })
            .catch(error => {
                console.error("Error:", error);
                errorContainer.textContent = "Something went wrong. Please check your configuration.";
            });

        // Add the event listener for delete buttons
        document.addEventListener('click', function(e) {
            const deleteBtn = e.target.closest('.delete-category');

            if (deleteBtn) {
                const categoryId = deleteBtn.getAttribute('data-category-id');
                if (confirm(`Are you sure you want to delete this category?`)) {
                    // Send a DELETE request to delete the category using your API
                    const currentPath = window.location.pathname;
                    const pathSegments = currentPath.split('/');
                    const projectFolderName = pathSegments[1];

                    const listApiUrl = `http://localhost/${projectFolderName}/api/category/delete.php`
                    fetch(listApiUrl, {
                            method: 'DELETE',
                            headers: {
                                'Content-Type': 'application/json'
                            },
                            body: JSON.stringify({
                                id: categoryId
                            })
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.message) {
                                const rowToDelete = deleteBtn.closest('tr');
                                rowToDelete.remove();
                            } else {
                                alert("Category deletion failed. Please try again.");
                            }
                        })
                        .catch(error => console.error("Error:", error));
                }
            }
        });
    </script>
</body>

</html>