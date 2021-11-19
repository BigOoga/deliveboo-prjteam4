<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,700;1,400&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <div>
        <img class="logo" src="{{ asset('images/logo-text.png') }}" alt="">
    </div>
    <div class="main-container">
        <div class="wrapper">
            <h1>Il tuo ordine è stato confermato!</h1>
            <h2>grazie per aver scelto Deliveboo</h2>
            <hr>
            <img class="gif-rider" src="https://media3.giphy.com/media/gsr9MG7bDvSRWWSD1Y/giphy.gif?cid=6c09b952q0ll6ul7gsttnb2gx2zas9nw3b1y1eggho5c87o5&rid=giphy.gif&ct=s" alt="">
        </div>
        <footer>
            <div class="wrapper">
                <ul>
                    <li><h4>hai domande sull'ordine?</h4></li>
                    <li><span>Chiama il servizio clienti al +390110719146</span></li>
                    <li> <span> Oppure scrivici all'indirizzo deliveboo@info.it</span></li>
                </ul>
                <ul>
                    <li><h4>Vuoi diventare un rider?</h4></li>
                    <li><a href="#">Lavora con Noi!</a></li>
                    <li><span>Leggi di più</span></li>
                </ul>
            </div>
        </footer>
    </div>
</body>
</html>

<style lang="scss">

    body{
        color: #2E3333;
        font-family: 'Roboto', sans-serif;
        padding-top: 30px;
        padding-bottom: 30px;
        text-align: center;

    }
    .main-container{
        position: absolute;
        left: 50%;
        transform: translate(-50%,0);
        width: 60%;
        background: linear-gradient(#00CCBC, #D0EB99, white 30%);
        border: 1px solid #008b80;
    }

    .wrapper{
        padding: 10%;
        text-align: center;
    }

    .gif-rider{
        height: 200px;
    }

    .logo{
        height: 100px;
    }

    h1{
        text-transform: uppercase;
    }

    hr{
        width: 60%;
    }

    ul{
        list-style-type: none;
        display: inline-block;

    }

    @media only screen and (max-width: 400px) {
    .main-container {
        width: 100%;
        height: 100%;
        border: 0;
        margin: 0;
    }

    .logo{
        height: 50px;
    }
}
</style>