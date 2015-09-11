<!DOCTYPE html>
<html>
    <head>
        <title>FMS</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:300normal" rel="stylesheet" type="text/css">
        <link href="../app.css" rel="stylesheet" type="text/css">

  <style>
  body {
  }

/* css changes */
.vehice {
    font-family: "Lato";
    font-weight: 300;
    width: 12rem;
    height: 1rem;
    margin: 7px;
    padding-bottom: 1rem;
    float: none;
}
  </style>
    </head>

    <body>
    @for ($x = 0; $x < 8; $x++)
<div class="column">
    <div class="portlet">
        <div class="portlet-header">
            <div class="department--name">Feuerwehr - Hauptwache 1</div>
        </div>

        <div class="portlet-content">
        @for ($i = 0; $i < 8; $i++)
            <div class="vehicle vehicle-1">
                <div class="status status--0">0</div>

                <div class="call-sign">
                    <div class="id">FW 1 ELW1 1</div>
                </div>
            </div>
        @endfor
        </div>
    </div>
</div>
    @endfor

<div class="column full-column">
    <div class="portlet">
        <div class="portlet-header">
            <div class="department--name">Feuerwehr - Hauptwache 1</div>
        </div>

        <div class="portlet-content">
        @for ($i = 0; $i < 8; $i++)
            <div class="vehicle vehicle-1">
                <div class="status status--0">0</div>

                <div class="call-sign">
                    <div class="id">FW 1 ELW1 1</div>
                </div>
            </div>
        @endfor
        </div>
    </div>
</div>

    <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <script src="../app.js"></script>
</html>

