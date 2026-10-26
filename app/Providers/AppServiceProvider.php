<?php

namespace App\Providers;

use App\Models\Artikel;
use App\Models\Level;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();

        Gate::define('lihat-tabel-data', function (User $user) {
            return $user->level_id === Level::ADMINISTRATOR || $user->level_id === Level::EDITOR;
        });

        Gate::define('tambah-artikel', function (User $user) {
            return in_array($user->level_id, [Level::ADMINISTRATOR, Level::EDITOR, Level::PENULIS]);
        });

        Gate::define('ubah-artikel', function (User $user, Artikel $artikel) {
            if ($user->level_id === Level::ADMINISTRATOR || $user->level_id === Level::EDITOR) {
                return true;
            }
            if ($user->level_id === Level::PENULIS) {
                return $artikel->penulis_id === $user->id;
            }
            return false;
        });

        Gate::define('hapus-artikel', function (User $user) {
            return $user->level_id === Level::ADMINISTRATOR;
        });

        Gate::define('kelola-user', function (User $user) {
            return $user->level_id === Level::ADMINISTRATOR;
        });
    }
}
