@extends('layouts.admin')

@section('content')
    <div class="col-sm-8 col-sm-offset-2">
       {!!Form::open(['route'=>'asignacion.store', 'method'=>'POST', 'class' => 'form-horizontal'])!!}
        <section class="">
            <legend>Asignar Docente</legend>
            <div class="form-group">
                {!!Form::label('proyecto_id','Proyectos:', ['class' => 'col-sm-2 control-label'])!!}
                <div class="col-sm-10">
                    <select name="proyecto_id" class="form-control js-example-basic-single" id="proyecto_id">
                        @foreach($proyectos as $proyecto)
                            <option value="{{ $proyecto->id }}">{{$proyecto->titulo}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                {!!Form::label('profesional_id','Tribunal 1:', ['class' => 'col-sm-2 control-label'])!!}
                <div id="profesionalSegestion" class="col-sm-10">

                </div>
            </div>
        </section>
        {!!Form::submit('Asignar como tribunal',['class'=>'btn btn-primary pull-right'])!!}
        {!!Form::close()!!}

       {{-- <form class="form-horizontal" method="POST">
            <div class="form-group">
                <label class="control-label col-sm-2">Proyectos:</label>
                <div class="col-sm-10">
                    <select name="proyecto_id" class="form-control js-example-basic-single" id="proyecto_id">
                        @foreach($proyectos as $proyecto)
                            <option value="{{ $proyecto->id }}">{{$proyecto->titulo}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group">
                {!!Form::label('profesional_id','Tribunal 1:', ['class' => 'col-sm-2 control-label'])!!}
                <div id="profesionalSegestion" class="col-sm-10">

                </div>
            </div>

            <div class="form-group">
                <button class="btn btn-primary pull-right btn-submit">Submit</button>
            </div>
        </form>--}}
    </div>
    <div class="clearfix"></div>
    <legend>Docentes Asignados</legend>
    <div id="tribunalesAsignados">

    </div>
@endsection
@push('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            loadTribunalesSugestion();
            loadTribunalesAssigned();
            $('#proyecto_id').change(function () {
                loadTribunalesSugestion();
                loadTribunalesAssigned()
            });

            function loadTribunalesSugestion() {
                $.ajax({
                    type: 'GET',
                    url: '/profesionals/project/' + $("#proyecto_id").val(),
                    data: {},
                    success: function (data) {
                        $("#profesionalSegestion").html(data);
                    }
                });
            }

            function loadTribunalesAssigned() {
                $.ajax({
                    type: 'GET',
                    url: '/tribunales/asignados/' + $("#proyecto_id").val(),
                    data: {},
                    success: function (data) {
                        $("#tribunalesAsignados").html(data);
                    }
                });
            }

            function deleteTribunalAssigned(id) {
                console.log(id);
                loadTribunalesAssigned();
            }


            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(".btn-submit").click(function(e){
                e.preventDefault();
                var proyecto_id = $("input[name=proyecto_id]").val();
                var profesional_id = $("input[name=profesional_id]").val();
                var formData = new FormData();
                formData.append("proyecto_id", proyecto_id);
                formData.append("profesional_id", profesional_id);
                $.ajax({
                    type:'POST',
                    url:'/asignacionpost',
                    data: formData,
                    processData: false,
                    contentType: false,
                    cache : false,
                    success:function(data){
                    }
                });
            });
        });
    </script>
@endpush
