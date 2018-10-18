<?php

namespace App\Http\Middleware;

use App\Post;
use Closure;

class CheckPermissionsMiddleware
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
        //get current user
        $currentUser = $request->user();

     //get current action name
        $currentActionName = $request->route()->getActionName();
        list($controller, $method) = explode('@', $currentActionName);
        $controller = str_replace(["App\\Http\\Controllers\\Backend\\", "Controller"],"",$controller);
/*        dd("C: $controller M: $method");*/
        $crudPermissionsMap = [
            'crud' => ['create', 'store', 'edit','update','destroy','restore','forceDestroy','index', 'view']
        ];
        $classesMap = [
            'Blog' => 'post',
            'Categories' => 'category',
            'Users' => 'user'
        ];
        foreach ($crudPermissionsMap as $permission => $methods){
            if(in_array($method,$methods) && isset($classesMap[$controller])){
                $className = $classesMap[$controller];
/*                dd("{$permission}-{$className}");*/
                if($className == 'post' && in_array($method,['edit','update','destroy','restore','forceDestroy'])){
                    if(($id = $request->route("blog")) && (!$currentUser->can('update-others-post') || !$currentUser->can("delete-others-post"))){
                        $post = Post::find($id);
                        if ($post->author_id != $currentUser->id){
                            abort(403,"Forbidden access!");
                        }
                    }
                }
                else if(! $currentUser->can("{$permission}-{$className}")){
                    abort(403,"Forbidden access!");
                }
                break;
            }
        }
        return $next($request);
    }
}
