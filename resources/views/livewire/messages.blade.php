<div>
    @include('auth-header', ['title'=>'Chat'])

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css">
    <style>
        .card-header{
            background-color: #2C2F33 !important;
            color: white !important;
        }
        .avatar {
            height: 50px;
            width: 50px;
        }
        .list-group-item:hover, .list-group-item:focus {
            background: rgba(24,32,23,0.37);
            cursor: pointer;
        }
        .chatbox {
            height: auto !important;
            overflow-y: scroll;
            margin-bottom: 15px;
        }
        .message-box {
            height: 300px;
            overflow-y: scroll;
            display:flex; 
            flex-direction:column-reverse;
        }
        .single-message {
            background: #f1f0f0;
            border-radius: 12px;
            padding: 10px;
            margin-bottom: 10px;
            width: fit-content;
        }
        .received {
            margin-right: auto !important;
        }
        .sent {
            margin-left: auto !important;
            background :#5865F2;
            color: white!important;
        }
        .sent small {
            color: white !important;
        }
        .link:hover {
            list-style: none !important;
            text-decoration: none;
        }
        .online-icon {
            font-size: 11px !important;
        }

    </style>
    <div class="content">
        <div class="row justify-content-center" style="margin-top: 50px">
            @if (auth()->user()->is_admin == 1)
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            Users
                        </div>
                        <div class="card-body chatbox p-0">
                            <ul class="list-group list-group-flush">
                            @foreach($users as $user)

                                @if($user->id !== auth()->id())
                                    @php
                                        $not_seen = App\Models\Message::where('user_id',$user->id)->where('receiver_id',auth()->id())->where('is_seen',false)->get() ?? null

                                    @endphp
                                    <a wire:click="getUser({{ $user->id }})"  class="text-dark link">
                                        <li class="list-group-item">
                                            <img class="img-fluid avatar" src="{{ asset('img/chat.png') }}">
                                            @if($user->is_online == true)
                                                <i class="fa fa-circle text-success online-icon">
                                            @endif

                                            </i> {{$user->username}}
                                            @if(filled($not_seen))
                                                <div class="badge badge-success rounded text-black"> {{ $not_seen->count()}} </div>
                                            @endif
                                        </li>
                                    </a>
                                @endif
                            @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @endif

            <div class="col-md-8" >
                <div class="card">
                    <div class="card-header">
                        <i class="far fa-comments"></i> @if(isset($sender)) &nbsp;&nbsp;{{$sender->username}}   @endif
                    </div>
                    <div class="card-body message-box" wire:poll="mountdata">
                        @if(filled($allmessages))
                                @foreach($allmessages as $mgs)
                                    <div class="single-message @if($mgs->user_id == auth()->id()) sent @else received @endif">
                                        <p class="font-weight-bolder my-0"></p>
                                            {{ $mgs->message}}
                                        <br><small class="text-muted w-100">Sent <em>{{$mgs->created_at}}</em></small>
                                    </div>
                                @endforeach
                            @else
                                @if (!isset($sender))
                                    <h5 style="color:blue">You Need To chose User</h5>
                                @else
                                    <h5 style="color:blue">Say Hi to {{ $sender->username }}</h5>
                                @endif
                        @endif
                        
                    </div>
                    @if ($customService)
                        <div class="single-message received">
                            <p class="font-weight-bolder my-0"></p>
                            Hi, How can I help you?<br>
                            <button class="btn btn-secondary btn-sm" wire:click="sendCustomMessage(1)">deposit</button>
                            <button class="btn btn-secondary btn-sm" wire:click="sendCustomMessage(2)">withdrawal</button>
                            <button class="btn btn-secondary btn-sm" wire:click="sendCustomMessage(3)">service</button>
                        </div>
                    @endif
                    <div class="card-footer">
                        <form wire:submit.prevent="SendMessage">
                            @if(!isset($sender))
                                <div class="row">
                                    <div class="col-md-8">
                                            <input
                                            class="form-control input shadow-none w-100 d-inline-block mt-2"
                                            placeholder="Type a message" wire:model="message" disabled>
                                    </div>
                                    <div class="col-md-4">
                                            <button type="submit"
                                            class="btn btn-success d-inline-block w-100 mt-2" style="background-color: #5865F2; border-color: #5865F2" disabled>
                                            <i class="far fa-paper-plane" ></i> Send</button>
                                    </div>
                                </div>
                            @else
                            <div class="row">
                                <div class="col-md-8">
                                    <input 
                                    class="form-control input shadow-none w-100 d-inline-block mt-2"
                                    placeholder="Type a message" wire:model="message" required>
                                </div>
                                <div class="col-md-4">
                                    <div class="row">
                                        <div class="col-3" style="padding-right: 0; text-align: right;">
                                            <button type="button" class="btn btn-secondary mt-2">
                                                <i class="fas fa-paperclip"></i>
                                            </button>
                                        </div>
                                        <div class="col-9" style="padding-left: 0">
                                            <button type="submit"
                                            class="btn btn-primary d-inline-block w-100 text-white mt-2" style="background-color: #5865F2; border-color: #5865F2; " @if(!$message) disabled @endif>
                                            <i class="far fa-paper-plane text-white"></i> Send
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
