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

        while($row = $stmt->fetch())
            echo "Ganaste " . $row["amount"] . " USD en: " . $row["description"] . "\n";
    }

    public function create() {
        
    }

    public function store($data) {
        $stmt = $this->connection->prepare("INSERT INTO incomes (payment_method, type, date, amount, description) VALUES (:payment_method, :type, :date, :amount, :description);");
        $stmt->bindValue(":payment_method", $data["payment_method"]);
        $stmt->bindValue(":type", $data["type"]);
        $stmt->bindValue(":date", $data["date"]);
        $stmt->bindValue(":amount", $data["amount"]);
        $stmt->bindValue(":description", $data["description"]);


        $stmt ->execute();

        echo "Se han insertado {$stmt->affected_rows} filas en la base de datos";
        /*
        {$data['payment_method']},
        {$data['type']},
        '{$data['date']}',
        {$data['amount']},
        '{$data['description']}'
        */
    }

    public function show() {
        
    }

    public function edit() {
        
    }

    public function update() {
        
    }

    public function destroy() {
        
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