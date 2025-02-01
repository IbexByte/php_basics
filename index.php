<?php  

require './_init.php';

 

Router::make()
->get('',"./app/Controllers/index.php" )
->get('about',"./app/Controllers/about.php" )
->post('create/task',"./app/Controllers/task.create.php" )
->resolve(Request::uri() , Request::method());
 

 