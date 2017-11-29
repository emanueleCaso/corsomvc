<!DOCTYPE html>
<html>
<head>
    <title>Add a new task</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap core CSS -->
    <link href="http://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet"
          media="screen">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"/>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.min.css"/>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css"/>

    <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>

</head>
<body>
{Controller:dbp\NavigationBar}

<div class="container">
    <h1>{RES:TaskRecord}</h1>
    <form name="task_record_form" id="task_record_form" method="post" class="form-horizontal">

        <div class="panel panel-primary">

            <div class="panel-heading">
                <h1 class="panel-title">{FormTitle}</h1>
            </div>

            <div class="panel-body">

                <!-- BEGIN ValidationErrors -->
                <div class="form-group col-sm-12">
                    <div class="col-sm-1"></div>
                    <div class="alert alert-danger alert-dismissible col-sm-10" role="alert">
                        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span>
                            <span class="sr-only">Close</span></button>{RES:errormsg}
                        <br/>
                        <span id="campione_record_inccampioneErrorBlock">{Error}</span>
                    </div>
                    <div class="col-sm-1"></div>
                </div>
                <!-- END ValidationErrors -->

                <div class="form-group col-sm-12">
                    <div class="col-sm-4 control-label">
                        <label class="text-danger">{RES:TaskID}</label>
                    </div>

                    <div class="col-sm-6 input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-th" aria-hidden="true"></i>
                        </div>
                        <input type="number" min="1" class="form-control" name="task_id" value="{task_id}"
                               required {readonly}>
                    </div>
                </div>

                <div class="form-group col-sm-12">
                    <div class="col-sm-4 control-label">
                        <label class="text-danger">{RES:TaskName}</label>
                    </div>

                    <div class="col-sm-6 input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-list-alt" aria-hidden="true"></i>
                        </div>
                        <input type="text" class="form-control" name="name" value="{name}" required>
                    </div>
                </div>

                <div class="form-group col-sm-12">
                    <div class="col-sm-4 control-label">
                        <label class="text-danger">{RES:TaskDescription}</label>
                    </div>

                    <div class="col-sm-6 input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-list-alt" aria-hidden="true"></i>
                        </div>
                        <input type="text" class="form-control" name="description" value="{description}">
                    </div>
                </div>

                <div class="form-group col-sm-12">
                    <div class="col-sm-4 control-label">
                        <label class="text-danger">{RES:StartTime}</label>
                    </div>

                    <div class="col-sm-6 input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar-o" aria-hidden="true"></i>
                        </div>
                        <input type="date" class="form-control" name="start_time" value="{start_time}" required>
                    </div>
                </div>

                <div class="form-group col-sm-12">
                    <div class="col-sm-4 control-label">
                        <label class="text-danger">{RES:EndTime}</label>
                    </div>

                    <div class="col-sm-6 input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar-o" aria-hidden="true"></i>
                        </div>
                        <input type="date" class="form-control" name="end_time" value="{end_time}" required>
                    </div>
                </div>

                <div class="form-group col-sm-12">
                    <div class="col-sm-4 control-label">
                        <label class="text-danger">{RES:SetupTime}</label>
                    </div>

                    <div class="col-sm-6 input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-clock-o" aria-hidden="true"></i>
                        </div>
                        <input type="number" step="0.1" min="0" class="form-control" name="setup" value="{setup}" required>
                    </div>
                </div>

                <div class="form-group col-sm-12">
                    <div class="col-sm-4 control-label">
                        <label class="text-danger">{RES:CycleTime}</label>
                    </div>

                    <div class="col-sm-6 input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-clock-o" aria-hidden="true"></i>
                        </div>
                        <input type="number" step="0.1" min="0" class="form-control" name="cycletime" value="{cycletime}" required>
                    </div>
                </div>

                <div class="form-group row col-sm-12">
                    <div class="col-sm-4 control-label">
                        <label class="text-danger">{RES:ProcessID}</label>
                    </div>
                    <div class="col-sm-6 input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-sitemap" aria-hidden="true"></i>
                        </div>
                        <select class="form-control" name="process_id" id="process_id" required {readonly}>
                            <option value="">{RES:process_select_value}</option>
                            <!-- BEGIN process_id_list -->
                            <option value="{process_id}">{process_id} - {name}</option>
                            <!-- END process_id_list -->
                        </select>
                    </div>
                </div>

                <div class="form-group row col-sm-12">
                    <div class="col-sm-4 control-label">
                        <label class="text-danger">{RES:Department}</label>
                    </div>
                    <div class="col-sm-6 input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-sitemap" aria-hidden="true"></i>
                        </div>
                        <select class="form-control" name="department_id" id="department_id" required>
                            <option value="">{RES:department_select_value}</option>
                            <!-- BEGIN department_id_list -->
                            <option value="{department_id}">{department_id} - {name}</option>
                            <!-- END department_id_list -->
                        </select>
                    </div>
                </div>

                <div class="form-group row col-sm-12">
                    <div class="col-sm-4 control-label">
                        <label class="text-danger">{RES:MachineID}</label>
                    </div>
                    <div class="col-sm-6 input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-sitemap" aria-hidden="true"></i>
                        </div>
                        <select class="form-control" name="machine_id" id="machine_id" required>
                            <option value="">{RES:machine_select_value}</option>
                            <!-- BEGIN machine_id_list -->
                            <option value="{machine_id}">{machine_id} - {name}</option>
                            <!-- END machine_id_list -->
                        </select>
                    </div>
                </div>

                <div class="form-group row col-sm-12">
                    <div class="col-sm-4 control-label">
                        <label class="text-danger">{RES:ToolID}</label>
                    </div>
                    <div class="col-sm-6 input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-sitemap" aria-hidden="true"></i>
                        </div>
                        <select class="form-control" name="tooling_id" id="tooling_id" required>
                            <option value="">{RES:tool_select_value}</option>
                            <!-- BEGIN tooling_id_list -->
                            <option value="{tooling_id}">{tooling_id} - {name}</option>
                            <!-- END tooling_id_list -->
                        </select>
                    </div>
                </div>

            </div>

            <div class="panel-footer">
                <div class="form-group text-center">
                    <label class="col-sm-1 control-label"></label>
                    <div class="col-sm-10">
                        {Record:TaskRecord}
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<script type="text/javascript">
    // Sets all form selects option value

    // Method 2 - Better (do not change values when reset button is pressed)
    // $("#source option[value={source}]").attr('selected','selected');

    $('input[name=source][value="{source}"]').prop('checked', true);

    var process_id = '{process_id}';
    if (process_id != '')
        $("#process_id option[value={process_id}]").attr('selected','selected');

    var department_id = '{department_id}';
    if (department_id != '')
        $("#department_id option[value={department_id}]").attr('selected','selected');

    var machine_id = '{machine_id}';
    if (machine_id != '')
        $("#machine_id option[value={machine_id}]").attr('selected','selected');

    var tooling_id = '{tooling_id}';
    if (tooling_id != '')
        $("#tooling_id option[value={tooling_id}]").attr('selected','selected');
</script>
</body>
</html>
