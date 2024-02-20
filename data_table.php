<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>LibraLog Data</title>
</head>
<body style="font-family: poppins; min-width: 1080px;">
    <div class="container">        
        <div class="row">
            <div class="col-12">
            <?php
            if(isset($_GET['msg'])){
                $msg = $_GET['msg'];
                echo 
                '<div class="alert alert-warning alert-dismissible fade show" role="alert" style="margin-top: 20px;">
                    '.$msg.'
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
            }
            ?>
            </div>
            <div class="col-12 p-3">
                <div class="card shadow-sm p-3 bg-body-tertiary rounded">
                    <nav class="navbar bg-body-tertiary">
                        <div class="container-fluid">
                            <a class="navbar-brand">LibraLog Data</a>
                            <div class="d-flex justify-content-start align-items-center">
                                <form class="d-flex" role="search">
                                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                                    <button class="btn btn-outline-success" type="submit">Search</button>
                                </form>
                                <a href="form/add_user.php" class="nav-link active ms-2" aria-current="page"><button class="btn btn-outline-primary">Add New</button></a>
                                <a href="index.php" class="nav-link active ms-2" aria-current="page"><button class="btn btn-outline-secondary">Home</button></a>
                            </div>                     
                        </div>
                    </nav>
                    <div class="card-body table-responsive">
                        <table class="table table-bordered table-stripped table-hover">
                        <thread class="table-dark">
                        <tr>
                            <th data-field="ID" data-sortable="true">UID</th>
                            <th data-field="lastName" data-sortable="true">Last Name</th>
                            <th data-field="firstName" data-sortable="true">First Name</th>
                            <th data-field="middleName" data-sortable="true">Middle name</th>
                            <th data-field="studentID" data-sortable="true">Student ID</th>
                            <th data-field="sex" data-sortable="true">Sex</th>
                            <th data-field="dep" data-sortable="true">Department</th>
                            <th data-field="gradeYear" data-sortable="true">Grade/Year</th>
                            <th data-field="section" data-sortable="true">Section</th>
                            <th data-field="dateOfBorrowing" data-sortable="true">Date Of Borrowing</th>
                            <th data-field="dueDate" data-sortable="true">Due Date</th>
                            <th data-field="dateReturned" data-sortable="true">Date Returned</th>
                            <th data-field="isbn" data-sortable="true">ISBN Number</th>
                            <th data-field="isReturned" data-sortable="true">Returned?</th>
                            <th data-field="Option" data-sortable="true">Option</th>
                        </tr>
                        </thread>
                        <tbody>
                            <?php 
                            include 'function/db_conn.php';
                            $sql = "SELECT * FROM `libralog`";
                            $result = mysqli_query($conn, $sql);
                            while($row = mysqli_fetch_assoc($result)){
                                ?>
                                <tr>
                                    <td><?php echo $row['uid']?></td>
                                    <td><?php echo $row['lastName']?></td>
                                    <td><?php echo $row['firstName']?></td>
                                    <td><?php echo $row['middleName']?></td>
                                    <td><?php echo $row['studentID']?></td>
                                    <td><?php echo $row['sex']?></td>
                                    <td><?php echo $row['dep']?></td>
                                    <td><?php echo $row['gradeYear']?></td>
                                    <td><?php echo $row['section']?></td>
                                    <td><?php echo $row['dateOfBorrowing']?></td>
                                    <td><?php echo $row['dueDate']?></td>
                                    <td><?php echo $row['dateReturned']?></td>
                                    <td><?php echo $row['isbn']?></td>
                                    <td>
                                        <?php 
                                            if($row['isReturned'] == 1){
                                                echo 'Yes';
                                            }
                                            else{
                                                echo 'No';
                                            }
                                            
                                        ?>
                                    </td>
                                    <td>
                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            ...
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a class="dropdown-item" href="form/edit.php?uid=<?php echo $row['uid'] ?>" class="link-dark">
                                                    Edit
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" class="link-dark" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                    Delete
                                                </a>                                         
                                            </li>
                                        </ul>
                                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Delete</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        This change is <b>permanent and irreversible.</b>
                                                        <br>
                                                        Selected UID: <?php echo $row['uid']?>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <a href="function/delete.php?uid=<?php echo $row['uid']?>" class="link-dark">
                                                            <button type="button" class="btn btn-danger"> Delete Permanently</button>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>    
                                    </div>
                                </td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>      
    </div>
    
    <!-- BOOTSTRAP -->    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>