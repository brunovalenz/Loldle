@extends('layout.appLogin')

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<form action="{{route('login.auth') }}" method="POST">
  <body>

    <main>
      <section class="login">

        <div class="wrapper">
          <img src="../img/logo.png" class="login__logo">

          <h1 class="login__title">Fazer login</h1>
      
          <label class="login__label">
            <span>email</span>
            <input type="text" name="email" id="email" class="input">
          </label>
    
          <label class="login__label">
            <span>senha</span>
            <input type="password" name="password" id="password" class="input">
          </label>
    
          <div class="login__icons">
            <button type="button" class="icons__button">
              <img src="../img/facebook-icon.png" alt="facebok">
            </button>
    
            <button type="button" class="icons__button">
              <img src="../img/google-icon.png" alt="facebok">
            </button>
    
            <button type="button" class="icons__button">
              <img src="../img/apple-icon.png" alt="facebok">
            </button>
          </div>
    
          <label class="login__label--checkbox">
            <input type="checkbox" class="input--checkbox">
            Manter login
          </label>
        </div>

        <div class="wrapper">
          
          <button type="submit" class="login__button" disabled>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
              <path d="M438.6 278.6l-160 160C272.4 444.9 264.2 448 256 448s-16.38-3.125-22.62-9.375c-12.5-12.5-12.5-32.75 0-45.25L338.8 288H32C14.33 288 .0016 273.7 .0016 256S14.33 224 32 224h306.8l-105.4-105.4c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0l160 160C451.1 245.9 451.1 266.1 438.6 278.6z"/>
            </svg>
          </button>
    
          <a href="{{ route ('user.create')}}" class="login__link">não consegue iniciar sessão?</a>
          <a href="{{ route ('user.create')}}" class="login__link">criar conta</a>
          
          </div>
        </div>

      </section>

      <section class="wallpaper"></section>
    </main>
    
  </body>

</form>

</html>

