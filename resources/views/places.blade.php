@extends('layouts.app')
@section('content')
    <div class='card-body'>
        <div class='card-title'>
            場所
        </div>

        @include('common.errors')

        <form enctype="multipart/form-data" action="{{ url('places') }}" method="POST" class="form-horizonral">
            {{ csrf_field() }}
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="place" class="col-sm-3 control-label">place</label>
                    <input type="text" name="item_name" class="form-control">
                </div>

                <div class="form-group col-md-6">

                    <label for="amount" class="col-sm-3 control-label">金額</label>
                    <input type="text" name="item_amount" class="form-control">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="number" class="col-sm-3 control-label">数</label>
                    <input type="text" name="item_number" class="form-control">
                </div>

                <div class="form-group col-md-6">
                    <label for="published" class="col-sm-3 control-label">公開日</label>
                    <input type="date" name="published" class="form-control">
                </div>

                {{-- file追加 --}}
                <div class="form-row">
                    <div class="col-sm-6">
                        <label>画像</label>
                        <input type="file" name="item_img">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-6">
                            <button type="submit" class="btn btn-primary">
                                Save
                            </button>
                        </div>
                    </div>
                </div>


            </div>
        </form>

        {{-- 現在の本 --}}
        @if (count($places) > 0)
            <div class="card-body">
                {{ Auth::user()->name }} さんの現在の本
            </div>
            <div class="card-body">
                <table class="table table-striped task-table">
                    {{-- テーブルヘッダ --}}
                    <thead>
                        <th>場所一覧</th>
                        <th>&nbsp;</th>
                    </thead>
                    {{-- テーブル本体 --}}
                    <tbody>
                        @foreach ($places as $place)
                            <tr>
                                {{-- 本タイトル --}}
                                <td class="table-text">
                                    <div>{{ $place->name }}</div>
                                    <div>{{ $place->number }}</div>
                                </td>
                                {{-- 本更新ボタン --}}
                                <td>
                                    {{-- <form action="{{ url('placesedit/' . $place->id) }}"
                                        method="POST">
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-primary">
                                            更新
                                        </button>
                                    </form> --}}
                                </td>
                                {{-- 本削除ボタン --}}
                                <td>
                                    <form action="{{ url('place/' . $place->id) }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="btn btn-danger">
                                            削除
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        @endif

        {{-- {{ $places->links() }} --}}

        {{-- {{ Auth::user()->name }} --}}
    </div>

@endsection
