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

<table id="large" class="display table-session tablesorter" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th class="bg-secondary uncek text-cl-white border-none" style="cursor:pointer;">#</th>
            <th class="bg-secondary uncek text-cl-white border-none" style="cursor:pointer;">Group Name</th>
            <th class="bg-secondary uncek text-cl-white border-none" style="cursor:pointer;">Session Date</th>
            <th class="bg-secondary uncek text-cl-white border-none" style="cursor:pointer;">Session Time</th>
            <th class="bg-secondary uncek text-cl-white border-none" style="cursor:pointer;">Name</th>
            <th class="bg-secondary uncek text-cl-white border-none" style="cursor:pointer;">Email</th>             
            <th class="bg-secondary uncek text-cl-white border-none" style="cursor:pointer;">Coach Name</th>             
            <th class="bg-secondary uncek text-cl-white border-none" style="cursor:pointer;">Student Attendance</th>             
            <th class="bg-secondary uncek text-cl-white border-none" style="cursor:pointer;">Coach Attendance</th>             
            <th class="bg-secondary uncek text-cl-white border-none" style="cursor:pointer;">Length of Session</th>             
            <th class="bg-secondary uncek text-cl-white border-none" style="cursor:pointer;">Coach Rating</th>             
        </tr>
    </thead>
    <tbody>
    <?php
    $a = 1;
    $no = 1;
    foreach ($ses_rpt as $d) {
        $cch_name = $this->db->select('fullname')
                            ->from('user_profiles')
                            ->where('user_id',$d->coach_id)
                            ->get()->result();


        $getrating = $this->db->select('rate')
                            ->from('coach_ratings')
                            ->where_in('appointment_id',$d->id)
                            ->where('status', 'rated')
                            ->get()->result();
        
        if(@$getrating != NULL){
            $ratingsess = $getrating[0]->rate;
        }else{
            $ratingsess = "Not Rated";
        }

        $std_attend = @$d->std_attend;
        $cch_attend = @$d->cch_attend;
        $convend   = strtotime(@$d->end_time) - (5 * 60);
        $end_time  = date("H:i:s", $convend);

        if(!$std_attend || !$cch_attend){
            $length = '0';
        }else{
            if($cch_attend > $std_attend){
                $actstart  = $cch_attend;
                $compare   = @$convend - strtotime(@$actstart);
                // $length    = $convend;
                $length    = date("i:s", $compare);
            }else if($std_attend > $cch_attend){
                $actstart  = $std_attend;
                $compare   = @$convend - strtotime(@$actstart);
                $length    = date("i:s", $compare);
            }
        }
        // echo "<pre>";
        // print_r($getrating);
        // exit();
        $start_conv = strtotime(@$d->start_time) + ($spr_tz * 60);
        $start_conv_real = date("H:i", $start_conv);

        $end_conv = strtotime(@$d->end_time) + ($spr_tz * 60);
        $end_conv_real = date("H:i:s", $end_conv);
        $endmin   = strtotime(@$end_conv_real) - (5 * 60);
        $endmin_real  = date("H:i", $endmin);
        ?>
        <tr>
            <td class="textcent"></td>
            <td><?php echo $d->name; ?></td>
            <td><?php 
                $minutes_to_add = $spr_tz;

                $time = new DateTime($d->date." ".$d->start_time);
                $time->add(new DateInterval('PT' . $minutes_to_add . 'M'));

                $stamp = $time->format('Y-m-d');

                echo $stamp;
                // echo $d->date; 
            ?></td>
            <td class="textcent"><?php 
                // echo $d->start_time." - ".$end_time."<br>"; 
                echo $start_conv_real." - ".$endmin_real; 
            ?></td>
            <td><?php echo $d->fullname; ?></td>
            <td><?php echo $d->email; ?></td>
            <td><?php echo $cch_name[0]->fullname; ?></td>
            <td class="textcent"><?php 
                if(!@$std_attend){
                    echo "No Show";
                }else{
                    $std_conv = strtotime(@$std_attend) + ($spr_tz * 60);
                    $std_conv_real = date("H:i:s", $std_conv);
                    echo $std_conv_real;
                }
            ?></td>
            <td class="textcent"><?php
                if(!@$cch_attend){
                    echo "No Show";
                }else{
                    $cch_conv = strtotime(@$cch_attend) + ($spr_tz * 60);
                    $cch_conv_real = date("H:i:s", $cch_conv);
                    echo $cch_conv_real;
                }
            ?></td>
            <td class="textcent"><?php echo @$length; ?></td>
            <td class="textcent"><?php echo $ratingsess; ?></td>
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
                    title: 'Session Report'
                },
                {
                    extend: 'pdfHtml5',
                    orientation: 'landscape',
                    title: 'Session Report'
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