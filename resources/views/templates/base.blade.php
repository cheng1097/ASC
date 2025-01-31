<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
@include('components.head')

<body>
    @include('components.header')
    @include('components.asside')

    <main id="main" class="main">
        @if (session('success'))
            {{-- {{ session('success') }} --}}
            @include('components.toast', ['toast' => 'success', 'message' => session('success') ])
        @elseif (session('error'))
            {{-- {{ session('error') }} --}}
            @include('components.toast', ['toast' => 'error', 'message' => session('error') ])
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        @yield('content')
    </main>

    @include('components.footer')
    @include('components.script')

</body>

</html>
