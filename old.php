<!-- <div class="row">
        <div class="col-md-3">
            @include('layout.part.roots')
            @include('layout.part.brands')
        </div>
        <div class="col-md-9">
            @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible mt-4" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Закрыть">
                    <span aria-hidden="true">&times;</span>
                </button>
                {{ $message }}
            </div>
            @endif
            @if ($message = Session::get('warning'))
            <div class="alert alert-danger alert-dismissible mt-4" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Закрыть">
                    <span aria-hidden="true">&times;</span>
                </button>
                {{ $message }}
            </div>
            @endif
             @yield('content')

            <div class="starter-template">
            </div>
        </div>
    </div> -->