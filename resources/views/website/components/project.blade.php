@extends('website.index')
@section('content')
    <header class="page-header page-head">
        <!-- end container -->
    </header>
    <div class="container page-headline">
        <h1>{{ $project->name }}</h1>
        <h5 class="mt-5 center">პროექტის დასრულებამდე დარჩა</h2>
        <h5 class="center">{{ $deadline }}</h3>
    </div>
    <!-- end page-header -->
    <form action="{{ route('website.show.project', $project->id) }}" method="GET">
        <section class="content-section ">
            <div class="">
                <!-- Button trigger modal -->
                <!-- Modal -->
                <div class="image_d">
                    <img src="/assets/image/{{ $project->image }}" alt="">
                    {!! $project->image_d !!}
                </div>
                <div class="container">
                    <div class="row apartments-table ">
                        <div class="row col-12 mt-5">
                            <div class="col-6 col-md-4 col-lg-2">
                                <div class="form-group mt-3">
                                    <button type="button" data-toggle="modal" data-target="#apartment_flor"
                                        class="btn btn-input">სართული ▼</button>
                                </div>
                            </div>
                            <div class="col-6 col-md-4 col-lg-2">
                                <div class="form-group mt-3">
                                    <button type="button" data-toggle="modal" data-target="#apartment_badroom"
                                        class="btn btn-input">საძინებლები ▼</button>
    
                                </div>
                            </div>
                            <div class="col-6 col-md-4 col-lg-2">
                                <div class="form-group mt-3">
                                    <button type="button" data-toggle="modal" data-target="#apartment_price"
                                        class="btn btn-input">ღირებულება ▼</button>
                                </div>
                            </div>
                            <div class="col-6 col-md-4 col-lg-2">
                                <div class="form-group mt-3">
                                    <button type="button" data-toggle="modal" data-target="#apartment_space"
                                        class="btn btn-input">ფართი ▼</button>
                                </div>
                            </div>
                            <div class="col-6 col-md-4 col-lg-2">
                                <div class="form-group mt-3">
                                    <button type="button" data-toggle="modal" data-target="#apartment_number"
                                        class="btn btn-input">ნომერი ▼</button>
                                </div>
                            </div>
                            <div class="col-6 col-md-4 col-lg-2">
                                <div class="form-group mt-3">
                                    <button type="submit" class="btn btn-search">ძებნა</button>
                                </div>
                            </div>
                        </div>
    
    
                        <table class="table table-striped mt-3">
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
                                    <th>სტატუსი</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($apartments as $apartment)
                                    <tr class='clickable-row'
                                        data-href='{{ route('website.show.apartment.id', $apartment->id) }}'>
                                        <td><strong>{{ $apartment->number }}</strong></td>
                                        <td>{{ $apartment->project_id }}</td>
                                        <td>{{ $apartment->corp_number }}</td>
                                        <td>{{ $apartment->flor }}</td>
                                        <td>{{ $apartment->badrooms }}</td>
                                        <td>{{ $apartment->price }}</td>
                                        <td>{{ $apartment->space }}</td>
                                        <td>{{ $apartment->inside_space }}</td>
                                        <td>{{ $apartment->balcony_space }}</td>
                                        <td>
                                            @if ($apartment->status == 1)
                                                გაყიდული
                                            @else
                                                თავისუფალი
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- end container -->
        </section>
        <div class="modal fade" id="apartment_price" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="form-group mt-3">
                            <label for="exampleInputEmail1">ღირებულება</label>
                            <div class="d-flex">
                                <input type="number" placeholder="დან" min="0" name='min_price'
                                    class="form-control mt-2 mr-2">
                                <input type="number" placeholder="მდე" min="0" name='max_price'
                                    class="form-control ml-2 mt-2">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-search" data-dismiss="modal">დახურვა</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="apartment_flor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <label for="exampleInputEmail1">სართულები</label>
                        <div class="d-flex">
                            <input type="number" placeholder="დან" min="0" name='min_flor'
                                class="form-control mt-2 mr-2">
                            <input type="number" placeholder="მდე" min="0" name='max_flor'
                                class="form-control ml-2 mt-2">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-search" data-dismiss="modal">დახურვა</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="apartment_number" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <label for="exampleInputEmail1">ბინის ნომერი</label>
                        <div class="d-flex">
                            <input type="text" placeholder="A35" min="0" name='number'
                                class="form-control mt-2 mr-2">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-search" data-dismiss="modal">დახურვა</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="apartment_space" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <label for="exampleInputEmail1">ფართი</label>
                        <div class="d-flex">
                            <input type="number" placeholder="დან" min="0" name='min_space'
                                class="form-control mt-2 mr-2">
                            <input type="number" placeholder="მდე" min="0" name='max_space'
                                class="form-control ml-2 mt-2">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-search" data-dismiss="modal">დახურვა</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="apartment_badroom" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <label for="exampleInputEmail1">საძინებლების რაოდენობა</label>
                        <div class="d-flex">
                            <input type="number" placeholder="დან" min="0" name='min_badroom'
                                class="form-control mt-2 mr-2">
                            <input type="number" placeholder="მდე" min="0" name='max_badroom'
                                class="form-control ml-2 mt-2">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-search" data-dismiss="modal">დახურვა</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <script>
        $("path").click(function() {
            $(location).prop('href', '/corp/' + $(this).attr("id"))
        });
    </script>



@stop
