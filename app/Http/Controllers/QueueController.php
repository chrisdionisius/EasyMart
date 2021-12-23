<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Queue;
use App\Order;

class QueueController extends Controller
{
    public function insert(Request $request)
    {
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
        if (Queue::count()>0) {
            $transaction = Queue::get();
            app('App\Http\Controllers\OrderController')->store($transaction);
        
            foreach ($transaction as $key => $value) {
                app('App\Http\Controllers\OrderDetailController')->store($value);
                app('App\Http\Controllers\TransaksiController')->penjualan($value);
                Queue::where('id', $value->id)->delete();
            }
            return $this->confirmation();
        }
        else {
            return redirect()->back();
        }
    }

    public function confirmation()
    {
        $this->data['order'] = Order::latest()->first();
        return view('user.checkout', $this->data);
    }
}