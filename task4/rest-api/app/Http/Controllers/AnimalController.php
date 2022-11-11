<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnimalController extends Controller
{
    public $animals = [
        ['id' => 1, 'nama' => 'Ayam'],
        ['id' => 2, 'nama' => 'Angsa'],
        ['id' => 3, 'nama' => 'Jerapah'],
        ['id' => 4, 'nama' => 'Kambing'],
        ['id' => 5, 'nama' => 'Sapi'],
        ['id' => 6, 'nama' => 'Harimau '],
        ['id' => 7, 'nama' => 'Gajah'],
        ['id' => 8, 'nama' => 'Zebra'],

    ];
    public function index()
    {
        echo "Menampilkan Nama-nama hewan";
        echo "<br>";
        foreach ($this->animals as $animal) {
            echo $animal['id'] . ". " . $animal['nama'];
            echo "<br>";
        }
    }
    public function store(Request $request)
    {
        array_push($this->animals, ['id' => 9, 'nama' => $request->nama]);
        $this->index();
        echo "Menambahkan Nama Hewan : $request->nama <br>";
    }
    public function update(Request $request, $id)
    {
        array_splice($this->animals, $id - 1, 1, [['id' => $id, 'nama' => $request->nama]]);
        $this->index();
        echo "Memperbarui Nama Hewan : $request->nama";
    }
    public function destroy($id)
    {
        echo "Menghapus Hewan <br>";
        unset($this->animals[$id - 1]);
        foreach ($this->animals as $animal) {
            echo $animal['id'] . ". " . $animal['nama'];
            echo "<br>";
        }
    }
}