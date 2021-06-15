@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'inventario'
])

@section('content')
  <div class="py-5 table-responsive">
    <table id="userList" class="table table-bordered table-hover table-striped">
        <thead class="thead-light">
        <tr>
            <th scope="col">#</th>
            <th scope="col">First</th>
            <th scope="col">Last</th>
            <th scope="col">Username</th>
            <th scope="col">E-mail</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th scope="row">1</th>
            <td>Cristian</td>
            <td>Ruiz</td>
            <td>c.r.username</td>
            <td>c.r.username@blog.com</td>
            <td>
                <a href="#"><i class="fas fa-edit"></i></a> | <a href="#"><i class="fas fa-user-times"></i></a>
            </td>
        </tr>
        </tbody>
    </table>
</div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            demo.initGoogleMaps();
        });
  </script>
@endpush