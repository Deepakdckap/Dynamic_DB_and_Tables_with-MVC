<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Your Values</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f2f5;
            color: #374151;
        }

        form {
            margin: 20px;
            border: solid 2px;
            /*width: 600px;*/
            padding: 20px;
        }

        h2 {
            text-align: center;
            margin-top: 28px;
            font-size: 24px;
            font-weight: bold;
            color: #161e2e;
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
            width: 100%;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(6, 1fr);
            gap: 16px;
        }

        .sm\\:col-span-4 {
            grid-column: span 4;
        }

        .flex {
            display: flex;
        }

        .shadow-l {
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        .ring-1 {
            border-width: 1px;
            border-color: #d1d5db;
        }

        .focus\\:within\\:ring-2 {
            box-shadow: 0 0 0 3px rgba(66, 153, 225, 0.5);
        }

        .bg-blue-500 {
            background-color: #3b82f6;
        }

        .hover\\:bg-blue-700:hover {
            background-color: #2563eb;
        }

        .text-whitefont-bold {
            color: #ffffff;
            font-weight: bold;
        }

        .py-2 {
            padding-top: 8px;
            padding-bottom: 8px;
        }

        .px-4 {
            padding-left: 16px;
            padding-right: 16px;
        }

        .rounded {
            border-radius: 0.375rem;
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $("#dbname").change(function () {
                var aid = $("#dbname").val();
                $.ajax({
                    url: 'index.php',
                    method: 'POST',
                    data: 'aid=' + aid
                }).done(function (tables) {
                    console.log(tables);
                    tables = JSON.parse(tables);
                    $('#table_name').empty();

                    tables.forEach(function (table) {
                        $('#table_name').append('<option>' + table.tablesname + '</option>');
                        $('#table_name').addClass(table.TABLE_SCHEMA);
                    });
                });
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function () {
            $("#table_name").change(function () {
                var table = $("#table_name").val();
                var dbname = $("#table_name").attr("class");
                $.ajax({
                    url: 'index.php',
                    method: 'POST',
                    data: {table: table, dbname: dbname},
                }).done(function (column) {
                    console.log(column);
                    column = JSON.parse(column);
                    column.forEach(function (columns) {
                        $('#columnData').append('<option>' + columns.tableNames + '</option>');
                        $('#columnData').addClass(columns.tableNames);
                    });
                });
            });
        });
    </script>
</head>

<body>

<form action="/create_data" method="post" enctype="multipart/form-data">
    <div class="space-y-12">
        <div class="border-b border-gray-900/10 pb-12">
            <h2 class="mt-7 text-2xl font-semibold leading-7 text-gray-900">Add Your Values</h2>
            <div class="mt-7 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <div class="sm:col-span-4">
                    <label for="dbname" class="block text-l font-medium leading-6 text-gray-900">Database</label>
                    <div class="mt-4">
                        <div class="flex rounded-md shadow-l ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                            <select name="dbname" id="dbname">
                                <option selected="" value="" hidden>Select</option>
                                <?php foreach ($databaseList as $dbList): ?>
                                    <option value="<?php echo $dbList['Database']; ?>"><?php echo $dbList['Database']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="mt-4">
                        <label for="table_name" class="block text-l font-medium leading-6 text-gray-900">Table Name</label>
                        <div class="mt-4 flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                            <select name="table_name" id="table_name">
                                <option selected value="" hidden>Select</option>
<!--                                --><?php
//                                $query = new model();
//                                $result = $query->db->query("SHOW TABLES FROM DCKAP");
//                                $results = $result->fetchAll(PDO::FETCH_ASSOC);
//                                if($results):
//                                    ?>
<!--                                    <select>-->
<!--                                        --><?php
//                                        foreach ($results as $result)
//                                        {
//                                            echo '<option value="', $result['Tables_in_DCKAP'], '">', $result['Tables_in_DCKAP'], '</option>';
//                                        }
//                                        ?>
<!--                                    </select>-->
<!--                                --><?php //endif; ?>
                            </select>
                        </div>
                    </div>
                    <div class="mt-4" id="columnData">

                    </div>
                </div>
            </div>
        </div>
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-whitefont-bold py-2 px-4 rounded">Add Data</button>
    </div>
</form>

</body>

</html>
