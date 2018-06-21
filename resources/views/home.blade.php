@extends('layout')


@section('content')
        <div class="container">
            <div class="row all-height align-items-center">
                <div class="col-md-12">
                    <table class="table table-striped" id="transports_table">
                        <thead>
                        <tr>
                            <th scope="col">Наименование</th>
                            <th scope="col">Направление</th>
                            <th scope="col">Номер</th>
                            <th scope="col">Дата и время</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
@endsection

@section('footer_scripts')
    <script type="text/javascript" src="/js/transport.js"></script>
    <script>
        var transports_list = [];
      $(document).ready(function () {
        getTransportList();


      });
    </script>
@endsection