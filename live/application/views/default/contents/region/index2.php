<div class="heading text-cl-primary padding15">
    <h1 class="margin0">Add Regional Admin</h1>
</div>

<div class="box">
    <div class="heading pure-g"></div>

    <div class="content">
        <div class="box">
            <?php echo form_open('','role="form" class="pure-form pure-form-aligned" data-parsley-validate');?>
                <fieldset>
                    <div class="pure-control-group">
                        <div class="label">
                            <label for="name">Fullname</label>
                        </div>
                        <div class="input">
                            <?php echo form_input('fullname','', 'id="fullname" class="pure-input-1-2" required data-parsley-required-message="Please input fullname"') ?>
                        </div>
                    </div>

                    <div class="pure-control-group">
                        <div class="label">
                            <label for="email">Email</label>
                        </div>
                        <div class="input">
                            <input type="email" name="email" data-parsley-trigger="change" value="<?php echo @$data->email;?>" id="email" class="pure-input-1-2" required data-parsley-required-message="Please input partner’s e-mail" data-parsley-type-message="Please input valid e-mail address">
                        </div>
                    </div>

                    <div class="pure-control-group">
                        <div class="label">
                            <label for="role">Select Region</label>
                        </div>	
                        <div class="input">
                            <?php echo form_dropdown('region', Array('1'=>'Asia', '2'=>'Europe'), '', 'id = "region" class="pure-input-1-2" required'); ?>
                        </div>
                    </div>

                    <div class="pure-control-group">
                        <div class="label">
                            <label for="role">Country</label>
                        </div>	
                        <div class="input">
                            <?php echo form_dropdown('country', Array('1'=>'Indonesia', '2'=>'Italy'), '', 'id = "country" class="pure-input-1-2" required'); ?>
                        </div>
                    </div>

                    <div class="pure-control-group">
                        <div class="label">
                            <label for="name">City</label>
                        </div>
                        <div class="input">
                            <?php echo form_input('city','', 'id="city" class="pure-input-1-2" required data-parsley-required-message="Please input City"') ?>
                        </div>
                    </div>

                    <div class="pure-control-group">
                        <div class="label">
                            <label for="skype_id">Skype ID</label>
                        </div>
                        <div class="input">
                            <?php echo form_input('skype_id','', 'id="skype_id" class="pure-input-1-2" required data-parsley-required-message="Please input partner’s skype id"') ?>
                        </div>
                    </div>

             
                    <div class="pure-control-group">
                        <div class="label">
                            <label for="phone">Phone Number</label>
                        </div>
                        <div class="input">
                            <?php echo form_input('phone','', 'id="phone" class="pure-input-1-2" data-parsley-type="digits" required data-parsley-required-message="Please input partner’s phone" data-parsley-type-message="Please input numbers only"') ?>
                        </div>
                    </div>
                    
                    <div class="pure-control-group" style="border-top:1px solid #f3f3f3;padding: 15px 0px;">
                        <div class="label">
                            <?php echo form_submit('__submit', 'SUBMIT', 'class="pure-button btn-small btn-primary"'); ?>
                            <a href="" class="pure-button btn-small btn-white">CANCEL</a>
                        </div>
                    </div>
                </fieldset>
            <?php echo form_close();?>        
        </div>
    </div>
</div>			

<script type="text/javascript">
    $(function () {
         $('.datepicker').datepicker({
            // setDate: '1990-01-01',
            format: 'yyyy-mm-dd',
            autoclose: true,
        });
        $(".datepicker").datepicker("setDate", '1990-01-01');
    });
</script>