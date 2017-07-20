<style>
    .dataTables_wrapper{
        width: 100% !important;
    }
    .bg-secondary > input{
        font-size: 14px;
        color: #585858;
        font-weight: 400;
    }
</style>
<div class="heading text-cl-primary border-b-1 padding15">

    <h2 class="margin0">Reporting</h2>

</div>

<div class="box clearfix">
    <div class="heading pure-g padding-t-30">
        <div class="left-list-tabs pure-menu pure-menu-horizontal text-center margin0">
            <ul class="pure-menu-list">
                <li class="pure-menu-item pure-menu-selected text-center width250 no-hover"><a href="<?php echo site_url('partner/reporting'); ?>" class="pure-menu-link padding-t-b-5 font-16 padding-lr-0 font-light text-cl-lightGrey active-tabs-blue">Coach Summary</a></li>
                <li class="pure-menu-item pure-menu-selected text-center width250 no-hover"><a href="<?php echo site_url('partner/reporting/coach_token'); ?>" class="pure-menu-link padding-t-b-5 font-16 padding-lr-0 font-light text-cl-lightGrey">Coach Token</a></li>
                <!-- <li class="pure-menu-item pure-menu-selected text-center width250 no-hover"><a href="#" class="pure-menu-link padding-t-b-5 font-16 padding-lr-0 font-light text-cl-lightGrey">Session Histories</a></li> -->
                <!-- <li class="pure-menu-item pure-menu-selected text-center width250 no-hover"><a href="#" class="pure-menu-link padding-t-b-5 font-16 padding-lr-0 font-light text-cl-lightGrey">Class Session Histories</a></li> -->
            </ul>
        </div>
    </div>
    <div class="content pure-g">
        <div class="margin0 padding15 pure-u-1">
            <font style="color: black">Coach Group:</font><br>
            <span class="r-only rersre"></span>
            <select name="defaultlist" id="td_value_1_2" class="e-only multiple-select" multiple="multiple" style="width:100%" required required data-parsley-required-message="Please select at least 1 coach group">
                <?php foreach($list_sg as $ls){ ?>
                    <option value="<?php echo $ls->id; ?>"><?php echo $ls->name; ?></option>
                <?php }?>
            </select>
            <input name="subgrouplist" type="hidden" id="subgrouplist" value="">

           <div class="pure-g">
                <div class="pure-u-1 m-t-20" style="text-align: left !important;">
                    <div class="frm-date" style="display:inline-block">
                        <input name="date_from" class="datepicker frm-date margin0" type="text" readonly="" placeholder="Start Date">  
                        <span class="icon dyned-icon-coach-schedules"></span>
                    </div>
                    <span style="font-size: 16px;margin:0px 10px;">to</span>  
                    <div class="frm-date" style="display:inline-block">
                        <input name="date_to" class="datepicker2 frm-date margin0" type="text" readonly="" placeholder="End Date">  
                        <span class="icon dyned-icon-coach-schedules"></span>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="pure-u-1 text-center">
            <a class="pure-button btn-small btn-green" style="margin:0px 10px;" href="<?php echo site_url('partner/reporting/download/'.@$startdate.'/'.@$enddate);?>">Download</a>
        </div> -->
         <?php echo form_close(); ?>
         <script>
            $(document).ready(function() {
                var table = $('#large').DataTable( {
                  "bLengthChange": false,
                  "searching": true,
                  "userTable": false,
                  "bInfo" : false,
                  "bPaginate": true,
                  "pageLength": 10
                });
            } );
        </script>
        <table id="large" class="display table-session tablesorter m-t-20" cellspacing="0" style="width: 100% !important;">
                <thead>
                    <tr>
                        <th class="bg-secondary uncek text-cl-white border-none">Group</th>
                        <th class="bg-secondary uncek text-cl-white border-none">Coach</th>
                        <th class="bg-secondary uncek text-cl-white border-none">Email</th>
                    </tr>
                </thead>
                <tbody>
                	<?php
                foreach(@$coach as $c) { 
                    ?>
                    <tr>
                        <td> <?php echo $c->name; ?></td>
            			<td> <?php echo $c->fullname; ?></td>
            			<td> <?php echo $c->email; ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
    </div>  
</div>
<script src="../js/main.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.tablescroll.js"></script>

<script>
    function date_from(val) {
        $("#date_from").val = val;
    }

    function date_to(val) {
        $("#date_to").val = val;
    }

    function getDate(dates){
        var now = new Date(dates);
        var day = ("0" + (now.getDate() + 1)).slice(-2);
        var month = ("0" + (now.getMonth() + 1)).slice(-2);
        var resultDate = now.getFullYear() + "-" + (month) + "-" + (day);
        return resultDate;
    }

    function removeDatepicker(){
        $('.datepicker2').datepicker('remove');
    }

    // datepicker
    $('.datepicker').datepicker({
        format: 'yyyy-mm-dd',
        endDate: "now",
        autoclose:true
    });

    $('.datepicker').change(function(){
        var dates = $(this).val();
        removeDatepicker();
        $('.datepicker2').datepicker({
            format: 'yyyy-mm-dd',
            startDate: getDate(dates),
            endDate: "now",
            autoclose: true
        });
    });

    $('.multiple-select').select2({
         placeholder: "Coach Group Lists"
    });
    $(".multiple-select").on('change',function(){
        document.getElementById('subgrouplist').value = $(".multiple-select").val();
    });
</script>