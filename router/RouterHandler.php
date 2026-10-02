<?php

namespace Router;

class RouterHandler {
    protected $method;
    protected $data;

    public function set_method($method){
        $this->method = $method;
    }

    public function set_data($data){
        $this->data = $data;
    }

    public function route($controller, $id)
    {
        $resource = new $controller();

        switch($this->method){
            case "get":
                if ($id && $id == "create")
                    $resource->create();
                elseif ($id)
                    $resource->show($id);
                else
                    $resource->index();
                break;
            case "post":
                $resource->store($this->data);
                break;
            case "put":
                if ($id)
                    $resource->update($id, $this->data);
                else
                    echo "ID is required for PUT method";
                break;
            case "delete":
                if ($id)
                    $resource->destroy($id);
                else
                    echo "ID is required for DELETE method";
                break;
            default:
                echo "Invalid method";
                break;
        }
    }
}