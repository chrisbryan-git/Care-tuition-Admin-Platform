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
<html>

<head>
    <title>Teacher Registration Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css">
    <style>
        body {
            background-color: whitesmoke;
            font-family:new times roman;
        }

        .form-box {
            margin-top:20px;
            box-shadow: 0 0 10px blue;
            padding: 20px;
        }
        .container{
            padding:70px;
        }
        form{
             padding:40px;
        }
        h3{
            text-align:center;
            padding:20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <form action="connect_teacherForm" method="post" class="form-box">
            <h3>Teacher Registration Form</h3>
            <div class="row mb-3">
                <div class="col-md-4">
                    <label for="firstName">Teacher's Name</label>
                    <input type="text" id="teacherName" name="teacherName" class="form-control">
                </div>

                <div class="col-md-4">
                    <label for="lastName"> Residence</label>
                    <input type="text" id="residence" name="residence" class="form-control">
                </div>

                <div class="col-md-4">
                    <label for="dob">Date of Employment:</label>
                    <input type="date" id="doe" name="date_employed" class="form-control">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-4">
                    <label for="personalId">National ID</label>
                    <input type="text" id="personalId" name="personalId" class="form-control" placeholder="ID">
                </div>

                <div class="col-md-4">
                    <label for="teacherIdNumber">Teacher's No</label>
                    <input type="text" id="teacher_tsc" name="teacher_tsc" class="form-control"
                        placeholder="Enter TSC number">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-4">
                    <label for="mobileNumber">Mobile Number</label>
                    <input type="text" id="inpMobilePhone" name="mobilePhone" class="form-control" placeholder="Mobile Phone">
                </div>

                <div class="col-md-4">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" class="form-control" placeholder="Email">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-4">
                    <label for="subjectCombination">Subject Combination</label>
                    <input type="text" id="subjectCombination" name="subjectCombination" class="form-control" placeholder="Subjects">
                </div>

                 <div class="col-md-4">
                    <label for="qualification">Qualification</label>
                    <input type="text" id="qualification" name="qualification" class="form-control">
                </div>
            </div>

            <p>Gender</p>
            <div class="form-check mb-3">
                <input class="form-check-input" type="radio" name="gender" id="maleRadio" value="male">
                <label class="form-check-label" for="maleRadio">
                    Male
                </label>
            </div>

            <div class="form-check mb-3">
                <input class="form-check-input" type="radio" name="gender" id="femaleRadio" value="female">
                <label class="form-check-label" for="femaleRadio">
                    Female
                </label>
            </div>

            <div class="row">
                <div class="col-6">
                    <a name="backBtn" type="button" href="teachers" class="btn btn-secondary">Back</a>
                    </div>

                <div class="col-6 text-end">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
   
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"></script>
</body>

</html>
