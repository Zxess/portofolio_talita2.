<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projects = [
            [
                'title' => 'E-Commerce Platform',
                'slug' => 'ecommerce-platform',
                'description' => 'A full-featured e-commerce platform built with Laravel',
                'long_description' => 'Complete e-commerce solution with shopping cart, payment gateway integration, and admin dashboard. Features include product management, order tracking, and customer reviews.',
                'image' => 'https://via.placeholder.com/400x300?text=E-Commerce',
                'link' => 'https://example.com',
                'github_link' => 'https://github.com',
                'technologies' => ['Laravel', 'Vue.js', 'MySQL', 'Tailwind CSS'],
                'order' => 1,
                'featured' => true,
            ],
            [
                'title' => 'Task Management App',
                'slug' => 'task-management-app',
                'description' => 'A productivity app for managing tasks and projects',
                'long_description' => 'Collaborative task management application with real-time updates, team collaboration features, and progress tracking.',
                'image' => 'https://via.placeholder.com/400x300?text=Task+App',
                'link' => 'https://example.com',
                'github_link' => 'https://github.com',
                'technologies' => ['React', 'Laravel', 'Socket.io', 'PostgreSQL'],
                'order' => 2,
                'featured' => true,
            ],
            [
                'title' => 'Blog Platform',
                'slug' => 'blog-platform',
                'description' => 'Modern blog platform with SEO optimization',
                'long_description' => 'Dynamic blog platform with markdown support, comments, tags, and SEO-friendly URLs. Includes admin panel for content management.',
                'image' => 'https://via.placeholder.com/400x300?text=Blog',
                'link' => 'https://example.com',
                'github_link' => 'https://github.com',
                'technologies' => ['Laravel', 'Blade', 'MySQL', 'Bootstrap'],
                'order' => 3,
                'featured' => false,
            ],
            [
                'title' => 'Chat Application',
                'slug' => 'chat-application',
                'description' => 'Real-time chat application with messaging features',
                'long_description' => 'Real-time messaging platform with one-to-one and group chat capabilities, file sharing, and user presence indicators.',
                'image' => 'https://via.placeholder.com/400x300?text=Chat+App',
                'link' => 'https://example.com',
                'github_link' => 'https://github.com',
                'technologies' => ['Node.js', 'React', 'Socket.io', 'MongoDB'],
                'order' => 4,
                'featured' => false,
            ],
        ];

        foreach ($projects as $project) {
            Project::create($project);
        }
    }
}
