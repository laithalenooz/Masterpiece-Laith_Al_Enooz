<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    protected $fillable = [
        'website_name', 'website_logo', 'website_favicon'
    ];

    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {
        Settings::factory()
            ->count(1)
            ->create();
    }
}
