@extends('layouts.app')
@section('content')
    <div class='card-body'>
        <div class='card-title'>
            本のタイトル
        </div>

        {{-- @include('common.errors') --}}

        <form action="{{ url('books') }}" method="POST" class="form-horizonral">
            {{ csrf_field() }}

            <div class="form-group">
                <div class="col-sm-6">
                    <input type="text" name="item_name" class="form-control">
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-primary">
                        Save
                    </button>
                </div>
            </div>
        </form>

        {{-- 現在の本 --}}
        @if (count($books) > 0)
            <div class="card-body">
                現在の本
            </div>
            <div class="card-body">
                <table class="table table-striped task-table">
                    {{-- テーブルヘッダ --}}
                    <thead>
                        <th>本一覧</th>
                        <th>&nbsp;</th>
                    </thead>
                    {{-- テーブル本体 --}}
                    <tbody>
                        @foreach ($books as $book)
                            <tr>
                                {{-- 本タイトル --}}
                                <td class="table-text">
                                    <div>{{ $book->item_name }}</div>
                                </td>
                                {{-- 本削除ボタン --}}
                                <td>
                                    <form action="{{ url('book/' . $book->id) }}" method="POST">
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

        {{ $books->links() }}

        {{-- {{ Auth::user()->name }} --}}
    </div>

@endsection
