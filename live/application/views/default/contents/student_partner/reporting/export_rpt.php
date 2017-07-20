<html>
<head>
 <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jq-2.2.4/jszip-3.1.3/pdfmake-0.1.27/dt-1.10.15/b-1.3.1/b-colvis-1.3.1/b-flash-1.3.1/b-html5-1.3.1/b-print-1.3.1/datatables.min.css"/>
 
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/jq-2.2.4/jszip-3.1.3/pdfmake-0.1.27/dt-1.10.15/b-1.3.1/b-colvis-1.3.1/b-flash-1.3.1/b-html5-1.3.1/b-print-1.3.1/datatables.min.js"></script>

<style>
    .textcent{
        text-align: center;
    }
    button.dt-button, div.dt-button, a.dt-button {
        background-image: none !important;
        background: white !important;
        border: 1px solid #000;
        letter-spacing: 1px;
        text-transform: uppercase;
        font-size: 14px;
    }
</style>

</head>
<body>

<h1>Export to:</h1>

<table id="large" class="display tablesorter" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>#</th>
            <th>Group Name</th>
            <th>Name</th>
            <th>Email</th>
            <th>Token Balance</th>
            <th>Token Usage</th>               
            <th>Completed Sessions</th>               
            <th>Last Session</th>               
            <th>Next Session</th>               
            <th>Coach Rating Average</th>               
        </tr>
    </thead>
    <tbody>
    <?php
    $a = 1;
    $no = 1;
    foreach ($stu_rpt as $d) {
        $token_usage = $this->db->select('token_amount')
                            ->from('token_histories')
                            ->where('user_id',$d->user_id)
                            ->where('token_status_id',1)
                            ->get()->result();

        $sum = 0;
        foreach($token_usage as $key=>$value){
          if(isset($value->token_amount))
             $sum += $value->token_amount;
        }

        $nowdate  = date("Y-m-d");
        $total_ses = $this->db->select('id')
                        ->from('appointments')
                        ->where('student_id',$d->user_id)
                        ->get();

        $last_ses = $this->db->select('date')
                            ->from('appointments')
                            ->where('student_id',$d->user_id)
                            // ->where('status','comleted')
                            ->where('date <', $nowdate)
                            ->order_by('date','DESC')
                            ->get()->result();

        $next_ses = $this->db->select('date')
                            ->from('appointments')
                            ->where('student_id',$d->user_id)
                            // ->where('status','active')
                            ->where('date >', $nowdate)
                            ->order_by('date','ASC')
                            ->get()->result();

        $appid = $this->db->select('id')
                            ->from('appointments')
                            ->where('student_id',$d->user_id)
                            ->where('date <', $nowdate)
                            ->get()->result();

        $app_id="";
        foreach($appid as $ap){
            $app_id.= $ap->id.",";
        }
        $appidlist=rtrim($app_id,", ");    
        $idforquery=explode(",", $appidlist);

        $getrating = $this->db->select('rate')
                            ->from('coach_ratings')
                            ->where_in('appointment_id',$idforquery)
                            ->where('status', 'rated')
                            ->get()->result();

        $rate_raw = 0;
        foreach($getrating as $gr){
          if(isset($gr->rate))
             $rate_raw += $gr->rate;
        }
        if(count($getrating) != 0){
            $rateaverage = $rate_raw/count($getrating);
        }else{
            $rateaverage = 0;
        }
        // echo $rateaverage;
        // echo "<pre>";
        // print_r($getrating);
        // exit();
        ?>
        <tr>
            <td></td>
            <td><?php echo $d->name; ?></td>
            <td><?php echo $d->fullname; ?></td>
            <td><?php echo $d->email; ?></td>
            <td class="textcent"><?php echo $d->token_amount; ?></td>
            <td class="textcent"><?php echo $sum; ?></td>
            <td class="textcent"><?php echo $total_ses->num_rows(); ?></td>
            <td><?php 
                if(!@$last_ses){
                    echo "-";
                }
                echo @$last_ses[0]->date; 
            ?></td>
            <td><?php 
                if(!@$next_ses){
                    echo "-";
                }else{
                    echo @$next_ses[0]->date;
                }
            ?></td>
            <td><?php 
                if(@$rateaverage == 0){
                    echo "";
                }else{
                    echo $rateaverage;
                }
            ?></td>
        </tr>
        <?php $no++; $a++; } ?>
    </tbody>
</table>
<script type="text/javascript">
    $(document).ready(function() {
        var t = $('#large').DataTable( {
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'excelHtml5',
                    title: 'Student Report'
                },
                {
                    extend: 'pdfHtml5',
                    orientation: 'landscape',
                    title: 'Student Report'
                },
                {
                    extend: 'print',
                    text: 'Print'
                }

            ],
            "columnDefs": [ {
                "searchable": false,
                "orderable": false,
                "targets": 0
            } ],
            "order": [[ 1, 'asc' ]],
            "bLengthChange": false,
            "searching": true,
            "bInfo" : true,
            "bPaginate": true,
            "pageLength": 10
        } );

        t.on( 'order.dt search.dt', function () {
           t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
              cell.innerHTML = i + 1;
              t.cell(cell).invalidate('dom'); 
           } );
        } ).draw();

    } );
</script>

</body>