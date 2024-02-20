<?php
include "../function/db_conn.php";
date_default_timezone_set('Asia/Taipei');
if(isset($_POST['submit'])){
    // POLICY
    echo "yes";
    $firstName = $_POST['firstName'];
    $middleName = $_POST['middleName'];
    $lastName = $_POST['lastName'];
    $studentID = $_POST['studentID'];
    $sex = isset($_POST['sex']) ? $_POST['sex'] : 0;
    $dep = isset($_POST['dep']) ? $_POST['dep'] : 0;
    $gradeYear = $_POST['gradeYear'];
    $section = $_POST['section'];
    $dateOfBorrowing = date("Y-m-d H:i:sa");
    $dueDate = $_POST['dueDate'];
    $isbn = $_POST['isbn'];
    $sql = "INSERT INTO `libralog`(`uid`, `firstName`, `middleName`, `lastName`, `sex`, `studentID`, `dep`, `gradeYear`, `section`, `dateOfBorrowing`, `dueDate`, `dateReturned`, `isbn`, `isReturned`) VALUES ('null','$firstName','$middleName','$lastName','$sex','$studentID','$dep','$gradeYear','$section','$dateOfBorrowing','$dueDate','null','$isbn','false')";
    $result = mysqli_query($conn, $sql);

    if($result){
        header("Location: ../index.php?msg=New Record Created Successfully");
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
<body style="font-family: poppins;">
    <div style="padding:50px;"> 
        <div class="container">
            <div class="text-center mb-4">
                <h3>Add New</h3>
                <p class="text-muted">Fill out the form to Borrow a Book</p>
            </div>
        </div>
        <div class="container d-flex justify-content-center">
            <form class="needs-validation" method="post" style="width:50vw; min-width:300px;" novalidate>
                <div class="row mb-3">
                    <div class="col">
                        <label for="" class="form-label">First Name:</label>
                        <input type="text" class="form-control" name="firstName" required>
                        <div class="invalid-feedback">You must fill out the form</div>
                    </div>
                    <div class="col">
                        <label for="" class="form-label">Middle Name:</label>
                        <input type="text" class="form-control" name="middleName" required>
                        <div class="invalid-feedback">Please provide your complete middle name</div>
                    </div>
                    <div class="col">
                        <label for="" class="form-label">Last Name:</label>
                        <input type="text" class="form-control" name="lastName" required>
                        <div class="invalid-feedback">Please provide your surname</div>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="col">
                        <label for="" class="form-label">Student ID:</label>
                        <input type="text" class="form-control" name="studentID" required>
                        <div class="invalid-feedback">Enter your Student ID</div>
                    </div>
                </div>
                <div class="form-group mb-3">
                    <label>Sex:</label> &nbsp;
                    <input type="radio" class="form-check-input" name="sex" 
                    id="Male" value="Male" required="">
                    <label for="Male" class="form-input-label">Male</label>
                    &nbsp;
                    <input type="radio" class="form-check-input" name="sex" 
                    id="Female" value="Female" required="">
                    <label for="Female" class="form-input-label">Female</label>
                    
                </div>
                <div class="row mb-3">
                    <div class="col-6">
                        <label for="" class="form-label">Department:</label>
                        <select class="form-select" aria-label="Default select example" name="dep" required>
                            <option selected disabled value="">...</option>                        
                            <option value="Senior High School">Senior High School</option>
                            <option value="College of Arts and Science">College of Arts and Science</option>
                            <option value="College of Business, Accountancy, and Administration">College of Business, Accountancy, and Administration</option>
                            <option value="College of Computing Studies">College of Computing Studies</option>
                            <option value="College of Education">College of Education</option>
                            <option value="College of Engineering">College of Engineering</option>
                            <option value="College of Health and Allied Science">College of Health and Allied Science</option>
                            <option value="Graduate School">Graduate School</option>
                        </select>
                        <div class="invalid-feedback">Please choose your department</div>
                    </div>
                    <div class="col-2">
                        <label for="" class="form-label">Grade/Year:</label>
                        <input type="text" class="form-control" name="gradeYear" required>
                        <div class="invalid-feedback">Provide you grade/year level</div>
                    </div>
                    <div class="col-4">
                        <label for="" class="form-label">Section:</label>
                        <input type="text" class="form-control" name="section" required>
                        <div class="invalid-feedback">Provide your section</div>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="col">
                        <label for="" class="form-label">Due Date:</label>
                        <input type="date" class="form-control" name="dueDate" required>
                        <div class="invalid-feedback">Please choose a due date</div>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="col">
                        <label for="" class="form-label">ISBN Number:</label >
                        <input type="text" class="form-control" name="isbn" required>
                        <div class="invalid-feedback">Provide the ISBN number of the book that you'll borrow</div>
                    </div>
                </div>
                

                <div>
                    <button type="submit" class="btn btn-success" name="submit">Submit</button>
                    <a href="../index.php" class="btn btn-danger">Cancel</a>
                </div>
            </form>
        </div>
    </div>
    
    <!-- BOOTSTRAP -->    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script>
        (() => {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        const forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.from(forms).forEach(form => {
            form.addEventListener('submit', event => {
            if (!form.checkValidity()) {
                event.preventDefault()
                event.stopPropagation()
            }

            form.classList.add('was-validated')
            }, false)
        })
        })()
    </script>
</body>
</html>