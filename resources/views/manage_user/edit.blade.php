@extends('layouts.app')

@section('title', __( 'user.edit_user' ))

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>@lang( 'user.edit_user' )</h1>
</section>

<!-- Main content -->
<section class="content">
    {!! Form::open(['url' => route('users.edit', [$user->id]), 'method' => 'PUT', 'id' => 'user_edit_form' ]) !!}
    <div class="row">
        <div class="col-md-12">
        @component('components.widget', ['class' => 'box-primary'])
            <div class="col-md-2">
                <div class="form-group">
                  {!! Form::label('surname', __( 'business.prefix' ) . ':') !!}
                    {!! Form::text('surname', $user->surname, ['class' => 'form-control', 'placeholder' => __( 'business.prefix_placeholder' ) ]); !!}
                </div>
            </div>
            <div class="col-md-5">
                <div class="form-group">
                  {!! Form::label('first_name', __( 'business.first_name' ) . ':*') !!}
                    {!! Form::text('first_name', $user->first_name, ['class' => 'form-control', 'required', 'placeholder' => __( 'business.first_name' ) ]); !!}
                </div>
            </div>
            <div class="col-md-5">
                <div class="form-group">
                  {!! Form::label('last_name', __( 'business.last_name' ) . ':') !!}
                    {!! Form::text('last_name', $user->last_name, ['class' => 'form-control', 'placeholder' => __( 'business.last_name' ) ]); !!}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                  {!! Form::label('address', __( 'Address' ) . ':') !!}
                    {!! Form::text('address', $user->address, ['class' => 'form-control', 'placeholder' => __( 'Address' ) ]); !!}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('country', __('Country') . ':*') !!}
                    {!! Form::text('country', $user->country, ['class' => 'form-control', 'required', 'placeholder' => __('Country')]) !!}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('city', __('City') . ':*') !!}
                    {!! Form::text('city', $user->city, ['class' => 'form-control', 'required', 'placeholder' => __('City')]) !!}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('national_id', __('National ID') . ':*') !!}
                    {!! Form::text('national_id', $user->national_id, ['class' => 'form-control', 'required', 'placeholder' => __('National ID')]) !!}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('passport_no', __('Passport No') . ':') !!}
                    {!! Form::text('passport_no', $user->passport_no, ['class' => 'form-control', 'required', 'placeholder' => __('Passport No')]) !!}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('father_name', __('Father Name') . ':*') !!}
                    {!! Form::text('father_name', $user->father_name, ['class' => 'form-control', 'required', 'placeholder' => __('Father Name')]) !!}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('mother_name', __('Mother Name') . ':*') !!}
                    {!! Form::text('mother_name', $user->mother_name, ['class' => 'form-control', 'required', 'placeholder' => __('Mother Name')]) !!}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('spouse_name', __('Spouse Name') . ':') !!}
                    {!! Form::text('spouse_name', $user->spouse_name, ['class' => 'form-control', 'required', 'placeholder' => __('Spouse Name')]) !!}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('business_license_number', __('Business License Number') . ':*') !!}
                    {!! Form::text('business_license_number', $user->business_license_number, [
                        'class' => 'form-control',
                        'required',
                        'placeholder' => __('Business License Number'),
                    ]) !!}
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    {!! Form::label('gender', __('Gender') . ':*') !!}
                    {!! Form::select('gender', ['' => __('Please Select'), 'male' => 'Male', 'female' => 'Female'], $user->gender,
                        ['class' => 'form-control select2', 'required']) !!}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('date_of_birth', __('Date Of Birth') . ':*') !!}
                    {!! Form::date('date_of_birth', $user->date_of_birth, ['class' => 'form-control', 'required', 'placeholder' => __('')]) !!}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('joining_date', __('Joining Date') . ':*') !!}
                    {!! Form::date('joining_date', $user->joining_date, [
                        'class' => 'form-control',
                        'required',
                        'placeholder' => __('Joining Date'),
                    ]) !!}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('blood_group', __('Blood Group') . ':*') !!}
                    {!! Form::text('blood_group', $user->blood_group, ['class' => 'form-control', 'required', 'placeholder' => __('Blood Group')]) !!}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('mobile', __('Mobile') . ':*') !!}
                    {!! Form::text('mobile', $user->mobile, ['class' => 'form-control', 'required', 'placeholder' => __('Mobile')]) !!}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('salary', __('Salary') . ':*') !!}
                    {!! Form::text('salary', $user->salary, ['class' => 'form-control', 'required', 'placeholder' => __('Salary')]) !!}
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    {!! Form::label('religion', __('Religion') . ':*') !!}
                    {!! Form::select('religion', ['' => __('Please Select'), 'islam' => 'Islam', 'hindu' => 'Hindu', 'christan' => 'Christan', 'buddho' => 'Buddho', 'others' => 'Others'], $user->religion,
                        ['class' => 'form-control select2', 'required']) !!}
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('edu_qualification', __('Education/Qualification') . ':*') !!}
                    {!! Form::text('edu_qualification', $user->edu_qualification, [
                        'class' => 'form-control',
                        'required',
                        'placeholder' => __('Education/Qualification'),
                    ]) !!}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('experience_details', __('Experience Details') . ':*') !!}
                    {!! Form::text('experience_details', $user->experience_details, [
                        'class' => 'form-control',
                        'required',
                        'placeholder' => __('Experience Details'),
                    ]) !!}
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="col-md-6">
                <div class="form-group">
                  {!! Form::label('email', __( 'business.email' ) . ':*') !!}
                    {!! Form::text('email', $user->email, ['class' => 'form-control', 'required', 'placeholder' => __( 'business.email' ) ]); !!}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                  {!! Form::label('role', __( 'user.role' ) . ':*') !!}
                    {!! Form::select('role', $roles, $user->roles->first()->id, ['class' => 'form-control select2']); !!}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                  {!! Form::label('password', __( 'business.password' ) . ':') !!}
                    {!! Form::password('password', ['class' => 'form-control', 'placeholder' => __( 'business.password' ) ]); !!}
                    <p class="help-block">@lang('user.leave_password_blank')</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                  {!! Form::label('confirm_password', __( 'business.confirm_password' ) . ':') !!}
                    {!! Form::password('confirm_password', ['class' => 'form-control', 'placeholder' => __( 'business.confirm_password' ) ]); !!}

                </div>
            </div>
            <div class="clearfix"></div>

            <div class="col-md-4">
                <div class="form-group">
                  {!! Form::label('cmmsn_percent', __( 'lang_v1.cmmsn_percent' ) . ':') !!} @show_tooltip(__('lang_v1.commsn_percent_help'))
                    {!! Form::number('cmmsn_percent', $user->cmmsn_percent, ['class' => 'form-control', 'placeholder' => __( 'lang_v1.cmmsn_percent' ), 'step' => 0.01]); !!}
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <div class="checkbox">
                    <br/>
                      <label>
                        {!! Form::checkbox('selected_contacts', 1,
                        $user->selected_contacts,
                        [ 'class' => 'input-icheck', 'id' => 'selected_contacts']); !!} {{ __( 'lang_v1.allow_selected_contacts' ) }}
                      </label>
                      @show_tooltip(__('lang_v1.allow_selected_contacts_tooltip'))
                    </div>
                </div>
            </div>

            <div class="col-sm-4 selected_contacts_div @if(!$user->selected_contacts) hide @endif">
                <div class="form-group">
                  {!! Form::label('selected_contacts', __('lang_v1.selected_contacts') . ':') !!}
                    <div class="form-group">
                      {!! Form::select('selected_contact_ids[]', $contacts, $contact_access, ['class' => 'form-control select2', 'multiple', 'style' => 'width: 100%;' ]); !!}
                    </div>
                </div>
            </div>

            <div class="clearfix"></div>
            <div class="col-md-4">
                <div class="form-group">
                  <div class="checkbox">
                    <label>
                         {!! Form::checkbox('is_active', $user->status, $is_checked_checkbox, ['class' => 'input-icheck status']); !!} {{ __('lang_v1.status_for_user') }}
                    </label>
                    @show_tooltip(__('lang_v1.tooltip_enable_user_active'))
                  </div>
                </div>
            </div>

        @endcomponent
        </div>
    </div>

    @if(Module::has('Essentials'))
        @includeIf('essentials::profile_info.edit_profile_form_part', ['bank_details' => !empty($user->essentials_bank_details) ? json_decode($user->essentials_bank_details, true) : null])
    @endif
    <div class="row">
        <div class="col-md-12">
            <button type="submit" class="btn btn-primary pull-right" id="submit_user_button">@lang( 'messages.update' )</button>
        </div>
    </div>
    {!! Form::close() !!}
  @stop
@section('javascript')
<script type="text/javascript">
  $(document).ready(function(){
    $('#selected_contacts').on('ifChecked', function(event){
      $('div.selected_contacts_div').removeClass('hide');
    });
    $('#selected_contacts').on('ifUnchecked', function(event){
      $('div.selected_contacts_div').addClass('hide');
    });
  });

  $('form#user_edit_form').validate({
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
                                    return $( "#email" ).val();
                                },
                                user_id: {{$user->id}}
                            }
                        }
                    },
                    password: {
                        minlength: 5
                    },
                    confirm_password: {
                        equalTo: "#password",
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
                        remote: '{{ __("validation.unique", ["attribute" => __("business.email")]) }}'
                    }
                }
            });
</script>
@endsection
