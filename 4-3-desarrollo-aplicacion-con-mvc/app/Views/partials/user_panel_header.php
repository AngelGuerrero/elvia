<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Desarrollo de aplicaciones usando el patrón de diseño MVC</title>

  <style>
    .dev {
      border: 1px solid red;
    }

    body {
      margin: 0;
      padding: 0;
      font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
      font-size: small;
      color: #023e8a;
    }

    .wrapper {
      min-height: 100vh;
      -webkit-backdrop-filter: blur(3px);
      -moz-backdrop-filter: blur(3px);
      backdrop-filter: blur(3px);

      display: grid;
      grid-template-areas:
        "nav nav"
        "main main"
        "footer footer";
      grid-template-columns: 1fr 1fr;
      grid-template-rows: 50px auto 50px;
    }

    .wrapper--login {
      min-height: 100vh;
      -webkit-backdrop-filter: blur(3px);
      -moz-backdrop-filter: blur(3px);
      backdrop-filter: blur(3px);

      display: grid;
      grid-template-areas:
        "nav nav"
        "main main"
        "footer footer";
      grid-template-columns: 1fr 1fr;
      grid-template-rows: 50px auto 50px;
    }

    /* .side-left {
      grid-area: left;

      background-image: url("../img/login.jpg");
      background-size: cover;
      background-position: center;
    } */

    .nav {
      grid-area: nav;

      display: flex;
      align-items: center;
      background: black;
    }

    .nav--login {
      grid-area: nav;

      display: flex;
      align-items: center;
      justify-content: space-between;
      background: black;
    }

    .container__form--logout {
      margin: 0 10px;
      display: flex;
      align-items: center;
      color: white;
    }

    .container__form--logout p {
      font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
      font-size: 0.8rem;
      font-weight: bold;
      margin-right: 10px;
    }

    .nav__title {
      font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
      font-size: 1rem;
      font-weight: bold;
      color: white;
      margin-left: 10px;
    }

    .main {
      grid-area: main;

      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      padding: 20px;
      background-image: linear-gradient(to top, #fbc2eb 0%, #a6c1ee 100%);
    }

    .container__error {
      width: 400px;
      display: flex;
      flex-direction: column;
      justify-content: center;
      padding: 5px 20px;
      border-radius: 10px;
      background-color: white;
      box-shadow: 3px 3px 10px rgba(0, 0, 0, 0.2);
      margin: 15px 0;
    }

    .container__error p {
      text-align: center;
      font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
      font-size: 0.8rem;
      font-weight: bold;
      color: red;
      margin-bottom: 0.5rem;
    }

    .container__message {
      width: 400px;
      display: flex;
      flex-direction: column;
      justify-content: center;
      padding: 5px 20px;
      border-radius: 10px;
      background-color: white;
      box-shadow: 3px 3px 10px rgba(0, 0, 0, 0.2);
      margin: 15px 0;
    }

    .container__message p {
      font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
      font-size: 0.8rem;
      font-weight: bold;
      color: #023e8a;
      margin-bottom: 0.5rem;
    }

    .container__success {
      width: 400px;
      display: flex;
      flex-direction: column;
      justify-content: center;
      padding: 5px 20px;
      border-radius: 10px;
      background-color: white;
      box-shadow: 3px 3px 10px rgba(0, 0, 0, 0.2);
      margin: 15px 0;
    }

    .container__success p {
      text-align: center;
      font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
      font-size: 0.8rem;
      font-weight: bold;
      color: green;
      margin-bottom: 0.5rem;
    }

    .container__message {
      width: 400px;
      display: flex;
      flex-direction: column;
      justify-content: center;
      padding: 5px 20px;
      border-radius: 10px;
      background-color: white;
      box-shadow: 3px 3px 10px rgba(0, 0, 0, 0.2);
      margin: 15px 0;
    }

    .container__message p {
      font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
      font-size: 0.8rem;
      font-weight: bold;
      color: #023e8a;
      margin-bottom: 0.5rem;
    }

    .footer {
      grid-area: footer;

      background: rgb(37, 36, 36);
      display: flex;
      justify-content: flex-end;
    }

    .footer__panel {
      grid-area: footer;

      background-color: rgb(37, 36, 36);
      display: flex;
      justify-content: space-between;
      padding: 0 1rem;
    }

    .footer__text {
      font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
      font-size: 0.8rem;
      font-weight: bold;
      color: white;
      margin-right: 10px;
    }

    .container {
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .container__title {
      font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
      font-size: 1rem;
      text-align: center;
      margin-bottom: 2rem;
    }

    .container__title--result {
      font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
      font-size: 2rem;
      text-align: center;
      margin-bottom: 2rem;
      color: #fff;
    }

    .container__result {
      width: 400px;
      display: flex;
      flex-direction: column;
      justify-content: center;
      padding: 20px;
      border-radius: 10px;
      background-color: #fff;
      box-shadow: 3px 3px 10px rgba(0, 0, 0, 0.2);
      margin: 0 10px;
    }

    .form {
      width: 400px;
      display: flex;
      flex-direction: column;
      justify-content: center;
      padding: 20px;
      border-radius: 10px;
      background-color: #fff;
      box-shadow: 3px 3px 10px rgba(0, 0, 0, 0.2);
      margin: 0 10px;
    }

    .form__control {
      font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
      font-size: medium;
      color: #023e8a;
      display: grid;
      align-items: center;
      grid-template-columns: 1fr 2fr;
      margin-bottom: 0.8rem;
    }

    .form__label {
      width: 100px;
      text-align: right;
      margin-right: 10px;
      padding: 5px;
    }

    .form__input {
      height: 30px;
      border: 1px solid #023e8a;
      border-radius: 5px;
      padding: 5px;
    }

    .form__submit {
      width: 100%;
      height: 30px;
      border: 1px solid #023e8a;
      border-radius: 5px;
      padding: 5px;
      background-color: #023e8a;
      color: #fff;
      cursor: pointer;
    }

    .form__control--submit {
      justify-content: center;
      margin-top: 1rem;
    }

    .form__select {
      width: 100%;
      height: 40px;
      border: 1px solid #023e8a;
      border-radius: 5px;
    }

    select[multiple] {
      width: 100%;
      height: 150px;
      padding: 5px;
      border: 1px solid #ccc;
      border-radius: 4px;
      background-color: #fff;
      color: #333;
      font-size: 14px;
    }

    select[multiple] option {
      padding: 3px;
    }

    .btn {
      display: flex;
      justify-content: center;
      align-items: center;
      margin-top: 1rem;
      margin-bottom: 1rem;
    }

    .btn--logout {
      width: 100%;
      height: 30px;
      border: 1px solid tomato;
      border-radius: 5px;
      padding: 5px 10px;
      background-color: tomato;
      color: #fff;
      cursor: pointer;
    }

    .table {
      background-color: white;
      border: 1px solid #ccc;
      width: 80%;
      max-width: 800px;
      padding: 10px;
      border-radius: 10px;
    }

    .table__header {
      display: flex;
      /* justify-content: flex-end; */
      align-items: center;
      margin-bottom: 1rem;
    }

    .table__columns {
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .table__titles {
      width: 100%;
      text-align: center;
      font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
      font-size: 0.8rem;
      font-weight: bold;
      background-color: #023e8a;
      color: white;
      border-radius: 10px;
    }

    .table__column {
      width: 100%;
      text-align: center;
      font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
      font-size: 0.8rem;
      font-weight: bold;
    }

    .table__column--action {
      width: 100%;
      text-align: center;
      font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
      font-size: 0.8rem;
      font-weight: bold;
      border-radius: 10px;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .btn__create_user {
      width: 100%;
      height: 30px;
      border: 1px solid #38a3a5;
      border-radius: 5px;
      padding: 5px 10px;
      background-color: #38a3a5;
      color: #fff;
      cursor: pointer;
      margin-top: 1rem;
    }

    .btn__to_home {
      width: 100%;
      height: 30px;
      border: 1px solid #38a3a5;
      border-radius: 5px;
      padding: 5px 10px;
      background-color: #38a3a5;
      color: #fff;
      cursor: pointer;
      margin-top: 1rem;
    }

    .form__upload_file {
      width: 100%;
      display: flex;
      flex-direction: column;
      justify-content: center;
      padding: 20px;
      border-radius: 10px;
      background-color: #fff;
      box-shadow: 3px 3px 10px rgba(0, 0, 0, 0.2);
      margin: 0 10px;
    }

    .btn--upload-file {
      width: fit-content;
      height: 30px;
      border: 1px solid #38a3a5;
      border-radius: 5px;
      padding: 5px 10px;
      background-color: #38a3a5;
      color: #fff;
      cursor: pointer;
      /* margin-top: 1rem; */
    }

    .btn--download-file {
      width: fit-content;
      height: 30px;
      border: 1px solid lightgray;
      border-radius: 5px;
      padding: 5px 10px;
      background-color: transparent;
      color: black;
      cursor: pointer;
      margin-right: 1rem;
    }

    .btn--delete-file {
      width: fit-content;
      height: 30px;
      border: 1px solid tomato;
      border-radius: 5px;
      padding: 5px 10px;
      background-color: tomato;
      color: #fff;
      cursor: pointer;
    }

    .title {
      font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
      font-size: 1rem;
      text-align: center;
      margin-bottom: 2rem;
    }

    .menu__container {
      display: flex;
    }

    .menu__items {
      display: flex;
      justify-content: center;
      align-items: stretch;
      margin-left: 3rem;
    }

    .btn--menu {
      display: flex;
      align-items: center;
      padding: 0 20px;
      text-align: center;
      color: #fff;
      font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
      text-decoration: none;
      color: white;
      font-weight: bold;
      font-size: 0.8rem;
      cursor: pointer;
    }

    .btn--menu:hover {
      background-color: #38a3a5;
      color: white;
    }

    .paragraph {
      font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
      font-size: 0.8rem;
      margin-bottom: 2rem;
      margin-left: 1rem;
    }

    .container {
      width: 800px;
      background-color: white;
      padding: 1rem;
      border-radius: 10px;
    }

    .users__table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 1rem;
    }
  </style>
</head>

<body>
  <div class="wrapper">
    <nav class="nav">
      <h3 class="nav__title">Panel</h3>
    </nav>