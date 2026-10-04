<div>
    <h1>Hi job</h1>
    @foreach ($jobs as $job)
        <div>
            <h2>{{ $job['title'] }}</h2>
            <p>{{ $job['description'] }}</p>
        </div>
    @endforeach
</div>
