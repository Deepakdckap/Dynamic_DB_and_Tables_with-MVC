<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f4f6;
            color: #374151;
        }

        form {
            margin: 20px;
            border: solid 2px;
            padding: 20px;
            width: 500px;
            margin-left: 500px;
        }

        label {
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 6px;
            display: block;
        }

        select, input[type="text"], button {
            font-size: 14px;
            padding: 10px;
            border-radius: 4px;
            border: 1px solid #d1d5db;
            background-color: #ffffff;
            color: #374151;
            margin-bottom: 10px;
            width: 200px;
        }

        select {
            width: 220px;
        }

        .filed {
            display: flex;
            margin-bottom: 10px;
        }

        .filed div {
            margin-right: 10px;
        }

        .filed1 div {
            margin-bottom: 10px;
        }

        button {
            background-color: #6366f1;
            color: #ffffff;
            font-weight: bold;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-left: 150px;
        }

        button:hover {
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

<form action="/createTable" method="post">
    <div>
        <label>Select Database</label>
        <select name="database" required>
<!--            This variable comes from showTableForm() func in UC -->
            <?php foreach ($allDatabases as $allDatabase):?>
                <option><h4><?= $allDatabase["Database"]?></h4></option>
            <?php endforeach;?>
        </select>
    </div>
    <div>
<!--        I have done the basic validation "No special characters are allowed to create the table name"-->
        <label>Table name</label>
        <input type="text" placeholder="table_name" required name="table-name" pattern="[a-z,A-Z,_]*">
    </div>
    <div class="filed">
        <div>
            <label>Column name</label>
            <input type="text" placeholder="column_name" required name="column-name[]">
        </div>
        <div>
            <label>Datatype</label>
            <select name="data-type[]" required>
                <option value="int" >int</option>
                <option value="varchar(255)" >varchar(255)</option>
                <option value="timestamp" >datetime</option>
            </select>
        </div>
    </div>
    <div class="filed1">

    </div>
    <button id="addMore" type="button">Add More</button>
    <br>
    <button type="submit">Create Table</button>
</form>
<script type="text/javascript">
    let addMore = document.querySelector("#addMore")
    let container = document.querySelector(".filed1")

    let content = ` <div class="filed"> <div>
               <label>Column name</label>
               <input type="text" placeholder="column_name" name="column-name[]" required>
                 </div>
            <div>
                <label>Datatype</label>
                <select name="data-type[]" required>
                    <option hidden >select</option>
                    <option value="int" >int</option>
                    <option value="varchar(255)" >varchar(255)</option>
                    <option value="timestamp" >datetime</option>
                </select>
            </div>
        </div> `
    addMore.addEventListener("click",()=>{
        container.innerHTML += content;
    })
</script>
</body>
</html>
