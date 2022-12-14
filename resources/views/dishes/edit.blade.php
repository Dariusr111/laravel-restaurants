@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Patiekalai</div>

                    <div class="card-body">
                        <form method="POST" action="{{ isset($dish)?route('dishes.update', $dish->id):route('dishes.store') }}">
                            @csrf
                            {{--                            dedam if kadangi jei vien put, panaikins Pridėjima --}}
                            @if (isset($dish))
                                {{--                                put reikalingas, kad veiktų Redagavimas --}}
                                @method('put')
                            @endif
                            <div class="mb-3">
                                <label class="form-label">Pavadinimas</label>
                                <input type="text" name="name" class="form-control" value="{{ isset($dish)?$dish->name:'' }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" >Kaina</label>
                                <input type="text" name="price" class="form-control" value="{{ isset($dish)?$dish->price:'' }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" >Nuotrauka</label>
                                <input type="text" name="picture" class="form-control" value="{{ isset($dish)?$dish->picture:'' }}">
                            </div>
                            <div class="mb-3">
                                <select name="restaurant_id" class="form-select">
                                    @foreach($restaurants as $restaurant)
                                        <option value="{{ $restaurant->id }}" {{ isset($dish)&&($restaurant->id==$dish->restaurant_id)?'selected':'' }}> {{ $restaurant->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-success">{{ isset($dish)?'Išsaugoti':'Pridėti' }}</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
