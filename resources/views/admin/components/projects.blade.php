@extends('admin.index')

@section('content')
<div class="container-fluid flex-grow-1 container-p-y">
  <button type="button" class="btn btn-primary add-btn" data-toggle="modal" data-target="#add_project">
    პროექტის დამატება
  </button>
  <hr class="my-4">
  <div class="row mb-5">
    @foreach ($projects as $project)

    <div class="col-xl-6 col-sm-12">
            <div class="card mb-3">
                <a href="{{route('index.corp',$project->id)}}">
                <div class="row g-0">
                  <div class="col-md-4 p-2">
                      <img class="card-img card-img-left" src="../assets/image/{{$project->image}}" alt="Card image" />
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">
                      <h5 class="card-title">{{$project->name}}</h5>
                      <p class="card-text prod-desc">
                          {{$project->description}}
                      </p>
                    </div>
                  </div>
                </div>
                </a>
                <button type="button" class="btn btn-primary btn-delete" data-toggle="modal" data-target="#delete_{{$project->id}}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                      <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                      <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                    </svg>
                  </button>
                <button type="button" class="btn btn-primary edit-btn" data-toggle="modal" data-target="#edit_{{$project->id}}">
                    რედაქტირება
                  </button>
            </div>
    </div>

    {{-- edit project --}}
    <div class="modal fade" id="edit_{{$project->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">პროექტის რედაქტირება</h5>
              <button type="button" class="close btn btn-primary" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action='{{route('update.project', $project->id)}}' method='post' enctype=multipart/form-data>
                @csrf
                @method('PUT')
                <div class="form-group mt-3">
                  <label for="exampleInputEmail1">დასახელება</label>
                  <input type="text" required value="{{$project->name}}" name='name'  class="form-control mt-2">
                </div>
                <div class="form-group mt-3">
                  <label for="exampleInputEmail1">მისამართი</label>
                  <input type="text"  value="{{$project->address}}" name='address'  class="form-control mt-2">
                </div>
                <div class="form-group mt-3">
                  <label for="exampleInputEmail1">სრული ფართი</label>
                  <input type="number"  value="{{$project->space}}"  step="0.1" name='space'  class="form-control mt-2">
                </div>
                <div class="form-group mt-3">
                  <label for="exampleInputEmail1">სარეკრეაციო ზონა</label>
                  <input type="number" value="{{$project->recreation}}" step="0.1" name='recreation'  class="form-control mt-2">
                </div>
                <div class="form-group mt-3">
                  <label for="exampleInputEmail1">მშენებლობის დაწყების თარიღი</label>
                  <input type="date" required value="{{$project->start_date}}" name='start_date'  class="form-control mt-2">
                </div>
                <div class="form-group mt-3">
                  <label for="exampleInputEmail1">მშენებლობის დასრულების თარიღი</label>
                  <input type="date" required value="{{$project->end_date}}" name='end_date'  class="form-control mt-2">
                </div>
                <div class="form-group mt-3">
                  <label for="exampleInputEmail1">სურათი</label>
                  <input type="file"  value="{{$project->image}}" name='image'  class="form-control mt-2">
                </div>
                <div class="form-group mt-3">
                  <label for="exampleInputEmail1">3D სურათის კოდი</label>
                  <textarea type="text" name='image_d' class="form-control mt-2">{{$project->image_d}} </textarea>
                </div>
                <div class="form-group mt-3 mb-3">
                  <label for="exampleInputEmail1">დამატებით ინფორმაცია</label>
                  <textarea type="text" name='description'  class="form-control mt-2">{{$project->description}} </textarea>
                </div>
                <button type="submit" class="btn btn-primary">რედაქტირება</button>
              </form>
            </div>
          </div>
        </div>
    </div>

    {{-- delete project --}}
    <div class="modal fade" id="delete_{{$project->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">პროექტის წაშლა</h5>
                <button type="button" class="close btn btn-primary" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action='{{route('destroy.project', $project->id )}}' method='post' enctype=multipart/form-data>
                @csrf
                @method('DELETE')
                <p>დარწმუნებული ხართ რომ გსურთ პროექტის წაშლა</p>
                <button type="submit" class="btn btn-primary">წაშლა</button>
                </form>
            </div>
            </div>
        </div>
    </div>

    @endforeach
  </div>


<!-- add project -->
<div class="modal fade" id="add_project" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">პროექტის დამატება</h5>
        <button type="button" class="close btn btn-primary" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action='{{route('store.project')}}' enctype='multipart/form-data' method='post' enctype=multipart/form-data>
          @csrf
          <div class="form-group mt-3">
            <label for="exampleInputEmail1">დასახელება</label>
            <input type="text" required name='name'  class="form-control mt-2">
          </div>
          <div class="form-group mt-3">
            <label for="exampleInputEmail1">მისამართი</label>
            <input type="text" required name='address'  class="form-control mt-2">
          </div>
          <div class="form-group mt-3">
            <label for="exampleInputEmail1">სრული ფართი</label>
            <input type="number"  step="0.1" name='space'  class="form-control mt-2">
          </div>
          <div class="form-group mt-3">
            <label for="exampleInputEmail1">სარეკრეაციო ზონა</label>
            <input type="number" step="0.1" name='recreation'  class="form-control mt-2">
          </div>
          <div class="form-group mt-3">
            <label for="exampleInputEmail1">მშენებლობის დაწყების თარიღი</label>
            <input type="date" required name='start_date'  class="form-control mt-2">
          </div>
          <div class="form-group mt-3">
            <label for="exampleInputEmail1">მშენებლობის დასრულების თარიღი</label>
            <input type="date" required name='end_date'  class="form-control mt-2">
          </div>
          <div class="form-group mt-3">
            <label for="exampleInputEmail1">სურათი</label>
            <input type="file" required name='image'  class="form-control mt-2">
          </div>
          <div class="form-group mt-3">
            <label for="exampleInputEmail1">3D სურათის კოდი</label>
            <textarea type="text" name='image_d' class="form-control mt-2"> </textarea>
          </div>
          <div class="form-group mt-3 mb-3">
            <label for="exampleInputEmail1">დამატებით ინფორმაცია</label>
            <textarea type="text" name='description'  class="form-control mt-2"> </textarea>
          </div>
          <button type="submit" class="btn btn-primary">დამატება</button>
        </form>
      </div>
    </div>
  </div>
</div>
@stop
