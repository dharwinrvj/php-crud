<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <title>PHP crud</title>
</head>

<body>

    <?php
    # imports
    include 'process.php';
    ?>
    <div class="container-fluid my-3">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-5">
                <?php if (isset($_SESSION['message'])) : ?>
                    <div class="alert alert-<?= $_SESSION['msg_type']; ?> alert-dismissible fade show" role="alert">
                        <strong><?php echo ($_SESSION['message']);
                                unset($_SESSION['message']); ?></strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php endif; ?>
                <div class="card">
                    <div class="card-header">
                        PHP crud
                    </div>
                    <div class="card-body">
                        <form method="POST" action="process.php" autocomplete="off">
                            <input type="hidden" name="id" value="<?php echo $id ?>">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" required class="form-control" value="<?php echo $name; ?>" name="name" id="name" placeholder="Enter Your Name">
                            </div>
                            <div class="form-group">
                                <label for="location">Location</label>
                                <input type="text" required class="form-control" value="<?php echo $location; ?>" name="location" id="location" placeholder="Enter Your Location">
                            </div>
                            <?php if ($update_rec == true) : ?>
                                <button type="submit" class="btn btn-success" name="update">Update</button>
                            <?php else : ?>
                                <button type="submit" class="btn btn-success" name="save">Submit</button>
                            <?php endif; ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php
        $result = $mysqli->query("select * from users") or die($mysqli->error); # here $mysqli obj from process.php file
        /*
        pre_r($result);
        function pre_r($array)
        {
            print_r($array); // to print meta data about the array
        }
        */
        ?>
        <div class="row justify-content-center my-3">
            <div class="col-md-8 col-lg-5">
                <table class="table table-bordered ">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Location</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = $result->fetch_assoc()) : ?>
                            <tr>
                                <th scope='row'><?php echo ($row['id']) ?></th>
                                <td><?php echo ($row['name']) ?></td>
                                <td><?php echo ($row['location']) ?></td>
                                <td><a type='button' href="process.php?delete=<?php echo ($row['id']) ?>" class='btn btn-outline-danger btn-sm'>Delete</a>
                                    <a type='button' href="index.php?edit=<?php echo ($row['id']) ?>" class='btn btn-outline-warning btn-sm'>Update</a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>

</html>