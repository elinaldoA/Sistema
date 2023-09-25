<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int id
 * @property string name
 * @property string originalName
 * @property string mimeType
 * @property string url
 * @property string path
 * @property string size
 */
class Files extends Model
{
    protected $fillable = [
        'name', 'originalName', 'mimeType', 'url', 'path', 'size',
    ];

    protected $hidden = [
        'created_at', 'updated_at'
    ];

    static public function path()
    {
        return '/file';
    }
}
