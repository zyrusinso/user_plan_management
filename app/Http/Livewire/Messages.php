<?php

namespace App\Http\Livewire;

use App\Models\Message;
use Livewire\Component;
use App\Models\User;

class Messages extends Component
{
    public $message;
	public $allmessages;
	public $sender;

    public $customService = true;
    
    public function render()
    {
        if(auth()->user()->is_admin == 1){
            $users = User::all();
            $this->customService = false;
        }else{
            $users = User::where('is_admin', 1)->get();
            $this->sender = User::first();
        }
    	$sender = $this->sender;
    	$this->allmessages;
        return view('livewire.messages', compact('users','sender'))->layout('layouts.frontend');
    }

    public function mountdata()
    {
        if(isset($this->sender->id))
        {
              $this->allmessages = Message::where('user_id',auth()->id())
                                        ->where('receiver_id',$this->sender->id)
                                        ->orWhere('user_id',$this->sender->id)
                                        ->where('receiver_id',auth()->id())
                                        ->orderBy('id','desc')->get();

               $not_seen = Message::where('user_id',$this->sender->id)->where('receiver_id',auth()->id());
               $not_seen->update(['is_seen'=> true]);
        }
    }
    
    public function resetForm()
    {
    	$this->message='';
    }

    public function SendMessage()
    {
    	$data=new Message;
        $data->message = $this->message;
        $data->user_id = auth()->id();
        $data->receiver_id = $this->sender->id;
        $data->save();

    	$this->resetForm();
    }

    public function sendCustomMessage($id){
        $this->customService = false;
        $userId = User::first();
        $message = '';

        if($id == 1){
            $message = 'please send the minimum amount to X adress with uploading a screenshot.';
        }
        if($id == 2){
            $message = 'please enter your wallet adress and allow for confirmation.';
        }

        if($message != ''){
            $data = new Message;
            $data->message = $message;
            $data->user_id = $userId->id;
            $data->receiver_id = auth()->id();
            $data->save();
        }
    }

    public function getUser($userId)
    {
       $user = User::find($userId);
       $this->sender = $user;
       $this->allmessages = Message::where('user_id',auth()->id())
                                    ->where('receiver_id',$userId)
                                    ->orWhere('user_id',$userId)
                                    ->where('receiver_id',auth()->id())
                                    ->orderBy('id','desc')->get();
    }

}
