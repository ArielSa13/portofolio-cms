<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin CMS')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-100 text-slate-800">
    <div class="mx-auto flex min-h-screen max-w-7xl gap-6 p-6 lg:p-8">
        @include('admin.partials.sidebar')
        <main class="flex-1 rounded-3xl bg-white p-6 shadow-sm lg:p-8">
            <div class="mb-8 flex flex-col gap-4 border-b border-slate-100 pb-6 md:flex-row md:items-center md:justify-between">
                <div>
                    <p class="text-xs uppercase tracking-[0.3em] text-slate-400">Laravel Portfolio CMS</p>
                    <h1 class="mt-2 text-3xl font-bold text-slate-950">@yield('heading', 'Dashboard')</h1>
                </div>
                <div class="text-sm text-slate-500">{{ now()->translatedFormat('d F Y') }}</div>
            </div>
            <x-flash />
            @yield('content')
        </main>
    </div>
</body>
</html>
