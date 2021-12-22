<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Queue;

class QueueController extends Controller
{
    public function insert(Request $request)
    {
        //$this->validate();
        $transaction = new Queue;
        $transaction->produk_id = $request->produk_id;
        $transaction->qty = $request->qty;
        $transaction->total = $request->price * $request->qty;
        $transaction->save();

        session()->flash('message', 'product berhasil di tambah');
        return redirect()->back();
    }

    public function index()
    {
        $this->data['queues'] = Queue::get();
        $this->data['grand_total'] = Queue::sum('total');
        return view('user.cart', $this->data);
    }

    public function destroy($id)
    {
        $queue = Queue::findOrFail($id);

        $queue->delete();
        return redirect()->back();
    }

    public function save()
    {
        $transaction = Queue::get();
        app('App\Http\Controllers\OrderController')->store($transaction);
    }
}