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

        a {
            color: white;
            text-decoration: none;
        }

        .card {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 1px solid rgba(0, 0, 0, .125);
            border-radius: 0.25rem;
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
            <h3>Category Details</h3>
        </div>
        <div class="card-body">
            <div class="card p-3" style="width: 500px;   ">
                <div class="card-body">
                    <div style="display: flex;">
                        <label style="font-weight: bold;" for="Name"> Name: </label>
                        <span id="categoryName" class="ms-1"> Category Name </span>
                        <button class="btn btn-dark btn-sm" style="  margin-left: 10px;">
                            <a href="./index.php">Back</a>
                        </button>
                    </div>

                </div>



            </div>

        </div>
    </div>


    <script>
        // Function to extract the player's ID from the URL
        function getCategoryIdFromUrl() {
            const searchParams = new URLSearchParams(window.location.search);
            return searchParams.get('id');
        }

        const playerNameElement = document.getElementById('categoryName');
        const backButton = document.querySelector('.btn-dark');

        const categoryId = getCategoryIdFromUrl();
        if (categoryId) {
            // Fetch player data based on the player ID from your API
            const currentPath = window.location.pathname;
            const pathSegments = currentPath.split('/');
            const projectFolderName = pathSegments[1];

            const listApiUrl = `http://localhost/${projectFolderName}/api/category/show.php?id=${categoryId}`
            fetch(listApiUrl)
                .then(response => response.json())
                .then(playerData => {
                    if (playerData.name) {
                        playerNameElement.textContent = playerData.name;
                    } else {
                        playerNameElement.textContent = "Player not found";
                    }
                })
                .catch(error => {
                    console.error("Error:", error);
                    playerNameElement.textContent = "Something went wrong. Please try again later.";
                });
        } else {
            playerNameElement.textContent = "Player ID not provided in the URL";
        }

        // Add an event listener to the Back button to navigate back to the player list
        backButton.addEventListener('click', () => {
            window.location.href = './index.php'; // Adjust the URL as needed
        });
    </script>
</body>

</html>