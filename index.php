<?php  

require './_init.php';

 

Router::make()
->get('',[TaskController::class , 'index'] )
->get('about',"./app/Controllers/about.php" )
->post('create/task',[TaskController::class , 'create']  )
->resolve(Request::uri() , Request::method());
 

 