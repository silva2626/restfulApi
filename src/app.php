<?php 


include __DIR__ . "\..\\vendor\autoload.php";

use Api\Db;

$config = ['settings' => [
    'addContentLengthHeader' => false,
]];

$app = new \Slim\App($config);

$app->get('/courses', function($request, $response) {
    try
    {
        $db = new Db();
        if(isset($request->getQueryParams()['query'])){
            $query = $db
                    ->getQb()
                    ->table('courses')
                    ->where('name','LIKE','%' . $request->getQueryParams()['query'] . '%');
            $course = $query->get();
            return $response->write(json_encode($course));
    }
        else
        {
            $query = $db->getQb()->table('courses')->select('*');
            return $response->write(json_encode($query->get()));
        }
    }
    catch(Exception $e)
    {
        return $response->write(json_encode(array('msg' => $e->getMessage())))
                        ->withStatus(500);
    }
});

$app->get('/courses/{id}', function($request, $response, $args){
    $db = new Db();
    $query = $db
            ->getQb()
            ->table('courses')
            ->where('id',$args['id']);
    $course = $query->first();
    return $response->write(json_encode($course));
});


$app->post('/courses', function($request, $response) {
    
    $course = $request->getParsedBody();
    $db = new Db();
    try{
        $insertId = $db
                    ->getQb()
                    ->table('courses')
                    ->insert($course);
        return $response->withStatus(204);
    }
    catch(Exception $e){
        return $response->write(json_encode(array('msg' => $e->getMessage())))->withStatus(500);
    }
    
});

$app->put('/courses/{id}', function($request, $response, $args){
    $course = $request->getParsedBody();
    $db = new Db();
    try{
        $db->getQb()->table('courses')->where('id', $args['id'])->update($course);
        return $response->withStatus(204);
    }
    catch(Exception $e){
        return $response->write(json_encode(array('msg' => $e->getMessage())))->withStatus(500);
    } 
});

$app->delete('/courses/{id}', function($request,$response,$args){
    $db = new Db();
    try{
        $db->getQb()->table('courses')->where('id', $args['id'])->delete();
        return $response->withStatus(204);
    }
    catch(Exception $e){
        return $response->write(json_encode(array('msg' => $e->getMessage())))->withStatus(500);
    } 
});
$app->run();