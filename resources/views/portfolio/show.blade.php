@extends('layout')

@section('title', $project->title)

@section('content')
    <!-- Breadcrumb -->
    <div class="bg-gray-100 py-4 border-b">
        <div class="container mx-auto px-6">
            <a href="{{ route('portfolio.index') }}" class="text-blue-600 hover:text-blue-800">Home</a>
            <span class="mx-2 text-gray-600">/</span>
            <span class="text-gray-600">{{ $project->title }}</span>
        </div>
    </div>

    <!-- Project Details -->
    <div class="container mx-auto px-6 py-12">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Main Content -->
            <div class="lg:col-span-2">
                <!-- Project Image -->
                <div class="mb-8 rounded-lg overflow-hidden shadow-lg h-96 bg-gray-300">
                    @if ($project->image)
                        <img src="{{ $project->image }}" alt="{{ $project->title }}" class="w-full h-full object-cover">
                    @else
                        <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-blue-400 to-blue-600">
                            <i class="fas fa-project-diagram text-6xl text-white"></i>
                        </div>
                    @endif
                </div>

                <!-- Project Title & Description -->
                <h1 class="text-4xl font-bold mb-4">{{ $project->title }}</h1>
                
                <div class="mb-6">
                    <p class="text-xl text-gray-700 mb-4">{{ $project->description }}</p>
                </div>

                <!-- Long Description -->
                @if ($project->long_description)
                    <div class="mb-8 p-6 bg-gray-50 rounded-lg border border-gray-200">
                        <h2 class="text-2xl font-bold mb-4">About This Project</h2>
                        <p class="text-gray-700 leading-relaxed">{{ $project->long_description }}</p>
                    </div>
                @endif

                <!-- Technologies Used -->
                <div class="mb-8">
                    <h2 class="text-2xl font-bold mb-4">Technologies Used</h2>
                    <div class="flex flex-wrap gap-3">
                        @forelse ($project->technologies as $tech)
                            <span class="inline-block bg-blue-100 text-blue-800 px-4 py-2 rounded-full font-semibold">
                                {{ $tech }}
                            </span>
                        @empty
                            <p class="text-gray-600">No technologies listed.</p>
                        @endforelse
                    </div>
                </div>

                <!-- Project Links -->
                <div class="flex gap-4 mb-8">
                    @if ($project->link)
                        <a href="{{ $project->link }}" target="_blank" class="inline-flex items-center bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition">
                            <i class="fas fa-external-link-alt mr-2"></i> Visit Project
                        </a>
                    @endif
                    @if ($project->github_link)
                        <a href="{{ $project->github_link }}" target="_blank" class="inline-flex items-center bg-gray-800 text-white px-6 py-3 rounded-lg hover:bg-gray-900 transition">
                            <i class="fab fa-github mr-2"></i> View on GitHub
                        </a>
                    @endif
                </div>
            </div>

            <!-- Sidebar -->
            <div class="lg:col-span-1">
                <!-- Project Info Card -->
                <div class="bg-white rounded-lg shadow-lg p-6 sticky top-4">
                    <h3 class="text-xl font-bold mb-4">Project Details</h3>
                    
                    <div class="space-y-4 mb-6">
                        <div class="border-b pb-4">
                            <p class="text-gray-600 text-sm">Status</p>
                            <p class="font-semibold text-gray-900">Completed</p>
                        </div>
                        <div class="border-b pb-4">
                            <p class="text-gray-600 text-sm">Completed</p>
                            <p class="font-semibold text-gray-900">{{ $project->created_at->format('M d, Y') }}</p>
                        </div>
                        @if ($project->featured)
                            <div class="border-b pb-4">
                                <p class="text-gray-600 text-sm">Featured</p>
                                <p class="font-semibold text-yellow-600">
                                    <i class="fas fa-star"></i> Featured Project
                                </p>
                            </div>
                        @endif
                    </div>

                    <!-- Share Buttons -->
                    <h4 class="font-bold mb-3">Share</h4>
                    <div class="flex gap-2">
                        <a href="https://twitter.com/share?url={{ route('portfolio.show', $project->slug) }}&text={{ $project->title }}" target="_blank" class="bg-blue-400 text-white p-3 rounded hover:bg-blue-500 transition">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ route('portfolio.show', $project->slug) }}" target="_blank" class="bg-blue-600 text-white p-3 rounded hover:bg-blue-700 transition">
                            <i class="fab fa-facebook"></i>
                        </a>
                        <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ route('portfolio.show', $project->slug) }}" target="_blank" class="bg-blue-800 text-white p-3 rounded hover:bg-blue-900 transition">
                            <i class="fab fa-linkedin"></i>
                        </a>
                    </div>
                </div>

                <!-- Related Projects -->
                <div class="bg-white rounded-lg shadow-lg p-6 mt-6">
                    <h3 class="text-xl font-bold mb-4">Other Projects</h3>
                    <div class="space-y-3">
                        @php
                            $otherProjects = \App\Models\Project::where('id', '!=', $project->id)->limit(3)->get();
                        @endphp
                        @forelse ($otherProjects as $other)
                            <a href="{{ route('portfolio.show', $other->slug) }}" class="block p-3 bg-gray-50 hover:bg-blue-50 rounded transition border-l-4 border-transparent hover:border-blue-600">
                                <p class="font-semibold text-gray-900">{{ $other->title }}</p>
                                <p class="text-sm text-gray-600">{{ Str::limit($other->description, 40) }}</p>
                            </a>
                        @empty
                            <p class="text-gray-600 text-sm">No other projects.</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>

        <!-- Back Button -->
        <div class="mt-12 text-center">
            <a href="{{ route('portfolio.index') }}" class="inline-block bg-gray-200 text-gray-800 px-6 py-2 rounded hover:bg-gray-300 transition">
                <i class="fas fa-arrow-left mr-2"></i> Back to Portfolio
            </a>
        </div>
    </div>
@endsection
