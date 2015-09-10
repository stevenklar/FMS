<!DOCTYPE html>
<html ng-app="MyApp">
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
                width: 12rem;
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
                float: right;
                font-size: 2rem;
                width: 2.5rem;
                height: 2.5rem;
                text-align: center;
            }

            .status--0 { background-color: #000000; }
            .status--1 { background-color: #00EE00; }
            .status--2 { background-color: #008000; }
            .status--3 { background-color: #DDDD00; }
            .status--4 { background-color: #FF0000; }
            .status--5 { background-color: #F72CFB; }
            .status--6 { background-color: #C0C0C0; }
            .status--7 { background-color: #0080FF; }
            .status--8 { background-color: #0080C0; }
            .status--9 { background-color: #408040; }
        </style>

        <script src="../bower_components/angular/angular.js"></script>
        <script src="../app.js"></script>

    </head>

    <body ng-controller="MyController as fms">
        <?php $first = true; ?>
        @foreach ($categories->get() as $i => $category)
        <div class="department @if($first == true) department--first @endif">
            <div class="department--name">{{ $category['name'] }}</div>

            @foreach ($category['objects'] as $object)
            <div class="vehicle">
                <div ng-init="MyController.prototype.test('<?= $object['name'] ?>')" ng-model="fms.objects[<?= $object['id'] ?>]" class="status status--<?= $object['status'] ?>"><?= $object['status'] ?></div>

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

</html>
