<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            margin: 0;
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            display: flex;
        }

        /* Sidebar styling */
        .sidebar {
            width: 30%;
            height: 100vh;
            background-color: #3498db; /* Light blue */
            color: #fff;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.2);
            display: flex;
            flex-direction: column;
            align-items: center;
            padding-top: 20px;
        }

        .sidebar a {
            text-decoration: none;
            color: #fff;
            padding: 15px 20px;
            width: 100%;
            box-sizing: border-box;
            border-bottom: 1px solid #2980b9; /* Dark blue */
            transition: background-color 0.3s;
        }

        .sidebar a:hover {
            background-color: #2980b9; /* Dark blue on hover */
        }

        /* Content styling */
        .content {
            flex: 1;
            padding: 20px;
        }

        h1 {
            color: #333;
        }
    </style>
    <title>Dashboard</title>
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <a href="#">Register New Pupil</a>
        <a href="#">Register New Parent</a>
        <a href="#">Register new Teacher</a>
        <a href="#">List of User/Parents</a>
        <a href="{{ route('all_events') }}">List of events</a>
        <a href="#">Pay Fees</a>
        <a href="#">Check Child's Progress</a>
        <a href="#">Check Calendar</a>
        <a href="#">Change Password</a>
    </div>

    <!-- Content -->
    <div class="content">
        <h1>Welcome to the Dashboard</h1>
        <h2>Welcome {{auth()->user()->firstname}} !</h2>
        <p>Your content goes here...</p>
    </div>

</body>
</html>
