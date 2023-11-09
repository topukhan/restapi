<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category</title>
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
    <div class="card">
        <div class="card-header">
            <h3>Category Create</h3>
        </div>
        <div class="card-body">
        <span id="successMessage" class="text-success fs-6"></span>
            <div class="card p-3" style="width: 500px;">
                <div class="card-body">
                    <div style="display: flex;">
                        <form id="createCategoryForm" style="display: inline-block; display: flex; align-items: center;">
                            <label style="margin-right: 10px; font-weight: bold;" for="Name">Name:</label>
                            <input class="form-control" id="categoryName" name="name" type="text" placeholder="Example: Kids">

                            <button class="btn" type="submit" style="background-color:#198754; color: white; margin-left: 10px;">
                                Create
                            </button>
                            <button class="btn btn-dark" style="margin-left: 10px;">
                                <a href="./index.php">Back</a>
                            </button>
                        </form>

                    </div>
                    
                </div>
            </div>
            
        </div>
    </div>

    <script>
        document.getElementById('createCategoryForm').addEventListener('submit', function(event) {
            event.preventDefault()

            const categoryName = document.getElementById('categoryName').value

            const data = {
                name: categoryName,
            }
            console.log(data)
            const currentPath = window.location.pathname;
            const pathSegments = currentPath.split('/');
            // The project folder name is likely the first segment after the domain (index 1)
            const projectFolderName = pathSegments[1];

            const createApiUrl = `http://localhost/${projectFolderName}/api/category/create.php`

            fetch(createApiUrl, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(data)

                })
                .then(response => response.json())
                .then(data => {
                    const successMessage = data.message;
                    document.getElementById('successMessage').textContent = successMessage;
                })

                .catch(error => console.log("Error:", error))
        })
    </script>
</body>

</html>