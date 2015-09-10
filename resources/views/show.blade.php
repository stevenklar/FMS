<!DOCTYPE html>
<html>
    <head>
        <title>FMS</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

        <style>
            body {
                margin: 0;
                background-color: #CCC;
            }

            .department {
                margin-top: 2rem;
            }

            .department--first {
                margin-top: 0;
            }

            .department--name {
                background-color: #DDD;
                width: 100%;
                height: 1rem;
                font-size: 1.25rem;
                border-top: 1px solid #DDD;
                border-bottom: 1px dotted black;
                margin: 0;
                padding: 1rem;
                padding-top: 0.5rem;
            }

            .vehicle {
                width: 9rem;
                height: 1.5rem;
                margin: 9px;
                padding-top: 1rem;
                padding-right: 1.5rem;
                float: left;
            }

            .id {
                font-weight: bold;
                font-size: 1rem;
            }

            .status {
                color: #FFF;
                float: left;
                margin-right: 10px;
                font-size: 2rem;
                width: 2.5rem;
                height: 2.5rem;
                text-align: center;
                font-family: "Lato";
                font-weight: bold;
                border: 1px solid black;

                border-top-left-radius: 5px;
                border-top-right-radius: 5px;
                border-bottom-left-radius: 5px;
                border-bottom-right-radius: 5px;
            }

            .status { background-color: #666; color: white; }
            .status--0 { background-color: #666; color: white; }
            .status--1 { background-color: #00FF00; color: black; }
            .status--2 { background-color: #007E00; color: white; }
            .status--3 { background-color: #FFFF00; color: black; }
            .status--4 { background-color: #FF0000; color: black; }
            .status--5 { background-color: #55B8FE; color: black; }
            .status--6 { background-color: #888888; color: black; }
            .status--7 { background-color: #FF8181; color: black; }
            .status--8 { background-color: #FF80FF; color: black; }
            .status--9 { background-color: #666; color: white; }
        </style>
    </head>

    <body>
        <?php $first = true; ?>
        @foreach ($categories->get() as $i => $category)
        <div class="department @if($first == true) department--first @endif">
            <div class="department--name">{{ $category['name'] }}</div>

            @foreach ($category['objects'] as $object)
            <div class="vehicle vehicle-{{ $object['id'] }}">
                <div class="status status--<?= $object['status'] ?>"><?= $object['status'] ?></div>

                <div class="call-sign">
                    <div class="id">{{ substr(str_replace('.','/',$object['name']), -8) }}</div>
                    <div class="name">{{ substr($object['name'], 0, -8) }}</div>
                </div>
            </div>
            @endforeach

            <div style="clear: left;"></div>
        </div>
        <?php $first = false; ?>
        @endforeach
    </body>

    <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <script src="../app.js"></script>

</html>
