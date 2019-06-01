<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use Illuminate\Support\Facades\Auth;

class Admin
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
        
        if (Auth::guest())
        {
            return redirect('/');
        }
 
        $user = auth()->user();

        $roles = array();
        foreach ($user->roles as $role)
        {
            $roles[] = $role->name;
        }

        for ($i = 0; $i < count($roles); $i++)
        {
            if ($roles[$i] === 'Admin') 
            {
                return $next($request);
            }
        }
        return back();
        
    }
}
