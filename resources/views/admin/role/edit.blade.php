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
                        <h2 class="d-flex align-items-center text-dark font-weight-bold my-1 mr-3">Edit Role</h2>
                        <!--end::Page Title-->
                    </div>
                    <!--end::Page Heading-->
                </div>
                <!--end::Info-->
                <div class="card-toolbar">
                    <a href="{{ route('admin.role.index') }}" class="text-primary font-weight-bolder font-size-sm">
                                <span class="svg-icon svg-icon-primary svg-icon-1x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-04-03-014522/theme/html/demo5/dist/../src/media/svg/icons/Navigation/Arrow-left.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <polygon points="0 0 24 0 24 24 0 24"/>
                                        <rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) scale(-1, 1) rotate(-90.000000) translate(-12.000000, -12.000000) " x="11" y="5" width="2" height="14" rx="1"/>
                                        <path d="M3.7071045,15.7071045 C3.3165802,16.0976288 2.68341522,16.0976288 2.29289093,15.7071045 C1.90236664,15.3165802 1.90236664,14.6834152 2.29289093,14.2928909 L8.29289093,8.29289093 C8.67146987,7.914312 9.28105631,7.90106637 9.67572234,8.26284357 L15.6757223,13.7628436 C16.0828413,14.136036 16.1103443,14.7686034 15.7371519,15.1757223 C15.3639594,15.5828413 14.7313921,15.6103443 14.3242731,15.2371519 L9.03007346,10.3841355 L3.7071045,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(9.000001, 11.999997) scale(-1, -1) rotate(90.000000) translate(-9.000001, -11.999997) "/>
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
                    <form action="{{ route('admin.role.update', $role->id) }}" method="post" >
                        {{ method_field('PUT') }}
                        @csrf
                        <div class="row">
                            <div class="col-9">
                                <!--begin::Card-->
                                <div class="card add-category-field px-5 py-6">
                                    <div class="form-group">
                                        <label for="" class="@error('name') text-danger @enderror">Name*</label>
                                        <input id="name" name="name" class="form-control form-control-solid @error('name') is-invalid @enderror" type="text"
                                               placeholder="Role name " value="{{ $role['name'] }}" required readonly/>
                                        @error('name')
                                        <small id="emailHelp" class="form-text text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div id="kt_repeater_1">
                                        <div class="card-body">
                                            <div data-repeater-list="group-a">
                                                @if (count($parentSelectedPermissions) > 0)
                                                    @foreach($parentSelectedPermissions as $parentSelectedPermission)
                                                        <div data-repeater-item="" class="form-group row formSubModule_1">
                                                            <div class="col-lg-4">
                                                                <label for="tst-test"> Add Module: </label>
                                                                <select class="form-control tst-test" name="mother-permissions" onchange="onSelectSelect(this)">
                                                                    <option value="">Select option</option>
                                                                    @foreach($permissions as $permission)
                                                                        @if($permission->submodule_id == 0)
                                                                            @if ($parentSelectedPermission->id === $permission->id)
                                                                                <option selected value="{{$permission->id}}">{{$permission->display_name}}</option>
                                                                            @else
                                                                                <option value="{{$permission->id}}">{{$permission->display_name}}</option>
                                                                            @endif
                                                                        @endif
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="col-lg-1">
                                                                <a href="javascript:;" data-repeater-delete=""
                                                                   class="btn mt-6  btn-danger btn-icon">
                                                                    <i class="la la-remove"></i>
                                                                </a>
                                                            </div>
                                                            <div class="col-lg-7" id="sub-module">
                                                                <label for="kt_select2_3"> Sub-module: </label>
                                                                <select class="form-control sub-module-select" multiple="multiple" name="permissions"
                                                                        id="kt_select2_{{ $parentSelectedPermission->id }}">
                                                                    @foreach($permissions as $permission)
                                                                        @if($parentSelectedPermission->id === $permission->submodule_id)
                                                                            @php ($selected = false)
                                                                            @foreach($childSelectedPermissions as $childSelectedPermission)
                                                                                @if($permission->id === $childSelectedPermission->id)
                                                                                    @php ($selected = true)
                                                                                @endif
                                                                            @endforeach
                                                                            @if ($selected === true)
                                                                                <option selected value="{{$permission->id}}">{{$permission->display_name}}</option>
                                                                            @else
                                                                                <option value="{{$permission->id}}">{{$permission->display_name}}</option>
                                                                            @endif
                                                                        @endif
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @else
                                                    <div data-repeater-item="" class="form-group row formSubModule_1">
                                                        <div class="col-lg-4">
                                                            <label for="tst-test"> Add Module: </label>
                                                            <select class="form-control tst-test" name="mother-permissions" onchange="onSelectSelect(this)">
                                                                <option value="">Select option</option>
                                                                @foreach($permissions as $permission)
                                                                    @if($permission->submodule_id == 0)
                                                                        <option value="{{$permission->id}}">{{$permission->display_name}}</option>
                                                                    @endif
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-lg-1">
                                                            <a href="javascript:;" data-repeater-delete=""
                                                               class="btn mt-6  btn-danger btn-icon">
                                                                <i class="la la-remove"></i>
                                                            </a>
                                                        </div>
                                                        <div class="col-lg-7" id="sub-module">
                                                            <label for="kt_select2_3"> Sub-module: </label>
                                                            <select class="form-control sub-module-select" multiple="multiple" name="permissions" id="kt_select2_3">
                                                            </select>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>

                                            <div class="form-group row mt-5">
                                                <div class="col-lg-1">
                                                    <a id="add" href="javascript:;" data-repeater-create=""
                                                       class="btn btn-sm font-weight-bolder btn-light-primary">
                                                        <i class="la la-plus"></i>Add</a>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div>


                            </div>
                            <div class="col-3">
                                <div class="card card-sticky" id="kt_page_sticky_card">

                                    <div class="card-body">
                                        <button type="submit" href="#" class="btn btn-success font-weight-bolder font-size-sm">
                                            <div class="d-inline flex-shrink-0 text-center" style="width: 40px;">
                                                <i class="icon-1x text-white flaticon-interface-5"></i>
                                            </div>
                                            Save
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
            <!--end::Container-->
        </div>
        <!--end::Entry-->
    </div>
@endsection

@push('style')
    <script src="{{ asset('assets/css/select2.css') }}"></script>
@endpush
@push('script')
    <script src="{{ asset('assets/js/jquery.repeater.min.js') }}"></script>
    <script src="{{ asset('assets/js/select2.min.js') }}"></script>
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
                            $(`#${idName}`).append(new Option(each.display_name, each.id))
                        });
                    } else {
                        let idName = $(that).parent().parent().find('select')[1].id;
                        $(`#${idName}`).children().remove()
                        toastr.warning('', `No sub-module data found against ${res.permission.display_name}`);
                    }
                },
            })
        }
    </script>
    {{--    <script>--}}
    {{--        $(document).ready(function(){--}}
    {{--            $("#name").change(function(){--}}
    {{--                var name = $('#name').val();--}}
    {{--                console.log(name);--}}
    {{--                $.ajax({--}}
    {{--                    type: "GET",--}}
    {{--                    url: '{{ route('role-name') }}',--}}

    {{--                    data: {--}}
    {{--                        "name": name--}}
    {{--                    },--}}
    {{--                    success: function(data) {--}}
    {{--                        console.log(data);--}}
    {{--                        if(data.nameCheckData.length > 0){--}}
    {{--                            document.getElementById('name').value = null;--}}
    {{--                            toastr.warning('', 'Role name already created');--}}
    {{--                        }--}}
    {{--                    }--}}
    {{--                });--}}
    {{--            });--}}
    {{--        });--}}
    {{--    </script>--}}
@endpush
