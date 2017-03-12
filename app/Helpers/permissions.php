<?php 


function check_user_permissions($request, $actionName = NULL, $id = NULL)
{
 	// dapatkan user login saat ini
    $currentUser = $request->user();

    if ($actionName) 
    {
    	$currentActionName = $actionName;
    }
    else {
	    // mendapatkan ActionName dan menampungnya pada $currentActionName
	    $currentActionName = $request->route()->getActionName();
    }
    //memisahkan tanda @ pada ActionName dan menampung dalam list $controller dan $method
    list($controller, $method) = explode('@', $currentActionName);
    // menghilangkan separation beserta string pada sparation sebelum controller
    $controller = str_replace(["App\\Http\\Controllers\\Backend\\", "Controller"], "", $controller);

    $crudPermissionsMap = [
        // 'create' => ['create', 'store'],
        // 'update' => ['edit', 'update'],
        // 'delete' => ['destroy', 'restore', 'forceDestroy'],
        // 'read' => ['index', 'view']
        'crud' => ['create', 'store', 'edit', 'update', 'destroy', 'restore', 'forceDestroy', 'index', 'view']
    ];

    $classesMap = [
        'Blog' => 'post',
        'Categories' => 'category',
        'Users' => 'user'
    ];

    foreach ($crudPermissionsMap as $permission => $methods) 
    {
        //jika method ada dalam mehod ini
        //kita akan cek permisi
        if (in_array($method, $methods) && isset($classesMap[$controller]))
        {
            $className = $classesMap[$controller];

            if ($className == 'post' && in_array($method, ['edit', 'update', 'destroy', 'restore', 'forceDestroy']))
            {

            	$id = !is_null($id) ? $id : $request->route("blog");
                // jika user saat ini tidak bisa update post lain dan delete permisi
                // maka hanya diperbolehkan untuk pemilik postingan
                if ($id && (!$currentUser->can('update-other-post') || $currentUser->can('delete-other-post')) )
                {
                    $post = \App\Post::find($id);
                    if ($post->author_id !== $currentUser->id) {
                        return false;
                    }
                }
                
            }
            // jika user tidak ada permision maka akan di btolak
            elseif (!$currentUser->can("{$permission}-{$className}"))
            {
                return false;
            }
            break;
        }
    }
    
    return true;
}
