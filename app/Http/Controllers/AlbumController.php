<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class AlbumController extends Controller
{
    public function index(): View
    {
        // Sample album data with images
        $albums = [
            [
                'id' => 1,
                'title' => 'Travel Adventures',
                'description' => 'Amazing moments from my travels around the world',
                'image' => 'https://images.unsplash.com/photo-1488646953014-85cb44e25828?w=500',
                'count' => 12
            ],
            [
                'id' => 2,
                'title' => 'Coffee Moments',
                'description' => 'My favorite coffee shops and matcha experiences',
                'image' => 'https://images.unsplash.com/photo-1509042239860-f550ce710b93?w=500',
                'count' => 24
            ],
            [
                'id' => 3,
                'title' => 'Workspace Setup',
                'description' => 'My creative workspace and tech setup',
                'image' => 'https://images.unsplash.com/photo-1517694712202-14dd9538aa97?w=500',
                'count' => 18
            ],
            [
                'id' => 4,
                'title' => 'Events & Meetups',
                'description' => 'Tech events and community gatherings',
                'image' => 'https://images.unsplash.com/photo-1540575467063-178f50002cbc?w=500',
                'count' => 30
            ],
            [
                'id' => 5,
                'title' => 'Nature Walks',
                'description' => 'Beautiful nature photography and outdoor adventures',
                'image' => 'https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=500',
                'count' => 27
            ],
            [
                'id' => 6,
                'title' => 'Photography',
                'description' => 'Creative photography projects and experiments',
                'image' => 'https://images.unsplash.com/photo-1502920917128-1aa500764cbd?w=500',
                'count' => 15
            ]
        ];

        return view('album.index', compact('albums'));
    }
}
