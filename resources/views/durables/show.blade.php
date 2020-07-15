@extends('layouts.main')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Durable' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('durables.durable.destroy', $durable->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('durables.durable.index') }}" class="btn btn-primary" title="Show All Durable">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('durables.durable.create') }}" class="btn btn-success" title="Create New Durable">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('durables.durable.edit', $durable->id ) }}" class="btn btn-primary" title="Edit Durable">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Durable" onclick="return confirm(&quot;Click Ok to delete Durable.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Photo</dt>
            <dd>{{ asset('storage/' . $durable->photo) }}</dd>
            <dt>Du I D</dt>
            <dd>{{ $durable->duID }}</dd>
            <dt>Category</dt>
            <dd>{{ optional($durable->category)->category_name }}</dd>
            <dt>Du Name</dt>
            <dd>{{ $durable->du_name }}</dd>
            <dt>Amount</dt>
            <dd>{{ $durable->amount }}</dd>

        </dl>

    </div>
</div>

@endsection
