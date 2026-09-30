<?php
namespace App\Controllers;

use Database\MySQLi\Connection;

class IncomesController{
    public function index() {
        
    }

    public function create() {
        
    }

    public function store($data) {
        $connection = Connection::getInstance()->get_database_instance();

        $stmt = $connection->prepare("INSERT INTO incomes (payment_method, type, date, amount, description) VALUES(?,?,?,?,?);");

        $stmt->bind_param("iisds", $paymen_method, $type, $date, $amount, $description);
        $paymen_method  =   $data['payment_method'];
        $type           =   $data['type'];
        $date           =   $data['date'];
        $amount         =   $data['amount'];
        $description    =   $data['description'];

        $stmt->execute();
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