<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::guard('admin')->check()) {
            $orders = Order::all();
            return view('Admin.order.orders-list', compact('orders'));
        } elseif (Auth::guard('merchant')->check()) {
            $orders = Auth::guard('merchant')->user()->orders()->paginate(10);
            return view('Merchant.order.orders-list', compact('orders'));
        } else {
            $orders = Auth::user()->orders;
            return view('User.order.index', compact('orders'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrderRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
    public function details(Order $order)
    {
        if (Auth::guard('admin')->check()) {
            return view('Admin.order.order-details')->with(['order' => $order]);
        } elseif (Auth::guard('merchant')->check()) {
            return view('Merchant.order.order-details')->with(['order' => $order]);
        } elseif (Auth::guard('web')->check()) {
            return view('User.order.order-details')->with(['order' => $order]);
        }
    }
    public function unpaidOrders()
    {
        if (Auth::guard('admin')->check()) {
            $user = Auth::guard('admin')->user();
            $orders = $user->orders()->where('status', 'Unpaid')->paginate(10);
            return view('Admin.order.orders-list')->with(['orders' => $orders]);
        } elseif (Auth::guard('merchant')->check()) {
            $user = Auth::guard('merchant')->user();
            $orders = $user->orders()->where('status', 'Unpaid')->paginate(10);
            return view('Merchant.order.orders-list')->with(['orders' => $orders]);
        } elseif (Auth::guard('web')->check()) {
            $user = Auth::guard('web')->user();
            $orders = $user->orders()->where('status', 'Unpaid')->paginate(10);
            return view('User.order.orders-list')->with(['orders' => $orders]);
        }
    }
    public function pendingOrders()
    {
        if (Auth::guard('admin')->check()) {
            $user = Auth::guard('admin')->user();
            $orders = $user->orders()->where('status', 'Pending')->paginate(10);
            return view('Admin.order.orders-list')->with(['orders' => $orders]);
        } elseif (Auth::guard('merchant')->check()) {
            $user = Auth::guard('merchant')->user();
            $orders = $user->orders()->where('status', 'Pending')->paginate(10);
            return view('Merchant.order.orders-list')->with(['orders' => $orders]);
        } elseif (Auth::guard('web')->check()) {
            $user = Auth::guard('web')->user();
            $orders = $user->orders()->where('status', 'Pending')->paginate(10);
            return view('User.order.orders-list')->with(['orders' => $orders]);
        }
    }
    public function paidOrders()
    {
        if (Auth::guard('admin')->check()) {
            $user = Auth::guard('admin')->user();
            $orders = $user->orders()->where('status', 'Paid')->paginate(10);
            return view('Admin.order.orders-list')->with(['orders' => $orders]);
        } elseif (Auth::guard('merchant')->check()) {
            $user = Auth::guard('merchant')->user();
            $orders = $user->orders()->where('status', 'Paid')->paginate(10);
            return view('Merchant.order.orders-list')->with(['orders' => $orders]);
        } elseif (Auth::guard('web')->check()) {
            $user = Auth::guard('web')->user();
            $orders = $user->orders()->where('status', 'Paid')->paginate(10);
            return view('User.order.orders-list')->with(['orders' => $orders]);
        }
    }
    public function completedOrders()
    {
        if (Auth::guard('admin')->check()) {
            $user = Auth::guard('admin')->user();
            $orders = $user->orders()->where('status', 'Completed')->paginate(10);
            return view('Admin.order.orders-list')->with(['orders' => $orders]);
        } elseif (Auth::guard('merchant')->check()) {
            $user = Auth::guard('merchant')->user();
            $orders = $user->orders()->where('status', 'Completed')->paginate(10);
            return view('Merchant.order.orders-list')->with(['orders' => $orders]);
        } elseif (Auth::guard('web')->check()) {
            $user = Auth::guard('web')->user();
            $orders = $user->orders()->where('status', 'Completed')->paginate(10);
            return view('User.order.orders-list')->with(['orders' => $orders]);
        }
    }
    public function overdueOrders()
    {
        if (Auth::guard('admin')->check()) {
            $user = Auth::guard('admin')->user();
            $orders = $user->orders()->where('status', 'Overdue')->paginate(10);
            return view('Admin.order.orders-list')->with(['orders' => $orders]);
        } elseif (Auth::guard('merchant')->check()) {
            $user = Auth::guard('merchant')->user();
            $orders = $user->orders()->where('status', 'Overdue')->paginate(10);
            return view('Merchant.order.orders-list')->with(['orders' => $orders]);
        } elseif (Auth::guard('web')->check()) {
            $user = Auth::guard('web')->user();
            $orders = $user->orders()->where('status', 'Overdue')->paginate(10);
            return view('User.order.orders-list')->with(['orders' => $orders]);
        }
    }
    public function goBack(){
        return to_route('merchant.order.index');
    }
}
