@extends('layouts.app')

@section('title', 'Users')
@php
    use Carbon\Carbon;
@endphp
@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>@lang('user.users')
            <small>@lang('user.manage_users')</small>
        </h1>
        <!-- <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
                    <li class="active">Here</li>
                </ol> -->
    </section>

    <!-- Main content -->
    <section class="content">
        @component('components.widget', ['class' => 'box-primary', 'title' => __('user.all_users')])
            @can('user.create')
                @slot('tool')
                    <div class="box-tools">
                        <a class="btn btn-block btn-primary" href="{{ route('users.create') }}">
                            <i class="fa fa-plus"></i> @lang('messages.add')</a>
                    </div>
                @endslot
            @endcan
            {{--  @can('user.view') --}}
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="users_table">
                    <thead>
                        <tr>
                            <th>SN</th>
                            <th>@lang('business.username')</th>
                            <th>@lang('user.name')</th>
                            <th>@lang('user.role')</th>
                            <th>@lang('business.email')</th>
                            <th>Created Date</th>
                            <th>Create By User</th>
                            <th>Mobile</th>
                            <th>Status</th>
                            <th>@lang('messages.action')</th>
                        </tr>
                    </thead>
                </table>
            </div>
            {{--  @endcan --}}
        @endcomponent

        <div class="modal fade user_modal" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
        </div>

    </section>
    <!-- /.content -->
@stop
@section('javascript')
    <script type="text/javascript">
        //Roles table
        $(document).ready(function() {
            var users_table = $('#users_table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '/users',
                columnDefs: [{
                    "targets": [4],
                    "orderable": false,
                    "searchable": false
                }],
                "columns": [
                    { "data": "serial_number"},
                    {
                        "data": "username"
                    },
                    {
                        "data": "full_name"
                    },
                    {
                        "data": "role"
                    },
                    {
                        "data": "email"
                    },
                    {
                        "data": "created_at",
                            "render": function (data) {
                                return moment(data).format('MMMM D, YYYY h:mm A');
                            }
                    },
                    {
                        "data": "create_by_user"
                    },
                    {
                        "data": "mobile"
                    },
                    {
                        "data": "status"
                    },
                    {
                        "data": "action"
                    }
                ],

                // buttons: [{
                //     // text: '<i class="fa fa-file-pdf-o"></i>@lang('home.pdf')',
                //     extend: 'pdf',
                //     orientation: 'portrait', //portrait',
                //     pageSize: 'A4',
                //     title: 'Expenses List',
                //     filename: 'expenses',
                //     className: 'btn btn-danger',

                //     exportOptions: {
                //         columns: [0, 1, 2, 3]
                //     },
                //     footer: true,
                //     customize: function(doc) {

                //         var tblBody = doc.content[1].table.body;
                //         doc.content[1].layout = {
                //             hLineWidth: function(i, node) {
                //                 return (i === 0 || i === node.table.body.length) ? 2 :
                //                 1;
                //             },
                //             vLineWidth: function(i, node) {
                //                 return (i === 0 || i === node.table.widths.length) ? 2 :
                //                     1;
                //             },
                //             hLineColor: function(i, node) {
                //                 return (i === 0 || i === node.table.body.length) ?
                //                     'black' : 'gray';
                //             },
                //             vLineColor: function(i, node) {
                //                 return (i === 0 || i === node.table.widths.length) ?
                //                     'black' : 'gray';
                //             }
                //         };
                //         $('#gridID').find('tr').each(function(ix, row) {
                //             var index = ix;
                //             var rowElt = row;
                //             $(row).find('td').each(function(ind, elt) {
                //                 tblBody[index][ind].border
                //                 if (tblBody[index][1].text == '' && tblBody[
                //                         index][2].text == '') {
                //                     delete tblBody[index][ind].style;
                //                     tblBody[index][ind].fillColor = '#FFF9C4';
                //                 } else {
                //                     if (tblBody[index][2].text == '') {
                //                         delete tblBody[index][ind].style;
                //                         tblBody[index][ind].fillColor =
                //                             '#FFFDE7';
                //                     }
                //                 }
                //             });
                //         });
                //     }

                // }, ]

            });
            $(document).on('click', 'button.delete_user_button', function() {
                swal({
                    title: LANG.sure,
                    text: LANG.confirm_delete_user,
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                }).then((willDelete) => {
                    if (willDelete) {
                        var href = $(this).data('href');
                        var data = $(this).serialize();
                        $.ajax({
                            method: "DELETE",
                            url: href,
                            dataType: "json",
                            data: data,
                            success: function(result) {
                                if (result.success == true) {
                                    toastr.success(result.msg);
                                    users_table.ajax.reload();
                                } else {
                                    toastr.error(result.msg);
                                }
                            }
                        });
                    }
                });
            });

        });
    </script>
@endsection
