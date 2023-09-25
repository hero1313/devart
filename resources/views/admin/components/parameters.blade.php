@extends('admin.index')

@section('content')
@include("admin.layouts.progress")

<div class="container-fluid flex-grow-1 container-p-y">
    <h4 class="fw-bold  mb-4"><span class="text-muted fw-light">@lang('admin._main_page') </span></h4>

    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">

                <form id="formAccountSettings" enctype='multipart/form-data' action="/admin/main-page" method="POST">
                    @csrf
                    @method('PUT')
                    <!-- Account -->
                    <div class="card-body">
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <div class="d-flex align-items-start align-items-sm-center gap-4">
                                    <img src="/image/{{Auth::user()->slide}}" alt="user-avatar" class="d-block rounded admin-slide" height="100" width="100" id="uploadedAvatar" />
                                </div>
                                <div class="button-wrapper">
                                    <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                        <span class="d-none d-sm-block">@lang('admin._upload_slide')</span>
                                        <i class="bx bx-upload d-block d-sm-none"></i>
                                        <input type="file" id="upload" class="account-file-input" hidden accept="image/png, image/jpeg" name="slide" />
                                    </label>
                                </div>
                                <label for="currency" class="form-label">@lang('admin._design')</label>
                                <select id="currency" class="select2 form-select design-select" name='design'>
                                    <option value="{{Auth::user()->design}}">{{Auth::user()->design}}</option>
                                    <option value="basic">basic</option>
                                    <option value="modern">modern</option>
                                </select>
                                <br>
                                <label for="headline" class="form-label">@lang('admin._headline')</label>
                                <input class="form-control mb-3" type="text" id="headline" name="headline" value="{{Auth::user()->headline}}" autofocus />
                                <textarea rows="6" type="text" class="form-control" id="description" name="description">
                                {{Auth::user()->description}}
                                </textarea>
                            </div>
                            <div class="mb-3 col-md-6">
                                @if(Auth::user()->design == 'basic')
                                <img src="/image/basic.png" alt="user-avatar" class="d-block  admin-design" height="100" width="100" id="uploadedAvatar" />
                                @elseif(Auth::user()->design == 'modern')
                                <img src="/image/modern.png" alt="user-avatar" class="d-block  admin-design" height="100" width="100" id="uploadedAvatar" />
                                @endif
                            </div>

                        </div>
                        <div class="mt-2">
                            <button type="submit" class="btn btn-primary me-2">@lang('admin._save')</button>
                        </div>
                    </div>
                    <!-- /Account -->
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(".design-select").on('change', function() {
        if ($(this).val() == 'basic') {
            $('.admin-design').attr("src", "/image/basic.png");
        } else if ($(this).val() == 'modern') {
            $('.admin-design').attr("src", "/image/modern.png");
        }
    });
    $(".img-reset").click(function(event) {
        $("#upload").val('')
        console.log($("#upload").val())
        $(".rounded").attr("src", "/image/{{Auth::user()->image}}");
    })
    const input = document.getElementById('upload')
    input.addEventListener('change', (event) => {
        const target = event.target
        if (target.files && target.files[0]) {

            /*Maximum allowed size in bytes
              5MB Example
              Change first operand(multiplier) for your needs*/
            const maxAllowedSize = 5 * 1024 * 1024;
            if (target.files[0].size > maxAllowedSize) {
                target.value = ''
                Swal.fire({
                    icon: 'error',
                    title: 'შეცდომა...',
                    text: 'ატვირთული სურათის ზომა არუნდა აღემატებოდეს 5 მეგაბაიტს',
                })
            } else {
                $(".account-file-input").change(function(event) {
                    var x = URL.createObjectURL(event.target.files[0]);
                    $(".rounded").attr("src", x);
                    $(".save-img").css("display", "block");
                })
            }
        }
    })
</script>
@stop