<?php

namespace App\Http\Middleware;

use App\Models\Manager;
use Closure;
use Illuminate\Support\Facades\Route;

class HasRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $route = Route::current()->getActionName();

        $id = session()->get('manager')->id;
        $manager = Manager::find($id);
        $roles = $manager->role;

        $perm_urls = [];
        foreach ($roles as $role) {
            foreach ($role->permission as $perm) {
                $perm_urls[] = $perm->url;
            }
        }
        $perm_urls = array_unique($perm_urls);
        // dd($perm_urls);

        if (in_array($route, $perm_urls)) {
            return $next($request);
        }

        return redirect('admin/noAccess');
    }
}
