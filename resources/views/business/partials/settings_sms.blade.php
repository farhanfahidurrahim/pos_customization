<div class="pos-tab-content">
    <div class="row">
        <div class="col-xs-3">
            <div class="form-group">
            	{!! Form::label('sms_settings[url]', 'URL:') !!}
            	{!! Form::text('sms_settings[url]', $sms_settings['url'], ['class' => 'form-control','placeholder' => 'URL']); !!}
            </div>
        </div>
        <div class="col-xs-3">
            <div class="form-group">
                {!! Form::label('sms_settings[send_to_param_name]', __('lang_v1.send_to_param_name') . ':') !!}
                {!! Form::text('sms_settings[send_to_param_name]', $sms_settings['send_to_param_name'], ['class' => 'form-control','placeholder' => __('lang_v1.send_to_param_name')]); !!}
            </div>
        </div>
        <div class="col-xs-3">
            <div class="form-group">
                {!! Form::label('sms_settings[msg_param_name]', __('lang_v1.msg_param_name') . ':') !!}
                {!! Form::text('sms_settings[msg_param_name]', $sms_settings['msg_param_name'], ['class' => 'form-control','placeholder' => __('lang_v1.msg_param_name')]); !!}
            </div>
        </div>
        <div class="col-xs-3">
            <div class="form-group">
                {!! Form::label('sms_settings[request_method]', __('lang_v1.request_method') . ':') !!}
                {!! Form::select('sms_settings[request_method]', ['get' => 'GET', 'post' => 'POST'], $sms_settings['request_method'], ['class' => 'form-control']); !!}
            </div>
        </div>
        <div class="clearfix"></div>
        <hr>
        <div class="col-xs-4">
            <div class="form-group">
                {!! Form::label('sms_settings_param_key1', __('lang_v1.sms_settings_param_key', ['number' => 1]) . ':') !!}
                {!! Form::text('sms_settings[param_1]', $sms_settings['param_1'], ['class' => 'form-control','placeholder' => __('lang_v1.sms_settings_param_val', ['number' => 1]), 'id' => 'sms_settings_param_key1']); !!}
            </div>
        </div>
        <div class="col-xs-4">
            <div class="form-group">
                {!! Form::label('sms_settings_param_val1', __('lang_v1.sms_settings_param_val', ['number' => 1]) . ':') !!}
                {!! Form::text('sms_settings[param_val_1]', $sms_settings['param_val_1'], ['class' => 'form-control', 'placeholder' => __('lang_v1.sms_settings_param_val', ['number' => 1]), 'id' => 'sms_settings_param_val1' ]); !!}
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="col-xs-4">
            <div class="form-group">
                {!! Form::label('sms_settings_param_key2', __('lang_v1.sms_settings_param_key', ['number' => 2]) . ':') !!}
                {!! Form::text('sms_settings[param_2]', $sms_settings['param_2'], ['class' => 'form-control','placeholder' => __('lang_v1.sms_settings_param_val', ['number' => 2]), 'id' => 'sms_settings_param_key2']); !!}
            </div>
        </div>
        <div class="col-xs-4">
            <div class="form-group">
                {!! Form::label('sms_settings_param_val2', __('lang_v1.sms_settings_param_val', ['number' => 2]) . ':') !!}
                {!! Form::text('sms_settings[param_val_2]', $sms_settings['param_val_2'], ['class' => 'form-control', 'placeholder' => __('lang_v1.sms_settings_param_val', ['number' => 2]), 'id' => 'sms_settings_param_val2' ]); !!}
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
