@extends('Shopbase::layouts.app')

@section('title', 'Shopbase Installer')

@section('content')

<div class="col-sm-offset-3 col-sm-6">
    <form method="POST">
        {{ csrf_field() }}
        <h1 class="text-center">Shopbase App Installer</h1>
        <p class="text-center">Please just add the storename in the input box below. <br> e.g <b>"mystore"</b> if your complete <b>Store Url</b> is <b>"https://mystore.myshopify.com"</b> </p>
        <div class="form-group">
            <label for="storename">Storename</label>
            <input type="text" name="storename" id="storename" class="form-control" required>
        </div>
        <div class="form-group text-center">
            <button class="btn btn-success btn-lg">Install App</button>
        </div>
    </form>
</div>

@endsection