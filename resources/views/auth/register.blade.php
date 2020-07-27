@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="nom" class="col-md-4 col-form-label text-md-right">{{ __('nom') }}</label>

                            <div class="col-md-6">
                                <input id="nom" type="text" class="form-control @error('nom') is-invalid @enderror" name="nom" value="{{ old('nom') }}" required autocomplete="nom" autofocus>

                                @error('nom')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="matricule" class="col-md-4 col-form-label text-md-right">Matricule</label>

                            <div class="col-md-6">
                                <input id="matricule" type="text" class="form-control @error('matricule') is-invalid @enderror" name="matricule" value="{{ old('matricule') }}" required autocomplete="matricule">

                                @error('matricule')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="mdp" class="col-md-4 col-form-label text-md-right">Securité</label>

                            <div class="col-md-6">
                                <input id="mdp" type="password" class="form-control @error('mdp') is-invalid @enderror" name="mdp" required autocomplete="new-mdp">

                                @error('mdp')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="mdp2" class="col-md-4 col-form-label text-md-right">Confirmer securité</label>

                            <div class="col-md-6">
                                <input id="mdp2" type="password" class="form-control" name="mdp_confirmation" required autocomplete="new-mdp">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="filiere" class="col-md-4 col-form-label text-md-right">filiere</label>
                            
                            <div class="col-md-6">
                                <select name="filiere" id="">
                                     @foreach ($filieres as $filiere)
                                        <option value="{{ $filiere['nom_filiere'] }}">{{ $filiere['nom_filiere'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">email</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" required autocomplete="new-mdp">
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
