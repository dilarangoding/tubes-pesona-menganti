<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Penginapan;
use App\Models\Kuliner;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class FrontController extends Controller
{
    public function index()
    {
        $kuliner = Kuliner::orderBy('created_at', 'DESC');
        if (request()->price != '') {
            $kuliner = $kuliner->where('price', request()->price);
        }

        if (request()->distance != '') {
            $kuliner = $kuliner->where('distance', request()->distance);
        }

        $kuliner = $kuliner->get();


        return view('front.index', compact('kuliner'));
    }

    public function penginapan()
    {
        $penginapan = Penginapan::orderBy('created_at', 'DESC');
        if (request()->price != '') {
            $penginapan = $penginapan->where('price', request()->price);
        }

        if (request()->distance != '') {
            $penginapan = $penginapan->where('distance', request()->distance);
        }

        $penginapan = $penginapan->get();

        return view('front.penginapan', compact('penginapan'));
    }

    public function kuliner()
    {
        $kuliner = Kuliner::orderBy('created_at', 'DESC');
        if (request()->price != '') {
            $kuliner = $kuliner->where('price', request()->price);
        }

        if (request()->distance != '') {
            $kuliner = $kuliner->where('distance', request()->distance);
        }

        $kuliner = $kuliner->get();

        return view('front.kuliner', compact('kuliner'));
    }

    public function sendTestEmail()
    {
        $to_email = 'recipient@example.com';

        try {
            Mail::raw('This is a test email', function ($message) use ($to_email) {
                $message->to($to_email)
                    ->subject('Test Email');
            });

            Log::channel('maillog')->info('Test email sent successfully to ' . $to_email);
            return 'Test email sent!';
        } catch (\Exception $e) {
            Log::channel('maillog')->error('Failed to send test email: ' . $e->getMessage());
            return 'Failed to send test email.';
        }
    }
}
