<?php
// B180910062 Dulguun
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $roles)
    {
        // if (!Auth::check()) //
        // return redirect('login');

        $user = Auth::user();

        if($user->isAdmin())
            return $next($request);
        if(gettype($roles) == 'string'){
            if($user->hasRole($roles))
                return $next($request);
        } else{
            foreach($roles as $role) {
                if($user->hasRole($role))
                    return $next($request);
            }
        }

        return redirect('login');
    }
}
