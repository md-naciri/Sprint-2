<?php session_start();
include('../config/database.php');
if (!isset($_SESSION['user_id'])) {
    header('location: ../pages/logIn.php');
}
$id = $_SESSION['user_id'];
$sql = "SELECT * FROM admin WHERE Id ='$id'";
$result = mysqli_query(conn(), $sql);
$admin_row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include('head.php');
    ?>
    <link rel="stylesheet" href="../assets/style.css">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <div class="container-fluid mx-5">
            <div class="navbar-brand logo"><strong>Origin Game</strong></div>
            <div class="">
                <div class="navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link fs-4" style="font-family: 'Jockey One', sans-serif; color: #007074;" href="logOut.php"><strong>Log out</strong></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <div class="d-flex justify-content-between mt-5 mx-5">
        <div>
            <h3 style="font-family: 'Jockey One', sans-serif;">Welcome <a href="#modal-statistics" data-bs-toggle="modal"><?= $admin_row['Name']; ?></a></h3>
        </div>
        <div>
            <a href="#modal-task" data-bs-toggle="modal" class="btn btn-dark btn-rounded px-4 rounded-1 text-white fw-bold">+ Add Product</a>
        </div>
    </div>




    <div class="table-responsive mx-5 mt-5">
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Photo</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Date</th>
                    <th scope="col">Price</th>
                    <th scope="col">Category</th>
                    <th scope="col">Quantity</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody class="table-light ">
                <?php
                $sql = "SELECT * FROM product JOIN category ON product.Category=category.C_Id";
                $result = mysqli_query(conn(), $sql);
                $product_num = mysqli_num_rows($result);
                $total_unit = 0;
                $total_price = 0;
                while ($row = mysqli_fetch_assoc($result)) :
                ?>
                    <tr>
                        <form action="update.php" method="post">
                            <td><?= $row['Id']; ?></td>
                            <td><?= '<img src="../assets/img/' . $row['Photo'] . '" alt="">' ?></td>
                            <td><?= $row['Name']; ?></td>
                            <td><?= $row['Date']; ?></td>
                            <td><?= $row['Price']; ?>&nbsp;€</td>
                            <td><?= $row['C_Name']; ?></td>
                            <td><?= $row['Quantity']; ?></td>
                            <input type="hidden" value="<?= $row['Id']; ?>" name="id">
                            <td><button type="submit" class="btn btn-dark btn-rounded px-4 rounded-1 text-white fw-bold">More...</button></td>
                        </form>
                    </tr>
                <?php
                    $total_price += $row['Price'];
                    $total_unit += $row['Quantity'];
                endwhile ?>
            </tbody>
        </table>
    </div>



    <div class="modal fade" id="modal-statistics">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="container d-flex justify-content-center align-items-center">
                    <div class="card">
                        <div class="logo text-center mb-4">
                            <strong>Origin Game</strong>
                        </div>
                        <div class="user text-center">
                            <div class="profile">
                                <img src="../assets/img/user_icon.webp" class="rounded-circle" width="80">
                            </div>
                        </div>
                        <div class="mt-5 text-center">
                            <h4 class="mb-0"><?= $admin_row['Name']; ?></h4>
                            <span class="text-muted d-block mb-2">Youssoufia</span>
                            <!-- <button class="btn btn-primary btn-sm follow">Follow</button> -->
                            <div class="d-flex justify-content-between align-items-center mt-4 px-4">
                                <div class="stats">
                                    <h6 class="mb-0">Products</h6>
                                    <span><?= $product_num ?></span>
                                </div>
                                <div class="stats">
                                    <h6 class="mb-0">Units</h6>
                                    <span><?= $total_unit ?></span>
                                </div>
                                <div class="stats">
                                    <h6 class="mb-0">Total price</h6>
                                    <span><?= $total_price ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="modal fade" id="modal-task">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="../config/scripts.php" method="POST" id="form-task" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Product</h5>
                        <a href="#" class="btn-close" data-bs-dismiss="modal"></a>
                    </div>
                    <div class="modal-body">

                        <div class="mb-3">
                            <label class="form-label">Product Name</label>
                            <input type="text" name="name" class="form-control" required />
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Photo</label>
                            <input type="file" name="photo" class="form-control" id="" accept=".jpg,.png,.jpeg" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Date</label>
                            <input type="date" name="date" class="form-control" id="" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Price</label>
                            <input type="number" step="0.01" name="price" class="form-control" id="" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Category</label>
                            <select class="form-select" name="category" id="">
                                <option value="">Please select</option>
                                <option value="1">Action-adventure</option>
                                <option value="2">Survival and horror</option>
                                <option value="3">Sports</option>
                                <option value="4">Strategy</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Quantity</label>
                            <input type="number" name="quantity" class="form-control" id="" />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="" class="btn btn-white" data-bs-dismiss="modal">Cancel</a>
                        <button type="submit" name="add" class="btn btn-add-color task-action-btn" id="task-save-btn">Add product</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>