<?php

namespace App\Imports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Auth;


class ProductsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    // public function model(array $row)
    // {
    //     return new Product([
    //         'user_id'     => $row['user_id'],
    //         'image'       => $row['image'],
    //         'name'        => $row['name'],
    //         'weight'      => $row['weight'],
    //         'price'       => $row['price'],
    //         'condition'   => $row['condition'],
    //         'stock'       => $row['stock'],
    //         'description' => $row['description']
    //     ]);
    // }

    public function model(array $row)
{
    // Mendapatkan ID pengguna yang diautentikasi
    $user_id = Auth::id();

    // Pastikan data 'condition' sesuai dengan tipe data ENUM dan panjang maksimum
    $condition = isset($row['condition']) ? substr($row['condition'], 0, 255) : null;

    // Jika nilai 'condition' tidak valid, atur nilai default menjadi 'Baru'
    if (!in_array($condition, ['Baru', 'Bekas'])) {
        $condition = 'Baru';
    }

    // Kembalikan objek Product dengan data yang telah divalidasi
    return new Product([
        'user_id'     => $user_id,
        'image'       => $row['image'] ?? 'default.jpg',
        'name'        => $row['name'] ?? null,
        'weight'      => $row['weight'] ?? null,
        'price'       => $row['price'] ?? null,
        'condition'   => $condition,
        'stock'       => $row['stock'] ?? null,
        'description' => $row['description'] ?? null
    ]);
}
}
