<?php

namespace App\Http\Controllers;

use App\Events\msgsend;
use App\Jobs\processPesan;
use App\Models\Pesan;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Inertia\Response;
class ChatController extends Controller
{

    public function index()
    {
      
        return Inertia::render('Chat/Chatting');
    }
    public function getMsg()  {
         return Pesan::with('user')->get();
    }
    public function getUserLogin()  {
         return Auth::user();
    }
     public function sendPesan(Request $request)
    {
    processPesan::dispatch();


}
    public function destroy(){
                Pesan::all()->delete();
            }
}
