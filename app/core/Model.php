<?php
//namespace Traits;
use Http\{Request, Response};
use Database as DB;

/**
 * Model Class for Models
 * @param $request new Request()
 * @param $response new Response()
 */
abstract class Model {
    public ?Database $db = null;
    protected string $table;
    protected array $allowedColumns = [];
    public array $errors = [];
    
    public function __call($name, $args)
    {
        // "This method doesn\\'t exists !"
        if(!method_exists($this, $name))
            return false;
    }

    public function __construct()
    {
        global $request;
        $this->db = new DB;
        $this->errors = [];
    }
    

    abstract public function show(Request $request, Response $response);

    abstract public function store(Request $request, Response $response);

    abstract public function save(Request $request, Response $response);

    abstract public function update(Request $request, Response $response);

    abstract public function delete(Request $request, Response $response);
}