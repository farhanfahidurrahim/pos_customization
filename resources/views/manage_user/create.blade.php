@extends('layouts.app')

@section('title', __('user.add_user'))

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>@lang('user.add_user')</h1>
    </section>

    <!-- Main content -->
    <section class="content">
        {!! Form::open(['url' => route('users.store'), 'method' => 'post', 'id' => 'user_add_form', 'enctype' => 'multipart/form-data']) !!}
        <div class="row">
            <div class="col-md-12">
                @component('components.widget')
                    <div class="col-md-2">
                        <div class="form-group">
                            {!! Form::label('surname', __('business.prefix') . ':') !!}
                            {!! Form::text('surname', null, ['class' => 'form-control', 'placeholder' => __('business.prefix_placeholder')]) !!}
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            {!! Form::label('first_name', __('business.first_name') . ':*') !!}
                            {!! Form::text('first_name', null, [
                                'class' => 'form-control',
                                'required',
                                'placeholder' => __('business.first_name'),
                            ]) !!}
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            {!! Form::label('last_name', __('business.last_name') . ':') !!}
                            {!! Form::text('last_name', null, ['class' => 'form-control', 'placeholder' => __('business.last_name')]) !!}
                        </div>
                    </div>
                    <div class="clearfix"></div>

                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('address', __('Address') . ':*') !!}
                            {!! Form::text('address', null, ['class' => 'form-control', 'required', 'placeholder' => __('Address')]) !!}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('country', __('Country') . ':*') !!}
                            {!! Form::text('country', null, ['class' => 'form-control', 'required', 'placeholder' => __('Country')]) !!}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('city', __('City') . ':*') !!}
                            {!! Form::text('city', null, ['class' => 'form-control', 'required', 'placeholder' => __('City')]) !!}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('address', __('National ID') . ':*') !!}
                            {!! Form::text('national_id', null, ['class' => 'form-control', 'required', 'placeholder' => __('National ID')]) !!}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('address', __('Passport No') . ':') !!}
                            {!! Form::text('passport_no', null, ['class' => 'form-control', 'required', 'placeholder' => __('Passport No')]) !!}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('address', __('Father Name') . ':*') !!}
                            {!! Form::text('father_name', null, ['class' => 'form-control', 'required', 'placeholder' => __('Father Name')]) !!}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('address', __('Mother Name') . ':*') !!}
                            {!! Form::text('mother_name', null, ['class' => 'form-control', 'required', 'placeholder' => __('Mother Name')]) !!}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('address', __('Spouse Name') . ':') !!}
                            {!! Form::text('spouse_name', null, ['class' => 'form-control', 'required', 'placeholder' => __('Spouse Name')]) !!}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('address', __('Business License Number') . ':*') !!}
                            {!! Form::text('business_license_number', null, [
                                'class' => 'form-control',
                                'required',
                                'placeholder' => __('Business License Number'),
                            ]) !!}
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            {!! Form::label('gender', __('Gender') . ':*') !!}
                            {!! Form::select('gender', ['' => __('Please Select'), 'male' => 'Male', 'female' => 'Female'], null,
                                ['class' => 'form-control select2', 'required']) !!}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('address', __('Date Of Birth') . ':*') !!}
                            {!! Form::date('date_of_birth', null, ['class' => 'form-control', 'required', 'placeholder' => __('')]) !!}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('address', __('Joining Date') . ':*') !!}
                            {!! Form::date('joining_date', null, [
                                'class' => 'form-control',
                                'required',
                                'placeholder' => __('Joining Date'),
                            ]) !!}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('address', __('Blood Group') . ':*') !!}
                            {!! Form::text('blood_group', null, ['class' => 'form-control', 'required', 'placeholder' => __('Blood Group')]) !!}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('address', __('Mobile') . ':*') !!}
                            {!! Form::text('mobile', null, ['class' => 'form-control', 'required', 'placeholder' => __('Mobile')]) !!}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('address', __('Salary') . ':*') !!}
                            {!! Form::text('salary', null, ['class' => 'form-control', 'required', 'placeholder' => __('Salary')]) !!}
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            {!! Form::label('religion', __('Religion') . ':*') !!}
                            {!! Form::select('religion', ['' => __('Please Select'), 'islam' => 'Islam', 'hindu' => 'Hindu', 'christan' => 'Christan', 'buddho' => 'Buddho', 'others' => 'Others'], null,
                                ['class' => 'form-control select2', 'required']) !!}
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('address', __('Education/Qualification') . ':*') !!}
                            {!! Form::text('edu_qualification', null, [
                                'class' => 'form-control',
                                'required',
                                'placeholder' => __('Education/Qualification'),
                            ]) !!}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('address', __('Experience Details') . ':*') !!}
                            {!! Form::text('experience_details', null, [
                                'class' => 'form-control',
                                'required',
                                'placeholder' => __('Experience Details'),
                            ]) !!}
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('email', __('business.email') . ':*') !!}
                            {!! Form::text('email', null, ['class' => 'form-control', 'required', 'placeholder' => __('business.email')]) !!}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('role', __('user.role') . ':*') !!}
                            {!! Form::select('role', $roles, null, ['class' => 'form-control select2']) !!}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('username', __('business.username') . ':') !!}
                            @if (!empty($username_ext))
                                <div class="input-group">
                                    {!! Form::text('username', null, ['class' => 'form-control', 'placeholder' => __('business.username')]) !!}
                                    <span class="input-group-addon">{{ $username_ext }}</span>
                                </div>
                                <p class="help-block" id="show_username"></p>
                            @else
                                {!! Form::text('username', null, ['class' => 'form-control', 'placeholder' => __('business.username')]) !!}
                            @endif
                            <p class="help-block">@lang('lang_v1.username_help')</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                          {!! Form::label('image', __('User Image') . ':') !!}
                          {!! Form::file('image', ['id' => 'upload_image', 'accept' => 'image/*']); !!}
                          <small><p class="help-block">@lang('purchase.max_file_size', ['size' => (config('constants.document_size_limit') / 1000000)])  @lang('lang_v1.aspect_ratio_should_be_1_1')</p></small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('password', __('business.password') . ':*') !!}
                            {!! Form::password('password', [
                                'class' => 'form-control',
                                'required',
                                'placeholder' => __('business.password'),
                            ]) !!}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('confirm_password', __('business.confirm_password') . ':*') !!}
                            {!! Form::password('confirm_password', [
                                'class' => 'form-control',
                                'required',
                                'placeholder' => __('business.confirm_password'),
                            ]) !!}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            {!! Form::label('cmmsn_percent', __('lang_v1.cmmsn_percent') . ':') !!} @show_tooltip(__('lang_v1.commsn_percent_help'))
                            {!! Form::number('cmmsn_percent', null, [
                                'class' => 'form-control',
                                'placeholder' => __('lang_v1.cmmsn_percent'),
                                'step' => 0.01,
                            ]) !!}
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="checkbox">
                                <br />
                                <label>
                                    {!! Form::checkbox('selected_contacts', 1, false, ['class' => 'input-icheck', 'id' => 'selected_contacts']) !!} {{ __('lang_v1.allow_selected_contacts') }}
                                </label>
                                @show_tooltip(__('lang_v1.allow_selected_contacts_tooltip'))
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4 hide selected_contacts_div">
                        <div class="form-group">
                            {!! Form::label('selected_contacts', __('lang_v1.selected_contacts') . ':') !!}
                            <div class="form-group">
                                {!! Form::select('selected_contact_ids[]', $contacts, null, [
                                    'class' => 'form-control select2',
                                    'multiple',
                                    'style' => 'width: 100%;',
                                ]) !!}
                            </div>
                        </div>
                    </div>

                    <div class="clearfix"></div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="checkbox">
                                <label>
                                    {!! Form::checkbox('is_active', 'active', true, ['class' => 'input-icheck status']) !!} {{ __('lang_v1.status_for_user') }}
                                </label>
                                @show_tooltip(__('lang_v1.tooltip_enable_user_active'))
                            </div>
                        </div>
                    </div>
                @endcomponent
            </div>
        </div>
        @if (Module::has('Essentials'))
            @includeIf('essentials::profile_info.edit_profile_form_part')
        @endif
        <div class="row">
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary pull-right" id="submit_user_button">@lang('messages.save')</button>
            </div>
        </div>
        {!! Form::close() !!}
    @stop
    @section('javascript')
        <script type="text/javascript">
            $(document).ready(function() {
                $('#selected_contacts').on('ifChecked', function(event) {
                    $('div.selected_contacts_div').removeClass('hide');
                });
                $('#selected_contacts').on('ifUnchecked', function(event) {
                    $('div.selected_contacts_div').addClass('hide');
                });
            });

            $('form#user_add_form').validate({
                rules: {
                    first_name: {
                        required: true,
                    },
                    email: {
                        email: true,
                        remote: {
                            url: "/business/register/check-email",
                            type: "post",
                            data: {
                                email: function() {
                                    return $("#email").val();
                                }
                            }
                        }
                    },
                    password: {
                        required: true,
                        minlength: 5
                    },
                    confirm_password: {
                        equalTo: "#password"
                    },
                    username: {
                        minlength: 5,
                        remote: {
                            url: "/business/register/check-username",
                            type: "post",
                            data: {
                                username: function() {
                                    return $("#username").val();
                                },
                                @if (!empty($username_ext))
                                    username_ext: "{{ $username_ext }}"
                                @endif
                            }
                        }
                    }
                },
                messages: {
                    password: {
                        minlength: 'Password should be minimum 5 characters',
                    },
                    confirm_password: {
                        equalTo: 'Should be same as password'
                    },
                    username: {
                        remote: 'Invalid username or User already exist'
                    },
                    email: {
                        remote: '{{ __('validation.unique', ['attribute' => __('business.email')]) }}'
                    }
                }
            });
            $('#username').change(function() {
                if ($('#show_username').length > 0) {
                    if ($(this).val().trim() != '') {
                        $('#show_username').html("{{ __('lang_v1.your_username_will_be') }}: <b>" + $(this).val() +
                            "{{ $username_ext }}</b>");
                    } else {
                        $('#show_username').html('');
                    }
                }
            });

            var img_fileinput_setting = {
                showUpload: false,
                showPreview: true,
                browseLabel: LANG.file_browse_label,
                removeLabel: LANG.remove,
                previewSettings: {
                    image: { width: 'auto', height: 'auto', 'max-width': '100%', 'max-height': '100%' },
                },
            };
            $('#upload_image').fileinput(img_fileinput_setting);

        </script>
    @endsection
