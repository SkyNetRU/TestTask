@extends('layout')


@section('content')
    <div class="container">
        <div class="row all-height align-items-center">
            <div class="col-md-12">
                <form id="transport_form">
                    <div class="form-group">
                        <input type="text" class="form-control" name="name" id="name" required
                               placeholder="Нименование транспорта">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="direction" id="direction" required
                               placeholder="Направление">
                    </div>
                    <div class="form-group">
                        <input type="number" class="form-control" name="number" id="number" required
                               placeholder="Номер транспорта">
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('footer_scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>

    <script>
      $(document).ready(function() {
        $('#transport_form').submit(function(e) {
          e.preventDefault();
        }).validate({
          rules: {
            name: 'required',
            direction: 'required',
            number: {
              required: true,
              number: true,
            }
          },
          messages: {
            name: 'Нименование транспорта обязательно',
            direction: 'Указание направления обязательно',
            number: {
              required: 'Номер транспорта обязателен',
              number: 'Номер транспорта должен быть числом',
            }
          },
          submitHandler: function(form) {
            saveTransport(form)
          }
        });
      });

    </script>
@endsection