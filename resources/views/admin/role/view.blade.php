@extends('admin.layouts.app')

@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Subheader-->
        <div class="subheader py-lg-8 subheader-transparent" id="kt_subheader">
            <div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                <!--begin::Info-->
                <div class="d-flex align-items-center mr-1">
                    <!--begin::Page Heading-->
                    <div class="d-flex align-items-baseline flex-wrap mr-5">
                        <!--begin::Page Title-->
                        <h2 class="d-flex align-items-center text-dark font-weight-bold my-1 mr-3">{{ $roles['name'] }} </h2>
                        <!--end::Page Title-->
                    </div>
                    <!--end::Page Heading-->
                </div>
                <!--end::Info-->
                <div class="card-toolbar">
                    <a href="{{ route('admin.role.index') }}" class="text-primary font-weight-bolder font-size-sm">
                                <span class="svg-icon svg-icon-primary svg-icon-1x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-04-03-014522/theme/html/demo5/dist/../src/media/svg/icons/Navigation/Arrow-left.svg--><svg
                                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <polygon points="0 0 24 0 24 24 0 24"/>
                                        <rect fill="#000000" opacity="0.3"
                                              transform="translate(12.000000, 12.000000) scale(-1, 1) rotate(-90.000000) translate(-12.000000, -12.000000) "
                                              x="11" y="5" width="2" height="14" rx="1"/>
                                        <path
                                            d="M3.7071045,15.7071045 C3.3165802,16.0976288 2.68341522,16.0976288 2.29289093,15.7071045 C1.90236664,15.3165802 1.90236664,14.6834152 2.29289093,14.2928909 L8.29289093,8.29289093 C8.67146987,7.914312 9.28105631,7.90106637 9.67572234,8.26284357 L15.6757223,13.7628436 C16.0828413,14.136036 16.1103443,14.7686034 15.7371519,15.1757223 C15.3639594,15.5828413 14.7313921,15.6103443 14.3242731,15.2371519 L9.03007346,10.3841355 L3.7071045,15.7071045 Z"
                                            fill="#000000" fill-rule="nonzero"
                                            transform="translate(9.000001, 11.999997) scale(-1, -1) rotate(90.000000) translate(-9.000001, -11.999997) "/>
                                    </g>
                                </svg><!--end::Svg Icon--></span>
                        Back to Role List</a>
                </div>
            </div>
        </div>
        <!--end::Subheader-->
        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class="container">
                <div class="add-product">
                    <div class="row">
                        <div class="col-9">
                            <!--begin::Card-->
                            <div class="card add-category-field px-5 py-6">
                                <div class="table-responsive">
                                    <table class="table table-head-custom table-vertical-center table-striped" id="kt_advance_table_widget_4">
                                        <thead class="custom-background">
                                        <th class="pl-0">
                                            <label class="checkbox checkbox-lg checkbox-inline mr-2">
                                                #
                                            </label>
                                        </th>
                                        <th class="pl-0">
                                            <span class="text-primary">Module Name</span></th>
                                        <th class="pl-0">
                                            <span class="text-primary">Sub-module Name</span></th>
                                        </th>
                                        </thead>

                                        <tbody>
                                        @if (count($parentSelectedPermissions) > 0)
                                            @foreach($parentSelectedPermissions as $parentSelectedPermission)
                                                <tr>
                                                    <td class="py-6">
                                                        <label class="checkbox checkbox-lg checkbox-inline">
                                                               {{ $loop->iteration }}
                                                        </label>
                                                    </td>
                                                    <td>

                                                        @foreach($permissions as $permission)
                                                            @if($permission->submodule_id == 0)
                                                                @if ($parentSelectedPermission->id === $permission->id)
                                                                    {{$permission->display_name}}
                                                                @endif
                                                            @endif
                                                        @endforeach

                                                    </td>
                                                    <td>

                                                        @foreach($permissions as $permission)
                                                            @if($parentSelectedPermission->id === $permission->submodule_id)
                                                                @php ($selected = false)
                                                                @foreach($childSelectedPermissions as $childSelectedPermission)
                                                                    @if($permission->id === $childSelectedPermission->id)
                                                                        @php ($selected = true)
                                                                    @endif
                                                                @endforeach
                                                                @if ($selected === true)
                                                                    <option selected
                                                                            value="{{$permission->id}}">{{$permission->display_name}}</option>
                                                                @else

                                                                @endif
                                                            @endif
                                                        @endforeach

                                                    </td>


                                                </tr>

                                            @endforeach
                                        @endif
                                        </tbody>

                                    </table>
                                </div>


                            </div>


                        </div>

                    </div>
                </div>
            </div>
            <!--end::Container-->
        </div>
        <!--end::Entry-->
    </div>
@endsection

@section('style')
@endsection

@section('script')
    <script>
        jQuery(document).ready(function () {
            KTFormRepeater.init();
            @if (count($parentSelectedPermissions) > 0)
            @foreach($parentSelectedPermissions as $parentSelectedPermission)
            $('#kt_select2_{{ $parentSelectedPermission->id }}').select2({
                placeholder: "Select role",
            });
            @endforeach
            @else
            $('#kt_select2_3').select2({
                placeholder: "Select role",
            });
            @endif
        });
        let countSub = 0;
        let formRepeaterId = "#kt_repeater_1";
        let KTFormRepeater = function () {
            let demo1 = function () {
                $(formRepeaterId).repeater({
                    initEmpty: false,
                    defaultValues: {
                        'text-input': 'foo'
                    },
                    show: function () {
                        $(this).slideDown();
                        $(this).find('.sub-module-select').attr('id', 'select-kt-' + countSub)
                        $(`#select-kt-${countSub}`).select2({
                            placeholder: "Select role",
                        })
                        $(`#select-kt-${countSub++}`).children().remove()
                    },
                    hide: function (deleteElement) {
                        $(this).slideUp(deleteElement);
                    }
                });
            }
            return {
                // public functions
                init: function () {
                    demo1();
                }
            };
        }();
        // parent role selected
        function onSelectSelect(that) {
            console.log()
            const value = that.value;
            $.ajax({
                type: 'GET',
                url: `{{ url('admin/roles/get-sub-module') }}/${value}`,
                success: res => {
                    if (res.permissions.length > 0) {
                        let idName = $(that).parent().parent().find('select')[1].id;
                        $(`#${idName}`).children().remove()
                        res.permissions.forEach(each => {
                            $(`#${idName}`).append(new Option(each.name, each.id))
                        });
                    } else {
                        toastr.warning('', `No sub-module data found against ${res.permission.name}`);
                    }
                },
            })
        }
    </script>
@endsection
