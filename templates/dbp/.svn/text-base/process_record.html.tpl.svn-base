<!DOCTYPE html>
<html>
<head>
    <title>Add a new process</title>
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
    <h1>{RES:ProcessRecord}</h1>
    <form name="process_record_form" id="process_record_form" method="post" class="form-horizontal">

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
                        <label class="text-danger">{RES:ProcessID}</label>
                    </div>

                    <div class="col-sm-6 input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-th" aria-hidden="true"></i>
                        </div>
                        <input type="number" min="1" class="form-control" name="process_id" value="{process_id}"
                               required {readonly}>
                    </div>
                </div>

                <div class="form-group col-sm-12">
                    <div class="col-sm-4 control-label">
                        <label class="text-danger">{RES:ProcessName}</label>
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
                        <label class="text-danger">{RES:StartTime}</label>
                    </div>

                    <div class="col-sm-6 input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar-o" aria-hidden="true"></i>
                        </div>
                        <input type="date" class="form-control" name="start_time" value="{start_time}">
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
                        <input type="date" class="form-control" name="end_time" value="{end_time}">
                    </div>
                </div>
            </div>

            <div class="panel-footer">
                <div class="form-group text-center">
                    <label class="col-sm-1 control-label"></label>
                    <div class="col-sm-10">
                        {Record:ProcessRecord}
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

</body>
</html>
