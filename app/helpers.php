<?php

use Illuminate\Support\Facades\Route;

function in_route($route)
{
          if (is_array($route))
                    foreach ($route as $r)
                              if (Route::is($r))
                                        return true;
          return Route::is($route);
}
