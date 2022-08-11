<?php

namespace App\Models;

use Illuminate\Support\Facades\Route;

class CustomHelper
{

  private const YEAR_FOUNDED = 2021;


  public function displayYear() 
  {

    $currentYear = now()->year;

    return self::YEAR_FOUNDED === $currentYear ? self::YEAR_FOUNDED : self::YEAR_FOUNDED . '-' . $currentYear;
  }
  public function activeLink($link) :string
  {

    return Route::current()->getName() === $link ? 'active' : '';
  }

  public function getStorageImage(string $image) :string
  {
    return asset('storage/images/' . $image);
  }

  public function getPublicImage(string $image) :string
  {
    return asset('images/' . $image);
  }

  public function breadcrumb($title) :string
  {
    return
      '<nav style="--bs-breadcrumb-divider: \'>\';" aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/">Home</a></li>
          <li class="breadcrumb-item active text-capitalize" aria-current="page">' . $title . '</li>
        </ol>
      </nav>';
  }

  public static function getMessageIcon($messageType) :string
  {
    return match ($messageType)
    {
      'success' => 'check-circle-fill',
      'danger' => 'exclamation-triangle-fill',
      default => 'info-fill',
    };

  }
}
