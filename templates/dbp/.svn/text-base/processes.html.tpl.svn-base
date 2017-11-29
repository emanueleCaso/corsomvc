<!DOCTYPE html>
<html>
<head>
    <title>Processes list</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <!-- Bootstrap core CSS -->
    <link href="http://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet"
          media="screen">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"/>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.min.css"/>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css"/>

    <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.2/html5shiv.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.js"></script>
    <![endif]-->
</head>
<body>
{Controller:dbp\NavigationBar}
<div class="container">
    <h1>{RES:ProcessesList}</h1>
    {Searcher:ricerca_process}
    <a href="process_record/add/new" class="btn btn-info"><span
                class="glyphicon glyphicon-plus-sign"></span> {RES:AddNewProcess}</a>
    <div class="table table-responsive">

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>{SorterBootstrap:process_id}</th>
                <th>{SorterBootstrap:description}</th>
                <th>{SorterBootstrap:start_time}</th>
                <th>{SorterBootstrap:end_time}</th>
            </tr>
            </thead>
            <tbody>
            <!-- BEGIN Processes -->
            <tr>
                <td><a href="process_record/open/{process_id}">{process_id}</a></td>
                <td>{name}</td>
                <td>{start_time}</td>
                <td>{end_time}</td>
                <td><a href="route_sheet/open/{process_id}" class="btn btn-primary">{RES:ShowTasks}</a></td>
            </tr>
            <!-- END Processes -->
            </tbody>
            <tfoot>
            <tr>
                <td class="text-center" colspan="9">{PaginatorBootstrap:Bottom}</td>
            </tr>
            </tfoot>
        </table>
    </div>

</div>

</body>
</html>