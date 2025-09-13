<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VideoGallery extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'description',
        'video_url',
        'video_type',
        'thumbnail_path',
        'is_active',
        'sort_order'
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function getEmbedUrlAttribute()
    {
        if ($this->video_type === 'youtube') {
            $videoId = $this->extractYouTubeId($this->video_url);
            return "https://www.youtube.com/embed/{$videoId}";
        } elseif ($this->video_type === 'vimeo') {
            $videoId = $this->extractVimeoId($this->video_url);
            return "https://player.vimeo.com/video/{$videoId}";
        }
        return $this->video_url;
    }

    private function extractYouTubeId($url)
    {
        preg_match('/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/', $url, $matches);
        return $matches[1] ?? '';
    }

    private function extractVimeoId($url)
    {
        preg_match('/vimeo\.com\/(\d+)/', $url, $matches);
        return $matches[1] ?? '';
    }
}
