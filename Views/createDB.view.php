<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create DB</title>
    <style>
        body {
            height: 300%;
            background-color: #f3f4f6;
            /*display: flex;*/
            align-items: center;
            justify-content: center;
            width: 500px;
            margin-left: 500px  ;
        }

        .container {
            margin-top: 100px;
            background-color: #ffffff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .title {
            font-size: 24px;
            font-weight: bold;
            color: #374151;
            margin-bottom: 20px;
            text-align: center;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-size: 16px;
            font-weight: bold;
            color: #374151;
            display: block;
            margin-top: 20px;
            margin-bottom: 10px;
        }

        input[type="text"] {
            width: 95%;
            padding: 10px;
            border: 1px solid #d1d5db;
            border-radius: 4px;
            font-size: 16px;
            color: #374151;
        }

        .button {
            background-color: #6366f1;
            color: #ffffff;
            font-weight: bold;
            padding: 12px 24px;
            border-radius: 4px;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-left: 160px;
        }

        .button:hover {
            background-color: #4338ca;
        }

        input:invalid{
            animation: shake 300ms;
            color: red;

        }

        @keyframes shake{
            25%{
                transform: translateX(4px);
            }
            50%{
                transform: translateX(-4px);
            }
            75%{
                transform: translateX(4px);
            }
        }
    </style>
</head>
<body>
<div class="container">
    <h2 class="title">Create Your Database</h2>
    <form action="/createDB" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="dbname">Database Name:</label>
<!--            I have done the basic validation of "No special characters are allowed, to create a DB". except based on the pattern."-->
            <input type="text" name="dbname" id="dbname" placeholder="DBName" pattern="[a-z,A-Z,_]*" required>
        </div>
        <button type="submit" class="button">Create DB</button>
    </form>
</div>
</body>
</html>