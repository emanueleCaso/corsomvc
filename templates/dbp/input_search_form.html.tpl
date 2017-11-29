<div id="search-panel" class="panel panel-primary collapse in" aria-expanded="true">
    <div class="panel-heading">
        <h3 class="panel-title">{RES:InputSearchFormTitle}</h3>

    </div>

    <form class="form-horizontal" method="post" name="{search_form}">
        <div class="panel-body">

            <div class="form-group row">
                <label class="col-sm-2 control-label text-right"><label>{RES:InputID}</label></label>
                <div class="col-sm-10">
                    <input type="text" value="{input_id}" name="input_id" id="input_id" placeholder="{RES:InputCodePlaceholder}" class="form-control">
                </div>
            </div>
        </div>
        <div class="panel-footer">
            <div class="form-group row">
                <label class="col-sm-2 control-label">&nbsp;</label>
                <div class="col-sm-10">
                    <input class = "btn btn-primary"  type="submit" name="{search_submit}" value="{RES:SearchSubmitCaption}"> &nbsp;
                    <input class = "btn btn-success"  type="submit" name="{search_reset}"  value="{RES:SearchResetCaption}">
                </div>
            </div>
        </div>


    </form>
</div>
<script type="text/javascript">
    var element = document.getElementById('input_id');
    element.value = '{input_id}';
</script>