<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fees Structure Request Form</title>
    <style>
        body {
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 0;
  display: flex;
  justify-content: center;
  align-items: center;
  min-height: 100vh;
  background-color: #f4f4f4;
}

.form-container {
  background-color: #fff;
  padding: 20px;
  border-radius: 5px;
  box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);
  width: 400px;
}

h2 {
  text-align: center;
  margin-bottom: 20px;
}

form {
  display: flex;
  flex-direction: column;
}

label {
  margin-bottom: 5px;
}

input[type="text"],
input[type="email"],
input[type="tel"],
textarea {
  padding: 10px;
  margin-bottom: 15px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

button {
  padding: 10px;
  background-color: #007bff;
  color: #fff;
  border: none;
  border-radius: 3px;
  cursor: pointer;
}

button:hover {
  background-color: #0056b3;
}

    </style>
</head>

<body>
    <div class="form-container">
        <h2>Fees Structure Request</h2>
        <form action="#" method="post">
            

            <label for="course_name">Course Name</label>
            <input type="text" id="course_name" name="course_name" required>

            <label for="Student Id">Student ID</label>
            <input type="text" id="Studentid" name="Studentid" required>

            <label for="class">class/year</label>
            <input type="text" id="class/year" name="clsss" required>

            <label for="message">Additional Information</label>
            <textarea id="message" name="message" rows="4"></textarea>

            <button type="submit">Submit Request</button>
        </form>
    </div>
</body>

</html>