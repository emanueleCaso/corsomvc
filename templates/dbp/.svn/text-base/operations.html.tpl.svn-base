<!DOCTYPE html>
<html>
<head>
    <title>Operations</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap core CSS -->
    <link href="http://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet" media="screen">

    <!-- Custom CSS -->
    <link href="../../css/the-big-picture.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.2/html5shiv.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.js"></script>
    <![endif]-->
</head>
<body>
{Controller:dbp\NavigationBar}
<div class="container">
    <h1>{RES:OperationsList}</h1>
    <!-- BEGIN TaskInfo -->
    <h3>{RES:TaskCode}: {task_id}</h3>
    <!-- END TaskInfo -->
    {Searcher:ricerca_operations}


   <div class="table table-responsive">

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>{SorterBootstrap:WorkID}</th>
                <th>{RES:ProgramName}</th>
                <th>{RES:MU}</th>
                <th>{RES:CutterDescr}</th>
                <th>{RES:PosMag}</th>
                <th>{RES:ZMin}</th>
                <th>{RES:WorkType}</th>
                <th>{RES:PosTable}</th>
                <th>{RES:StepXY}</th>
                <th>{RES:StepZ}</th>
                <th>{RES:ProfileOff}</th>
                <th>{RES:SgrossOff}</th>
                <th>{RES:PlaneOff}</th>
                <th>{RES:RPM}</th>
                <th>{RES:AVA}</th>
                <th hidden>{RES:TaskID}</th>
            </tr>
            </thead>
            <tbody>

            <!-- BEGIN Operations -->
            <tr>
                <td>{work_id}</td>
                <td>{program_name}</td>
                <td>{mu}</td>
                <td>{cutter_description}</td>
                <td>{pos_mag}</td>
                <td>{z_min}</td>
                <td>{work_type}</td>
                <td>{pos_table}</td>
                <td>{step_xy}</td>
                <td>{step_z}</td>
                <td>{profile_offset}</td>
                <td>{sgross_offset}</td>
                <td>{plane_offset}</td>
                <td>{rpm}</td>
                <td>{ava}</td>
                <td hidden>{task_id}</td>
            </tr>
            <!-- END Operations -->
            </tbody>
            <tfoot>
            <tr>
                <td class = "text-center" colspan="15">{PaginatorBootstrap:Bottom}</td>
            </tr>
            </tfoot>
        </table>
    </div>




</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="http://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.4/js/bootstrap.min.js"></script>
</body>
</html>