<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\History;
use App\Models\Employe;
use RealRashid\SweetAlert\Facades\Alert;

class LastLoginMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        /*    auth()->user()->update(['last_login' => now()]); */
        /*si el emplote existe  */
            $employe_id = $request->get('employe_id');
            $employe = Employe::where('employe_id', $employe_id)->first();
            if($employe){
            /* retorne la vista */

                 History::create([
                    'employe_id' => $employe->employe_id,
                    'last_login' => now()
                ]);
            }else{
                Alert::error('Error', 'Employee not found');
                return back();
            }


        return $next($request);
    }
}
