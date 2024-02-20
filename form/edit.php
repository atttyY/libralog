<?php
include "../function/db_conn.php";
$uid = $_GET['uid'];
date_default_timezone_set('Asia/Taipei');
if(isset($_POST['submit'])){
    $firstName = $_POST['firstName'];
    $middleName = $_POST['middleName'];
    $lastName = $_POST['lastName'];
    $studentID = $_POST['studentID'];
    $sex = isset($_POST['sex']) ? $_POST['sex'] : 0;
    $dep = isset($_POST['dep']) ? $_POST['dep'] : 0;
    $gradeYear = $_POST['gradeYear'];
    $section = $_POST['section'];
    $dateOfBorrowing = date("Y-m-d H:i:sa");
    $dateReturned = $_POST['dateReturned'];
    $dueDate = $_POST['dueDate'];
    $isbn = $_POST['isbn'];
    $isReturned = isset($_POST['isReturned']) ? $_POST['isReturned'] : 0;
    $sql = "UPDATE `libralog` SET `firstName`='$firstName',`middleName`='$middleName',`lastName`='$lastName',`sex`='$sex',`studentID`='$studentID',`dep`='$dep',`gradeYear`='$gradeYear',`section`='$section',`dateOfBorrowing`='$dateOfBorrowing',`dueDate`='$dueDate',`dateReturned`='$dateReturned',`isbn`='$isbn',`isReturned`='$isReturned' WHERE uid=$uid";
    $result = mysqli_query($conn, $sql);

    if($result){
        header("Location: ../index.php?msg=UID: ". $uid ." is Updated Successfully");
    }
    else{
        echo "Failed: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>LibraLog User Form</title>
</head>
<body style="font-family: poppins; min-width: 1080px;">
    <div style="padding:50px;"> 
        <div class="container">
            <div class="text-center mb-4">
                <h3>Edit User Information</h3>
                <p class="text-muted">Change Existing Data from the Book Logging System</p>
            </div>
        </div>
        <?php
        
        $sql = "SELECT * FROM `libralog` WHERE uid = $uid LIMIT 1";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);

        ?>
        <div class="container d-flex justify-content-center" >
            <form action="" method="post" style="width:70vw; min-width:300px;">
                <div class="row mb-3">
                    <div class="col">
                        <label for="" class="form-label">First Name:</label>
                        <input type="text" class="form-control" name="firstName" value="<?php echo $row['firstName']?>">
                    </div>
                    <div class="col">
                        <label for="" class="form-label">Middle Name:</label>
                        <input type="text" class="form-control" name="middleName" value="<?php echo $row['middleName']?>">
                    </div>
                    <div class="col">
                        <label for="" class="form-label">Last Name:</label>
                        <input type="text" class="form-control" name="lastName" value="<?php echo $row['lastName']?>">
                    </div>
                </div>
                <div class="mb-3">
                    <div class="col">
                        <label for="" class="form-label">Student ID:</label>
                        <input type="text" class="form-control" name="studentID" value="<?php echo $row['studentID']?>">
                    </div>
                </div>
                <div class="form-group mb-3">
                    <label>Gender:</label> &nbsp;
                    <input type="radio" class="form-check-input" name="sex" 
                    id="Male" value="Male" <?php echo ($row['sex'] == 'Male') ? "checked":"";?>>
                    <label for="Male" class="form-input-label">Male</label>
                    &nbsp;
                    <input type="radio" class="form-check-input" name="sex" 
                    id="Female" value="Female"  <?php echo ($row['sex'] == 'Female') ? "checked":"";?>>
                    <label for="Female" class="form-input-label">Female</label>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="" class="form-label">Department:</label>
                        <select class="form-select" aria-label="Default select example" name="dep">
                            <option value="None" <?php echo ($row['dep'] == 'None') ? "selected":"";?>>Select Department</option>
                            <option value="Senior High School" <?php echo ($row['dep'] == 'Senior High School') ? "selected":"";?>>Senior High School</option>
                            <option value="College of Arts and Science" <?php echo ($row['dep'] == 'College of Arts and Science') ? "selected":"";?>>College of Arts and Science</option>
                            <option value="College of Business, Accountancy, and Administration" <?php echo ($row['dep'] == 'College of Business, Accountancy, and Administration') ? "selected":"";?>>College of Business, Accountancy, and Administration</option>
                            <option value="College of Computing Studies" <?php echo ($row['dep'] == 'College of Computing Studies') ? "selected":"";?>>College of Computing Studies</option>
                            <option value="College of Education" <?php echo ($row['dep'] == 'College of Education') ? "selected":"";?>>College of Education</option>
                            <option value="College of Engineering" <?php echo ($row['dep'] == 'College of Engineering') ? "selected":"";?>>College of Engineering</option>
                            <option value="College of Health and Allied Science" <?php echo ($row['dep'] == 'College of Health and Allied Science') ? "selected":"";?>>College of Health and Allied Science</option>
                            <option value="Graduate School" <?php echo ($row['dep'] == 'Graduate School') ? "selected":"";?>>Graduate School</option>
                        </select>
                    </div>
                    <div class="col">
                        <label for="" class="form-label">Grade/Year:</label>
                        <input type="text" class="form-control" name="gradeYear" value="<?php echo $row['gradeYear']?>">
                    </div>
                    <div class="col">
                        <label for="" class="form-label">Section:</label>
                        <input type="text" class="form-control" name="section" value="<?php echo $row['section']?>">
                    </div>
                </div>
                <div class="mb-3">
                    <div class="col">
                        <label for="" class="form-label">Due Date:</label>
                        <input type="date" class="form-control" name="dueDate" value="<?php echo date('Y-m-d',strtotime($row["dueDate"])) ?>">
                    </div>
                </div>
                <div class="mb-3">
                    <div class="col">
                        <label for="" class="form-label">Date Returned:</label>
                        <input type="date" class="form-control" name="dateReturned" 
                        value="<?php 
                        if(date('Y-m-d',strtotime($row["dateReturned"]) != '0000-00-00'))
                        {
                            echo date('Y-m-d',strtotime($row["dateReturned"]));
                        }
                        ?>">
                    </div>
                </div>
                <div class="mb-3">
                    <div class="col">
                        <label for="" class="form-label">ISBN Number:</label>
                        <input type="text" class="form-control" name="isbn" value="<?php echo $row['isbn']?>">
                    </div>
                </div>
                <div class="form-group mb-3">
                    <label>Returned?</label> &nbsp;
                    <input type="radio" class="form-check-input" name="isReturned" 
                    id="true" value="1" <?php echo ($row['isReturned'] == '1') ? "checked":"";?>>
                    <label for="true" class="form-input-label">Yes</label>
                    &nbsp;
                    <input type="radio" class="form-check-input" name="isReturned" 
                    id="false" value="0"  <?php echo ($row['isReturned'] == '0') ? "checked":"";?>>
                    <label for="false" class="form-input-label">No</label>
                </div>

                <div>
                    <button type="submit" class="btn btn-success" name="submit">Update</button>
                    <a href="../index.php" class="btn btn-danger">Cancel</a>
                </div>
            </form>
        </div>
    </div>
    
    <!-- BOOTSTRAP -->    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>