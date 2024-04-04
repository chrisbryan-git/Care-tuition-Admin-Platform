<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff registration form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #5f5d5d;
            margin: 0;
            padding: 0;
        }

        form {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #d3d3d3;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        h3 {
            color: #3a3939;
            text-transform: uppercase;
            font-size: 2rem;
            text-decoration: underline;
        }

        h4 {
            color: #363535;
            margin-bottom: 10px;
            font-size: 1.5rem;
        }

        p {
            font-size: 20px;
        }

        .row {
            display: flex;
            margin-bottom: 15px;
            justify-content: space-between;
        }

        .col-md-4 {
            flex: 1;
            margin-right: 15px;

        }

        .col-md-4 input {
            font-size: 17px;
            padding: 5px;
            border-radius: 6px;
            border: 1px solid rgb(201, 197, 197);
            background-color: #f8f3f3;
        }

        .form-control {
            display: block;
            width: 100%;
            padding: 10px;
            font-size: 17px;
            border-radius: 4px;
            transition: border-color 0.2s ease-in-out, box-shadow 0.15s ease-in-out;
        }

        .form-select {
            width: 100%;
            padding: 10px;
            font-size: 14px;
            border: 1px solid #c2bfbf;
            border-radius: 6px;
            background-color: #f8f3f3;
        }

        .form-check {
            display: flex;
            align-items: center;
            margin-right: 15px;
        }

        label.form-check-label {
            margin-left: 5px;
        }

        input[type="file"] {
            margin-top: 10px;
        }

        .input-group {
            display: flex;
            margin-bottom: 15px;
        }

        .input-group .form-control {
            flex: 1;
            margin-right: 15px;
        }

        .Back {
            padding: 10px;
            display: flex;
            justify-content: flex-start;
            border-radius: 8px;
            color: #818386;
        }

        button {
            display: inline-block;
            font-size: 17px;
            padding: 10px 20px;
            background-color: #4e565e;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .flex-end {
            padding: 10px 0;
            display: flex;
            justify-content: flex-end;
            display: inline-block;
        }

        .btn {
            font-size: 17px;
            padding: 10px 20px;
            background-color: #4e565e;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #0056b3;
            color: #000000;
        }
    </style>
</head>

<body>

    <form action="#" method="post">
        <h3>Staff registration form</h3>
        <div class="row">
            <div class="col-md-4">
                <label for="Firstname" class="form-control">FirstName</label>
                <input type="text" id="Fname" class="Firstname" required>
            </div>

            <div class="col-md-4">
                <label for="lastName" class="form-control">LastName</label>
                <input type="text" id="Lname" class="lastName" required>
            </div>
        </div>

        <div class="col-md-4">
            <label for="contact" class="form-control">MobileNumber</label>
            <input type="number" id="mobileNumberinput" class="mobileNumber" required>
        </div>

        <div class="col-md-4">
            <label for="department" class="form-control">Department</label>
            <input type="text" id="subject" name="subject" required>
        </div>

        <div class="col-md-4">
            <label for="dob" class="form-control">Date of Employment</label>
            <input type="date" id="dob" name="dob">
        </div>
        <p>Gender</p>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
            <label class="form-check-label" for="flexRadioDefault1">
                Male
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
            <label class="form-check-label" for="flexRadioDefault1">
                Female
            </label>
        </div>
        <div class="row">
            <div class="Back">
                <button name="BackBtn" type="button" onclick="history.back()">Back</button>
            </div>

            <div class="flex-end">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>

</body>

</html>