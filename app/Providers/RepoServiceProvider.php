<?php

namespace App\Providers;

use App\Http\Repositories\Eloquent\BackpackItemRepo;
use App\Http\Repositories\Eloquent\BackpackRepo;
use App\Http\Repositories\Eloquent\CharacterLookRepo;
use App\Http\Repositories\Eloquent\CharacterLookVariantRepo;
use App\Http\Repositories\Eloquent\CharacterRepo;
use App\Http\Repositories\Eloquent\ItemRepo;
use App\Http\Repositories\Eloquent\LookVariantColorRepo;
use App\Http\Repositories\Eloquent\MonsterRepo;
use App\Http\Repositories\Eloquent\PlayerRepo;
use App\Http\Repositories\Eloquent\QuestRepo;
use App\Http\Repositories\Eloquent\UserRepo;
use App\Http\Repositories\Eloquent\WordRepo;
use App\Http\Repositories\IBackpackItemRepo;
use App\Http\Repositories\IBackpackRepo;
use App\Http\Repositories\ICharacterLookRepo;
use App\Http\Repositories\ICharacterLookVariantRepo;
use App\Http\Repositories\ICharacterRepo;
use App\Http\Repositories\IItemRepo;
use App\Http\Repositories\ILookVariantColorRepo;
use App\Http\Repositories\IMonsterRepo;
use App\Http\Repositories\IPlayerRepo;
use App\Http\Repositories\IQuestRepo;
use App\Http\Repositories\IUserRepo;
use App\Http\Repositories\IWordRepo;
use Illuminate\Support\ServiceProvider;

class RepoServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this -> app -> singleton(IUserRepo::class, UserRepo::class);
        $this -> app -> singleton(ICharacterRepo::class, CharacterRepo::class);
        $this -> app -> singleton(IPlayerRepo::class, PlayerRepo::class);
        $this -> app -> singleton(IItemRepo::class, ItemRepo::class);
        $this -> app -> singleton(ICharacterLookVariantRepo::class, CharacterLookVariantRepo::class);
        $this -> app -> singleton(ICharacterLookRepo::class, CharacterLookRepo::class);
        $this -> app -> singleton(ILookVariantColorRepo::class, LookVariantColorRepo::class);
        $this -> app -> singleton(IBackpackRepo::class, BackpackRepo::class);
        $this -> app -> singleton(IBackpackItemRepo::class, BackpackItemRepo::class);
        $this -> app -> singleton(IQuestRepo::class, QuestRepo::class);
        $this -> app -> singleton(IMonsterRepo::class, MonsterRepo::class);
        $this -> app -> singleton(IWordRepo::class, WordRepo::class);
    }
}
