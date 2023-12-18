<div class="mt-3">

    <div class="card">

        <div class="px-3 pt-4 pb-2">
            <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <img style="width:50px" class="me-2 avatar-sm rounded-circle"
                         src="{{$idea->user->getImageURL()}}" alt="{{$idea->user->name}}">
                    <div>
                        <h5 class="card-title mb-0"><a href="{{route('users.show',$idea->user->id)}}"> {{$idea->user->name}}
                            </a></h5>
                    </div>
                </div>
                <div>
                    <form method="Post" action="{{route('ideas.destroy',$idea->id) }}">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger btn-sm"> X</button>
                    </form>
                    <a href="{{route('ideas.show',$idea->id)}}">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                            <path d="M12 15a3 3 0 100-6 3 3 0 000 6z"/>
                            <path fill-rule="evenodd"
                                  d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z"
                                  clip-rule="evenodd"/>
                        </svg>
                    </a>
                    <a href="{{route('ideas.edit',$idea->id)}}">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                            <path
                                d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32l8.4-8.4z"/>
                            <path
                                d="M5.25 5.25a3 3 0 00-3 3v10.5a3 3 0 003 3h10.5a3 3 0 003-3V13.5a.75.75 0 00-1.5 0v5.25a1.5 1.5 0 01-1.5 1.5H5.25a1.5 1.5 0 01-1.5-1.5V8.25a1.5 1.5 0 011.5-1.5h5.25a.75.75 0 000-1.5H5.25z"/>
                        </svg>

                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            @if( $editing ??false )
                <form action="{{ route('ideas.update',$idea->id) }}" method="post">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <textarea name="content" class="form-control" id="content"
                                  rows="3">{{$idea->content}}</textarea>
                        @error('content')
                        <span class="fs-6 text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="">
                        <button type="submit" class="btn btn-dark"> Update</button>
                    </div>
                </form>

            @else
                <p class="fs-6 fw-light text-muted">
                    {{$idea->content}}
                </p>
            @endif
            <div class="d-flex justify-content-between">
                <div>
                    <a href="#" class="fw-light nav-link fs-6"> <span class="fas fa-heart me-1">
                                        </span> {{$idea->likes}} </a>
                </div>
                <div>
                                    <span class="fs-6 fw-light text-muted"> <span class="fas fa-clock"> </span>
                                        {{$idea->created_at}} </span>
                </div>
            </div>
            @include('share.comments-box')
        </div>
    </div>
</div>
