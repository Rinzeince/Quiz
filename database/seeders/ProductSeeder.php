<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                "nama"      => "kerudung",
                "status"    => "Tersedia",
                "stok"      => "100",
                "harga"     => "100.000",

            ],
            [
                "nama"      => "Celana",
                "status"    => "tersedia",
                "stok"      => "100",
                "harga"     => "200.000",
            ],

            [
                "nama"      => "Baju",
                "status"    => "tersedia",
                "stok"      => "50",
                "harga"     => "50.000",
            ],
            [
                "nama"      => "Kaos Kaki",
                "status"    => "tersedia",
                "stok"      => "50",
                "harga"     => "2.000",
            ],
            [
                "nama"      => "Kue",
                "status"    => "tersedia",
                "stok"      => "10",
                "harga"     => "100.000",
            ],
            [
                "nama"      => "Gulali",
                "status"    => "tersedia",
                "stok"      => "50",
                "harga"     => "20.000",
            ],
            [
                "nama"      => "Jaket",
                "status"    => "tersedia",
                "stok"      => "100",
                "harga"     => "200.000",
            ],
            [
                "nama"      => "Ciput",
                "status"    => "tersedia",
                "stok"      => "100",
                "harga"     => "5.000",
            ],
            [
                "nama"      => "Sepatu",
                "status"    => "tersedia",
                "stok"      => "100",
                "harga"     => "200.000",
            ],
            [
                "nama"      => "Jam Tangan",
                "status"    => "tersedia",
                "stok"      => "100",
                "harga"     => "100.000",
            ],

        ];
        foreach ($products as $product) {
            Product::Create([
                "nama"      => $product["nama"],
                "status"    => $product["status"],
                "stok"      => $product["stok"],
                "harga"     => $product["harga"],
            ]);
        }
    }
}
