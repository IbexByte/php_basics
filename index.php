<?php  

require './_init.php';

 

Router::make()
->get('',[TaskController::class , 'index'] )
->get('about',"./app/Controllers/about.php" )
->post('create/task',[TaskController::class , 'create']  )
->post('delete/task',[TaskController::class , 'delete']  )
->post('update/task',[TaskController::class , 'update']  )
->resolve(Request::uri() , Request::method());
 

 