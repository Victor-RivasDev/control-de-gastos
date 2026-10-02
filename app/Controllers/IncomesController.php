<?php
namespace App\Controllers;

use Database\PDO\Connection;

class IncomesController{
    private $connection;
    public function __construct()
    {
        $this->connection = Connection::getInstance()->get_database_instance();
    }


    public function index() {
        $stmt = $this->connection->prepare("SELECT * FROM incomes");
        $stmt->execute();


        $results = $stmt->fetchAll();
        require("../resources/views/incomes/index.php");
    }

    public function create() {
        require("../resources/views/incomes/create.php");
    }

    public function store($data) {
        $stmt = $this->connection->prepare("INSERT INTO incomes (payment_method, type, date, amount, description) VALUES (:payment_method, :type, :date, :amount, :description);");
        $stmt->bindValue(":payment_method", $data["payment_method"]);
        $stmt->bindValue(":type", $data["type"]);
        $stmt->bindValue(":date", $data["date"]);
        $stmt->bindValue(":amount", $data["amount"]);
        $stmt->bindValue(":description", $data["description"]);


        $stmt ->execute();

        header("Location: /incomes");
        
    }

    public function show($id) {
        $stmt = $this->connection->prepare("SELECT * FROM incomes WHERE id=:id;");
        $stmt->execute([
            ":id" => $id
        ]);
    }

    public function edit() {}

    public function update($data, $id) {
        $stmt = $this->connection->prepare("UPDATE incomes SET
        payment_method  =   :payment_method,
        type            =   :type,
        date            =   :date,
        amount          =   :amount,
        description     =   :description,
    Where id=:id;");

    $stmt->execute([
        ":id"               =>  $id,
        ":payment_method"   =>  $data["payment_method"],
        ":type"             =>  $data["type"],
        ":date"             =>  $data["date"],
        ":amount"           =>  $data["amount"],
        ":description"      =>  $data["description"]
    ]);
    }

    public function destroy($id) {
        // $this->connection->beginTransaction();
        $stmt = $this->connection->prepare("DELETE FROM incomes WHERE id = :id");
        $stmt->execute([
            ":id" => $id
        ]);

        // $sure = readline("De verdad quieres eliminar este registro? ");
        // if ($sure == "no")
        //     $this->connection->rollback();
        // else
        //     $this->connection->commit();
    }
}


/*
index       ->      Display a listing of the resource.
create      ->      Show the form for creating a new resource.
store       ->      Store a newly created resource in storage.
show        ->      Display the specified resource.
edit        ->      Show the form for editing the specified resource.
update      ->      Update the specified resource in storage.
destroy     ->      Remove the specified resource from storage.
*/