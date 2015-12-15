<!DOCTYPE html>
<html>
    <head>
        <title>FMS</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:300normal" rel="stylesheet" type="text/css">
        @if($session->getStyle() != '')
        <link href="{{ $session->getStyle() }}" rel="stylesheet" type="text/css">
        @else
        <link href="/app.css" rel="stylesheet" type="text/css">
        @endif
    </head>

    <body>
        <?php
        $categories = $categories->get();
        $length = count($categories);

        $departments = array_slice($categories, 0);

        if ($length >= 4) {
            $firstDepartment = array_shift($categories);
            $lastDepartment = array_pop($categories);

            $remaining = $length - 2;

            $oneRowCount = $remaining / 2;

            $leftDepartments = array_slice($categories, 0, $oneRowCount+1);
            $rightDepartments = array_slice($categories, $oneRowCount+1);
        ?>

        <div class="column full-column full-column--top">
            @include('partials/show/department', ['category' => (object) $firstDepartment])
        </div>

        <div class="column">
            @foreach ($leftDepartments as $category)
                @include('partials/show/department', ['category' => (object) $category])
            @endforeach
        </div>

        <div class="column right-column">
            @foreach ($rightDepartments as $category)
                @include('partials/show/department', ['category' => (object) $category])
            @endforeach
        </div>

        <div class="column full-column">
            @include('partials/show/department', ['category' => (object) $lastDepartment])
        </div>
        <?php
        }
        ?>

        <div class="column full-column">
            <div class="portlet">
                <div class="portlet-header">
                    <div class="department--name">Funkverkehr</div>
                </div>

                <div class="portlet-content">
                    <div class="object-log" style="width: 100%">
                    </div>
                </div>
            </div>
        </div>

    </body>

    <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <script src="../app.js"></script>

</html>
