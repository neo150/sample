@extends('layouts.app')
@section('content')
    <div class='card-body'>
        <div class='card-title'>
            本のタイトル
        </div>

        @include('common.errors')

        <form action="{{ url('books/update') }}" method="POST" class="form-horizonral">
            {{ csrf_field() }}
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="book" class="col-sm-3 control-label">Book</label>
                    <input type="text" name="item_name" class="form-control" value="{{ $book->item_name }}">
                </div>

                <div class="form-group col-md-6">

                    <label for="amount" class="col-sm-3 control-label">金額</label>
                    <input type="text" name="item_amount" class="form-control" value="{{ $book->item_amount }}">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="number" class="col-sm-3 control-label">数</label>
                    <input type="text" name="item_number" class="form-control" value="{{ $book->item_number }}">
                </div>

                <div class="form-group col-md-6">
                    <label for="published" class="col-sm-3 control-label">公開日</label>
                    <input type="datetime" name="published" class="form-control" value="{{ $book->published }}">
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-6">
                            <button type="submit" class="btn btn-primary">
                                Save
                            </button>
                            <a class="btn btn-link pull-right" href="{{ url('/') }}">
                                Back
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <input type="hidden" name="id" value="{{ $book->id }}">

            {{ csrf_field() }}

        </form>

    @endsection
