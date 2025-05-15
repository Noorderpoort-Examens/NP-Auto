<?php

namespace App\Providers;

use Filament\Forms\Components\Field;
use Filament\Forms\Components\Placeholder;
use Filament\Tables\Columns\Column;
use Filament\Tables\Filters\BaseFilter;
use Illuminate\Support\ServiceProvider;

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
        //translates manually made fields such as form and column labels
        $this->autoTranslateLabels();
    }

    // this function was acquired from the official filament website (https://v2.filamentphp.com/tricks/automatic-label-translations).
    // It will translate non data fields like form labels and table headers, though resource names will have to be more thoroughly changed in the Filament resource file.
    private function autoTranslateLabels()
    {
        $this->translateLabels([
            Field::class,
            BaseFilter::class,
            Placeholder::class,
            Column::class,
        ]);
    }

    private function translateLabels(array $components = [])
    {
        foreach ($components as $component) {
            $component::configureUsing(function ($c): void {
                $c->translateLabel();
            });
        }
    }
}
