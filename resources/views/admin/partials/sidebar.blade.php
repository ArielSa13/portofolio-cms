<aside class="w-full max-w-xs rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
    <div class="mb-8">
        <p class="text-xs uppercase tracking-[0.3em] text-slate-400">Admin CMS</p>
        <h2 class="mt-2 text-2xl font-bold text-slate-900">Portfolio Panel</h2>
    </div>

    <nav class="space-y-2 text-sm">
        <a href="{{ route('admin.dashboard') }}" class="block rounded-2xl px-4 py-3 {{ request()->routeIs('admin.dashboard') ? 'bg-slate-900 text-white' : 'text-slate-600 hover:bg-slate-100' }}">Dashboard</a>
        <a href="{{ route('admin.about.edit') }}" class="block rounded-2xl px-4 py-3 {{ request()->routeIs('admin.about.*') ? 'bg-slate-900 text-white' : 'text-slate-600 hover:bg-slate-100' }}">About</a>
        <a href="{{ route('admin.projects.index') }}" class="block rounded-2xl px-4 py-3 {{ request()->routeIs('admin.projects.*') ? 'bg-slate-900 text-white' : 'text-slate-600 hover:bg-slate-100' }}">Projects</a>
        <a href="{{ route('admin.services.index') }}" class="block rounded-2xl px-4 py-3 {{ request()->routeIs('admin.services.*') ? 'bg-slate-900 text-white' : 'text-slate-600 hover:bg-slate-100' }}">Services</a>
        <a href="{{ route('admin.experiences.index') }}" class="block rounded-2xl px-4 py-3 {{ request()->routeIs('admin.experiences.*') ? 'bg-slate-900 text-white' : 'text-slate-600 hover:bg-slate-100' }}">Experiences</a>
        <a href="{{ route('admin.skills.index') }}" class="block rounded-2xl px-4 py-3 {{ request()->routeIs('admin.skills.*') ? 'bg-slate-900 text-white' : 'text-slate-600 hover:bg-slate-100' }}">Skills</a>
        <a href="{{ route('admin.testimonials.index') }}" class="block rounded-2xl px-4 py-3 {{ request()->routeIs('admin.testimonials.*') ? 'bg-slate-900 text-white' : 'text-slate-600 hover:bg-slate-100' }}">Testimonials</a>
        <a href="{{ route('admin.contact-settings.edit') }}" class="block rounded-2xl px-4 py-3 {{ request()->routeIs('admin.contact-settings.*') ? 'bg-slate-900 text-white' : 'text-slate-600 hover:bg-slate-100' }}">Contact Settings</a>
        <a href="{{ route('home') }}" target="_blank" class="block rounded-2xl px-4 py-3 text-slate-600 hover:bg-slate-100">Lihat Website</a>
    </nav>

    <form action="{{ route('logout') }}" method="POST" class="mt-8">
        @csrf
        <button type="submit" class="w-full rounded-2xl border border-slate-200 px-4 py-3 text-left text-sm text-slate-600 hover:bg-slate-100">Logout</button>
    </form>
</aside>
