@include('includes.header')
    <main role="main" class="inner cover">
        <h1 class="cover-heading">@yield('page_title')</h1>
    </main>
    @yield('content')
@include('includes.footer')
