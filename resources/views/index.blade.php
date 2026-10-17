<x-layout :title="$title">
    @php
        $jobs = [
            ['title' => 'Software Engineer', 'company' => 'Company A', 'location' => 'New York, NY', 'type' => 'Full-time'],
            ['title' => 'Product Manager', 'company' => 'Company B', 'location' => 'San Francisco, CA', 'type' => 'Hybrid'],
            ['title' => 'UX Designer', 'company' => 'Company C', 'location' => 'Austin, TX', 'type' => 'Remote'],
        ];
    @endphp

    <section class="max-w-6xl mx-auto px-4 pt-16 pb-12 text-center">
        <span class="inline-block px-3 py-1 rounded-full bg-indigo-50 text-indigo-700 text-xs font-semibold mb-5">
            New jobs added every week
        </span>
        <h1 class="text-4xl sm:text-5xl font-extrabold tracking-tight text-slate-900">
            Find your <span class="text-indigo-600">dream job</span> today
        </h1>
        <p class="mt-4 text-lg text-slate-600 max-w-xl mx-auto">
            Browse openings from great companies, or post a job and find the right talent.
        </p>
        <div class="mt-8 flex flex-wrap justify-center gap-3">
            <a href="/job" class="px-6 py-3 rounded-xl bg-indigo-600 text-white font-medium shadow-sm shadow-indigo-600/30 hover:bg-indigo-700 transition">
                Browse Jobs
            </a>
            <a href="/about" class="px-6 py-3 rounded-xl bg-white border border-slate-200 font-medium hover:border-slate-300 transition">
                Learn More
            </a>
        </div>
    </section>

    <section class="max-w-6xl mx-auto px-4 pb-20">
        <h2 class="text-xl font-bold text-slate-900 mb-5">Latest openings</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
            @foreach ($jobs as $job)
                <article class="group bg-white p-6 rounded-2xl border border-slate-200 hover:border-indigo-200 hover:shadow-lg hover:-translate-y-0.5 transition">
                    <div class="flex items-start justify-between gap-3">
                        <div class="grid place-items-center size-11 rounded-xl bg-slate-100 font-bold text-slate-700">
                            {{ substr($job['company'], -1) }}
                        </div>
                        <span class="text-xs px-2.5 py-1 rounded-full bg-emerald-50 text-emerald-700 font-medium">
                            {{ $job['type'] }}
                        </span>
                    </div>
                    <h3 class="mt-4 text-lg font-semibold text-slate-900">{{ $job['title'] }}</h3>
                    <p class="mt-1 text-sm text-slate-500">{{ $job['company'] }} &middot; {{ $job['location'] }}</p>
                    <a href="#" class="mt-5 inline-flex items-center gap-1 text-sm font-medium text-indigo-600">
                        View details
                        <span class="group-hover:translate-x-1 transition">&rarr;</span>
                    </a>
                </article>
            @endforeach
        </div>
    </section>
</x-layout>
