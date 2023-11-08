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
            <div class="card-body">
                <div class="table-responsive mt-3">
                    <table class="table table-bordered">
                        <thead style="background-color: #198754;">
                            <tr>
                                <th style="width: 0%;"><input type="checkbox"></th>
                                <th>
                                    <div style="display: flex; justify-content: space-between; ">
                                        <div>Name</div>
                                        <div style="display: flex; justify-content: end;"><button style="background-color: transparent; color: white; border: transparent; cursor: p;"></button></div>

                                    </div>
                                </th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input type="checkbox"></td>
                                <td>Sakib Al Hasan</td>
                                <td><button style="color: #198754;
                                    background-color: #198754;" class="btn rounded-circle"><a href="show.html" type="button"><i class="fa-solid fa-eye"></i></a></button> <button class="btn btn rounded-circle " style="background-color: orange;"><a href="edit.html"><i class="fa-solid fa-pen-to-square"></i></a></button>
                                    <button class="btn rounded-circle " style="background-color: red; color: white;"><i class="fa-solid fa-trash"></i></button>
                                   
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- Create Icon -->
                <div style="display: flex; justify-content: center;">
                    <a href="./create.php"><button class="create" style="background-color: black ; color: white;"><i class="fa-solid fa-plus"></i></button></a>
                </div>

                <div style="display: flex;">
                    <div>
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Previous">
                                        <span aria-hidden="true">«</span>
                                    </a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Next">
                                        <span aria-hidden="true">»</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>