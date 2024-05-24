<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function index($id)
{
    $transaction = Transaction::findOrFail($id);
    return view('transactions.index')->with('transaction', $transaction);
}


    public function showCheckoutForm($product_id)
    {
        $product = Product::findOrFail($product_id);
        return view('transactions.checkout', compact('product'));
    }

    public function checkout(Request $request)
    {
        // Ambil data produk
        $product = Product::findOrFail($request->product_id);

        // Generate invoice number
        $invoiceNumber = 'INV-' . time();

        // Generate unique code
        $uniqueCode = rand(100, 999);

        // Hitung total
        $total = $product->price + $uniqueCode;

        // Tanggal kedaluwarsa
        $expirationDate = now()->addHours(3);

        // Buat transaksi baru
        $transaction = Transaction::create([
            'user_id' => Auth::id(),
            'product_id' => $product->id,
            'invoice_number' => $invoiceNumber,
            'admin_fee' => 5000, // Contoh biaya admin
            'unique_code' => $uniqueCode,
            'total' => $total,
            'payment_method' => 'Bank Transfer', // Contoh metode pembayaran
            'status' => 'pending',
            'expiration_date' => $expirationDate,
        ]);

        // Redirect ke halaman detail transaksi
        return redirect()->route('transactions.index', ['id' => $transaction->id]);
    }
}
