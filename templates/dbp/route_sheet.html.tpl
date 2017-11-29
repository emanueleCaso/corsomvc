<!DOCTYPE html>
<html>
<head>
    <title>Route sheet</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap core CSS -->
    <link href="http://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet" media="screen">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.2/html5shiv.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.js"></script>
    <![endif]-->
</head>
<body>
{Controller:dbp\NavigationBar}
<div class="container">
    <h1>{RES:RouteSheet}</h1>
    <!-- BEGIN ProcessInfo -->
    <h3>{RES:ProcessCode}: {process_id}</h3>
    <!-- END ProcessInfo -->
    {Searcher:ricerca_task}


    <a href="../../../dbp/task_record/add/new" class="btn btn-info"><span class="glyphicon glyphicon-plus-sign"></span> {RES:AddNewTask}</a>
    <div class="table table-responsive">

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>{SorterBootstrap:TaskID}</th>
                <th>{SorterBootstrap:TaskName}</th>
                <th>{RES:TaskDesc}</th>
                <th>{SorterBootstrap:StartTime}</th>
                <th>{SorterBootstrap:EndTime}</th>
                <th>{SorterBootstrap:Setup}</th>
                <th>{SorterBootstrap:Cycle}</th>
                <th>{RES:Dept}</th>
                <th>{RES:Machine}</th>
                <th>{RES:Tooling}</th>
            </tr>
            </thead>
            <tbody>

            <!-- BEGIN Tasks -->
            <tr>
                <td><a href="../../../dbp/task_record/open/{task_id}">{task_id}</a></td>
                <td>{name}</td>
                <td>{description}</td>
                <td>{start_time}</td>
                <td>{end_time}</td>
                <td>{setup}</td>
                <td>{cycletime}</td>
                <td>{department_id}</td>
                <td>{machine_id}</td>
                <td>{tooling_id}</td>
                <td>
                    <button class="btn btn-primary" data-toggle="modal" data-target="#myModalNorm{task_id}">
                        Control
                    </button>

                    <div class="modal fade" id="myModalNorm{task_id}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <button type="button" class="close"
                                            data-dismiss="modal">
                                        <span aria-hidden="true">&times;</span>
                                        <span class="sr-only">Close</span>
                                    </button>
                                    <h4 class="modal-title" id="myModalLabel">
                                        Control
                                    </h4>
                  
                                </div>
                                <!-- Modal Body -->
                                <div class="modal-body">
                                    <form role="form">
                                        <div class="panel-body">
                      
                      <div class="table table-responsive">

        <table class="table table-bordered">

<th colspan="2"><h2>Planned Task </h2> </th>
               <tr><td>Id</td>  <td><a href="../../../dbp/task_record/open/{task_id}">{task_id}</a></td></tr>
             <tr> <td>Task Name</td> <td>{name}</td></tr>
               <tr><td>Task Description</td>  <td>{description}</td></tr>
                <tr><td>Start Date </td> <td>{start_time}</td></tr>
                <tr><td>End Date</td> <td>{end_time}</td></tr>
                <tr><td>Setup (hr)</td>   <td>{setup}</td></tr>
                <tr><td>Cycle (min)</td>   <td>{cycletime}</td></tr>
                <tr><td>Dept ID</td>    <td>{department_id}</td></tr>
                <tr><td>Machine ID</td>    <td>{machine_id}</td></tr>
                <tr><td>Tool ID</td>   <td>{tooling_id}</td></tr>


</table>
</div>
                                          <div class="form-group row">
                                                <label class="col-sm-3 control-label text-right"><label></label></label>
                                                <div class="col-sm-8"> 




                                                
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="modal-footer">
                                        <div class="form-group row">
                                            <label class="col-sm-2 control-label">&nbsp;</label>
                                            <div class="col-sm-10">
                                                <a id="btn" href='' class="btn btn-primary" onclick="this.href='../import_csv/'+document.getElementById('filename{task_id}').value+','+{task_id}">Send</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </td>
            </tr>
            <!-- END Tasks -->
            </tbody>
            <tfoot>
            <tr>
                <td class = "text-center" colspan="12">{PaginatorBootstrap:Bottom}</td>
            </tr>
            </tfoot>
        </table>
    </div>


    <!-- Modal -->


</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>
    function setValue(task_id){
        document.getElementById('btn')
    }
</script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="http://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.4/js/bootstrap.min.js"></script>
</body>
</html>