@extends('layouts.app')

@section('style')
<style>
.top {
    min-height: 100vh;
}
.jumbotron {
    margin-top: 10vh;
}
</style>
@endsection

@section('content')
<div class="container top d-flex flex-column justify-content-center">
    <div class="jumbotron">
        <div class="row">

            <div class="col-8 offset-2">
                <div class="row">
                    <h1>Dodaj nowy mecz</h1>
                </div>

                <form id="uploadForm" action="/p" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="form-group row">
                        <label for="club_id_home" class="col-md-4 col-form-label pl-0">Drużyna Gospodarzy</label>
                            <select id="club_id_home" type="text" rows="5" class="form-control @error('club_id_home') is-invalid @enderror" name="club_id_home">
                                <option value="0">Wybierz klub</option>
                                @foreach($clubs as $club)
                                    <option value="{{ $club->id }}">
                                        {{ $club->name }}
                                    </option>
                                @endforeach
                            </select>
            
                            @error('club_id_home')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>

                    <div class="form-group row">
                        <label for="id_home_player" class="col-md-4 col-form-label pl-0">Najlepszy zawodnik gospodarzy</label>
                            <select id="id_home_player" type="text" rows="5" class="form-control @error('id_home_player') is-invalid @enderror" name="id_home_player">
                            </select>
                            @error('id_home_player')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>

                    <div class="form-group row">
                        <label for="club_id_away" class="col-md-4 col-form-label pl-0">Drużyna Gości</label>
                            <select id="club_id_away" type="text" rows="5" class="form-control @error('club_id_away') is-invalid @enderror" name="club_id_away">
                                
                                    <option value="0">Wybierz klub</option>
                                    @foreach($clubs as $club)
                                    <option value="{{ $club->id }}">
                                        {{ $club->name }}
                                    </option>
                                    @endforeach
                            
                            </select>
            
                            @error('club_id_away')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>

                    <div class="form-group row">
                        <label for="id_away_player" class="col-md-4 col-form-label pl-0">Najlepszy zawodnik gości</label>
                            <select id="id_away_player" type="text" rows="5" class="form-control @error('id_away_player') is-invalid @enderror" name="id_away_player">
                            </select>

                            @error('id_away_player')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                   
                    <div class="form-group row">
                        <label for="scoreFull" class="col-md-4 col-form-label pl-0">Wynik meczu</label>
                            <input id="scoreFull" type="text" class="form-control @error('scoreFull') is-invalid @enderror" name="scoreFull" placeholder="np. 30:20"value="{{ old('scoreFull') }}" autocomplete="scoreFull" autofocus>

                            @error('scoreFull')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>

                    <div class="form-group row">
                        <label for="scoreHalf" class="col-md-4 col-form-label pl-0">Wynik do przerwy</label>
                            <input id="scoreHalf" type="text" class="form-control @error('scoreHalf') is-invalid @enderror" name="scoreHalf" placeholder="np. !0:15" value="{{ old('scoreHalf') }}" autocomplete="scoreHalf" autofocus>

                            @error('scoreHalf')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>

                    <div class="form-group row">
                        <label for="penalty_home" class="col-md-4 col-form-label pl-0">Kary gospodarze</label>
                            <input id="penalty_home" type="number" rows="5" class="form-control @error('penalty_home') is-invalid @enderror" name="penalty_home" min="0" max="40" value="{{ old('penalty_home')}}" autocomplete="penalty_home" autofocus>
            
                            @error('penalty_home')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>

                    <div class="form-group row">
                        <label for="penalty_away" class="col-md-4 col-form-label pl-0">Kary gospodarze</label>
                            <input id="penalty_away" type="number" rows="5" class="form-control @error('penalty_away') is-invalid @enderror" name="penalty_away" min="0" max="40" value="{{ old('penalty_away')}}" autocomplete="penalty_away" autofocus>
            
                            @error('penalty_away')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
    
                    <div class="form-group row">
                        <label for="description" class="col-md-4 col-form-label pl-0">Opis meczu</label>
                            <textarea id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" autocomplete="description" autofocus></textarea>

                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>

                    <div class="row">
                        <label for="video" class="col-md-4 col-form-label pl-0">Wideo z meczu</label>
                        <input type="file" class="form-control-file" id="video" name="video">

                        @error('video')
                                <strong>{{ $message }}</strong>
                        @enderror

                    </div>
                    <div id="loader" class="pt-2" style="display: none;"><img src="/storage/logos/loader.gif" alt=""></div>

                    <div class="row pt-3 d-flex">
                        <button class="btn btn-outline-primary mr-3">Dodaj post</button>
                        <a href="javascript:history.back()" class="btn btn-outline-secondary ml-3">Powrót</a>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
@endsection

@section('scripts')
<script>

    


    $(document).ready(function() {
        $('#uploadForm').submit(function(e) {
        $('#loader').show();
        $('form :submit').attr("disabled", "disabled");
    });
      $('#club_id_home').on('change', function() {
          var stateID = $(this).val();
          if(stateID) {
              $.ajax({
                  url: '/p/get_by_club/'+stateID,
                  type: "GET",
                  data : {"_token":"{{ csrf_token() }}"},
                  dataType: "json",
                  success:function(data) {
                      // console.log(data);
                    if(data){
                      $('#id_home_player').empty();
                      $('#id_home_player').focus;
                      $('#id_home_player').append('<option value="">-- Wybierz zawodnika --</option>'); 
                      $.each(data, function(key, value){
                        key = key + 1;
                      $('select[name="id_home_player"]').append('<option value="'+ value.id +'">' + value.name +' '+ value.lastname + '</option>');
                  });
                }else{
                  $('#id_home_player').empty();
                }
                }
              });
          }else{
            $('#id_home_player').empty();
          }
      });
    });

    $(document).ready(function() {
      $('#club_id_away').on('change', function() {
          var stateID = $(this).val();
          if(stateID) {
              $.ajax({
                  url: '/p/get_by_club/'+stateID,
                  type: "GET",
                  data : {"_token":"{{ csrf_token() }}"},
                  dataType: "json",
                  success:function(data) {
                      // console.log(data);
                    if(data){
                      $('#id_away_player').empty();
                      $('#id_away_player').focus;
                      $('#id_away_player').append('<option value="">-- Wybierz zawodnika --</option>'); 
                      $.each(data, function(key, value){
                        key = key + 1;
                      $('select[name="id_away_player"]').append('<option value="'+ value.id +'">' + value.name +' '+ value.lastname + '</option>');
                  });
                }else{
                  $('#id_away_player').empty();
                }
                }
              });
          }else{
            $('#id_away_player').empty();
          }
      });
    });
</script>
@endsection




