<!DOCTYPE html>
<html>

<head>
    <title>Job Portal</title>
    <style>
        div {
            font-size: 22px;
        }
    </style>
</head>

<body>
    <div>
        <?php
            echo "Successfully connected to the database => " 
                        .DB::connection()->getDatabaseName();
        ?>
    </div>
</body>

</html>