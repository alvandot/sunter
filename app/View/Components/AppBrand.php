<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AppBrand extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return <<<'HTML'
                <a href="/" wire:navigate class="transition-all duration-300 hover:scale-105">
                    <!-- Hidden when collapsed -->
                    <div {{ $attributes->class(["hidden-when-collapsed"]) }}>
                        <div class="flex justify-center items-center gap-1">
                            <img src="{{ asset('storage/logo.png') }}" alt="logo" class="w-auto h-20 animate-pulse">
                            <span class="font-extrabold text-4xl me-3 bg-gradient-to-r from-purple-600 to-pink-400 bg-clip-text text-transparent animate-text">
                                Sinteta
                            </span>
                        </div>
                    </div>

                    <!-- Display when collapsed -->
                    <div class="display-when-collapsed hidden mx-5 mt-4 lg:mb-6 h-[28px]">
                        <x-icon name="s-square-3-stack-3d" class="w-8 -mb-1 text-purple-500 animate-bounce" />
                    </div>
                </a>
            HTML;
    }
}
