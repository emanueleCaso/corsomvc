<!DOCTYPE html>
<html>
<head>
    <title>Input</title>
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
    <h1>{RES:InputList}</h1>
    <!-- BEGIN TaskInfo -->
    <h3>{RES:TaskCode}: {task_id}</h3>
    <!-- END TaskInfo -->
    {Searcher:ricerca_input}


   <div class="table table-responsive">

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>{SorterBootstrap:InputID}</th>
                <th>{RES:Type}</th>
                <th>{RES:TaskDesc}</th>
            </tr>
            </thead>
            <tbody>

            <!-- BEGIN Input -->
            <tr>
                <td>{input_id}</td>
                <td>{type}</td>
                <td>{description}</td>
            </tr>
            <!-- END Input -->
            </tbody>
            <tfoot>
            <tr>
                <td class = "text-center" colspan="10">{PaginatorBootstrap:Bottom}</td>
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