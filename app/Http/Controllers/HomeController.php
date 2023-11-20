<?php

namespace App\Http\Controllers;

use App\Enums\PropertyStatus;
use App\Models\Investment;
use App\Models\Property;
use App\Models\Selling;
use App\Models\Transaction;
use App\Models\User;
use Carbon\Carbon;
use DateInterval;
use DatePeriod;
use DateTime;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function index()
    {
        $data['week_dates'] = $this->week_dates();
        $data['formatted_week_dates'] = $this->week_days();

        // property total
        $data['properties_total_price'] = Property::sum('price');
        $data['property_status'] = [];
        foreach (array_column(PropertyStatus::cases(), 'value') as $status) {
            if ($status === 'avaialble') {
                $item['bg'] = 'bg-success';
            } elseif ($status === 'funded') {
                $item['bg'] = 'bg-primary';
            } else {
                $item['bg'] = 'bg-danger';
            }

            $item['name'] = ucfirst($status);
            $item['total'] = Property::whereStatus($status)->sum('price');

            $data['property_status'][] = $item;
        }

        // selling requests
        $data['selling_requests'] = Selling::week()->count();
        $data['per_day_selling_requests'] = [];
        foreach ($data['week_dates'] as $date) {
            $data['per_day_selling_requests'][] = Selling::whereDate('created_at', $date)->count();
        }

        // weekly_investors
        $data['weekly_investors'] = Investment::week()->count();
        $data['per_day_investors'] = [];
        foreach ($data['week_dates'] as $date) {
            $data['per_day_investors'][] = Investment::whereDate('created_at', $date)->count();
        }

        // customers this week
        $customers = User::week()->get();
        $data['weekly_customers'] = $customers->count();
        $data['first_five_customers'] = $customers->take(5);
        $data['customers_after_five'] = $data['weekly_customers'] - 5;
        // dd($data['customers_after_five']);

        // total investment this week
        $data['investment_this_week'] = Investment::week()->sum('amount');
        $data['per_day_investment'] = [];
        $data['per_day_investment'][] = 0;
        foreach ($data['week_dates'] as $date) {
            $data['per_day_investment'][] = Investment::whereDate('created_at', $date)->sum('amount');
        }
        $data['per_day_investment'][] = 0;
        $data['investment_dates'] = [];
        $data['investment_dates'][] = "";
        foreach ($data['week_dates'] as $date) {
            $data['investment_dates'][] = Carbon::parse($date)->format('M d');
        }
        $data['investment_dates'][] = "";

        $data['latest_transaction'] = Transaction::with('user')->latest()->take(10)->get();

        return view('dashboard', compact('data'));
    }

    private function week_dates()
    {
        $start = now()->startOfWeek();
        $end = now()->endOfWeek();
        $format = 'Y-m-d';

        $array = array();
        $interval = new DateInterval('P1D');

        $realEnd = new DateTime($end);
        $realEnd->add($interval);

        $period = new DatePeriod(new DateTime($start), $interval, $realEnd);

        foreach ($period as $date) {
            $array[] = $date->format($format);
        }

        return $array;
    }

    private function week_days()
    {
        $dates = [];
        foreach ($this->week_dates() as $date) {
            $dates[] = Carbon::parse($date)->toFormattedDateString();
        }
        return $dates;
    }
}
