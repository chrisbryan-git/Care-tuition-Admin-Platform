<?php
session_start();
if (!isset($_SESSION['username']) || empty($_SESSION['username'])) {
    header("Location: index");// redireting if username is empty or not set
    exit;
}

$_SESSION['last_activity'] = time();

?>
<script>
setTimeout(function(){
    window.location.href = "index";
}, 660000);
</script>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration </title>
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css">

    <style>
        body {
            background-color: whitesmoke;
            font-family:new times roman;
        }

        .container {
            box-shadow: 0px 0px 10px green;
            padding: 70px;
            margin-top: 25px;
            
        }
        .form-control {
        width: 300px;
    }
    .form-select{
        width: 300px;
    }
    h2{
        text-align:center;
    }
    </style>
</head>
<body>
    <div class="container">
        <form action="connect_studentform" method="post">
            <h2>Student registration form</h2>

            <h4>Student Details</h4>
            <div class="row">
                <div class="col-md-4">
                    <label for="studentname" class="form-label">Student Name</label>
                    <input type="text" class="form-control" id="studentname" name="studentname">
                </div>
                <div class="col-md-4">
                    <label for="dateofadmissionInput" class="form-label">Date Of Admission</label>
                    <input type="date" class="form-control" id="dateofadmissionInput" name="date_adm">
                </div>
                <div class="col-md-4">
                    <label for="subjects" class="form-label">Subjects To Be Taught</label>
                    <input type="text" class="form-control" id="subjects" name="subjects">
                    
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <label for="typeofprogram" class="form-label">Type of Program</label>
                    <!-- <input type="text" class="form-control" id="typeofprogram" name="typeofprogram"> -->

                    <select id="typeofprogram" class="form-select" name="typeofprogram">
                        <option selected>Select Program</option>
                        <option value="Day care">Day care</option>
                        <option value="Home Tuition"> Home Tuition</option>
                        <option value="Center Tuition">Center Tuition</option>
                         <option value="Home Schooling">Home Schooling</option>
                        <option value="Center Schooling">Center Schooling</option>                        
                        <option value="Programming/Coding">Programming/Coding</option>
                        <option value="Programming and Tuition">Programming and Tuition</option>                        
                        <option value="Therapy Sessions">Therapy Sessions</option>
                        <option value="Graphics and Designing">Graphics and Designing</option>                        
                        <option value="Counselling">Counselling</option>
                        <option value="Life Skills">Life Skills</option>
                        <option value="Other">Other</option>
                        </select> 
                </div>
                <div class="col-md-4">
                    <label for="inputDepartment" class="form-label">Select Class</label>
                    <select id="inputDepartment" class="form-select" name="class">
                        <option selected>Select class</option>
                        <option value="Day care">Day care</option>
                        <option value="Yr/Grd 1">Yr/Grd 1</option>
                        <option value="Yr/Grd 2">Yr/Grd 2</option>
                         <option value="Yr/Grd 3">Yr/Grd 3</option>
                        <option value="Yr/Grd 4">Yr/Grd 4</option>                        
                        <option value="Yr/Grd 5">Yr/Grd 5</option>
                        <option value="Yr/Grd 6">Yr/Grd 6</option>                        
                        <option value="Yr/Grd 7">Yr/Grd 7</option>
                        <option value="Yr/Grd 8">Yr/Grd 8</option>                        
                        <option value="Yr/Grd 9">Yr/Grd 9</option>
                        <option value="Yr/Grd 10">Yr/Grd 10</option>
                        <option value="Yr/Grd 11">Yr/Grd 11</option>
                        <option value="Yr/Grd 12">Yr/Grd 12</option>
                         <option value="Form 1">Form 1</option>
                        <option value="Form 2">Form 2</option>                        
                        <option value="Form 3">Form 3</option>
                        <option value="Form 4">Form 4</option>                        
                        <option value="Diploma">Diploma</option>
                        <option value="Other">Other</option>                        
                        
                    </select>
                </div>
            </div>

            <h4>Contact Information</h4>
            <div class="row">
                <div class="col-md-4">
                    <label for="parentName" class="form-label">Parent Name</label>
                    <input type="text" class="form-control" id="parentName" name="parentName">
                </div>
                <div class="col-md-4">
                    <label for="phonenumber" class="form-label">Phone Number</label>
                    <input type="number" class="form-control" id="phonenumber" name="phonenumber" placeholder="Phone number">
                </div>
                <div class="col-md-4">
                    <label for="parentemail" class="form-label">Parent's Email</label>
                    <input type="email" class="form-control" id="parentemail" name="parentemail" placeholder="Optional">
                </div>
            </div>

            <h4>Address</h4>
            <div class="row">
                <div class="col-md-12">
                    <label for="locationaddress" class="form-label">Location</label>
                    <input type="text" class="form-control" id="locationaddress" name="locationaddress" placeholder="">
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-6">
                    <a href="students" class="btn btn-secondary">Exit</a>
                </div>
                <div class="col-md-6 text-end">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.min.js"></script>
</body>

</html>
