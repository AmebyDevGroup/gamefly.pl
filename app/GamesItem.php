<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GamesItem extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'code',
        'comments',
        'loaned',
    ];

    public function game()
    {
        return $this->belongsTo(Game::class);
    }

    public function serial()
    {
        $template = 'XX99-X99X-99XX';
        $k = strlen($template);
        $sernum = ($this->id % 10) . ($this->game->id % 10) . 'GF-';
        for ($i = 0; $i < $k; $i++) {
            switch ($template[$i]) {
                case 'X':
                    $sernum .= chr(rand(65, 90));
                    break;
                case '9':
                    $sernum .= rand(0, 9);
                    break;
                case '-':
                    $sernum .= '-';
                    break;
            }
        }
        $sernum .= '-' . dechex(Carbon::now()->addMonth()->timestamp);
        return strtoupper($sernum);
    }
}
