@extends('layouts.app')
@section('content')
    <form action="{{ route('search') }}" method="post">
        @csrf
        <div class="row mt-5">
            <div class="col-md-8">
                <div class="form-group">
                    <input type="text" name="track_code" class="form-control" placeholder="Введите номер ШПИ" required>
                </div>
            </div>

            <div class="col-md-4">
                <button type="submit" class="btn btn-success">Поиск</button>
            </div>

            @if(isset($detail))
            <div class="col-md-8">
                <h4>Полный маршрут посылки</h4>
                <div class="col-md-12 col-lg-12">
                    <div id="tracking-pre"></div>
                    <div id="tracking">
                        <div class="text-center tracking-status-intransit">
                            <p class="tracking-status text-tight">Статус: {{ $detail->status }}</p>
                        </div>
                        <div class="tracking-list">
                            @foreach($events->events as $event)
                            <div class="tracking-item">
                                <div class="tracking-icon status-intransit">
                                    <svg class="svg-inline--fa fa-circle fa-w-16" aria-hidden="true" data-prefix="fas" data-icon="circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                        <path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8z"></path>
                                    </svg>
                                    <!-- <i class="fas fa-circle"></i> -->
                                </div>
                                <div class="tracking-date">{{ $event->date }}<span>{{ $event->activity[0]->time }}</span></div>
                                <div class="tracking-content">{{ $event->activity[0]->city }}, {{ $event->activity[0]->name }}, {{ $event->activity[0]->zip }}</div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <h4>Информация о посылке</h4>
                <hr>
                <p>Категория: {{ $detail->category }}</p>
                <p>Способ доставки: {{ $detail->delivery_method }}</p>
                <p>Вес: {{ $detail->weight }}</p>
                <p>Тип посылки: {{ $detail->package_type }}</p>
                <hr>
                <p>Получатель: {{ $detail->receiver->name }}</p>
                <p>Фактический получатель: {{ $detail->receiver->name_fact }}</p>
                <p>Страна: {{ $detail->receiver->country }}</p>
                <p>Адрес: {{ $detail->receiver->address }}</p>
                <hr>
                <p>Отправитель: {{ $detail->sender->country }}, {{ $detail->sender->name }}, {{ $detail->sender->address }}</p>
            </div>
            @endif
        </div>
    </form>
@stop
