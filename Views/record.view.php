<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form method="post">
    <select>
        <?php foreach ($allDBs as $allDB):?>
            <option onchange="<?php $name = new model();?>"><?php echo $allDB["Database"]?></option>
        <?php endforeach;?>
    </select>
    <?php
    $query = new model();
    $result = $query->db->query("SHOW TABLES from DCKAP");
    $results =$result->fetchAll(PDO::FETCH_ASSOC);
    if($results):
    ?>
        <select>
            <?php
            foreach ($results as $result)
            {
                echo '<option value="', $result['Tables_in_DCKAP'], '">', $result['Tables_in_DCKAP'], '</option>';
            }
            ?>
        </select>
    <?php endif; ?>
</form>
</body>
</html>
