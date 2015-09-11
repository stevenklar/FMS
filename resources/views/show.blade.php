<!DOCTYPE html>
<html>
    <head>
        <title>FMS</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:300normal" rel="stylesheet" type="text/css">
        <link href="../app.css" rel="stylesheet" type="text/css">
    </head>

    <body>
<?php
$categories = $categories->get();
$length = count($categories);
$count = $length / 4;

$departments = [];
$departments[] = array_slice($categories, 0, 5);
$departments[] = array_slice($categories, 6, 3);
$departments[] = array_slice($categories, 9);
?>
        <div class="container">
            <div class="left-side">
                <?php $first = true; ?>
                @foreach ($departments[0] as $i => $category)
                    @include('partials/show/department', ['first' => $first, 'category' => (object) $category])
                <?php $first = false; ?>
                @endforeach
            </div>

            <div class="right-side">
                <?php $first = true; ?>
                @foreach ($departments[1] as $i => $category)
                    @include('partials/show/department', ['first' => $first, 'category' => (object) $category])
                <?php $first = false; ?>
                @endforeach
            </div>

            <div class="center-side">
                <?php $first = true; ?>
                @foreach ($departments[2] as $i => $category)
                    @include('partials/show/department', ['first' => $first, 'category' => (object) $category])
                <?php $first = false; ?>
                @endforeach
            </div>
        </div>

    <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <script src="../app.js"></script>

</html>
