@extends('admin.index')
@section('content')
    <div class="container-fluid flex-grow-1 container-p-y">

        <div class="card">
            <h5 class="card-header">ბინები</h5>
            <button type="button" class="btn btn-primary add-btn" data-toggle="modal" data-target="#add_apartments">
                ბინის დამატება
            </button>
            <div class="table-responsive text-nowrap">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ბინის ნომერი</th>
                            <th>პროექტი</th>
                            <th>კორპუსი</th>
                            <th>სართული</th>
                            <th>საძინებლები</th>
                            <th>ღირებულება</th>
                            <th>ფართი</th>
                            <th>საცხოვრებელი ფართი</th>
                            <th>აივნის ფართი</th>
                            <th>კოდი</th>
                            <th>ფოტო</th>
                            <th>3დ ფოტო</th>
                            <th>სტატუსი</th>
                            <th>რედაქტირება</th>
                            <th>წაშლა</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($apartments as $apartment)
                            <tr class="apartment-tr">
                                <td><strong>{{ $apartment->number }}</strong></td>
                                <td>{{ $apartment->project_id }}</td>
                                <td>{{ $apartment->corp_number }}</td>
                                <td>{{ $apartment->flor }}</td>
                                <td>{{ $apartment->badrooms }}</td>
                                <td>{{ $apartment->price }}</td>
                                <td>{{ $apartment->space }}</td>
                                <td>{{ $apartment->inside_space }}</td>
                                <td>{{ $apartment->balcony_space }}</td>
                                <td>{{ $apartment->code }}</td>
                                <td><img src="/assets/image/{{ $apartment->image }}" alt=""></td>
                                <td><img src="/assets/image/{{ $apartment->image_d }}" alt=""></td>
                                <td><button class="btn-success btn">{{ $apartment->status }}</button></td>
                                <td>
                                    <button class="btn btn-primary" data-toggle="modal"
                                        data-target="#edit_{{ $apartment->id }}">რედაქტირება</button>
                                </td>
                                <td><button class="btn btn-danger" data-toggle="modal"
                                        data-target="#delete_{{ $apartment->id }}">წაშლა</button>
                                </td>
                            </tr>

                            <div class="modal fade bd-example-modal-lg" id="edit_{{ $apartment->id }}" tabindex="-1"
                                role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">ბინის რედაქტირება</h5>
                                            <button type="button" class="close btn btn-primary" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('update.apartment', $apartment->id) }}" enctype='multipart/form-data' method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="form-group mt-3">
                                                    <label for="exampleInputEmail1">ბინის ნომერი</label>
                                                    <input type="text" required value="{{$apartment->number}}" name='number' class="form-control mt-2">
                                                </div>
                                                <div class="form-group mt-3">
                                                    <label for="exampleInputEmail1">უნიკალური კოდი</label>
                                                    <input type="text" required value="{{$apartment->code}}" name='code' class="form-control mt-2">
                                                </div>
                                                <div class="form-group mt-3">
                                                    <label for="exampleInputEmail1">ღირებულება</label>
                                                    <input type="number" required value="{{$apartment->price}}" step="0.1" name='price'
                                                        class="form-control mt-2">
                                                </div>
                                                <div class="form-group mt-3">
                                                    <label for="exampleInputEmail1">ფართი</label>
                                                    <input type="number" required value="{{$apartment->space}}" step="0.1" name='space'
                                                        class="form-control mt-2">
                                                </div>
                                                <div class="form-group mt-3">
                                                    <label for="exampleInputEmail1">საცხოვრებელი ფართი</label>
                                                    <input type="number" required value="{{$apartment->inside_space}}" step="0.1" name='inside_space'
                                                        class="form-control mt-2">
                                                </div>
                                                <div class="form-group mt-3">
                                                    <label for="exampleInputEmail1">აივნის ფართი</label>
                                                    <input type="number" value="{{$apartment->balcony_space}}" step="0.1" name='balcony_space'
                                                        class="form-control mt-2">
                                                </div>
                                                <select name="status" required class="form-select">
                                                    <option value="-1" {{$apartment->status == -1 ? 'selected' : ''}}>გასაყიდი</option>
                                                    <option value="1" {{$apartment->status == 1 ? 'selected' : ''}}>გაყიდული</option>
                                                </select>
                                                <div class="form-group mt-3">
                                                    <label for="exampleInputEmail1">საძინებლების რაოდენობა</label>
                                                    <input type="number" required value="{{$apartment->badrooms}}" name='badrooms' class="form-control mt-2">
                                                </div>
                                                <div class="form-group mt-3">
                                                    <label for="exampleInputEmail1">ფოტო</label>
                                                    <input type="file"  value="{{$apartment->image}}" name='image' class="form-control mt-2">
                                                </div>
                                                <div class="form-group mt-3">
                                                    <label for="exampleInputEmail1">3D სურათი</label>
                                                    <input type="file"  name='image_d' value="{{$apartment->image_d}}" class="form-control mt-2"/>
                                                </div>
                                                <br>
                                                <button type="submit" class="btn btn-primary">შენახვა</button>

                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal fade" id="delete_{{ $apartment->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">ბინის წაშლა</h5>
                                            <button type="button" class="close btn btn-primary" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action='{{ route('destroy.apartment', $apartment->id) }}'
                                                method='post' enctype=multipart/form-data>
                                                @csrf
                                                @method('DELETE')
                                                <p>დარწმუნებული ხართ რომ გინდათ ბინის წაშლა</p>

                                                <button type="submit" class="btn btn-primary">წაშლა</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade bd-example-modal-lg" id="add_apartments" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ბინის დამატება</h5>
                    <button type="button" class="close btn btn-primary" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('store.apartment', $flor->id) }}" enctype='multipart/form-data'
                        method="POST">
                        @csrf
                        <div class="form-group mt-3">
                            <label for="exampleInputEmail1">ბინის ნომერი</label>
                            <input type="text" required name='number' class="form-control mt-2">
                        </div>
                        <div class="form-group mt-3">
                            <label for="exampleInputEmail1">უნიკალური კოდი</label>
                            <input type="text" required name='code' class="form-control mt-2">
                        </div>
                        <div class="form-group mt-3">
                            <label for="exampleInputEmail1">ღირებულება</label>
                            <input type="number" required step="0.1" name='price' class="form-control mt-2">
                        </div>
                        <div class="form-group mt-3">
                            <label for="exampleInputEmail1">ფართი</label>
                            <input type="number" required step="0.1" name='space' class="form-control mt-2">
                        </div>
                        <div class="form-group mt-3">
                            <label for="exampleInputEmail1">საცხოვრებელი ფართი</label>
                            <input type="number" required step="0.1" name='inside_space' class="form-control mt-2">
                        </div>
                        <div class="form-group mt-3">
                            <label for="exampleInputEmail1">აივნის ფართი</label>
                            <input type="number" step="0.1" name='balcony_space' class="form-control mt-2">
                        </div>
                        <div class="form-group mt-3">
                            <label for="exampleInputEmail1">საძინებლების რაოდენობა</label>
                            <input type="number" required name='badrooms' class="form-control mt-2">
                        </div>
                        <div class="form-group mt-3">
                            <label for="exampleInputEmail1">ფოტო</label>
                            <input type="file" required  name='image' class="form-control mt-2">
                        </div>
                        <div class="form-group mt-3">
                            <label for="exampleInputEmail1">3D სურათი</label>
                            <input type="file"  name='image_d' class="form-control mt-2"/>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">შენახვა</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
