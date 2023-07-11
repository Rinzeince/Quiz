<?php

namespace Database\Seeders;

use App\Models\Transaksi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransaksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $transaksis = [
            [
                "notransaksi"   => "0000010",
                "product_id"    => "1",
                "Qty"           => "2",
                "total"         => "200.000",

            ],
            [
                "notransaksi"   => "00000011",
                "product_id"    => "2",
                "Qty"           => "2",
                "total"         => "400.000",

            ],

        ];
        foreach ($transaksis as $transaksi) {
            Transaksi::Create([
                "notransaksi"   => $transaksi["notransaksi"],
                "product_id"    => $transaksi["product_id"],
                "Qty"           => $transaksi["Qty"],
                "total"         => $transaksi["total"],
            ]);
        }
    }
    }

