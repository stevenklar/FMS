<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>FMS</title>

    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <script src="/bower_components/angular/angular.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <div class="container" ng-app>
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Join Session</h3>
                    </div>
                    <div class="panel-body">
                        {!! Form::open(['url' => '/get']) !!}
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="SessionID" name="id" type="text" autofocus required>
                                </div>

                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" ng-model="data.private" name="scope" />
                                        private session?
                                    </label>
                                </div>

                                <div class="form-group" ng-show="data.private">
                                    <input class="form-control" placeholder="Password" name="password" type="password" ng-required="data.private">
                                </div>
                                <button type="submit" class="btn btn-lg btn-success btn-block">View</button>
                            </fieldset>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">New Session</h3>
                    </div>
                    <div class="panel-body">
                        {!! Form::open(['url' => '/create']) !!}
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Name" name="name" type="text" autofocus required>
                                </div>

                                <div class="form-group">
                                    <select class="form-control" name="scope" ng-model="data.scope">
                                        <option value="">Public</option>
                                        <option value="private">Private</option>
                                    </select>
                                </div>

                                <div class="form-group" ng-show="data.scope">
                                    <input class="form-control" placeholder="Password" name="password" type="password" ng-required="data.scope">
                                </div>
                                <button type="submit" class="btn btn-lg btn-success btn-block">Create session</button>
                            </fieldset>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
